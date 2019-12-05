<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load model
        $this->CI->load->model('user_model');
	}

	// fungsi login user
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$nama			=	$check->nama;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			
			redirect(base_url('mobil'),'refresh');
			
		}else{
				// jika username dan password salah
			redirect(base_url('login'),'refresh');
			}
		}

	// fungsi logout
	public function logout()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'),'refresh');
		}
}
