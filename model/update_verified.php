<?php
include 'connection.php';

$query = "UPDATE `dataPasien` SET `statusPasien` = '1' WHERE `dataPasien`.`id` = $idPasien" or die("Gagal update");

if ($connect->query($query) == TRUE) {
    $connect->close();
    header("Location:../dashboard_admin.php");
} else {
    $connect->close();
    echo "gagal pesan";
}