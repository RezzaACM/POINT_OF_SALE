<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != true){
            echo '<script>alert("Anda harus login terlebih dahulu!")
            window.location = "login"
            </script>
                
            ';
        }
    }
    

    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/dashboard');
        $this->load->view('templates/footer');
    }
}

?>