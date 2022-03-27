<?php

require('../connect.php');
require("../sessionController.php");
require('../../models/Article.php');
require('../../models/Tag.php');

// Variables 
$message = '';
$error = '';

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

/*===========================================================================*/
/*============ GESTION DE LA SAUVEGARDE DE L'ARTICLE EN BDD =================*/
/*===========================================================================*/

if(isset($_POST['title']) && isset($_POST['article'])) {
    // SI un titre et un article est reçu en post -> création des variables Titre, Resumé et Contenu
    $title = $_POST['title'];
    $content = $_POST['article'];
    $resume = substr($content,0,255);
    $articleTag = $_POST['tagSelect'];

    /*===========================================================================*/
    /*======== GESTION DE L'UPLOAD D'IMAGE D'ILLUSTRATION DE L'ARTICLE ==========*/ 
    /*===========================================================================*/

    // Si une image d'illustration est postée
    if(isset($_FILES['headImg'])) {
        if ($_FILES['headImg']['size'] <= 10485760) {
    
             // Parcours du tableau d'erreurs
             if (isset($_FILES['headImg']['error']) && UPLOAD_ERR_OK === $_FILES['headImg']['error']) {   
                // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['headImg']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
                if (in_array($extension, $extensionArray)) {
                    $headImg = time().$_FILES['headImg']['name'];
                    move_uploaded_file($_FILES['headImg']['tmp_name'], $dir_path.$headImg);
                } else {
                    $error = 1;
                    $message = 'Vérifier l\'extension de votre image (extension autorisée : .png, .gif, .jpg, .jpeg)';
                }
            } else {
                $error = 1;
                $message = 'erreur lors de l\'upload de l\'image d\'illustration';
            }
        } else {
            $error = 1;
            $message = 'image trop volumineuse';
        }   
    } else {
        $headImg = "";
    }
    
    // Gestion des cas d'erreurs pour l'image d'illustration 
    
    if (isset($_FILES['headImg']) && $_FILES['headImg']['error'] != 0) {
    
        switch ($_FILES['headImg']['error']) {
            case 1:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier trop volumineux pour le serveur.';
                break;
    
            case 2:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier trop volumineux pour le site.';
                break;
    
            case 3:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier partiellement téléchargé<br /> Essayez à nouveau.';
                break;
    
            case 4:
                $error = 1;
                $message = 'erreur lors de l\'envoi : Aucun fichier détecté pour l\image d\'illustration.';
                break;
    
            case 6:
                $error = 1;
                $message = 'erreur lors de l\'envoi : un dossier temporaire est manquant<br />Contactez nous !';
                break;
    
            case 7:
                $error = 1;
                $message = 'erreur lors de l\'envoi : Echec lors de l\'écriture<br />Essayez à nouveau.';
                break;
    
            case 8:
                $error = 1;
                $message = 'erreur lors de l\'envoi : erreur interne.';
                break;
        }
    }
    
    /*===========================================================================*/
    /*========== GESTION DE L'IMAGE DANS L'ARTICLE SI EXISTANTE =================*/
    /*===========================================================================*/
    
    // Si une image est insérée dans l'article
    /*if(isset($_FILES['image'])) {
        if ($_FILES['image']['size'] <= 10485760) {
    
            // Parcours du tableau d'erreurs
            if (isset($_FILES['image']['error']) && UPLOAD_ERR_OK === $_FILES['headImg']['error']) {   
               // Recuperation de l'extension du fichier
               $extension  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
               $extension = strtolower($extension);
               $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
               if (in_array($extension, $extensionArray)) {
                   $headImg = $_FILES['image']['name'];
                   move_uploaded_file($_FILES['image']['tmp_name'], $dir_path.$headImg);
               } else {
                   $error = 1;
                   $message = 'Vérifier l\'extension de votre image (extension autorisée : .png, .gif, .jpg, .jpeg)';
               }
           } else {
               $error = 1;
               $message = 'erreur lors de l\'upload de l\image article';
           }
       } else {
           $error = 1;
           $message = 'image trop volumineuse';
       }   
    }
    
    // Gestion des cas d'erreurs pour l'image de l'article
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] != 0) {
    
        switch ($_FILES['image']['error']) {
            case 1:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier trop volumineux pour le serveur.';
                break;
    
            case 2:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier trop volumineux pour le site.';
                break;
    
            case 3:
                $error = 1;
                $message = 'erreur lors de l\'envoi : fichier partiellement téléchargé<br /> Essayez à nouveau.';
                break;
    
            case 4:
                $error = 1;
                $message = 'erreur lors de l\'envoi : Aucun fichier détecté.';
                break;
    
            case 6:
                $error = 1;
                $message = 'erreur lors de l\'envoi : un dossier temporaire est manquant<br />Contactez nous !';
                break;
    
            case 7:
                $error = 1;
                $message = 'erreur lors de l\'envoi : Echec lors de l\'écriture<br />Essayez à nouveau.';
                break;
    
            case 8:
                $error = 1;
                $message = 'erreur lors de l\'envoi : erreur interne.';
                break;
        }
    }*/

    // Création de l'objet article 
    $article = new Article($title, $resume, $headImg, $content, $articleTag);
    // Enregistrement en BDD
    $article->recordArticle();

}




require('../../views/admin/articleView.php');