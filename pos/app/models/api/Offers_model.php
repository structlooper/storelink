<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Offers_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_offers(){
        $this->db->select('*');
        $this->db->from('sma_offers');
        $offers = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'offers' , 'data' => $offers];
    }
    public function get_all_static_offers(){
        $this->db->select('*');
        $this->db->from('sma_static_offers');
        $offers = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'static offers' , 'data' => $offers];
    }
    public function get_offer_products(){
        $offer_id = $_POST['offer_id'];
        if(is_null($offer_id) or $offer_id == ''){
            return ['status' => false,'msg' => 'enter a valid offer','data' => []];
        }
        $this->db->select('
         sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.quantity ,
          sma_products.alert_quantity ,
          sma_products.image ,
          sma_products.tax_rate ,
          sma_products.track_quantity ,
          sma_products.details ,
          sma_products.barcode_symbology ,
          sma_products.product_details ,
          sma_products.type ,
          sma_products.slug ,
          sma_products.category_id ,
          sma_products.subcategory_id ,
          sma_products.featured ,
          sma_products.weight ,
          sma_products.views ,
          sma_products.second_name ,
          sma_products.hide ,
          sma_products.hide_pos ,
          sma_products.brand 
          
        ');
        $this->db->from('sma_offer_products');
        $this->db->join('sma_products','sma_products.id = sma_offer_products.product_id');
        $this->db->join('sma_units','sma_products.unit = sma_units.id');
        $this->db->where('sma_offer_products.offer_id',$offer_id);
        $offer_products = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'offer products' ,'data' => $offer_products];
    }
    public function get_static_offer_products(){
        $offer_id = $_POST['offer_id'];
        if(is_null($offer_id) or $offer_id == ''){
            return ['status' => false,'msg' => 'enter a valid offer','data' => []];
        }
        $this->db->select('
         sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.quantity ,
          sma_products.alert_quantity ,
          sma_products.image ,
          sma_products.tax_rate ,
          sma_products.track_quantity ,
          sma_products.details ,
          sma_products.barcode_symbology ,
          sma_products.product_details ,
          sma_products.type ,
          sma_products.slug ,
          sma_products.category_id ,
          sma_products.subcategory_id ,
          sma_products.featured ,
          sma_products.weight ,
          sma_products.views ,
          sma_products.second_name ,
          sma_products.hide ,
          sma_products.hide_pos ,
          sma_products.brand 
          
        ');
        $this->db->from('sma_static_offers_products');
        $this->db->join('sma_products','sma_products.id = sma_static_offers_products.product_id');
        $this->db->join('sma_units','sma_products.unit = sma_units.id');
        $this->db->where('sma_static_offers_products.offer_id',$offer_id);
        $offer_products = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'static offer products' ,'data' => $offer_products];
    }
}
