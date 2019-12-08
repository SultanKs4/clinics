<?php
$host = "localhost";
$username = "clinics";
$password = "";
$database = "clinics";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    echo "Connection failure : " . mysqli_connect_error();
}