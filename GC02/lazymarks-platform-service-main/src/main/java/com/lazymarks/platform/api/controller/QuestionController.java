package com.lazymarks.platform.api.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.core.annotation.AuthenticationPrincipal;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.lazymarks.platform.api.entity.Question;
import com.lazymarks.platform.api.model.LazymarksUserDetails;
import com.lazymarks.platform.api.service.QuestionService;

import jakarta.validation.Valid;

@RestController
@RequestMapping(path = "/question-service/v1/questions")
public class QuestionController {

	@Autowired
	private QuestionService questionService;
	
	@PostMapping
	public ResponseEntity<Object> createQuestion(@RequestBody @Valid Question question, @AuthenticationPrincipal UserDetails userDetails) {
		final LazymarksUserDetails lmUserDetails = LazymarksUserDetails.class.cast(userDetails);
		question.setCreatedBy(lmUserDetails.getUser().getId());
		question.setUpdatedBy(lmUserDetails.getUser().getId());
		return ResponseEntity.status(HttpStatus.CREATED).body(this.questionService.createQuestion(question));
	} 
}
