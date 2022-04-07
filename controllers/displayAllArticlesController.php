<?php

require('controllers/connect.php');
require('models/Article.php');

$articleArray = Article::getArticles("");


require('views/displayAllArticlesView.php');