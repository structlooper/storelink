<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banners extends MY_Controller
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
        $this->load->admin_model('banners_model');
        $this->digital_upload_path = 'files/';
        $this->digital_file_types  = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size   = '1024';
        $this->data['logo']        = true;
    }
    
    // public function index(){
    //     print_r('success');exit;
    // }
    
    public function primary(){
        $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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

        $banners = $this->banners_model->get_primary_banners();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Primary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc ,'banners' => $banners];
        // print_r($banners);exit;
        $this->page_construct('banners/primary/index', $meta, $this->data);
    }
    public function primary_edit($primary_banner_id){
         $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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

        $banner_details = $this->banners_model->get_primary_banners_by_id($primary_banner_id);
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Primary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc ,'banner_details' => $banner_details];
        // print_r($banners);exit;
        $this->page_construct('banners/primary/edit', $meta, $this->data);
        // print_r($banner_details);exit;
    }
    public function add(){
          $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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
        $category = $this->banners_model->get_all_categories();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Primary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc , 'category' => $category ];
        // print_r($banners);exit;
        $this->page_construct('banners/primary/add', $meta, $this->data);
    }
    public function add_primary_banner(){
        $result=$this->banners_model->save_banner_new_banners();
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/primary"));
        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/add"));
        }
        
    }
    public function update_primary_banner($id){
        $result=$this->banners_model->update_banner_details($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/primary"));

        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/primary_edit/".$id));

        } 
    }
    public function primary_delete($id){
        $result=$this->banners_model->delete_banner_details($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/primary"));

        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/primary"));

        } 
    }
    
    
    public function secondary(){
        $this->sma->checkPermissions();
         $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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

        $banners = $this->banners_model->get_secondary_banners();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Secondary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc ,'banners' => $banners];
        // print_r($banners);exit;
        $this->page_construct('banners/secondary/index', $meta, $this->data);
    }
    public function secondary_add(){
       $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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
        $category = $this->banners_model->get_all_brands();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Secondary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc , 'category' => $category ];
        // print_r($banners);exit;
        $this->page_construct('banners/secondary/add', $meta, $this->data); 
    }
    public function add_secondary_banner(){
      $result=$this->banners_model->save_secondary_banner();
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/secondary"));

        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/secondary_add"));

        }  
    }
    public function seconadry_edit($secondary_banner_id){
        $this->sma->checkPermissions();
        if ((!$this->Owner || !$this->Admin) && !$warehouse_id) {
            $user         = $this->site->getUser();
            $warehouse_id = $user->warehouse_id;
        }
         $this->sma->checkPermissions();

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
        $banner_details = $this->banners_model->get_secondary_banners_by_id($secondary_banner_id);
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Secondary Banners']];
        $meta = ['page_title' => 'Banners', 'bc' => $bc ,'banner_details' => $banner_details];
        // print_r($banners);exit;
        $this->page_construct('banners/secondary/edit', $meta, $this->data);  
    }
    public function update_secondary_banner($id){
         $result=$this->banners_model->update_secondary_banner_details($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/secondary"));

        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/secondary_edit/".$id));

        } 
    }
    public function seconadry_delete($id){
         $result=$this->banners_model->delete_secondary_banner_details($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
                    redirect(admin_url("banners/secondary"));

        }else{
            $this->session->set_flashdata('error', $result['msg']);
                    redirect(admin_url("banners/secondary"));
        } 
    }
}