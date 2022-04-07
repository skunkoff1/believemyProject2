<?php

require("controllers/sessionController.php");
require('controllers/connect.php');
require('models/Project.php');

$mode = "";
if (isset($_GET['mode']) && $_GET['mode'] == "confirmDelete") {
    $project = Project::getProjectById($_GET['id']);
    $mode = "confirmDelete";
} else if (isset($_GET['mode']) && $_GET['mode'] == 'delete') {
    $id = $_GET['id'];
    $project = new Project();
    $project->removeProject($id);
    header("location: index.php?page=adminDeleteProject");
} else {
    $projectArray = Project::getProjectsByUser($_SESSION['pseudo']);
}



require('views/admin/deleteProjectView.php');