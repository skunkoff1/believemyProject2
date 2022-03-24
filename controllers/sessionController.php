<?php

//DEMARRAGE DE LA SESSION

session_start();

if(!isset($_SESSION['connect'])) {
    header('location: ../index.php');
}