<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Project.php');

$projectArray = Project::getProjectsByUser($_SESSION['pseudo']);


require('views/admin/editProjectView.php');