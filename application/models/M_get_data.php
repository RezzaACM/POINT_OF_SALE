<?php

class M_get_data extends CI_Model{

    //get all data items
    public function get_data_item(){
        return $this->db->query("SELECT * FROM `mt_items` JOIN mt_category ON mt_items.id_kategori=mt_category.id_kategori ORDER BY 'nama_item' ASC");

    }
    //get data by id item
    public function item_by_id($id_item){
        $sql = "SELECT * FROM mt_items JOIN mt_category ON mt_items.id_kategori=mt_items.id_kategori WHERE id_item = '$id_item' ";
        return $this->db->query($sql);
    }

    public function test(){
        $data = $this->db->get('mt_items')->num_rows();
        if($data < 1 ){
            $new = 1;
            $new += $data;
            $char = 'MENU-';
            $date = date('dms');
            $customId = $char.$date.$new;
            return $customId;
        }else{
            $new = 2;
            $new *= $data;
            $char = 'MENU-';
            $date = date('dms');
            $customId = $char.$date.$new;
            return $customId;
        }
        
    }

    // get data categories
    function get_data_category(){
        return $this->db->get('mt_category');
    }
    //get data categories by id
    function get_data_category_id($id_kategori){
        $sql = "SELECT * FROM mt_category  WHERE id_kategori = '$id_kategori' ";
        return $this->db->query($sql);
    }
}



?>