<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Category extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
         $this->load->api_model('Category_model');
       
	}
    
    public function index_get(){
      $result = $this->Category_model->get_all_categories();
      $this->response($result);

    }
    public function index_post(){
	    $result = $this->Category_model->get_category_details_by_id();
	    $this->response($result);
    }
  
  
}