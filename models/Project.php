<?php

class Project
{
    private $_id;
    private $_title;
    private $_text;
    private $_resume;
    private $_img;
    private $_user;

    public function __construct()
    {
    }

    public function setProject($title, $text, $resume, $img, $user)
    {
        $this->setTitle($title);
        $this->setText($text);
        $this->setResume($resume);
        $this->setImg($img);
        $this->setUser($user);
    }

    public function setFullProject($id, $title, $text, $resume, $img, $user)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setText($text);
        $this->setResume($resume);
        $this->setImg($img);
        $this->setUser($user);
    }

    // Getters
    public function getId()
    {
        return $this->_id;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getText()
    {
        return $this->_text;
    }
    public function getResume()
    {
        return $this->_resume;
    }
    public function getImg()
    {
        return $this->_img;
    }
    public function getUser()
    {
        return $this->_user;
    }

    // Setters
    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setText($text)
    {
        $this->_text = $text;
    }
    public function setResume($resume)
    {
        $this->_resume = $resume;
    }
    public function setImg($img)
    {
        $this->_img = $img;
    }
    public function setUser($user)
    {
        $this->_user = $user;
    }

    // Méthodes 
    public static function getProjects($mode)
    {
        $projectArray = array();
        require('controllers/connect.php');
        if ($mode == "home") {
            $requete = $db->prepare('SELECT * FROM projects LIMIT 6');
            $requete->execute();
        } else {
            $requete = $db->prepare('SELECT * FROM projects');
            $requete->execute();
        }
        while ($data = $requete->fetch()) {
            $project = new Project();
            $project->setFullProject($data['id'], $data['title'], $data['text'], $data['resume'], $data['img'], $data['user']);
            array_push($projectArray, $project);
        }
        return $projectArray;
    }

    public static function getProjectById($id)
    {
        require('controllers/connect.php');
        $requete = $db->prepare('SELECT * FROM projects WHERE id=?');
        $requete->execute(array($id));
        while ($data = $requete->fetch()) {
            $project = new Project();
            $project->setFullProject($data['id'], $data['title'], $data['text'], $data['resume'], $data['img'], $data['user']);
        }
        return $project;
    }

    public static function getProjectsByUser($user)
    {
        require('controllers/connect.php');
        $projectArray = array();
        $requete = $db->prepare('SELECT * FROM projects WHERE user=?');
        $requete->execute(array($user));
        while ($data = $requete->fetch()) {
            $project = new Project();
            $project->setFullProject($data['id'], $data['title'], $data['text'], $data['resume'], $data['img'], $data['user']);
            array_push($projectArray, $project);
        }
        return $projectArray;
    }

    public function recordProject()
    {
        require('controllers/connect.php');
        $requete = $db->prepare('INSERT INTO projects(title, text, resume, img, user) VALUES(?, ?, ?, ?, ?)');
        $requete->execute([
            $this->getTitle(),
            $this->getText(),
            $this->getResume(),
            $this->getImg(),
            $this->getUser()
        ]);
    }

    public function updateProject()
    {
        require('controllers/connect.php');
        $requete = $db->prepare('UPDATE projects SET title= ?, resume =? , text = ?, img = ? WHERE id=?');
        $requete->execute([
            $this->getTitle(),
            $this->getResume(),
            $this->getText(),
            $this->getImg(),
            $this->getId()
        ]);
    }

    public function removeProject($id)
    {
        require('controllers/connect.php');
        $requete = $db->prepare('DELETE FROM projects WHERE id=?');
        $requete->execute(array($id));
    }
}