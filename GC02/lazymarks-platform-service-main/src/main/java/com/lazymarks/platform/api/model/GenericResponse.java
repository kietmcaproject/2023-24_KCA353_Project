package com.lazymarks.platform.api.model;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class GenericResponse<T> {
	private boolean success;
	private String message;
	private T data;

	public static <T> GenericResponse<T> success(T data) {
		return GenericResponse.<T>builder()
				.message("success")
				.data(data)
				.success(true)
				.build();
	}

	public static <T> GenericResponse<T> error(String errorMessage) {
		return GenericResponse.<T>builder()
				.message(errorMessage)
				.success(false)
				.build();
	}
}
