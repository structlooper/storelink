<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Banners extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		 $this->load->library('Authorization_Token');
         $this->load->api_model('Banners_model');
        
       
	}
	public function primary_get(){
	    $result = $this->Banners_model->get_all_primary_banners();
         $this->response($result);
	}
	public function secondary_get(){
	    $result = $this->Banners_model->get_all_secondary_banners();
         $this->response($result);
	}
	
}