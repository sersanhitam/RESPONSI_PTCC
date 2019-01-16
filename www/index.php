<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="hhr.css">
	<title>HHR Coffee</title>
</head>
<body>
	<div id="sidebar1">
		<img src="Logo.png" alt="" class="Logo">
		<h1 class="Judul1"><span class="subjudul1">Kopi</span> dapat membantu</h1>
		<h1 class="Judul2">Anda membakar lemak?</h1>
		<hr class="garis">
		<p class="Deskripsi1">Apakah Anda tahu bahwa hampir semua supplemen
			pembakar lemak yang dijual secara komersial ternyata mengandung kafein?
			Alasannya adalah karena kafein merupakan salah satu dari sedikit zat
		alami yang terbukti membantu pembakaran lemak.</p>
		<a href="detail_view.php" class="button1">View More</a>
	</div>
	<div id="konten">
		<div class="navbar">
			<a href="index.php" class="border1">Home</a>
			<a href="menu.php">Menu</a>
			<a href="about.php">About</a>
			<a href="blog.php">Blog</a>	
		</div>
		<a href="form_pesan.php" class="button2"><img src="Troli.png" alt=""></a>
		<ul class="slider_home">
			<li>
				<img src="Coffee.png" alt="" class="coffee">
			</li>
			<li>
				<img src="Kentang.png" alt="" class="kentang">
			</li>
		</ul>
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
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.slider_home').slick({
			nextArrow: '<img src="arah_kanan.png" alt="" type="button" class="slick-next"></button>',
			prevArrow: '<img src="arah_kiri.png" alt="" type="button" class="slick-prev"></button>'
		});
	});
</script>
</html>