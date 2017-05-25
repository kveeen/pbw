<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Menu extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/produk_model');
	}

	public function index(){
		$query = $this->produk_model->getDetail($_GET['id']);
		$data=array('data' => $query);
		// var_dump($query);
		$this->load->view('detail_menu',$data);
	}
}