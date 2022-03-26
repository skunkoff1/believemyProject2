<?php

$host_name = getenv('HOSTNAME');
$database = getenv('DBNAME');
$user_name = getenv('USERNAME');
$password = getenv('PASSWORD');
$dbh = null;

try {
  $db = new PDO("mysql:host=$host_name; dbname=$database; charset=utf8", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}