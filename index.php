<?php

require('router/router.php');


try {
  if (isset($_GET['page'])) {

    if ($_GET['page'] == 'accueil') {
      home();
    } else if ($_GET['page'] == 'adminHome') {
      adminHome();
    } else if ($_GET['page'] == 'adminArticle') {
      adminArticle();
    } else if ($_GET['page'] == 'adminEditArticle') {
      adminEditArticle();
    } else if ($_GET['page'] == 'adminDeleteArticle') {
      adminDeleteArticle();
    } else if ($_GET['page'] == 'adminProject') {
      adminProject();
    } else if ($_GET['page'] == 'adminEditProject') {
      adminEditProject();
    } else if ($_GET['page'] == 'adminDeleteProject') {
      adminDeleteProject();
    } else if ($_GET['page'] == 'login') {
      login();
    } else if ($_GET['page'] == 'register') {
      register();
    } else if ($_GET['page'] == 'logout') {
      logout();
    } else if ($_GET['page'] == 'displayArticle') {
      displayArticle();
    } else if ($_GET['page'] == 'displayProject') {
      displayProject();
    }  else if ($_GET['page'] == 'error') {
      error();
    } else {
      throw new Exception("Cette page n'existe pas ou a été supprimée.");
    }
  } else {
    home();
  }
} catch (Exception $e) {
  $error = $e->getMessage();
  require('views/errorView.php');
}
