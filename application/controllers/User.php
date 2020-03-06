<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
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
            $data['judul'] ='User Control';
            $data['users'] = $this->get_data->get_data_user()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('users/index',$data);
            $this->load->view('templates/footer');
        }else{
            echo '<script>alert("Access denied!")
            window.location = "home"
            </script>
                
            ';
        }
    }
    public function tambah(){
        $data['staff'] = $this->get_data->get_data_staff()->result_array();
        $this->load->view('users/tambah',$data);
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function upload_user(){
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->generateRandomString();
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
           return $this->upload->data("file_name") ;
        }
        print_r($this->upload->display_errors());
        return 'avatar_default.png';
    }
    public function tambah_act(){
        $id_staff = $this->input->post('id_staff',TRUE);
        $username = $this->input->post('username',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $foto_user = $this->upload_user();
        // var_dump($foto_user);
        $level_user = $this->input->post('level_user',TRUE);
        $user = $this->session->userdata('username',TRUE);

        $this->add_data->add_data_user($id_staff,$username,$password,$foto_user,$level_user,$user);
        $this->session->set_flashdata('flash', ' ditambahkan!');
        redirect('user');
    }
    public function delete($id_user){
        $this->delete_data->delete_user($id_user);
        $this->session->set_flashdata('flash', ' dihapus!');
        redirect('user');
    }
    public function edit($id_user){
        $data['getUserId'] = $this->get_data->get_user_id($id_user)->result();
        // var_dump($data);
        $this->load->view('users/edit',$data);
    }
    public function edit_act(){
        $id_user = $this->input->post('id_user',TRUE);
        $id_staff = $this->input->post('id_staff',TRUE);
        $username = $this->input->post('username2',TRUE);
        // // var_dump($username);
        // $password = md5($this->input->post('password',TRUE));
        $level_user = $this->input->post('level_user',TRUE);
        $user = $this->session->userdata('username',TRUE);

        if($this->input->post('password') == ''){
            $password = $this->input->post('old_password');
            // var_dump($password);
        }else{
            $password = md5($this->input->post('password'));
            // var_dump($password);
        }

        if (!empty($_FILES['foto'])){
            $foto = $this->upload_user();
        }else {
            $foto = $this->input->post('old_foto',TRUE);
        }

        // var_dump($id_user,$id_staff,$username,$password,$level_user,$foto);
        $this->edit_data->edit_data_user($id_user,$id_staff,$username,$password,$foto,$level_user,$user);
        $this->session->set_flashdata('flash', ' diupdate!');
        redirect('user');
    }

}

/* End of file Controllername.php */
?>