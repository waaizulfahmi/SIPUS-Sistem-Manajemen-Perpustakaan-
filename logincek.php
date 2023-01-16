<?php
session_start();
include 'db_connection.php';
$_SESSION['sesi'] = null;

if (@$_POST['submit']) {
    include 'db_connection.php';

    $username = (@$_POST['username']) ? : '';
    $password = (@$_POST['password']) ? : '';
    
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$username' AND password='$password'");
    $cek = mysqli_fetch_array($query);

    if ($cek['idadmin']) {

        $_SESSION['idadmin'] = $cek['idadmin'];
        $_SESSION['sesi'] = $cek['nama_admin'];

        echo "<script type='text/javascript'>alert('Anda berhasil log In')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script type='text/javascript'>alert('Anda berhasil log In')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}else{
    include 'login.php';
}