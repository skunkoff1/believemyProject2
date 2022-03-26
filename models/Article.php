<?php

class Article {
    private $_title;
    private $_resume;
    private $_headImg;
    private $_content;
    private $_date;
    private $_tag;

    public function __construct($title, $resume, $headImg,$content) {
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
    }    

    // Getters
    public function getTitle() {
        return $this->_title;
    }
    public function getResume() {
        return $this->_resume;
    }
    public function getHeadImg() {
        return $this->_headImg;
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
    public function setHeadImg($headImg) {
        $this->_headImg = $headImg;
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
        require('../../controllers/connect.php');
            $tag = "";
			$requete = $db->prepare('INSERT INTO articles(title, resume, head_img, content, tag) VALUES(?, ?, ?, ?, ?)');
			$requete->execute([
				$this->getTitle(),
				$this->getResume(),
				$this->getHeadImg(),
				$this->getContent(),                
				$this->$tag
			]);
    }
}