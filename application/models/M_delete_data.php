<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_delete_data extends CI_Model {

    function delete_item($id_item){
        $sql = "DELETE FROM `mt_items` WHERE `mt_items`.`id_item` = '$id_item' ";
        $this->db->query($sql);
    }

    function delete_kategori($id_kategori){
        $sql = "DELETE FROM `mt_category` WHERE `mt_category`.`id_kategori` = '$id_kategori' ";
        $this->db->query($sql);
    }

}

/* End of file ModelName.php */

?>