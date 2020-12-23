<?php
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Settings extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authorization_Token');
        $this->load->admin_model('api_model');


    }
    public function index_get(){
        $result = $this->api_model->get_app_about_settings();
        $this->response($result);
    }

}
