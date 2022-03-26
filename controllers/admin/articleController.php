<?php

require('../connect.php');
require("../sessionController.php");
require('../../models/Article.php');
require('../../models/Tag.php');

// Récupération des tags pour les articles
$tagArray= [];
$tag = new Tag();
$tagArray = $tag->getTags();

// Répertoire cible pour les images
$dir_path = __DIR__ .'/../../ressources/images/';

/*================ CREATION REPERTOIRE CIBLE SI INEXISTANT ==================*/

if (!is_dir($dir_path)) {
    if (!mkdir($dir_path)) {
        exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
    }
}


if(isset($_POST['article']) && isset($_POST['title']) && isset($_FILES['headImg'])) {
    if ($_FILES['headImg']['size'] <= 10485760) {
        // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES['headImg']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
        if (in_array($extension, $extensionArray)) {
            $headImg = $_FILES['headImg']['name'];
            move_uploaded_file($_FILES['headImg']['tmp_name'], $dir_path.$headImg);
            $resume = $_POST['article'].substr(0,50);
            $article = new Article($_POST['title'], $resume, $headImg, $_POST['article'], $_POST['tagSelect']);
            // $article->recordArticle();
        }
    }
    else {
        echo 'image trop volumineuse';
    }
   
}



require('../../views/admin/articleView.php');