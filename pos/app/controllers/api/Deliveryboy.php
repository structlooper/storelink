<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Deliveryboy extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authorization_Token');
        $this->load->api_model('Deliveryboy_model');


    }
    public function index_get(){
        $result = $this->Deliveryboy_model->get_all_deliveryboy();
        $this->response($result);
    }
    public function assign_web_get(){
        $result = $this->Deliveryboy_model->assign_delivery_boy();
        $this->response($result);
    }

}