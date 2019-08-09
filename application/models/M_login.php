<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    function check_login($username, $password){
        $sql = "SELECT * FROM users JOIN mt_staff ON users.id_staff=mt_staff.id_staff WHERE `username` = '$username' AND `password` = '$password' ";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

}

/* End of file ModelName.php */
?>