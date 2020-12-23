<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Offers extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->api_model('Offers_model');

    }
    public function index_get(){
        $result = $this->Offers_model->get_all_offers();
        $this->response($result);
    }
    public function products_post(){
        $result = $this->Offers_model->get_offer_products();
        $this->response($result);
    }
    public function static_products_post(){
        $result = $this->Offers_model->get_static_offer_products();
        $this->response($result);
    }
    public function static_get(){
        $result = $this->Offers_model->get_all_static_offers();
        $this->response($result);
    }
}