<?php
$hostname= "localhost";
$database= "bdmisitio";
$userbd= "root";
$pass= ""; 

$mysqli = new mysqli($hostname, $userbd, $pass, $database);

if ($mysqli->connect_errno) {
    $error_connect = "Falló la conexión";
} else {
    $error_connect = false;
}
