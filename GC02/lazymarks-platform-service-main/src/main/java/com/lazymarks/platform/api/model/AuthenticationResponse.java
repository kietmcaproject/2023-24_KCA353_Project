package com.lazymarks.platform.api.model;

import com.lazymarks.platform.api.entity.User;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@AllArgsConstructor
@NoArgsConstructor
public class AuthenticationResponse {

	private String accessToken;
	private String refreshToken;
	private User user;

}
