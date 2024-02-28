package com.lazymarks.platform.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.BadCredentialsException;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Service;

import com.lazymarks.platform.api.model.AuthenticationRequest;
import com.lazymarks.platform.api.model.AuthenticationResponse;
import com.lazymarks.platform.api.model.GenericResponse;
import com.lazymarks.platform.api.util.JWTManager;

@Service
public class AuthenticationService {
	
	@Autowired
	private AuthenticationManager authenticationManager;
	
	@Autowired
	private UserDetailsServiceImpl userDetailsServiceImpl;
	
	@Autowired
	private JWTManager jwtManager;
	
	public GenericResponse<Object> createJwtAuthToken(AuthenticationRequest authRequest) {
		try {
			authenticationManager.authenticate(new UsernamePasswordAuthenticationToken(authRequest.getUsername(), authRequest.getPassword()));
		} catch(BadCredentialsException e) {
			throw new BadCredentialsException("Invalid credentials", e);
		}
		
		final UserDetails userDetails = this.userDetailsServiceImpl.loadUserByUsername(authRequest.getUsername());
		AuthenticationResponse authResponse = jwtManager.generateToken(userDetails);
		return GenericResponse.success(authResponse);
	}

}
