<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class SubCategory extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
         $this->load->api_model('Category_model');
       
	}
    
    public function index_post(){
        $category_id = $_POST['category_id'];
        // print_r($category_id);exit;
        if($category_id == null or $category_id == '' or $category_id == "null"){
            $this->response(['status' => false,'msg'=> 'not valid category_id' , 'data' => []]);

        }else{
            
              $cat = $this->Category_model->get_all_sub_categories($category_id);
              if(sizeof($cat) > 0){
                  
              foreach($cat as $itm){
                foreach($itm as $dat){
                  if($dat->parent_id != '0' or $dat->parent_id != null or $dat->parent_id != ''){
                      $sub_categories[] = $dat;
                  }
           
                }
              }
              }else{
                  $sub_categories = [];
              }
              $response = [
                  'status' => true,
                  'msg' => 'Sub Catgeories',
                  'data' => $sub_categories
                  
                  ];
                  $this->response($response);
        }

    }
  
  
}