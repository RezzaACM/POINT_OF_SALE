<?php

class M_get_data extends CI_Model{

    public function get_data_item2(){
        return $this->db->get('mt_items')->result();

    }
    
    function get_data_item(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->add_column('action','<a href="../item/delete/" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>');
        $this->datatables->from('mt_items');
        return $this->datatables->generate();
    }

}



?>