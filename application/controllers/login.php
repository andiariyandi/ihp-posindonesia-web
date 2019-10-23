<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

function index(){
			if($this->session->userdata('id_user')){
				redirect('home');
			}else{
				$this->load->view('login');
			}
}

  function login_akses(){
  	$email = trim($this->input->post('email'));
  	$password = md5(trim($this->input->post('password')));

		$akses = $this->db->query("SELECT id_user, name, level, notlp, alamat, jk FROM user
				WHERE email = '$email' AND password = '$password'");

    if($akses->num_rows() == 1){
			foreach($akses->result_array() as $data){
				$isLoggedIn = 1;
				$session['id_user'] = $data['id_user'];
				$session['name'] = $data['name'];
				$session['level'] = $data['level'];
				$this->session->set_userdata($session);
    		redirect('home');
			}
		} else {
			$this->session->set_flashdata('error', 'Email atau password Salah!');
			 redirect('login');
		 }
  }


  public function logout() {
  	$this->session->sess_destroy();
		redirect('login');
	}

}
