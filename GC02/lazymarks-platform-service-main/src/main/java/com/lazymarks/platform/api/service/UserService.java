package com.lazymarks.platform.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import com.lazymarks.platform.api.entity.User;
import com.lazymarks.platform.api.model.GenericResponse;
import com.lazymarks.platform.api.repository.UserRepository;

@Service
public class UserService {
	
	@Autowired
	private UserRepository userRepository;
	
	@Autowired
	private PasswordEncoder passwordEncoder;
	
	public GenericResponse<User> createUser(User user) {
		user.setPassword(passwordEncoder.encode(user.getPassword()));
		user.setActive(true);
		user = this.userRepository.saveAndFlush(user);
		return GenericResponse.success(user);
	}
	
	public User getUserByUsernameOrEmail(String username) throws UsernameNotFoundException {
		String email = username;
		return this.userRepository.findByUsernameOrEmail(username, email)
				.orElseThrow(() -> new UsernameNotFoundException("User not found"));
	}

}
