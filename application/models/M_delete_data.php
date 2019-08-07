<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_delete_data extends CI_Model {

    function delete_item($id){
        $sql = "DELETE FROM 'mt_items' WHERE 'id_item' = '$id'";
        $this->db->query($sql);
    }

}

/* End of file ModelName.php */

?>