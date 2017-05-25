<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('admin/produk_model');
	}
	
	public function index(){
		$query = $this->produk_model->getIdea();
		$data=array('title'=>'Halaman Dashboard', 
			'recommendation' => $query, 
			'isi' =>'admin/dashboard/dashboard_view');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function do_insert(){
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$pesan = $_POST['pesan'];

		$data_insert = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'email' => $email,
			'pesan' => $pesan
			);
		$resu = $this->produk_model->InsertIdea('recommendation',$data_insert);
		if ($resu>=1) {
			redirect('home');
		}else {
			echo "<h2>Gagal terkirim</h2>";
		}
	}

	public function delete_ide($no){
		$this->produk_model->DeleteIdea('recommendation', 'no = ' . $no);
		redirect(base_url(). 'admin/dashboard/');
	}
}