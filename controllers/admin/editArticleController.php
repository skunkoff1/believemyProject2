<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');

$articleArray = Article::getArticles("");


require('views/admin/editArticleView.php');