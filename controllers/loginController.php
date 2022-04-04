<?php 

$userName;
$userMail;
$secret;
$password;

//DEMARRAGE DE LA SESSION
require('controllers/connect.php');
require("models/User.php");

session_start();



if( isset($_POST['email']) && isset($_POST['password'])) {
    $userMail = htmlspecialchars($_POST['email']);
    $userPassword = htmlspecialchars($_POST['password']);
    
    if(strlen($userMail)<1) {
        header('location: index.php?page=login&error=true&messageEmail=true');
        exit();
    }

    if(strlen($userPassword)<1) {
        header('location: index.php?page=login&error=true&messagePassword=true');
        exit();
    }
     // VERIFICATION SI USER EXISTE DANS BDD

     $req = $db->prepare('SELECT COUNT(*) AS x FROM users WHERE email = ? OR username = ?');
     $req->execute(array($userMail, $userMail));
 

     while ($user = $req->fetch()) {
 
         if ($user['x'] != 1) {
             header('location: index.php?page=login&error=true&messageUser=true');
             exit();
         }
     }

      //VERIFICATION CORRESPONDANCE MDP ET EMAIL USER

    $donnees = $db->prepare('SELECT email, username, secret, password FROM users WHERE email = ? OR username = ?');
    $donnees->execute(array($userMail, $userMail));

    while ($user = $donnees->fetch()) {

        require("models/Security.php"); 

        if (password_verify($userPassword,$user['password'])) {

            $user = new User($user['username'], $user['email'], $user['password'], $secret['secret']);

            $user->createSession();

            // if (isset($_POST['auto'])) {

            //     setcookie('auth', $user['secret'], time() + 364 * 24 * 3600, "/", null, false, true);
            // }

            header('location: index.php?page=adminHome');
            exit();
        } else {
            header('location: index.php?page=login&error=true&messagePassword2=true');
            exit();
        }
    }     
}

require('views/loginView.php');