<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_get_data','get_data');
        $this->load->model('M_add_data','add_data');
        $this->load->model('M_delete_data','delete_data');
        $this->load->model('M_edit_data','edit_data');
        $this->load->library('form_validation');
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
        $data['category'] = $this->get_data->get_data_category()->result_array();
        $this->load->view('templates/header',$data);
        $this->load->view('kategori/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->load->view('kategori/tambah');
    }
    public function tambah_act(){

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|');
        if ($this->form_validation->run() != TRUE) {
            $kategori = $this->input->post('kategori',TRUE);
            $user = $this->session->userdata('username');
            $this->add_data->add_data_kategori($kategori,$user);
            $this->session->set_flashdata('flash', ' ditambahkan!');
            redirect('kategori');
        } else {
            redirect('kategori');
        }
        
        
    }
    public function delete($id_kategori){
        $this->delete_data->delete_kategori($id_kategori);
        $this->session->set_flashdata('flash', ' dihapus!');
        redirect('kategori');
    }
    public function edit_act(){
        $id_kategori = $this->input->post('id_kategori',TRUE);
        $kategori = $this->input->post('kategori',TRUE);
        $user = $this->session->userdata('username');

        $this->edit_data->edit_data_kategori($id_kategori,$kategori,$user);
        $this->session->set_flashdata('flash', ' diupdate!');
        redirect('kategori');
    }
    public function edit($id_kategori){
        $data['katId'] = $this->get_data->get_data_category_id($id_kategori)->result();
        $this->load->view('kategori/edit',$data);
    }
}
?>
