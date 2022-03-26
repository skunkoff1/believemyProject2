<?php

require('../connect.php');
require("../sessionController.php");
require('../../models/Article.php');

if(isset($_POST['article']) && isset($_POST['title']) && isset($_FILES['headImg'])) {
    if ($_FILES['headImg']['size'] <= 10485760) {
        // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES['headImg']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
        if (in_array($extension, $extensionArray)) {
            $headImg = $_FILES['headImg']['name'];
            $resume = $_POST['article'].substr(0,50);
            $article = new Article($_POST['title'], $resume, $headImg, $_POST['article']);

            $article->recordArticle();
        }
    }
    else {
        echo 'image trop volumineuse';
    }
   
}



require('../../views/admin/articleView.php');