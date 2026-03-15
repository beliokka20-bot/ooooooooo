<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "sitecenter";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>