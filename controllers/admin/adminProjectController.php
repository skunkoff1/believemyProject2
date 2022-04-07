<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Project.php');

// Variables
$message = "";
$error = "";
$img = "";
$mode = "add";
$pageMode = "Formulaire d'ajout d'un projet";
$id = 0;
$project = null;
if (isset($_GET['mode']) && $_GET['mode'] == 'add') {
    $mode = "add";
} else if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    $mode = "edit";
    $id = $_GET['id'];
    $project = Project::getProjectById($_GET['id']);
    $pageMode = "Formulaire de modification d'un article";
}

//Récupération du user en session
$user = $_SESSION['pseudo'];

// Répertoire cible pour les images
$dir_path = __DIR__ . '/../../ressources/images/';

/*================ CREATION REPERTOIRE CIBLE SI INEXISTANT ==================*/

if (!is_dir($dir_path)) {
    if (!mkdir($dir_path)) {
        exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
    }
}

/*===========================================================================*/
/*=============== GESTION DE LA SAUVEGARDE DU PROJET EN BDD =================*/
/*===========================================================================*/


if (!empty($_POST['title']) && !empty($_POST['article']) && !empty($_POST['resume'])) {
    // SI un titre et un article sont reçus en post -> création des variables Titre, Resumé et Contenu
    $title = $_POST['title'];
    $content = $_POST['article'];
    $resume = $_POST['resume'];

    /*===========================================================================*/
    /*======== GESTION DE L'UPLOAD D'IMAGE D'ILLUSTRATION DE L'ARTICLE ==========*/
    /*===========================================================================*/

    // Si une image d'illustration est postée
    if (!empty($_FILES['headImg'])) {
        if ($_FILES['headImg']['size'] == 0 && $mode != "edit") {
            $error = 1;
            $message = 'Veuillez choisir une image';
            require('views/admin/adminProjectView.php');
            exit();
        } else if ($_FILES['headImg']['size'] == 0 && $mode == "edit") {
            $img = $project->getImg();
        }
        if ($_FILES['headImg']['size'] <= 10485760) {

            // Parcours du tableau d'erreurs
            if (isset($_FILES['headImg']['error']) && UPLOAD_ERR_OK === $_FILES['headImg']['error']) {
                // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['headImg']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
                if (in_array($extension, $extensionArray)) {
                    $img = time() . $_FILES['headImg']['name'];
                    move_uploaded_file($_FILES['headImg']['tmp_name'], $dir_path . $img);
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
    // Création de l'objet projet 
    $project = new Project();
    if ($mode == "add") {
        $project->setProject($title, $content, $resume, $img, $user);
        // Enregistrement en BDD
        $project->recordProject();
    } else if ($mode == "edit") {
        $project->setFullProject($id, $title, $content, $resume, $img, $user);
        $project->updateProject();
    }
    $error = 0;
    $message = "Projet enregistré avec succès";
} else {
    $error = 1;
    $message = 'Veillez mettre un titre, un résumé et un contenu';
}

require('views/admin/adminProjectView.php');