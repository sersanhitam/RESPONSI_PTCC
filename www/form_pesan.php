<?php
include 'koneksi/koneksi.php'; 
if ( ! empty(ses('nama_cust'))) {
   redirect('my_troli.php');
   exit();
}

if (isset($_POST['aksi']) && $_POST['aksi']=='tambah') {
	$cust = new Customer();
	$cust_id = $cust->tambah($_POST['nama']);
	$_SESSION['id_cust'] = $cust_id;
	$_SESSION['nama_cust'] = $_POST['nama'];
	$_SESSION['nomer_meja'] = $_POST['nomer_meja'];
	redirect('my_troli.php');
	exit();
}

?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="hhr.css">
	<title>HHR Coffee</title>
</head>
<body>
	<div><img src="background_form.png" alt="" class="bck_form">
		<div class="form_pesan">
				<h2 class="form_text1"><img src="Logo.png" alt="" class="logo_form"></h2>

				<form class="form_text1" method="post" action="">
					<p>Silahkan isi formulir berikut</p>
					<br>
					Nama:<br>
					<input type="text" name="nama" class="input1" required="required">
					<br>
					<br>					
					Meja:<br>
					<input type="text" name="nomer_meja" class="input1" required="required">
					<br>
					<br>
					<input type="hidden" name="aksi" value="tambah">
					<input type="submit" value="Submit" class="submit1"> 
				</form>
				<br>

				<p class="form_text1">Harap isi semua formulir</p>
		</div>
	</div>
	
</body>
</html>