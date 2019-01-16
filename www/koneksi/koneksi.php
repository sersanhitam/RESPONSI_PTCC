<?php 
session_start();

class Database {
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbname = "hrr";

	public $con;

	function __construct() {
		$this->con = new Mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if ($this->con->errno > 0) {
			die('Gagal menghubungkan ke database');
		}
	}
}

function alert($pesan) {
	echo "<script>alert('{$pesan}');</script>";
}

function redirect($url) {
	echo "<script>window.location='{$url}';</script>";
}

function rupiah($num) {
	return number_format($num, 0, ',', '.');
}

function tanggal($format, $tanggal){
	return date($format, strtotime($tanggal));
}

function ses($key){
	return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
}

function cart($key){
	return isset($_SESSION['cart'][$key]) ? $_SESSION['cart'][$key] : NULL;
}

if ( ! isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}

include_once 'barang.class.php';
include_once 'customer.class.php';
include_once 'transaksi.class.php';
