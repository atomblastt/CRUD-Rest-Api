
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//halaman login
	public function index(){
		// validasi
		$this->form_validation->set_rules('username','Username','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login/list', $data, FALSE);
		}
		
		public function logout()
		{
			$this->simple_login->logout();
		}
		
}