package com.lazymarks.platform.api.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;

import com.lazymarks.platform.api.entity.User;

public interface UserRepository extends JpaRepository<User, Long> {

	Optional<User> findByUsernameOrEmail(String username, String email);

}
