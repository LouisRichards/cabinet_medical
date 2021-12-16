<?php
$server = "localhost";
$login = "root";
$mdp = "";
$db = "cabinet";

$link = mysqli_connect($server, $login, $mdp, $db) or die("Error " . mysqli_error($link));

if ($link->connect_errno) {
    echo "Failed to connect to MySQL: " . $link->connect_error;
    exit();
}
