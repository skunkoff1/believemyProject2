<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Article.php');
require('models/Project.php');

$articleArray = Article::getArticles("home");
$projectArray = Project::getProjects("home");


require('views/indexView.php');