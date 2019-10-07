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
        // $stok = $this->input->post('stok',TRUE);

        $sql = "UPDATE `mt_items` SET `id_item`='$id',`nama_item`='$nama',`id_kategori`='$jnsItem',`harga_item`='$harga',`status_item`='$stat',`deskripsi_item`='$desc' WHERE `id_item` = '$id' ";

        $this->db->query($sql);
    }

    function edit_data_kategori($id_kategori,$kategori,$user){

        $sql = "UPDATE `mt_category` SET `id_kategori`='$id_kategori',`kategori`='$kategori' WHERE `id_kategori`='$id_kategori' "; 

        $this->db->query($sql);
    }
    // function edit_data_staff($id,$nama,$kelamin,$notelp,$alamat,$status,$user)
    function edit_data_staff($id,$nama,$kelamin,$notelp,$alamat,$status,$user)
    {
        $sql = "UPDATE `mt_staff` SET `nama_staff` = '$nama',`jns_klmn_staff` = '$kelamin', `no_telp_staff` = '$notelp', `alamat_staff` = '$alamat', `status_staff` = '$status' WHERE `mt_staff`.`id_staff` = $id ";

        $this->db->query($sql);
    }
    function edit_data_user($id_user,$id_staff,$username,$password,$foto,$level_user,$user)
    {
        $sql = "UPDATE `users` SET `id_user`= '$id_user',`id_staff`='$id_staff',`username`='$username',`password`='$password',`foto_user`='$foto',`level_user`='$level_user' WHERE `users`.`id_user` = $id_user ";

        $this->db->query($sql);
    }
    function update_payment($id,$nama,$user)
    {
        $sql = " UPDATE mt_payment_methode SET nama_payment = '$nama' WHERE id_payment = '$id' ";

        $this->db->query($sql);
    }

}

?>
