<?php

/**
* 
*/
class Upload extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
        $this->load->model('produk_model');
	}

	public function index(){
		$this->load->view('myupload_view');
	}

    public function do_insert(){
                $judul = $_POST['judul'];
                $isi = $_POST['isi'];
                $status_produk = $_POST['status_produk'];
                $tanggal = $_POST['tanggal'];
        $target_dir = "/uploads/";
                /*$target_file = $_FILES['userfile']['name'];*/
                $uploadOk = 1;
                $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                /*$asal = $_FILES['userfile']['tmp_name'];*/
                if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
    }    else {
        echo "Sorry, there was an error uploading your file.";
    }
                $image=basename( $_FILES["userfile"]["name"],".jpg");


                $data_insert = array(
                        'judul' => $judul,
                        "isi" => $isi,
                        "status produk" => $status_produk,
                        "tanggal" => $tanggal,
                        "gambar" => $image,
                        );
                $res = $this->produk_model->tambah('produk',$data_insert);
                if($res>=1){
                        redirect('admin/produk');
                }
                else{
                        echo "<h2> UPLOAD GAGAL </h2>";
                }
        }
	/*public function yuk_upload(){
		$config['upload_path']		='./uploads/';
		$config['allowed_types']	='gif|jpg|png';
		$config['max_size']			= 100;
		$config['max_width']		= 1024;
		$config['max_height']		= 768;

		$this->upload->initialize($config);

		if (! $this->upload->yuk_upload('image')) {
			$data['message'] = $this->upload->display_errors();
			$this->load->view('notification_view', $data);
		} else {

			$data_insert = array(
				'judul'=>$this->input->post('judul'), 
				'slug'=>$slug,  
				'isi'=>$this->input->post('isi'), 
				'status_produk'=>$this->input->post('status_produk'),
				'id_user'=>$this->input->post('id_user'),
				'gambar'=>$this->upload->data('file_name')
				);

			$this->db->insert('produk', $data_insert);

			$data['message'] = 'Your file was successfully uploaded!';
			$this->load->view('notification_view', $data);
		}
	}

	public function do_insert(){
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$target_dir = "uploads/";
		$uploadOk = 1;
		$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
    	}    else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image = basename($_FILES["userfile"]["name"],".jpg");

    $data_insert = array(
    	'judul' => $judul,
    	'isi' => $isi,
    	'gambar' => $gambar,
    	);

    $res = $this->produk_model->insertData('produk',$data_insert);
    if ($res=>1) {
    	redirect('admin/dashboard');
    }
    else {
    	echo "<h2> Upload Gagal </h2> ";
    }
	}*/
}