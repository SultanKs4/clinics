<?php

function DataAdmin(int $idAdmin)
{
    include 'connection.php';
    $query = "SELECT nip, nama FROM dataAdmin WHERE id = '$idAdmin'";
    $result = $connect->query($query);
    return $result->fetch_assoc();
}