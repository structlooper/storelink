<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Brands extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->api_model('Brands_model');

    }
    public function index_get(){
        $result = $this->Brands_model->get_all_brands();
        $this->response($result);
    }
    public function index_post(){
        $result = $this->Brands_model->get_brands_by_id();
        $this->response($result);
    }
}