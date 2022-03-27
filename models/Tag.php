<?php

class Tag {
    private $_tagName;

    public function __construct() {          
    }    

    // Getters
    public function getTagName() {
        return $this->_tagName;
    }

    // Setters
    public function setTagName($tagName) {
        $this->_tagName = $tagName;
    }

    // Méthodes 
    public function getTags() {
        require('controllers/connect.php');
			$requete = $db->prepare('SELECT tagname FROM tags');
			$requete->execute();
      while ($data = $requete->fetch()) {
        $tag[] = $data['tagname'];
      }
      return $tag;
    }
}