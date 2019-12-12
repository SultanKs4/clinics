<?php

function DataPasienByID(int $idPasien)
{
    include 'connection.php';
    $query = "SELECT nik, nama, bpjs, tanggalLahir, jenisKelamin.jenisKelamin, no_hp, alamat, statusAkun.status FROM `dataPasien` JOIN jenisKelamin ON dataPasien.jenisKelamin = jenisKelamin.id JOIN statusAkun ON dataPasien.statusPasien = statusAkun.id WHERE dataPasien.id = '$idPasien'";
    $result = $connect->query($query);
    return $result->fetch_assoc();
}

function DataPasien()
{
    include 'connection.php';
    $query = "SELECT dataPasien.id , nik, nama, bpjs, tanggalLahir, jenisKelamin.jenisKelamin, no_hp, alamat, statusAkun.status FROM `dataPasien` JOIN jenisKelamin ON dataPasien.jenisKelamin = jenisKelamin.id JOIN statusAkun ON dataPasien.statusPasien = statusAkun.id";
    return $connect->query($query);
}

function DeletePasien($id)
{
    include 'connection.php';
    $query = "DELETE FROM 'dataAntrian' WHERE nik = '$id'";

    if ($connect->query($query) == TRUE || $connect->query($query) == FALSE) {
        $del = "DELETE FROM dataPasien WHERE id = '$id'";
        if ($connect->query($del) == TRUE) {
            $connect->close();
            header("Location:../admin_dashboard.php");
        } else {
            $message = "gagal input data " . mysqli_error($connect);
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo $message;
        }
    }
}

if (isset($_GET['idDel'])) {
    $id = $_GET['idDel'];
    DeletePasien($id);
}