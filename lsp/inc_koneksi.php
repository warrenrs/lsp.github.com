<?php
$db_host    = "localhost";
$db_user    = "root";
$db_pass    = "";
$db_name    = "lsp";

$koneksi    = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$koneksi){
    die ("koneksi gagal");
} 
