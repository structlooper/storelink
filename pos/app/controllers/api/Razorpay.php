<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Razorpay extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		 $this->load->library('Authorization_Token');
         $this->load->api_model('Product_model');
         $this->load->api_model('Category_model');
         $this->load->api_model('Cart_model');
       
	}
	public function index_get(){
     $result = $this->Category_model->get_razorpay_details();
     $this->response($result);
	}
	
	
}