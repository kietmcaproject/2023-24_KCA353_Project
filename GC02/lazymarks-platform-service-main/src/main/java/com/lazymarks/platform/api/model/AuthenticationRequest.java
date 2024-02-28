package com.lazymarks.platform.api.model;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@AllArgsConstructor
@NoArgsConstructor
public class AuthenticationRequest {

	@NotBlank(message = "username must not be null or blank")
	private String username;

	@NotBlank(message = "password must not be null or blank")
	private String password;

}
