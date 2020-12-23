<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Admin extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->api_model('Admin_model');
        $this->load->api_model('User_modal');


    }
    public function login_post(){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $rem_token = $_POST['device_token'];
        $token_data['email'] = $email;

        $user = $this->Admin_model->check_admin($email,$pwd);

        if ($user['status'] == 1){

            $data = [
                'device_token' => $rem_token
            ];
            $user_id = $user['data']['id'];
            $this->User_modal->update_user($user_id,$data);
            $token_data['user_id'] = $user_id;
            $token_data['device_token'] = $rem_token;

            $tokenData = $this->Admin_model->parse_token($token_data);

            $final['status'] = true;
            $final['msg'] = $user['msg'];
            $final['data'] = ['token' => $tokenData,'email'=> $token_data['email']];

            $this->response($final);
        }else{
            $this->response($user);
        }




    }
    public function orders_post(){
        $result = $this->Admin_model->get_orders();
        $this->response($result);
    }
    public function assign_post(){

        $result = $this->Admin_model->assign_delivery_boy();
        $this->response($result);
    }

}