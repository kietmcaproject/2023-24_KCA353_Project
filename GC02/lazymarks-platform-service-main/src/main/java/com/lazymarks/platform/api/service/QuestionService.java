package com.lazymarks.platform.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.lazymarks.platform.api.entity.Question;
import com.lazymarks.platform.api.model.GenericResponse;
import com.lazymarks.platform.api.repository.QuestionRepository;

@Service
public class QuestionService {

	@Autowired
	private QuestionRepository questionRepository;
	
	public GenericResponse<Question> createQuestion(Question question) {
		question = this.questionRepository.saveAndFlush(question);
		return GenericResponse.success(question);
	}
}
