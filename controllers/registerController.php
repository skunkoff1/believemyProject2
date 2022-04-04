<?php


$PASSWORD_REGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

require('controllers/connect.php');


if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $userName = htmlspecialchars($_POST['name']);
    $userMail = htmlspecialchars($_POST['email']);
    $userPassword = htmlspecialchars($_POST['password']);
    $userPassword2 = htmlspecialchars($_POST['password2']);

    if(strlen($userName)<1) {
        header('location: index.php?page=register&error=true&messageName=true');
        exit();
    }

    //VERIFICATION SI LE PSEUDO EXISTE DEJA DANS LA BASE DE DONNEES

    $req = $db->prepare('SELECT COUNT(*) AS x FROM users WHERE username = ?');
    $req->execute(array($userName));

    while ($result = $req->fetch()) {

        if ($result['x'] != 0) {
            header('location: index.php?page=register&error=true&usedName=true&name='.$userName);
            exit();
        }
    }

    if(strlen($userMail)<1) {
        header('location: index.php?page=register&error=true&messageEmail=true&name='.$userName);
        exit();
    }

    //VERIFICATION SI L'EMAIL EXISTE DEJA DANS LA BASE DE DONNEES

    $req = $db->prepare('SELECT COUNT(*) AS x FROM users WHERE email = ?');
    $req->execute(array($userMail));

    while ($result = $req->fetch()) {

        if ($result['x'] != 0) {
            header('location: index.php?page=register&error=true&usedEmail=true&name='.$userName.'&mail='.$userMail);
            exit();
        }
    }    

    if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        header('location: index.php?page=register&error=true&messageInvalidEmail=true&name='.$userName.'&mail='.$userMail);
        exit();
    }

    if(strlen($userPassword)<1) {
        header('location: index.php?page=register&error=true&messagePassword=true&name='.$userName.'&mail='.$userMail);
        exit();
    }
    
    // if(preg_match($PASSWORD_REGEX, $userPassword)==0) {
    //     header('location: ../index.php?page=register&error=true&messageInvalidPassword=true&name='.$userName.'&mail='.$userMail);
    //     exit();
    // }

    if(strlen($userPassword2)<1) {
        header('location: index.php?page=register&error=true&messagePassword2=true&name='.$userName.'&mail='.$userMail);
        exit();
    }

    if($userPassword != $userPassword2) {
        header('location: index.php?page=register&error=true&messageNotEqualsPassword=true&name='.$userName.'&mail='.$userMail);
        exit();
    }  
        
    //SI OK, CHIFFRAGE DU MOT DE PASSE

    require("models/Security.php");
    $password = Security::encryptPassword($userPassword);

    // SI OK, CREATION DU SECRET (correspond à l'id du cookie)

    $secret = Security::createSecret($userMail);

    require("models/User.php");
    $user = new User($userName,$userMail,$password,$secret);
    $user->recordUser();

    header('location: index.php?page=register&messageSuccess=true');    
}

require('views/registerView.php');