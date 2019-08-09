<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_get_data','get_data');
        $this->load->model('m_delete_data','delete_data');
        $this->load->model('m_add_data','add_data');
        $this->load->model('m_edit_data','edit_data');
    }
    

    public function index()
    {
        $data['judul'] = "List Menu";
        $data['getItemAll'] = $this->get_data->get_data_item()->result_array();
        $this->load->view('templates/header',$data);
        $this->load->view('item/index',$data);
        $this->load->view('templates/footer');
    }
    // public function get_item(){
    //     $data = $this->get_data->get_data_item();
    //     echo ($data);
    // }

    public function delete($id_item){
        // $id = $this->input->post('id_item');
        $this->delete_data->delete_item($id_item);
        $this->session->set_flashdata('flash', ' dihapus!');
        redirect('item');
    }
    public function tambah(){
        $data['generateId'] = $this->get_data->test();
        $data['category'] =$this->get_data->get_data_category()->result_array();
        $this->load->view('item/tambah',$data);
    }
    public function tambah_act(){
        $this->add_data->add_data_item();
        $this->session->set_flashdata('flash', ' ditambahkan!');
        redirect('item');
        
    }
    public function edit($id_item){
        $data['category'] =$this->get_data->get_data_category()->result_array();
        $data ['itemId'] = $this->get_data->item_by_id($id_item)->result();
        // var_dump($data);
        $this->load->view('item/edit',$data);
    }
    public function detail($id_item){
        $data ['itemId'] = $this->get_data->item_by_id($id_item)->result();
        // var_dump($data);
        $this->load->view('item/detail',$data);
    }
    public function edit_act(){
        $this->edit_data->edit_data_item();
        // echo '<script>alert("ok")</script>';
        $this->session->set_flashdata('flash', ' diupdate!');
        redirect('item');
    }

}
