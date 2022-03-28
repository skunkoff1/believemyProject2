<?php 

// require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');

if(isset($_GET['id'])) {
  $article = Article::getArticleById($_GET['id']);
}
else {
  header('location: index.php?page=error&message=probleme');
}

require('views/displayArticleView.php');


