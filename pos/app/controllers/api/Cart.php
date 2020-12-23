<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Cart extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		 $this->load->library('Authorization_Token');
         $this->load->api_model('Product_model');
         $this->load->api_model('Category_model');
         $this->load->api_model('Cart_model');
       
	}
	
	public function add_post(){
	    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
        
	    $user_id = $decodedToken['data']->user_id;
	   //$user_id = '3';
	   if(!is_null($user_id)){
	    $product_id = $_POST['product_id'];
	    $qty = $_POST['qty'];
	    if($qty > 0 and $qty != '' and is_numeric($qty)){
	        
	           
	           $check_product_added = $this->Cart_model->check_product_cart($user_id,$product_id);
	           if($check_product_added['status'] == 1){
	               $this->response(['status'=> true,'msg' => 'Product Count increased','data' => []]);
	           }else{
	           
	               $result = $this->Cart_model->add_product_cart($user_id,$product_id,$qty);
	               
	               $this->response(['status' => true,'msg' => 'product added in cart','data' => []]);
	           }
	           //print_r($check_product_added['status']);exit;
	       
	    }else{
	        $this->response(['status' => false,'msg' => 'please enter a valid quantity','data' => []]);
	        
	    }
	   }else{
	       $this->response(['status' => false, 'msg' => 'not a valid user', 'data' => []]);
	   }
	    
	}
	
	public function remove_post(){
	    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
        
	    $user_id = $decodedToken['data']->user_id;
	   //$user_id = '3';
	   if(!is_null($user_id)){
	    $product_id = $_POST['product_id'];
	    $variant_id = $_POST['variant_id'];
	    $qty = $_POST['qty'];
	    if( $qty != '' and is_numeric($qty)){
	        if(is_null($variant_id) or $variant_id == '' or $variant_id == 'null'){
	           // product variant not selected
	           $check_product_added = $this->Cart_model->check_product_user_cart($user_id,$product_id);
	           
	           if($check_product_added['status'] == 1){
	               $data = $this->Cart_model->remove_product_from_cart($user_id,$product_id,$qty);
	              if($data['status'] == false){
	                  $this->response(['status'=> false,'msg' => 'some internal issue','data' => []]);
	              }else{
	                  
	               $this->response(['status'=> true,'msg' => $data['msg'],'data' => []]);
	              }
	           }else{
	               $this->response(['status' => false,'msg' => 'product not present','data' => []]);
	           }
	           //print_r($check_product_added['status']);exit;
	        }else{
	           // product variant is selected
	           
	           $check_product_added = $this->Cart_model->check_product_variant_user_cart($user_id,$product_id,$variant_id);
	           
	          if($check_product_added['status'] == 1){
	               $data = $this->Cart_model->remove_product_variant_from_cart($user_id,$product_id,$variant_id,$qty);
	              if($data['status'] == false){
	                  $this->response(['status'=> false,'msg' => 'some internal issue','data' => []]);
	              }else{
	                  
	               $this->response(['status'=> true,'msg' => $data['msg'],'data' => []]);
	              }
	           }else{
	               $this->response(['status' => false,'msg' => 'product variant not present','data' => []]);
	           }
	        }
	    }else{
	        $this->response(['status' => false,'msg' => 'please enter a valid quantity','data' => []]);
	        
	    }
	   }else{
	       $this->response(['status' => false, 'msg' => 'not a valid user', 'data' => []]);
	   }
	    
	}
	
	public function index_post(){
       $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
       $user_id = $decodedToken['data']->user_id;
       if(!is_null($user_id)){
           $get_cart_data = $this->Cart_model->get_cart_data($user_id);
           $this->response(['status' => true,'msg' => 'Cart products', 'data' => $get_cart_data]);

       }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
       }
 
	}
	
	public function checkout_post(){
	    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
	        $data['payment_type'] = $_POST['payment_type'];
	        $data['payment_status'] = $_POST['payment_status'] ?? 'pending';
	        $data['promocode'] = $_POST['promocode'];
	        $data['user_id'] = $user_id;
	        $data['note'] = $_POST['note'];
	        $data['address_id'] = $_POST['address_id'];
	        $result = $this->Cart_model->checkout_order($data);
	        $this->response(['status' => $result['status'] , 'msg' => $result['msg'] , 'data' => $result['data']]);

	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
       }
	}
}