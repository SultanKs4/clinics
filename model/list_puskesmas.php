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