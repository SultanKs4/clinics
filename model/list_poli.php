<?php

function ListPoli(int $idPuskesmas)
{
    include 'connection.php';

    $query = "SELECT dataPus.nama, p.nama FROM dataPoli AS p JOIN detailPuskesmas AS dPus ON p.id = dPus.idPoli 
JOIN dataPuskesmas AS dataPus ON dataPus.idPuskesmas = dPus.idPuskesmas WHERE dataPus.nama = '$idPuskesmas'";
    return $connect->query($query);
}