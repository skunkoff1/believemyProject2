<?php 

  function home() {
      require('controllers/indexController.php');
  }

  function adminHome() {
    require('controllers/admin/adminHomeController.php');
  }

  function adminArticle() {
    require('controllers/admin/adminArticleController.php');
  }  
  
  function adminEditArticle() {
    require('controllers/admin/editArticleController.php');
  }

  function adminDeleteArticle() {
    require('controllers/admin/deleteArticleController.php');
  }  

  function adminProject() {
    require('controllers/admin/adminProjectController.php');
  }  
  
  function adminEditProject() {
    require('controllers/admin/editProjectController.php');
  }

  function adminDeleteProject() {
    require('controllers/admin/deleteProjectController.php');
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

  function displayArticle() {
    require('controllers/displayArticleController.php');
  }

  function displayProject() {
    require('controllers/displayProjectController.php');
  }

  function error() {
    require('controllers/errorController.php');
  }

  