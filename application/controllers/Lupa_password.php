<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Lupa_password extends CI_Controller
{
	
	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Halaman Reset Password';
			$this->load->view('account/v_lupa_password',$data);
		}else{
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean('email');
			$userInfo = $this->m_account->getUserInfoByEmail($clean);

			if (!$userInfo) {
				$this->session->set_flashdata('sukses', 'Email Address Anda Salah, Silahkan coba lagi.');
				redirect(site_url('login'),'refresh');
			}

			$token = $this->m_account->insertToken($userInfo->id_user);
			$qstring = $this->base64url_encode($token);
			$url = site_url(). '/lupa_password/reset_password/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';
			$message = '';
			$message .= '<strong>Hai, Anda menerima email ini karena ada permintaan untuk memperbaharui password Anda.</strong><<br>';
			$message .= '<strong>Silahkan klik link ini:</strong> ' . $link;

			echo $message;
			exit;
		}
	}

	public function reset_password(){
		$token = $this->base64url_decode($this->uri->segment(4));
		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->m_account->isTokenValid($cleanToken);

		if (!$user_info) {
			$this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
			redirect(site_url('login'),'refresh');
		}

		$data = array(
			'title'=> 'Halaman Reset Password',
			'nama'=> $user_info->nama,
			'email'=>$user_info->email,
			'token'=>$this->base64url_encode($token)
			);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('account/v_reset_password', $data);
		}else{
			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);
			$hashed = md5($cleanPost['password']);
			$cleanPost['password'] = $hashed;
			$cleanPost['id_user'] = $user_info->id_user;
			unset($cleanPost['passconf']);
			if (!$this->m_account->updatePassword($cleanPost)) {
				$this->session->set_flashdata('sukses', 'Update password gagal.');
			}else {
				$this->session->set_flashdata('sukses', 'Password Anda sudah diperbaharui. Silahkan login.');
			}
			redirect(site_url('login'),'refresh');
		}
	}					

	public function se64url_encode($data){
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public function base64url_decode($data){
		return base64_decode(str_pad(strtr($data, '-_', '+/'),  strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
}