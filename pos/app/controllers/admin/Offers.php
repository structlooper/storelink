<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Offers extends MY_Controller
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
        $this->load->admin_model('offers_model');
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

        $offers = $this->offers_model->get_all_offers();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers']];
        $meta = ['page_title' => 'Offers', 'bc' => $bc ,'offers' => $offers];
        // print_r($banners);exit;
        $this->page_construct('offers/index', $meta, $this->data);
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
//        $category = $this->banners_model->get_all_categories();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers / add']];
        $meta = ['page_title' => 'add', 'bc' => $bc  ];
        // print_r($banners);exit;
        $this->page_construct('offers/add', $meta, $this->data);
    }
    public function add_offer(){
        $result=$this->offers_model->save_new_offer();
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
            redirect(admin_url("offers"));
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect(admin_url("offers/add"));
        }
    }
    public function add_static_offer(){
        $result=$this->offers_model->save_new_static_offer();
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
            redirect(admin_url("offers/static"));
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect(admin_url("offers/static_add"));
        }
    }
    public function edit($id){
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
        $offer = $this->offers_model->get_offer_by_id($id);
        $offer_products = $this->offers_model->get_offer_products($id);

        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers / edit']];
        $meta = ['page_title' => 'edit', 'bc' => $bc,'offer' => $offer ,'offer_products' => $offer_products ];
        // print_r($banners);exit;
        $this->page_construct('offers/edit', $meta, $this->data);
    }
    public function static_edit($id){
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
        $offer = $this->offers_model->get_static_offer_by_id($id);
        $offer_products = $this->offers_model->get_static_offer_products($id);

        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers / static /edit']];
        $meta = ['page_title' => 'edit', 'bc' => $bc,'offer' => $offer ,'offer_products' => $offer_products ];
        // print_r($banners);exit;
        $this->page_construct('offers/static/edit', $meta, $this->data);
    }

    public function edit_offer($id){
        $result=$this->offers_model->update_offer($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
            redirect(admin_url("offers"));
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect(admin_url("offers/edit/".$id));
        }
    }
    public function edit_static_offer($id){
        $result=$this->offers_model->update_static_offer($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
            redirect(admin_url("offers/static"));
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect(admin_url("offers/static_edit/".$id));
        }
    }
    public function delete($id){
        $result=$this->offers_model->delete_offer($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
        }else{
            $this->session->set_flashdata('error', $result['msg']);
        }
        redirect(admin_url("offers"));
    }
    public function static_delete($id){
        $result=$this->offers_model->delete_static_offer($id);
        if($result['status'] == 1){
            $this->session->set_flashdata('message', $result['msg']);
        }else{
            $this->session->set_flashdata('error', $result['msg']);
        }
        redirect(admin_url("offers/static"));
    }
    public function static(){
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

        $offers = $this->offers_model->get_all_static_offers();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers / Static']];
        $meta = ['page_title' => 'Static Offers', 'bc' => $bc ,'offers' => $offers];
        // print_r($banners);exit;
        $this->page_construct('offers/static/index', $meta, $this->data);
    }
    public function static_add(){
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
//        $category = $this->banners_model->get_all_categories();
        $bc   = [['link' => base_url(), 'page' => lang('home')], ['link' => '#', 'page' => 'Offers / static / add']];
        $meta = ['page_title' => 'add offers', 'bc' => $bc  ];
        // print_r($banners);exit;
        $this->page_construct('offers/static/add', $meta, $this->data);
    }

}