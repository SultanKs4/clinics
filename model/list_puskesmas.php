<?php
function ListPuskesmas()
{
    include 'connection.php';

    $query = "SELECT nama, alamat, telp FROM `dataPuskesmas` ORDER BY nama";
    return $connect->query($query);
}