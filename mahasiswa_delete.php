<?php
    include "connection.php";
    $id = $_GET['npm'];
    $ambildata = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$id'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>