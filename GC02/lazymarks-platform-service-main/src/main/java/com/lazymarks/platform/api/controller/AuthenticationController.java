package com.lazymarks.platform.api.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.lazymarks.platform.api.model.AuthenticationRequest;
import com.lazymarks.platform.api.service.AuthenticationService;

import jakarta.validation.Valid;

@RestController
@RequestMapping(path = "/auth-service/v1/token")
public class AuthenticationController {
	
	@Autowired
	private AuthenticationService authService;

	@PostMapping("/access")
	public ResponseEntity<Object> createJwtAuthToken(@Valid @RequestBody AuthenticationRequest authRequest) {
		return ResponseEntity.ok(authService.createJwtAuthToken(authRequest));
	}
}
