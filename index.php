<?php

  require('router/router.php');

  try {
    if(isset($_GET['page'])) {

        if($_GET['page'] == 'accueil') {
            home();
        }
        else if($_GET['page'] == 'adminArticle') {
           adminArticle();
        }
        else if($_GET['page'] == 'adminHome') {
          adminHome();
       }
        else if($_GET['page'] == 'login') {
          login();
        }
        else if($_GET['page'] == 'register') {
          register();
        }
        else if($_GET['page'] == 'logout') {
          logout();
        }
        else {
            throw new Exception("Cette page n'existe pas ou a été supprimée.");
        }

    }
    else {
        home();
    }
}
catch(Exception $e) {
    $error = $e->getMessage();
    require('views/errorView.php');
}