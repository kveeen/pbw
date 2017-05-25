<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
 class Home extends CI_Controller
 {
 	
 	public function index(){
 		$this->load->view('view_home');
 	}
 	/*public function __construct(){
 		parent::__construct();
 		$this->load->model('produk_model');
 	}

 	public function index(){
 		$data=array('title'=> 'Selamat Datang di Kinari',
 			'produk' => $this->produk_model->daftar_produk(),
 			'isi' => 'home/index_home'
 			);
 		$this->load->view('layout/wrapper',$data);
 	}

 	public function read($read) {
 		$data['produk'] = $this->produk_model->daftar_produk();
 		$data['detail'] = $this->produk_model->daftar_produk($read);
 		$data=array('title'=>$data['detail']['judul'],
 			'produk'=> $this->produk_model->daftar_produk(),
 			'detail'=> $this->produk_model->daftar_produk($read),
 			'isi'=>'home/read/view'
 			);
 		$this->load->view('layout/wrapper',$data);
 	}*/
 } 