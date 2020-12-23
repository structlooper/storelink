<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brands_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_brands(){
        $this->db->select('*');
        $this->db->from('sma_brands');
        $brands = $this->db->get()->result_array();
        return ['status' =>true,'msg'=> 'brands','data' =>$brands];
    }
    public function get_brands_by_id(){
        $this->db->select('*');
        $this->db->from('sma_brands');
        $this->db->where('id',$_POST['brand_id']);
        $brands = $this->db->get()->result_array()[0];
        return ['status' => true,'msg'=>'brand details' ,'data' => $brands];
    }
}