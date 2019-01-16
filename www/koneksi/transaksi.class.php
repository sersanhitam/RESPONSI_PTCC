<?php 
class Transaksi extends Database {

	function tampil(){
		$q = $this->con->query("
			SELECT * FROM transaksi
			JOIN cust ON cust_id = id_cust
			ORDER BY sudah_bayar ASC, wkt_pesan DESC
		");
		$res = [];
		if ($q->num_rows > 0) {
			while($r = $q->fetch_object()){
				$res[] = $r;
			}
		}
		return $res;
	}

	function tambah($cust_id, $no_meja, $barang){
		$tgl = date('Y-m-d H:i:s');
		$this->con->query("
			INSERT INTO transaksi(wkt_pesan, cust_id, no_meja, sudah_bayar)
			VALUES('{$tgl}', '{$cust_id}', '{$no_meja}', '0')
		");
		$trans_id = $this->con->insert_id;
		foreach ($barang as $idbarang => $qty) {
			$this->con->query("
				INSERT INTO detail_transaksi(id_transaksi, id_barang, qty)
				VALUES('{$trans_id}', '{$idbarang}', '{$qty}')
			");
		}
	}

	function ambil($id_pesan){
		$q = $this->con->query("
			SELECT * FROM transaksi 
			JOIN cust ON cust_id = id_cust 
			WHERE id_pesan = '{$id_pesan}'");
		if ($q->num_rows > 0) {
			return $q->fetch_object();
		} else {
			return FALSE;
		}
	}

	function ambil_detail($id_pesan){
		$q = $this->con->query("
			SELECT * FROM detail_transaksi
			JOIN barang ON id = id_barang
			WHERE id_transaksi = '{$id_pesan}'
		");
		$res = [];
		if ($q->num_rows > 0) {
			while($r = $q->fetch_object()){
				$res[] = $r;
			}
		}
		return $res;
	}

	function ubah($id, $status){
		$data = (array) $this->ambil($id);
		if ($data !== FALSE) {
			$q = $this->con->query("
				UPDATE transaksi SET 
				sudah_bayar = '{$status}'
				WHERE id_pesan = '{$id}'
			");
		}
	}

	function hapus($id_pesan){
		$this->con->query("DELETE FROM transaksi WHERE id_pesan = '{$id_pesan}'");
		$this->con->query("DELETE FROM detail_transaksi WHERE id_transaksi = '{$id_pesan}'");
	}
}