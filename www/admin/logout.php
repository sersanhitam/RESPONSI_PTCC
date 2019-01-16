<?php 
include '../koneksi/koneksi.php'; 
unset($_SESSION['admin_login']);
redirect('login.php');
exit();
