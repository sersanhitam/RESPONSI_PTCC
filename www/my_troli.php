<?php
include 'koneksi/koneksi.php'; 
$brg = new Barang();

if (isset($_GET['aksi']) && $_GET['aksi'] == 'pesan') {
	$trans = new Transaksi();
	$trans->tambah($_SESSION['id_cust'], $_SESSION['nomer_meja'], $_SESSION['cart']);
	$_SESSION['cart'] = [];
	alert('Pesanan berhasil dibuat');
	redirect('popup.php');
	exit();
}

if (isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {
	foreach ($_POST['idb'] as $idbarang) {
		unset($_SESSION['cart'][$idbarang]);
	}
	redirect('my_troli.php');
	exit();
}

$total = 0;

?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="hhr.css">
	<title>HHR Coffee</title>
	<style>
	button.btn-cart {
		background: transparent;
		border: 0;
		cursor: pointer;
		padding: 0;
		margin: 10px 0 0;
		opacity: .8;
	}
	button.btn-cart:hover {
		opacity: 1;
	}
	button.btn-cart > img {
		padding-top: 0;
	}
</style>
</head>
<body>
	<div id="sidebar1">
		<img src="Logo.png" alt="" class="Logo">
		<h1 class="Judul1"><span class="subjudul1">My</span> Troli</h1>
		<h3 class="textkosong">asdfghj</h3>
		<!-- <h1 class="Judul2">Apaan tuh? Masook?</h1> -->
		<hr class="garis">
<!-- 		<p class="Deskripsi1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Modi molestias nesciunt temporibus ex repellendus est fugit! Dolore dicta accusamus
			sequi id doloremque cupiditate a? Ea sed at nisi nesciunt eveniet. Lorem ipsum dolor
			sit amet, consectetur adipisicing elit. Modi molestias nesciunt temporibus ex repellendus
		est fugit! Dolore dicta accusamus sequi id doloremque cupiditata?</p> -->
		<!-- <a href="View More" class="button1">View More</a> -->
	</div>
	<div id="konten_putih">
		<div class="blok_merah">
			<div class="navbar">
				<a href="index.php">Home</a>
				<a href="menu.php" >Menu</a>
				<a href="about.php">About</a>
				<a href="blog.php">Blog</a>	
			</div>
			<div>
				<form action="" method="post">
					<table cellspacing="0"	class="table_all">
						<tr>
							<th class="tab0"></th>
							<th class="tab1">Pesanan</th>
							<th class="tab2">Harga</th>
							<th class="tab3">Qty</th>
							<th class="tab4">Total</th>
						</tr>
						<?php foreach ($_SESSION['cart'] as $idbarang => $qty): ?>
							<?php
							$data = $brg->ambil($idbarang);
							$total += $data->harga * $qty;
							?>
							<tr>
								<td class="td0"><input type="checkbox" name="idb[]" value="<?php echo $idbarang ?>" class="checkbox"><br></td>
								<td class="td1"><?php echo $data->nm_barang ?></td>
								<td class="td2">Rp <?php echo rupiah($data->harga) ?></td>
								<td class="td3"><input type="number" brg-id="<?php echo $idbarang ?>" name="quantity" min="1" max="20" value="<?php echo $qty ?>" class="qty_troli"></td>
								<td class="td4">Rp <?php echo rupiah($data->harga * $qty) ?></td>
							</tr>
						<?php endforeach ?>
					</table>
					<div>
						<table cellspacing="0"	class="table_all">
							<tr>
								<th class="tbot0"></th>
								<th class="tbot1">
									<button class="btn-cart btn-delete" type="submit" name="aksi" value="hapus"><img src="icon_delete.png" alt="" class="icon_delete"></button>
								</th>
								<th class="tbot2"></th>
								<th class="tbot3">Total Bayar</th>
								<th class="tbot4">Rp <?php echo rupiah($total) ?></th>
							</tr>
						</table>
						<div>
							<table cellspacing="0"	class="table_all">
								<tr>
									<th class="tbaw0"></th>
									<th class="tbaw1"></th>
									<th class="tbaw2"></th>
									<th class="tbaw3"></th>
									<th class="tbaw4"><a href="my_troli.php?aksi=pesan" class="tbaw4">Bayar</a></th>
								</tr>
							</table>
						</div>

						<a href="form_pesan.php" class="button2"><img src="Troli.png" alt=""></a>
						<!-- <img src="Coffee.png" alt="" class="coffee"> -->
						<!-- <img src="image_about.png" alt="" class="image_about"> -->
					</div>
				</form>
				<div id="footer">
					<p class="textfooter">Copyright 2018 © HHRCoffee - All rights reserved.</p>
					<div class="icon">
						<a href="ig"><img src="igicon.png" alt=""></a>
						<a href="tw"><img src="twittericon.png" alt=""></a>
						<a href="fb"><img src="fbicon.png" alt=""></a>
						<a href="in"><img src="linkedinicon.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.qty_troli').change(function(e) {
				var id = $(this).attr('brg-id');
				var value = $(this).val();
				if (value) {
					if (parseInt(value) >= 0) {
						$.ajax({
							url: 'ajax_cart.php',
							type: 'post',
							data: {
								id: id,
								qty: value
							},
						}).done(function(res) {
							location.reload();
						});
					}
				}
			});

		});
	</script>
</body>
</html>