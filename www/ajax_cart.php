<?php 
include 'koneksi/koneksi.php'; 

if (isset($_POST['id']) && isset($_POST['qty'])) {
	$id = $_POST['id'];
	$qty = $_POST['qty'];
	$_SESSION['cart'][$id] = $qty;
}