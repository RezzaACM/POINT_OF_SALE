<?php

class M_edit_data extends CI_Model{
    
    function edit_data_item(){
        
        $id = $this->input->post('id_item',TRUE);
        $nama =$this->input->post('nama_item',TRUE);
        $jnsItem = $this->input->post('kategori',TRUE);
        $harga = $this->input->post('harga',TRUE);
        $stat = $this->input->post('status_item',TRUE);
        $desc = $this->input->post('deskripsi',TRUE);
        $tsInput = $this->input->post('ts_input',TRUE);
        $tsInputBy = $this->session->userdata('username');
        $stok = $this->input->post('stok',TRUE);

        $sql = "UPDATE `mt_items` SET `id_item`='$id',`nama_item`='$nama',`id_kategori`='$jnsItem',`harga_item`='$harga',`stok_item`='$stok',`status_item`='$stat',`deskripsi_item`='$desc',`ts_create_by`='$tsInputBy',`ts_create`= '$tsInput',`ts_update_by`='$tsInputBy',`ts_update`= now() WHERE `id_item` = '$id' ";

        $this->db->query($sql);
    }

    function edit_data_kategori($id_kategori,$kategori,$user){

        $sql = "UPDATE `mt_category` SET `id_kategori`='$id_kategori',`kategori`='$kategori',`ts_create_by`='$user',`ts_create`=now(),`ts_update_by`='$user',`ts_update`=now() WHERE `id_kategori`='$id_kategori' "; 

        $this->db->query($sql);
    }

}

?>
