package com.lazymarks.platform.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.lazymarks.platform.api.entity.Question;

public interface QuestionRepository extends JpaRepository<Question, Long> {

}
