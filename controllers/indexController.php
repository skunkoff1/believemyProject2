<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');

$articleArray = Article::getArticles("home");


require('views/indexView.php');