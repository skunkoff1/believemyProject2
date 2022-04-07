<?php

require('controllers/connect.php');
require('models/Project.php');

$projectArray = Project::getProjects("");


require('views/displayAllProjectsView.php');