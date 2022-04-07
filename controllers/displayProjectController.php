<?php

// require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Project.php');

if (isset($_GET['id'])) {
    $project = Project::getProjectById($_GET['id']);
} else {
    header('location: index.php?page=error&message=probleme');
}

require('views/displayProjectView.php');