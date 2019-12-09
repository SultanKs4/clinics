<?php
session_start();

function CheckQueue($idPuskesmas, $idPoli, $date)
{
    include 'connection.php';
    $query = "SELECT antrian FROM `dataAntrian` WHERE puskesmas = '$idPuskesmas' AND poli = '$idPoli' AND tanggal = '$date' ORDER BY antrian DESC";

    if ($result->num_rows == 0) {
        $queue = StringQueue($idPoli);
    } else {
        $row = $result->fetch_assoc();
        $num = intval(substr($row['antrian'], -3));
        $num += 1;
        $num = "-" + $num;
        $queue = StringQueue($idPoli, $num);
    }
    InsertQueue($connect, $queue, $idPuskesmas, $idPoli, $date);
}

function StringQueue($idPoli, $num = null)
{
    $poliString = PoliQueueString($idPoli);
    if ($num == null) {
        $queue = $poliString + "-001";
    } else {
        $queue = $poliString + $num;
    }
    return $queue;
}

function PoliQueueString($idPoli)
{
    switch ($idPoli) {
        case '1':
            return "UM";
            break;
        case '2':
            return "GG";
            break;
        case '3':
            return "GZ";
            break;
        case '4':
            return "KI";
            break;
        default:
            echo "not definde";
            break;
    }
}

function InsertQueue($connect, $queue, $idPuskesmas, $idPoli, $date)
{
    $idNik = $_SESSION['idLogin'];
    $query = "INSERT INTO dataAntrian (`nik`, `puskesmas`, `poli`, `tanggal`, `antrian`) VALUES  ('$idNik', '$idPuskesmas', '$idPoli', '$date', '$queue')" or die("Tidak dapat input data");

    if ($connect->query($query) == TRUE) {
        $connect->close();
        header("Location:../index.php");
    } else {
        $connect->close();
        echo "gagal pesan";
    }
}