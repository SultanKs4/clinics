<?php
$host = "localhost";
// $username = "clinics"; // Sultan
$username = "root";
$password = "";
$database = "clinics";

$connect = mysqli_connect($host, $username, $password, $database) or die("Connection failure : " . mysqli_connect_error());