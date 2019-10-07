<?php

class M_add_data extends CI_Model{
    
    function add_data_item(){
            $id = $this->input->post('id_item',TRUE);
            $nama =$this->input->post('nama_item',TRUE);
            $jnsItem = $this->input->post('kategori',TRUE);
            $harga = $this->input->post('harga_item',TRUE);
            // $stok = $this->input->post('stok',TRUE);
            $desc = $this->input->post('deskripsi',TRUE);
            $creat_by = $this->session->userdata('username');
            

            $sql = "INSERT INTO `mt_items` (`id_item`, `nama_item`, `id_kategori`, `harga_item`, `status_item`, `deskripsi_item`) VALUES ('$id', '$nama', '$jnsItem', '$harga','1', '$desc')";
            
            return $this->db->query($sql);
        }
    
    function add_data_kategori($kategori,$user){
        
        $sql = "INSERT INTO mt_category VALUES ('','$kategori')";
        return $this->db->query($sql);

    }
    function add_data_staff($nama,$kelamin,$notelp,$alamat,$user,$jabatan)
    {
        $sql = "INSERT INTO mt_staff VALUES ('','$nama','$kelamin','$notelp','$alamat','$jabatan','1')";
        return $this->db->query($sql);
    }
    function add_data_user($id_staff,$username,$password,$foto_user,$level_user,$user){
        $sql = "INSERT INTO users VALUE ('','$id_staff','$username','$password','$foto_user','$level_user','') ";
        $this->db->query($sql);
    }
    function add_data_payment($nama,$user){
        $sql = " INSERT INTO mt_payment_methode VALUES ('','$nama') ";
        $this->db->query($sql);
    }

    function add_data_order($invoice,$customer,$diskon,$total,$id_user){
        $sql = "INSERT INTO ts_order VALUES ('$invoice','$customer','$diskon','$total','$id_user',now(),now()) ";
        $this->db->query($sql);
    }
    function add_data_detail_order($invoice,$id_item,$jumlah,$id_payment,$subtotal){
        $sql = " INSERT INTO ts_order_detail VALUES ('$invoice','$id_item','$jumlah','$id_payment','$subtotal') ";
        $this->db->query($sql);
    }
}

?>