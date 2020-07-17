<?php
    include "config.php";

    if(isset($_SESSION['id_user'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    	header('Location: ./');
    	die();
    } else {
        $id = $_GET['id'];
        // query SQL untuk hapus data
        $query="DELETE FROM covid19 WHERE id=$id";
        if(mysqli_query($conn, $query)) {
            // mengalihkan ke halaman index.php
            header("location: index.php");
        } else {
            
        }
    }
?>
