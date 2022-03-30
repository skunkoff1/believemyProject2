<?php

class Article {
    private $id;
    private $_title;
    private $_resume;
    private $_headImg;
    private $_content;
    private $_tag;
    private $_user;
    private $_date;

    // Constructeur
    public function __construct() {
    }    

    public function setArticle($title, $resume, $headImg,$content, $tag, $user) {
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
        $this->setUser($user);
    }   

    public function setArticleWithId($id, $title, $resume, $headImg, $content, $tag, $user) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
        $this->setUser($user);
    } 
    
    public function setFullArticle($id, $title, $resume, $headImg, $content, $tag, $user, $date) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setResume($resume);
        $this->setHeadImg($headImg);
        $this->setContent($content);
        $this->setTag($tag);
        $this->setUser($user);
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
    public function getUser() {
        return $this->_user;        
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
    public function setUser($user) {
        $this->_user = $user;
    }
    public function setDate($date) {
        $this->_date = $date;
    }

    // Méthodes 
    public static function getArticles($mode) {
        $articleArray = array();
        require('controllers/connect.php');
        if($mode == "home") {
            $requete = $db->prepare('SELECT * FROM articles LIMIT 6');
            $requete->execute();
        } else {
            $requete = $db->prepare('SELECT * FROM articles');
            $requete->execute();
        }        
        while ($data = $requete->fetch()) {
            $article = new Article();
            $article->setFullArticle($data['id'], $data['title'], $data['resume'], $data['head_img'], $data['content'], $data['tag'],$data['user'], $data['creation_date']);           
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
            $article->setFullArticle($data['id'], $data['title'], $data['resume'], $data['head_img'], $data['content'], $data['tag'], $data['user'], $data['creation_date']);    
        }
      return $article;
    }

    public static function getArticlesByUser($user) {
        require('controllers/connect.php');
        $articleArray = array();
        $requete = $db->prepare('SELECT * FROM articles WHERE user=?');
        $requete->execute(array($user));
        while ($data = $requete->fetch()) {
            $article = new Article();
            $article->setFullArticle($data['id'], $data['title'], $data['resume'], $data['head_img'], $data['content'], $data['tag'],$data['user'], $data['creation_date']);    
            array_push($articleArray, $article);
        }
      return $articleArray;
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
			$requete = $db->prepare('INSERT INTO articles(title, resume, head_img, content, tag, user) VALUES(?, ?, ?, ?, ?, ?)');
			$requete->execute([
				$this->getTitle(),
				$this->getResume(),
				$this->getHeadImg(),
				$this->getContent(), 
                $this->getTag(),
                $this->getUser()
			]);
    }
}