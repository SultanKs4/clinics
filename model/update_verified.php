<?php
function UpdateVerified($idPasien)
{
    include 'connection.php';

    $query = "UPDATE `dataPasien` SET `statusPasien` = '2' WHERE `dataPasien`.`id` = $idPasien" or die("Gagal update");

    if ($connect->query($query) == TRUE) {
        $connect->close();
        header("Location:../admin_dashboard.php");
    } else {
        $connect->close();
        echo "gagal pesan";
    }
}

if (isset($_GET['idUpd'])) {
    $id = $_GET['idUpd'];
    UpdateVerified($id);
}