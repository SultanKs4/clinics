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
    $query = "SELECT nik, nama, bpjs, tanggalLahir, jenisKelamin.jenisKelamin, no_hp, alamat, statusAkun.status FROM `dataPasien` JOIN jenisKelamin ON dataPasien.jenisKelamin = jenisKelamin.id JOIN statusAkun ON dataPasien.statusPasien = statusAkun.id";
    return $connect->query($query);
}