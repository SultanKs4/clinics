<?php
function ListPuskesmas()
{
    include 'connection.php';

    $query = "SELECT nama, alamat, telp FROM `dataPuskesmas` ORDER BY nama";
    return $result = $connect->query($query);
}