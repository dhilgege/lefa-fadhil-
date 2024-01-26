<?php
$koneksi = mysqli_connect("localhost", "root",  "",  "lefa");
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($rows = mysqli_fetch_array($result)){
        $rows [] = $rows;
    }
    return $rows;
}