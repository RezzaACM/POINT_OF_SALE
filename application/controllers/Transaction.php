<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function invoiceGen()
    {
        $num = $this->db->get('ts_order')->num_rows();
        // var_dump($num);
        if($num < 1){
            $new = 1;
            $new += $num;
            $char = 'DSBY-';
            $date = date('dms');
            $customId = $char.$date.'-'.$new;
            return $customId;
        }else{
            $new = 1;
            $new += $num;
            $char = 'DSBY-';
            $date = date('dms');
            $customId = $char.$date.'-'.$new;
            return $customId;
        }
    }

    public function index()
    {
        $data['invoice'] = $this->invoiceGen();
        $data['judul'] = 'Transaksi';
        $this->load->view('templates/header',$data);
        $this->load->view('transaction/cashier',$data);
        $this->load->view('templates/footer');   
    }

}

/* End of file Controllername.php */


?>