<?php

session_start(); //INITIALISE LA SESSION
session_unset(); // DESACTIVE LA SESSION
session_destroy(); //DETRUIT LA SESSION

header('location: index.php?page=accueil');