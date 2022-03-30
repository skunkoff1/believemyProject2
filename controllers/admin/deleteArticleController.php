<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');

$mode = "";
if(isset($_GET['mode']) && $_GET['mode'] == "confirmDelete") {
    $article = Article::getArticleById($_GET['id']);
    $mode = "confirmDelete";
} else if(isset($_GET['mode']) && $_GET['mode'] == 'delete') {
    $id = $_GET['id'];
    $article = new Article();
    $article->removeArticle($id);
    header("location: index.php?page=adminDeleteArticle");       
}else {
    $articleArray = Article::getArticlesByUser($_SESSION['pseudo']);
}



require('views/admin/deleteArticleView.php');