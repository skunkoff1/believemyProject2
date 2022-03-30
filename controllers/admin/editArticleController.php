<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');

$articleArray = Article::getArticlesByUser($_SESSION['pseudo']);


require('views/admin/editArticleView.php');