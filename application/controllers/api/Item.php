<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Item extends CI_Controller
{
   use REST_Controller {
    REST_Controller::__construct as private __resTraitConstruct;
  }

  
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->__resTraitConstruct();
    $this->load->library('session');
    $this->load->model('M_get_data','get_data');
  }


  public function items_get()
  { 

    $item = $this->get_data->get_data_item()->result();
    $id_item = $this->input->get('id_item');
    if($item && $id_item == ''){
      $this->response([
        'status' => true,
        'data'  => $item
      ]);
    }else{
      $item = $this->get_data->item_by_id($id_item)->result();
      if($item){
        $this->response([
          'status' => true,
          'data'  => $item
        ]);
      }else{
        $this->response([
          'status' => 'false',
          'message' => '404_NOT_FOUND!'
        ], 404);
      }
    }
    // $this->response($item, 200);


  }

  public function index_post()
  {
    // Create a new book
  }
}

?>