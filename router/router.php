<?php 

  function home() {
      require('controllers/indexController.php');
  }

  function adminArticle() {
    require('controllers/adminArticleController.php');
  }

  function login() {
    require('controllers/loginController.php');
  }

  function register() {
    require('controllers/registerController.php');
  }

  function logout() {
    require('controllers/logout.php');
  }

  function adminHome() {
    require('controllers/adminHomeController.php');
  }
