<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('UserModel');
		$this->load->model('RequestModel');
        $this->load->library('session');
		$this->load->model('NotifikasiModel');

    }

	public function index(){
		$data['active_menu'] = 'kelolaprofil';
		$data['title'] = 'Login Page';

		// Kueri Data User
		$username = $this->session->userdata('username');
		$data['users'] = $this->UserModel->getUserById($username);
		$data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
		// Mengambil user_id
        $user = $this->UserModel->getUserById($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

		// load view
		$this->load->view('karyawan/templates/header', $data);
		$this->load->view('karyawan/templates/sidebar', $data);
		$this->load->view('karyawan/kelolaprofil', $data);
		$this->load->view('karyawan/templates/footer');
	}

	public function updateDataUser(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Memeriksa apakah ada file foto yang diupload
		if ($_FILES['foto']['name']) {
			$config['upload_path'] = './assets/img/users/'; // Lokasi penyimpanan foto
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // Batasan ukuran file (dalam KB)
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('foto')) {
				$uploaded_data = $this->upload->data();
				$foto = $uploaded_data['file_name'];
	
				// Mengupdate data produk beserta foto
				$data = array(
					'nama' => $nama,
					'username' => $username,
					'email' => $email,
					'foto' => $foto
				);
	
				// Memeriksa apakah password diisi atau tidak
				if (!empty($password)) {
					$data['password'] = md5($password);
				}
	
				$this->UserModel->updateProfil($username, $data);
				$this->session->set_flashdata('success', 'Profile berhasil diperbarui');
				$this->session->set_userdata($data);
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('Profil' . $username);
				$this->session->set_flashdata('error', 'Profile gagal diperbarui');
			}
		}else {
			// Jika tidak ada foto yang diupload, hanya mengupdate data produk tanpa foto
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username
			);
	
			// Memeriksa apakah password diisi atau tidak
			if (!empty($password)) {
				$data['password'] = md5($password);
			}
	
			$this->UserModel->updateProfil($username, $data);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success', 'Profile berhasil diperbarui');
		}
	
		redirect('Karyawan/Profil');
	}
	
}