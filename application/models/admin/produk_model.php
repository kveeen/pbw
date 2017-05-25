<?php

/**
* 
*/
class Produk_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function daftar_produk($where=""){
		$data = $this->db->query('select * from produk '.$where);
		return $data->result_array();
		// $query=$this->db->query('SELECT produk.judul, produk.slug, produk.isi, produk.status_produk, produk.id_user, produk.tanggal, produk.gambar, users.nama FROM produk, users WHERE produk.id_user = users.id_user ORDER BY id_produk DESC');
		// return $query->result_array();
	}

	public function tambah($data) {
		$res = $this->db->insert('produk',$data);
		return $res;
	}

	public function detail_produk($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get('produk');
			return $query->result_array();
		}
		$query = $this->db->get_where('produk',array('id_produk'=>$id));
		return $query->row_array();
	}

	public function edit_produk($tableName,$data,$where) {
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function delete_produk($tableName,$where) {
		$res = $this->db->delete($tableName,$where);
		return $res;
	}

	public function getIdea($where=""){
		$ide = $this->db->query('select * from recommendation', $where);
		return $ide->result_array();
	}

	public function InsertIdea($tableName,$data){
		$resu = $this->db->insert($tableName,$data);
		return $resu;
	}

	public function DeleteIdea($tableName,$where){
		$resu = $this->db->delete($tableName,$where);
		return $resu;
	}

	public function getDetail($where){
		$result = $this->db->query('SELECT * FROM produk WHERE id_produk=' . $where);
		return $result->result_array(); 
	}

}	