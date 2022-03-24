<?php

class Article {
    private $_title;
    private $_resume;
    private $_content;
    private $_date;
    private $_tag;

    public function __construct($title, $resume, $content, $date, $tag) {
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setContent($content);
        $this->setDate($date);
        $this->setTag($tag);
    }

    // Getters
    public function getTitle() {
        return $this->_title;
    }
    public function getResume() {
        return $this->_reusme;
    }
    public function getContent() {
        return $this->_content;
    }
    public function getDate() {
        return $this->_date;
    }
    public function getTag() {
        return $this->_tag;        
    }

    // Setters
    public function setTitle($title) {
        $this->_title = $title;
    }
    public function setResume($resume) {
        $this->_resume = $resume;
    }
    public function setContent($content) {
        $this->_content = $content;
    }
    public function setDate($date) {
        $this->_date = $date;
    }
    public function setTag($tag) {
        $this->_tag = $tag;
    }

    // Méthodes 
    public function recordArticle() {
        
    }
}