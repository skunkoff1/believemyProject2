<?php

//DEMARRAGE DE LA SESSION

session_start();

if(!isset($_SESSION['connect']) && $_GET['page'] != "accueil") {
    header('location: index.php?page=accueil');
}