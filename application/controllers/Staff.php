<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_get_data','get_data');
        $this->load->model('m_delete_data','delete_data');
        $this->load->model('m_add_data','add_data');
        $this->load->model('m_edit_data','edit_data');
        $this->load->library('session');
        if($this->session->userdata('login') != true){
            echo '<script>alert("Anda harus login terlebih dahulu!")
            window.location = "login"
            </script>
                
            ';
        }
    }
    

    public function index()
    {
        if ($this->session->userdata('level_user') == 1){
            $data['judul'] = "Staff";
            $data['staff'] = $this->get_data->get_data_staff()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('staff/index',$data);
            $this->load->view('templates/footer');
        }else{
            echo '<script>alert("Access denied!")
            window.location = "home"
            </script>
                
            ';
        }
    }
    public function tambah()
    {
        $this->load->view('staff/tambah');
    }
    public function tambah_act()
    {
        $nama = $this->input->post('nama_staff');
        $kelamin = $this->input->post('klmn');
        $notelp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');
        $user = $this->session->userdata('username');
        $jabatan = $this->input->post('jabatan');

        $this->add_data->add_data_staff($nama,$kelamin,$notelp,$alamat,$user,$jabatan);
        $this->session->set_flashdata('flash', ' ditambahkan!');
        redirect('staff');

    }
    public function delete($id_staff)
    {
        $this->delete_data->delete_staff($id_staff);
        $this->session->set_flashdata('flash', ' dihapus!');
        redirect('staff');
    }
    public function edit($id_staff)
    {
        $data['getStaffId'] = $this->get_data->get_data_staff_id($id_staff)->result();
        $this->load->view('staff/edit',$data);
    }
    public function edit_act()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_staff');
        $kelamin = $this->input->post('klmn');
        $notelp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $user = $this->session->userdata('username');
        
        // // var_dump($id,$nama,$kelamin,$notelp,$alamat,$status,$user);

        // $this->edit_data->edit_data_staff($id,$nama,$kelamin,$notelp,$alamat,$status,$user);
        $this->edit_data->edit_data_staff($id,$nama,$kelamin,$notelp,$alamat,$status,$user);
        $this->session->set_flashdata('flash', ' diupdate!');
        redirect('staff');
    }
}

?>