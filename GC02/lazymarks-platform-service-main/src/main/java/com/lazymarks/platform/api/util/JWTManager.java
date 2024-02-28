package com.lazymarks.platform.api.util;

import java.util.Date;
import java.util.HashMap;
import java.util.Map;

import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Component;

import com.auth0.jwt.JWT;
import com.auth0.jwt.JWTCreator.Builder;
import com.auth0.jwt.algorithms.Algorithm;
import com.auth0.jwt.exceptions.JWTVerificationException;
import com.auth0.jwt.interfaces.DecodedJWT;
import com.auth0.jwt.interfaces.JWTVerifier;
import com.lazymarks.platform.api.model.AuthenticationResponse;
import com.lazymarks.platform.api.model.LazymarksUserDetails;

@Component
public final class JWTManager {
	
	public static final String BEARER = "Bearer";
	public static final String AUTHORIZATION = "Authorization";
	public static final String ISSUER = "lazymarks";
	
	public static final String TYPE = "type";
	public static final String ACCESS_TOKEN = "access_token";
	public static final String REFRESH_TOKEN = "refresh_token";
	public static final int ACCESS_TOKEN_VALIDITY = 1800;
	public static final int REFRESH_TOKEN_VALIDITY = 86400;
	
	/**
	 * JWT_SECRET_KEY=lazymarks
	 */
	private static final String JWT_SECRET_KEY_BASE64_ENC = "bGF6eW1hcmtz";
	
	private Algorithm algorithm = Algorithm.HMAC256(JWT_SECRET_KEY_BASE64_ENC);
	
	private Builder jwtBuilder = JWT.create().withIssuer(ISSUER);
	private JWTVerifier jwtVerifier = JWT.require(algorithm).withIssuer(ISSUER).build();

	public AuthenticationResponse generateToken(UserDetails userDetails) {
		final LazymarksUserDetails lmUserDetails = LazymarksUserDetails.class.cast(userDetails);
		final String accessToken = generateToken(userDetails, ACCESS_TOKEN, ACCESS_TOKEN_VALIDITY);
		final String refreshToken = generateToken(userDetails, REFRESH_TOKEN, REFRESH_TOKEN_VALIDITY);
		return new AuthenticationResponse(accessToken, refreshToken, lmUserDetails.getUser());
	}
	
	private String generateToken(UserDetails userDetails, String type, int timePeriod) {
		Map<String, Object> claims = new HashMap<>();
		claims.put(TYPE, type);
		return generateToken(claims, userDetails.getUsername(), timePeriod);
	}
	
	private String generateToken(Map<String, Object> claims, String sub, int timePeriod) {
		return jwtBuilder.withPayload(claims)
				.withSubject(sub)
				.withIssuedAt(new Date())
				.withExpiresAt(new Date(System.currentTimeMillis() + timePeriod * 1000))
				.sign(algorithm);
	}
	
	public DecodedJWT getDecodedJWT(String token) throws JWTVerificationException {
		return jwtVerifier.verify(token);
	}

}
