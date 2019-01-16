<?php
include 'koneksi/koneksi.php'; 
$brg = new Barang();
?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="hhr.css">
	<title>HHR Coffee</title>
</head>
<body>
	<div id="sidebar1">
		<img src="Logo.png" alt="" class="Logo">
		<h1 class="Judul1"><span class="subjudul1">Our</span> Food</h1>
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
				<a href="menu.php" class="border1">Menu</a>
				<a href="about.php">About</a>
				<a href="blog.php">Blog</a>	
			</div>
		</div>

		<a href="form_pesan.php" class="button2"><img src="Troli.png" alt=""></a>
		<!-- <img src="Coffee.png" alt="" class="coffee"> -->
		<!-- <img src="image_about.png" alt="" class="image_about"> -->
		<div class="slider_menu2">
			<?php foreach ($brg->tampil() as $n => $row): ?>
			<div class="menu_sect1">
				<img src="foto/<?php echo $row->foto ?>" alt="<?php echo $row->nm_barang ?>" class="menu1">
				<div class="text_menu">
					<h2 class="menu_text1">Rp <?php echo rupiah($row->harga) ?></h2>
					<p class="menu_text2"><?php echo $row->nm_barang ?></p>
					<p class="menu_text3">Jumlah</p>
					<input type="number" name="quantity[<?php echo $row->id ?>]" value="<?php echo cart($row->id) ?>" min="0" max="20" class="qty"> 
					<br>
					<button type="button" brg-id="<?php echo $row->id ?>" class="btn-cart"><img src="in_troly.png" alt="cart" class="in_troly"></button>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>			

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

</div>
<div id="footer">
	<p class="textfooter">Copyright 2018 © HHRCoffee - All rights reserved.</p>
	<div class="icon">
		<a href="ig"><img src="igicon.png" alt=""></a>
		<a href="tw"><img src="twittericon.png" alt=""></a>
		<a href="fb"><img src="fbicon.png" alt=""></a>
		<a href="in"><img src="linkedinicon.png" alt=""></a>
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.slider_menu2').slick({
			nextArrow: '<img src="arah_kanan_abu.png" alt="" / class="arrow_menu_kanan">',
			prevArrow: '<img src="arah_kiri_abu.png" alt="" / class="arrow_menu_kiri">',
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		});

		$('.btn-cart').click(function(e) {
			var id = $(this).attr('brg-id');
			var value = $(this).closest('.text_menu').find('.qty').val();
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
						alert('Berhasil Menambahkan ke keranjang')
					});
				} else {
					alert('Jumlah minimal 0')
				}
			} else {
				alert('Jumlah belum diisi')
			}
			
		});
	});
</script>	
</body>
</html>