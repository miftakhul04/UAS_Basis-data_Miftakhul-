<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "miftakhul_nur_awalin_311910579";

    $conn = mysqli_connect($host,$user,$pass,$db);
    if ($conn == false) {
        echo "connetion failed.";
        die();
    } else #echo "koneksi berhasi
?>