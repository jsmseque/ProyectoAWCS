<?php
$hostname= "localhost";
$database= "bdtienda";
$userbd= "root";
$pass= ""; 

$mysqli = new mysqli($hostname, $userbd, $pass, $database);

if ($mysqli->connect_errno) {
    $error_connect = "Falló la conexión la BD";
} else {
    $error_connect = false;
}
