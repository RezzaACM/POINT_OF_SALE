<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->library('form_validation');        
        $this->load->model('M_login','login');
	}

    public function index()
    {
        $this->load->view('login/login');
    }
    public function login_auth(){

        $username = $this->input->post('username',TRUE);
        $password = md5 ($this->input->post('pass',TRUE));
        
        $user = $this->login->check_login($username,$password);
        if($user){
            foreach($user as $row){
                $user_data = array(
                            'id_user'   => $row->id_user,
                            'nama'      => $row->nama_staff,
                            'username'  => $row->username,
                            'foto_user' => $row->foto_user,
                            'level_user'=> $row->level_user,
                            'login'		=> true
                            );
            }
            $this->session->set_userdata($user_data);
            redirect(base_url());
        }else{
            $this->session->set_flashdata('salah', 'Username atau Password anda Salah!');
            redirect('login');
        }
        
    }
        
        
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}

?>