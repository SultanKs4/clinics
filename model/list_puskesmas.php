<?php
include 'connection.php';

$query = "SELECT nama, alamat, telp FROM `dataPuskesmas` ORDER BY nama";
$result = $connect->query($query);