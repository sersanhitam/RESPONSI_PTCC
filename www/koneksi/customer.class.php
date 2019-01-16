<?php 
class Customer extends Database {

	function tambah($nama){
		$this->con->query("
			INSERT INTO cust(nm_cust)
			VALUES('{$nama}')
		");
		return $this->con->insert_id;
	}

	function ambil($cust_id){
		$q = $this->con->query("
			SELECT * FROM cust WHERE id_cust = '{$cust_id}'");
		if ($q->num_rows > 0) {
			return $q->fetch_object();
		} else {
			return FALSE;
		}
	}

}