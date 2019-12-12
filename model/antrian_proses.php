<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL);
ini_set('display_errors', 'on');


function query($idPuskesmas, $idPoli, $date)
{
    include 'connection.php';
    $query = "SELECT antrian FROM `dataAntrian` WHERE puskesmas = '$idPuskesmas' AND poli = '$idPoli' AND tanggal = '$date' ORDER BY antrian DESC LIMIT 1";

    $result = $connect->query($query);
    $connect->close();
    return $result;
}

function CheckQueue($idPuskesmas, $idPoli, $date)
{
    $result = query($idPuskesmas, $idPoli, $date);
    if ($result->num_rows == 0) {
        $queue = StringQueue($idPoli);
    } else {
        $row = $result->fetch_assoc();
        $num = intval(substr($row['antrian'], -3));
        echo $num;
        $num += 1;
        if ($num <= 9) {
            $num = "-00" . $num;
        } elseif ($num <= 99) {
            $num = "-0" . $num;
        } else {
            $num = "-" . $num;
        }
        $queue = StringQueue($idPoli, $num);
    }
    InsertQueue($queue, $idPuskesmas, $idPoli, $date);
}

function StringQueue($idPoli, $num = null)
{
    $poliString = PoliQueueString($idPoli);
    if ($num == null) {
        $queue = $poliString . "-001";
    } else {
        $queue = $poliString . $num;
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

function InsertQueue($queue, $idPuskesmas, $idPoli, $date)
{
    include 'connection.php';
    $idNik = $_SESSION['idLoginPasien'];
    $query = "INSERT INTO dataAntrian (nik, puskesmas, poli, tanggal, antrian) VALUES  ('$idNik', '$idPuskesmas', '$idPoli', '$date', '$queue')" or die("Tidak dapat input data");

    if ($connect->query($query) == TRUE) {
        $connect->close();
        header("Location:../struk.php");
    } else {
        $connect->close();
        echo "gagal pesan";
    }
}

function Struk()
{
    include 'connection.php';
    $idNik = $_SESSION['idLoginPasien'];
    $date = date("Y-m-d");
    $query = "SELECT dataAntrian.tanggal, dataPuskesmas.nama AS namaPus, dataPasien.nama AS namaPas, dataPoli.nama AS namaPol, dataAntrian.antrian FROM `dataAntrian` JOIN dataPuskesmas ON dataPuskesmas.idPuskesmas = dataAntrian.puskesmas JOIN dataPasien ON dataPasien.id = dataAntrian.nik JOIN dataPoli ON dataPoli.id = dataAntrian.poli WHERE tanggal = '$date' AND dataAntrian.nik = $idNik ORDER BY antrian DESC LIMIT 1";

    return $connect->query($query);
}

if (isset($_SESSION['idLoginAdmin'])) {
    $message = "Pasien aja";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<center> akan redirect dalam beberapa detik <br></center>";
    header("refresh:1; url=index.php");
}

if (isset($_GET['idpu']) || isset($_GET['idpo']) || isset($_GET['date'])) {
    $idPuskesmas = $_GET['idpu'];
    $idPoli = $_GET['idpo'];
    $date = $_GET['date'];
    CheckQueue($idPuskesmas, $idPoli, $date);
}