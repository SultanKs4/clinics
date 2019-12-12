<?php
function ListPuskesmas()
{
    include 'connection.php';

    $query = "SELECT idPuskesmas, nama, alamat, telp FROM `dataPuskesmas` ORDER BY nama";
    return $connect->query($query);
}
function ListPuskesmasByID($id)
{
    include 'connection.php';

    $query = "SELECT idPuskesmas, nama, alamat, telp FROM `dataPuskesmas` WHERE idPuskesmas = '$id'";
    return $connect->query($query);
}
function AddPuskesmas($nama, $alamat, $telp, $jenis)
{
    include 'connection.php';
    $query = "INSERT INTO dataPuskesmas (nama, alamat, telp, jenis) VALUES ('$nama', '$alamat', '$telp', '$jenis')";

    echo $query;
    if ($connect->query($query) == TRUE) {
        $connect->close();
        header("Location:../admin_dashboard.php");
    } else {
        $message = "gagal input data" . mysqli_error($connect);
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo $message;
    }
}
function DeletePuskesmas($id)
{
    include 'connection.php';
    $query = "DELETE FROM 'dataPuskesmas' WHERE idPuskesmas = '$id'";

    if ($connect->query($query) == TRUE) {
        $connect->close();
        header("Location:../admin_dashboard.php");
    } else {
        $message = "gagal input data" . mysqli_error($connect);
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo $message;
    }
}

if (isset($_POST['submitAdd'])) {
    $nama = $_POST['nama_puskesmas'];
    $alamat = $_POST['alamat_puskesmas'];
    $telp = $_POST['telepon_puskesmas'];
    $jenis = 1;
    if ($_POST['select_puskesmas'] == "Rawat Inap") {
        $jenis = 1;
    } elseif ($_POST['select_puskesmas'] == "Non Rawat Inap") {
        $jenis = 2;
    }
    AddPuskesmas($nama, $alamat, $telp, $jenis);
}