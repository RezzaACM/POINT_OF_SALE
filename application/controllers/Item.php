<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_get_data','get_data');
        $this->load->model('m_delete_data','delete_data');
    }
    

    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header',$data);
        $this->load->view('item/index');
        $this->load->view('templates/footer');
    }
    public function get_item(){
        $data = $this->get_data->get_data_item();
        echo ($data);
    }
    public function delete($id_item){
        // $id = $this->input->post('id_item');
        $this->delete_data->delete_item($id_item);
        redirect('item');
    }
}
