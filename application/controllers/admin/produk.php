<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Produk extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/produk_model');
	}

	public function index(){
		$query=$this->produk_model->daftar_produk();
		$data=array('title'=>'Manajemen Produk', 
			'produk' => $query, 
			'isi' =>'admin/produk/produk_view');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function tambah(){
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi produk','required');
		if ($this->form_validation->run() === FALSE) {
			$data=array('title'=>'Menambah Produk', 'isi'=>'admin/produk/tambah_produk');
			$this->load->view('admin/layout/wrapper',$data);
		}else {
			$url_gambar = $this->do_upload();
			$slug = url_title($this->input->post('judul'),'dash', TRUE);
			$data = array(
				'judul'=>$this->input->post('judul'), 
				'slug'=>$slug,  
				'isi'=>$this->input->post('isi'), 
				'id_user'=>$this->input->post('id_user'),
				'gambar' => $url_gambar
				);
			$this->produk_model->tambah($data);
			//echo var_dump($_FILES['gambar']);
			redirect(base_url().'admin/produk/');

		}
	}	

	public function edit($id) {
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi produk','required');
		if ($this->form_validation->run()=== FALSE) {
			$data['produk'] = $this->produk_model->detail_produk();
			$data['detail'] = $this->produk_model->detail_produk($id);
			$data = array(
				'title'=>'Mengubah produk'.$data['detail']['judul'],
				'produk' => $this->produk_model->detail_produk(),
				'detail' => $this->produk_model->detail_produk($id),
				'isi'=>'admin/produk/edit_produk'
				);
			$this->load->view('admin/layout/wrapper',$data);
		}else {
			$slug = url_title($this->input->post('judul'),'dash', TRUE);
			$data = array(
				'id_produk' => $this->input->post('id_produk'),
				'judul' => $this->input->post('judul'),
				'slug'=> $slug,
				'isi' => $this->input->post('isi'),
				'id_user' => $this->input->post('id_user')
				);
			$this->produk_model->edit_produk('produk',$data,'id_produk = ' . $data['id_produk']);
			redirect(base_url().'admin/produk/');
						}
	}

	public function delete($id){
		$this->produk_model->delete_produk('produk','id_produk = ' . $id);
		redirect(base_url().'admin/produk/');
	}

	private function do_upload(){
		$type = explode('.', $_FILES["gambar"]["name"]);

		$type = $type[count($type)-1];
		echo var_dump($_FILES["gambar"]);
		$location = "./uploads/";
		$url = $location.uniqid(rand()).".".$type;
		echo $url;
		if (in_array($type, array("jpg","jpeg","JPG","gif","png")))
			if(is_uploaded_file($_FILES["gambar"]["tmp_name"]))
				if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $url))
					return substr($url,1);
				return "";
	}

}