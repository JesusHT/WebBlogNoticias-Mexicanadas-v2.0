<?php

$server = 'localhost';
$username = 'root';
$password = '!JesusHT12015';
$database = 'mexicanadas';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Conexión fallida: ' . $e->getMessage());
}

?>