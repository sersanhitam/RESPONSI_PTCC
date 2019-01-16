<?php 
class Barang extends Database {

	function tampil(){
		$q = $this->con->query("SELECT * FROM barang");
		$res = [];
		if ($q->num_rows > 0) {
			while($r = $q->fetch_object()){
				$res[] = $r;
			}
		}
		return $res;
	}

	function tambah($nama, $deskripsi, $foto, $harga){
		if ( ! empty($foto['name'])) {
			$nama_foto = $foto['name'];
			move_uploaded_file($foto['tmp_name'], '../foto/' . $nama_foto);
		} else {
			$nama_foto = '';
		}
		$q = $this->con->query("
			INSERT INTO barang(nm_barang, deskripsi, foto, harga)
			VALUES('{$nama}', '{$deskripsi}', '{$nama_foto}', '{$harga}')
		");
	}

	function ambil($barang_id){
		$q = $this->con->query("
			SELECT * FROM barang WHERE id = '{$barang_id}'");
		if ($q->num_rows > 0) {
			return $q->fetch_object();
		} else {
			return FALSE;
		}
	}

	function ubah($id, $nama, $deskripsi, $foto, $harga){
		$data = (array) $this->ambil($id);
		if ($data !== FALSE) {
			if ( ! empty($foto['name'])) {
				$nama_foto = $foto['name'];
				move_uploaded_file($foto['tmp_name'], '../foto/' . $nama_foto);
				if ( ! empty($data['foto']) && file_exists('../foto/' . $data['foto'])) {
					@unlink('../foto/' . $data['foto']);
				}
			} else {
				$nama_foto = $data['foto'];
			}
			$q = $this->con->query("
				UPDATE barang SET 
				nm_barang = '{$nama}', 
				deskripsi = '{$deskripsi}', 
				foto = '{$nama_foto}', 
				harga = '{$harga}'
				WHERE id = '{$id}'
			");
		}
	}

	function hapus($barang_id){
		$data = $this->ambil($barang_id);
		if ( ! empty($data['foto']) && file_exists('../foto/' . $data['foto'])) {
			unlink('../foto/' . $data['foto']);
		}
		$this->con->query("DELETE FROM barang WHERE id = '{$barang_id}'");
	}
}