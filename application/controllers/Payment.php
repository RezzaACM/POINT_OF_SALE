<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_add_data','add_data');
        $this->load->model('m_get_data','get_data');
        $this->load->model('m_delete_data','delete_data');
        $this->load->model('m_edit_data','edit_data');
        $this->load->library('session');
    }
    

    public function index()
    {
        $data['judul'] = 'Payment';
        $data['payment'] = $this->get_data->get_data_payment()->result();
        $this->load->view('templates/header',$data);   
        $this->load->view('payment/index',$data);
        $this->load->view('templates/footer');   
    }
    public function tambah(){
        $this->load->view('payment/tambah');
    }
    public function tambah_act()
    {
        // $id = $this->input->post('id');
        $nama = $this->input->post('payment');
        $user = $this->session->userdata('username');

        $this->add_data->add_data_payment($nama,$user);
        $this->session->set_flashdata('flash', ' ditambahkan!');
        redirect('payment');
    }
    public function delete($id)
    {
        $this->delete_data->delete_payment($id);
        $this->session->set_flashdata('flash', ' dihapus!');
        redirect('payment');
    }
    public function edit($id)
    {
        $data['payId'] = $this->get_data->get_payment_id($id)->result();
        // var_dump($data);
        $this->load->view('payment/edit',$data);
    }
    public function edit_act()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('payment');
        $user = $this->session->userdata('username');
        
        $this->edit_data->update_payment($id,$nama,$user);
        $this->session->set_flashdata('flash', ' diupdate!');
        redirect('payment');
    }

}

/* End of file Payment.php */


?>