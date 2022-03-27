<?php 

  function home() {
      require('controllers/indexController.php');
  }

  function adminArticle() {
    require('controllers/admin/adminArticleController.php');
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
    require('controllers/admin/adminHomeController.php');
  }

  function displayArticle() {
    require('controllers/displayArticleController.php');
  }

  function error() {
    require('controllers/errorController.php');
  }
