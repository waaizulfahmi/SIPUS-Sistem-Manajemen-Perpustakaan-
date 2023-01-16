<?php
session_start();
session_destroy();

echo "<script type='text/javascript'>alert('Anda berhasil log Out')</script>";
echo "<meta http-equiv='refresh' content='0; url=login.php'>";
?>