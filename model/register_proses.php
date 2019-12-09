<?php
session_start();

function InsertPasienQuery($nik, $bpjs, $nama, $tanggal, $jenisKelamin, $noHp, $alamat, $password)
{
    include 'connection.php';
    $query = "INSERT INTO `dataPasien` (`nik`, `bpjs`, `nama`, `tanggalLahir`, `jenisKelamin`, `no_hp`, `alamat`, `statusPasien`, `password`) 
    VALUES ('$nik', '$bpjs', '$nama', '$tanggal', '$jenisKelamin', '$noHp', '$alamat', '1', '$password')" or die("Tidak dapat input data");

    if ($connect->query($query) == TRUE) {
        header("Location:../login.php");
    } else {
        echo "gagal input data";
    }
}

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $bpjs = $_POST['bpjs'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']);
    InsertPasienQuery($nik, $bpjs, $nama, $tanggal, $jenisKelamin, $noHp, $alamat, $password);
} else {
    echo '<script>window.history.back()</script>';
}