<?php

class M_add_data extends CI_Model{
    
    function add_data_item(){
            $id = $this->input->post('id_item',TRUE);
            $nama =$this->input->post('nama_item',TRUE);
            $jnsItem = $this->input->post('kategori',TRUE);
            $harga = $this->input->post('harga_item',TRUE);
            $stok = $this->input->post('stok',TRUE);
            $desc = $this->input->post('deskripsi',TRUE);
            $creat_by = $this->session->userdata('username');
            

            $sql = "INSERT INTO `mt_items` (`id_item`, `nama_item`, `id_kategori`, `harga_item`, `stok_item`, `status_item`, `deskripsi_item`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES ('$id', '$nama', '$jnsItem', '$harga', '$stok', '1', '$desc', '$creat_by', now(), '', '')";
            
            return $this->db->query($sql);
        }
    
    function add_data_kategori($kategori,$user){
        
        $sql = "INSERT INTO mt_category VALUES ('','$kategori','$user',now(),'','')";
        return $this->db->query($sql);

    }
    function add_data_staff($nama,$kelamin,$notelp,$alamat,$user)
    {
        $sql = "INSERT INTO mt_staff VALUES ('','$nama','$kelamin','$notelp','$alamat','1','$user',now(),'','')";
        return $this->db->query($sql);
    }
    function add_data_user($id_staff,$username,$password,$foto_user,$level_user,$user){
        $sql = "INSERT INTO users VALUE ('','$id_staff','$username','$password','$foto_user','$level_user','$user',now(),'','') ";
        $this->db->query($sql);
    }
    function add_data_payment($nama,$user){
        $sql = " INSERT INTO mt_payment_methode VALUES ('','$nama','$user',now(),'','') ";
        $this->db->query($sql);
    }
}

?>