<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends REST_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_get_data','get_data');
    }

    public function get_item(){
        $item = $this->get_data->get_data_item();
        
        if($item){
            $this->response([
                'status' => true,
                'data' => $item
            ], REST_Controller::HTTP_OK);
        }
    }


}




?>