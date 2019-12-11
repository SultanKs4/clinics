<?php

function ListPoli(int $idPuskesmas)
{
    include 'connection.php';

    $query = "SELECT p.id, p.nama FROM dataPoli AS p JOIN detailPuskesmas AS dPus ON p.id = dPus.idPoli 
JOIN dataPuskesmas AS dataPus ON dataPus.idPuskesmas = dPus.idPuskesmas WHERE dataPus.idPuskesmas = '$idPuskesmas'";
    return $connect->query($query);
}