<?php

class M_add_data extends CI_Model{
    
    function add_data_item()
        {
            $id = $this->input->post('id_item',TRUE);
            $nama =$this->input->post('nama_item',TRUE);
            $jnsItem = $this->input->post('jenis_item',TRUE);
            $harga = $this->input->post('harga_item',TRUE);
            $desc = $this->input->post('deskripsi',TRUE);

            $this->db->query("INSERT INTO mt_items VALUES ('$id','$nama','$jnsItem','$harga','1','$desc',now(),now())");
        }
}

?>