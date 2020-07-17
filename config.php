<?php
    $host     = "localhost";
    $username = "id14352370_root";
    $password = "Hostinger4U:p";
    $database = "id14352370_uas";
    $conn  = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi Gagal" . mysqli_connect_error());
    } else {
    	
    }
?>
