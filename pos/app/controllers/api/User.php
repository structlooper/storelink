<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class User extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
		$this->load->library('Authorization_Token');
// 		$this->load->database();
         $this->load->api_model('User_modal');
         
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->load->library('session');
	}

	public function user_post()
	{  
		$array  = array('status'=>'ok','data'=>1);
		$this->response($array); 
	}
	public function record_post()
	{  
		$array  = array('status'=>'ok','data'=>'post api');
		$this->response($array); 
	}
	
	public function login_post()
	{   
		$phone = $_POST['phone'];
		$rem_token = $_POST['device_token'];
		$token_data['phone'] = $phone;

        $user = $this->User_modal->check_user($phone);
        if(sizeof($user['data']) > 0){
            // user already exist
                    // print_r($user['data'][0]);exit;
                    $data = [
                         'device_token' => $rem_token
                        ];
                        $user_id = $user['data'][0]->id;
                   $this->User_modal->update_user($user_id,$data);
                    $token_data['user_id'] = $user_id;
                    $token_data['phone'] = $user['data'][0]->phone;
                    $token_data['device_token'] = $user['data'][0]->device_token;

        }else{
            // new user register
            $data = [
                'phone' => $phone,
                'group_id' => 7,
                'password' => 'null',
                'username' => 'null',
                'email' => 'null',
                'device_token' => $rem_token,
                'created_on' => strtotime(date('Y-m-d H:i:s'))
                ];
                
            $data = $this->User_modal->new_user($data);
            // echo json_encode(['debug' => $phone]);exit;
            $user = $this->User_modal->check_user($phone);
            $token_data['user_id'] = $user['data'][0]->id;
            $token_data['phone'] = $user['data'][0]->phone;
            $token_data['device_token'] = $user['data'][0]->device_token;
			

        }
		$tokenData = $this->authorization_token->generateToken($token_data);

		$final = array();
		$final['status'] = true;
		$final['msg'] = 'user logged in successfully';
		$final['data'] = ['token' => $tokenData,'phone'=> $token_data['phone']];
 
		$this->response($final); 

	}
	public function verify_post()
	{  
		$headers = $this->input->request_headers(); 
		$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

		$this->response($decodedToken);  
	}
	public function verify_web_post()
	{
		$headers = $this->input->request_headers();
		$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
        if ($decodedToken['status'] == true ) {
            $result = $this->User_modal->get_user_profile_details($decodedToken['data']->user_id);
//            print_r($result['data']);exit;
            $this->session->set_userdata([
                'token' => $_POST['Authorization'] ,
                'user_id'=>$decodedToken['data']->user_id ,
                'phone' =>  $result['data']['phone'],
                'email' => $result['data']['email'],
                'first_name' => $result['data']['first_name'],
                'last_name' => $result['data']['last_name'],
            ]);
        }
        $this->response($decodedToken);
    }
	
	public function address_add_post(){
	    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->user_add_address($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }
	}
	public function get_address_post(){
	    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->get_user_address($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }
	}
	
	public function update_address_post(){
	   $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->update_user_address($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    } 
	}
	public function delete_address_post(){
	   $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->delete_user_address($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    } 
	}
    public function orders_post(){
       $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->get_user_orders($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }   
    }
    public function profile_post(){
         $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->get_user_profile_details($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }   
    }
    public function profile_update_post(){
         $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->update_user_profile_details($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }   
    }
    public function past_order_products_post(){
         $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
	    $user_id = $decodedToken['data']->user_id;
	    if(!is_null($user_id)){
    	    $result = $this->User_modal->get_user_past_orders_products($user_id);
    	    $this->response($result);
	    }else{
           $this->response(['status' => false,'msg' => 'not a valid user', 'data' => []]);
	    }   
    }


 
}