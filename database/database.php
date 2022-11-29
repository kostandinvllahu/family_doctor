<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'doctor';

//$connection = mysqli_connect($host, $username, $password, $database);
$connection = new mysqli($host, $username, $password, $database);
?>