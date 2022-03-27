<?php

require('controllers/connect.php');
require("controllers/sessionController.php");
require('models/Article.php');

$articleArray = Article::getArticles();


require('views/admin/adminHomeView.php');