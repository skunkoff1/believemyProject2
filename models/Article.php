<?php

class Article {
    private $id;
    private $_title;
    private $_resume;
    private $_headImg;
    private $_content;
    private $_tag;
    private $_date;

    // Constructeur
    public function __construct() {
    }    

    public function setArticle($title, $resume, $headImg,$content, $tag) {
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
    }   

    public function setArticleWithId($id, $title, $resume, $headImg, $content, $tag) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
    } 
    
    public function setFullArticle($id, $title, $resume, $headImg, $content, $tag, $date) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
        $this->setDate($date);
    }   

    // Getters
    public function getId() {
        return $this->_id;
    }
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
    public function getTag() {
        return $this->_tag;        
    }
    public function getDate() {
        return $this->_date;
    }

    // Setters
    public function setId($id) {
        $this->_id = $id;
    }
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
    public function setTag($tag) {
        $this->_tag = $tag;
    }
    public function setDate($date) {
        $this->_date = $date;
    }

    // Méthodes 
    public static function getArticles($mode) {
        $articleArray = array();
        require('controllers/connect.php');
        if($mode == "home") {
            $requete = $db->prepare('SELECT * FROM articles LIMIT 3');
            $requete->execute();
        } else {
            $requete = $db->prepare('SELECT * FROM articles');
            $requete->execute();
        }        
        while ($data = $requete->fetch()) {
            $article = new Article();
            $article->setFullArticle($data['id'], $data['title'], $data['resume'], $data['head_img'], $data['content'], $data['tag'], $data['creation_date']);           
            array_push($articleArray, $article);
        }
      return $articleArray;
    }

    public static function getArticleById($id) {
        require('controllers/connect.php');
        $requete = $db->prepare('SELECT * FROM articles WHERE id=?');
        $requete->execute(array($id));
        while ($data = $requete->fetch()) {
            $article = new Article();
            $article->setFullArticle($data['id'], $data['title'], $data['resume'], $data['head_img'], $data['content'], $data['tag'], $data['creation_date']);    
        }
      return $article;
    }

    public function updateArticle() {
        require('controllers/connect.php');
			$requete = $db->prepare('UPDATE articles SET title= ?, resume =? , head_img = ?, content = ?, tag = ? WHERE id=?');
			$requete->execute([
				$this->getTitle(),
				$this->getResume(),
				$this->getHeadImg(),
				$this->getContent(), 
                $this->getTag(),
                $this->getId()
			]);
    }

    public function removeArticle($id) {
        require('controllers/connect.php');
			$requete = $db->prepare('DELETE FROM articles WHERE id=?');
			$requete->execute(array($id));
    }

    public function recordArticle() {
        require('controllers/connect.php');
			$requete = $db->prepare('INSERT INTO articles(title, resume, head_img, content, tag) VALUES(?, ?, ?, ?, ?)');
			$requete->execute([
				$this->getTitle(),
				$this->getResume(),
				$this->getHeadImg(),
				$this->getContent(), 
                $this->getTag()
			]);
    }
}