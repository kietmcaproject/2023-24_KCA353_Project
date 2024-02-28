package com.lazymarks.platform.api.filter;

import java.io.IOException;
import java.util.Date;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.web.authentication.WebAuthenticationDetailsSource;
import org.springframework.stereotype.Component;
import org.springframework.web.filter.OncePerRequestFilter;

import com.auth0.jwt.exceptions.JWTVerificationException;
import com.auth0.jwt.interfaces.DecodedJWT;
import com.lazymarks.platform.api.service.UserDetailsServiceImpl;
import com.lazymarks.platform.api.util.JWTManager;

import jakarta.servlet.FilterChain;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@Component
public class JWTAuthenticationFilter extends OncePerRequestFilter {

	@Autowired
	private UserDetailsServiceImpl userDetailsImplService;
	
	@Autowired
	private JWTManager jwtManager;
	
	@Override
	protected void doFilterInternal(HttpServletRequest request, HttpServletResponse response, FilterChain filterChain)
			throws ServletException, IOException {
		
		String jwt = null;
		String username = null;
		Date expiryDate = null;
		final String authorHeader = request.getHeader(JWTManager.AUTHORIZATION);
		if (authorHeader != null && authorHeader.startsWith(JWTManager.BEARER)) {
			jwt = authorHeader.substring(7);
			try {
				final DecodedJWT decodedJWT = this.jwtManager.getDecodedJWT(jwt);
				username = decodedJWT.getSubject();
			    expiryDate = decodedJWT.getExpiresAt();
			} catch (JWTVerificationException e) {
				e.printStackTrace();
			}
		}
		
		if (username != null && SecurityContextHolder.getContext().getAuthentication() == null) {
			UserDetails userDetails = this.userDetailsImplService.loadUserByUsername(username);
			if (isTokenValid(userDetails, username, expiryDate)) {
				UsernamePasswordAuthenticationToken userPassAuthToken = new UsernamePasswordAuthenticationToken(userDetails, null, userDetails.getAuthorities());
				userPassAuthToken.setDetails(new WebAuthenticationDetailsSource().buildDetails(request));
				SecurityContextHolder.getContext().setAuthentication(userPassAuthToken);
			}
		}
		
		filterChain.doFilter(request, response);
	}
	
	public boolean isTokenValid(UserDetails userDetails, String username, Date expiryDate) {
		return userDetails.getUsername().equals(username) && expiryDate.after(new Date());
	}
}
