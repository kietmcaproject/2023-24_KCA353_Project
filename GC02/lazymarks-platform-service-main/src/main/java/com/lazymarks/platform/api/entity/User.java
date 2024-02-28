package com.lazymarks.platform.api.entity;

import java.io.Serializable;
import java.sql.Timestamp;

import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;

import com.fasterxml.jackson.annotation.JsonProperty;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "user")
public class User implements Serializable {

	private static final long serialVersionUID = -1321415550970457359L;

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id")
	private Long id;
	
	@Column(name = "first_name", length = 255)
	private String firstName;
	
	@Column(name = "last_name", length = 255)
	private String lastName;
	
	@Column(name = "username", unique = true, length = 100)
	private String username;
	
	@NotNull
	@Column(name = "email", unique = true, length = 100)
	private String email;

	@NotNull
	@JsonProperty(access = JsonProperty.Access.WRITE_ONLY)
	@Column(name = "password", length = 255)
	private String password;
	
	@Column(name = "active", length = 1)
	private boolean active;
	
	@CreationTimestamp
	@Column(name = "created_at")
	private Timestamp createdAt;
	
	@UpdateTimestamp
	@Column(name = "updated_at")
	private Timestamp updatedAt;

}
