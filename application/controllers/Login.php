<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends CI_Controller
{
	
	public function index() {

		$valid = $this->form_validation;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $valid->set_rules('username','Username','required');
        $valid->set_rules('password','Password','required');

		if($valid->run()) {
             $this->simple_login->login($username,$password, base_url('admin/dashboard'), base_url('login'));
		}
		$this->load->view('account/v_login');
	}

	public function logout(){
		$this->simple_login->logout();
	}
}