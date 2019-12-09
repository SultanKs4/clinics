<?php
session_start();

function InsertPasienQuery($nik, $bpjs, $nama, $tanggal, int $jenisKelamin, $noHp, $alamat,  $passwordPasien)
{
    include 'connection.php';
    $query = "INSERT INTO `dataPasien` (`nik`, `bpjs`, `nama`, `tanggalLahir`, `jenisKelamin`, `no_hp`, `alamat`, `statusPasien`, `password`) 
    VALUES ('$nik', '$bpjs', '$nama', '$tanggal', '$jenisKelamin', '$noHp', '$alamat', '1', '$passwordPasien')" or die("Tidak dapat input data");

    if ($connect->query($query) == TRUE) {
        header("Location:../login.php");
    } else {
        echo "gagal input data" . mysqli_error($connect);
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
    $passwordPasien = md5($_POST['password']);
    InsertPasienQuery($nik, $bpjs, $nama, $tanggal, $jenisKelamin, $noHp, $alamat, $passwordPasien);
} else {
    echo '<script>window.history.back()</script>';
}