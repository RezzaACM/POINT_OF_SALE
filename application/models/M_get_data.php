<?php

class M_get_data extends CI_Model{

    //get all data items
    public function get_data_item(){
        return $this->db->get('mt_items');

    }
    //get data by id item
    public function item_by_id($id_item){
        $sql = "SELECT * FROM `mt_items` WHERE `mt_items`.`id_item` = '$id_item' ";
        return $this->db->query($sql);
    }

    public function test(){
        $data = $this->db->get('mt_items')->num_rows();
        if($data < 1 ){
            $new = 1;
            $new += $data;
            $char = 'MENU--';
            $customId = $char.'00'.$new;
            return $customId;
        }else{
            $new = 1;
            $new += $data;
            $char = 'MENU--';
            $customId = $char.'00'.$new;
            return $customId;
        }
        // var_dump($data);
        // $new += $data;
        // $char = 'MENU--';

        
        // echo $customId;
        
    }
    
    // function get_data_item(){
    //     $this->load->library('datatables');
    //     $this->datatables->select('*');
    //     $this->datatables->add_column('action','<a href="../item/delete/" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>');
    //     $this->datatables->from('mt_items');
    //     return $this->datatables->generate();
    // }

}



?>