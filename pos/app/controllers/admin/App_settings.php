<?php

defined('BASEPATH') or exit('No direct script access allowed');

class App_settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        if ($this->Supplier) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER['HTTP_REFERER']);
        }
        // $this->lang->admin_load('quotations', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('api_model');
        $this->digital_upload_path = 'files/';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->data['logo'] = true;
    }
    public function index(){
        $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('warehouse_id')) {
            $this->data['warehouses']   = $this->site->getAllWarehouses();
            $this->data['warehouse_id'] = $warehouse_id;
            $this->data['warehouse']    = $warehouse_id ? $this->site->getWarehouseByID($warehouse_id) : null;
        } else {
            $this->data['warehouses']   = null;
            $this->data['warehouse_id'] = $this->session->userdata('warehouse_id');
            $this->data['warehouse']    = $this->session->userdata('warehouse_id') ? $this->site->getWarehouseByID($this->session->userdata('warehouse_id')) : null;
        }
        $result = $this->api_model->get_app_about_settings();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'App / Settings']];
        $meta = ['page_title' => 'App Settings', 'bc' => $bc ,'app_about' => $result['data']];
        // print_r($banners);exit;
        $this->page_construct('app_settings/index', $meta, $this->data);
    }
    public function update(){
        $result=$this->api_model->update_app_settings();
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
        }else{
            $this->session->set_flashdata('error', $result['msg']);
        }
        redirect(admin_url("app_settings"));
    }
}