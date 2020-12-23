<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_product_by_category($category_id){
          $products = $this->db->query("SELECT 
          sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.alert_quantity ,
          sma_products.quantity ,
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
          sma_products.hide_pos 
          
          
          FROM sma_products
          INNER JOIN sma_units ON sma_products.unit=sma_units.id
          WHERE sma_products.category_id = '$category_id' AND base_product_id IS NULL;");
        if (!is_null($products)) {
            return ['products' => $products->result()];
        } else {
            return array(
                'products' => []
            );
        }
    }
  
    public function get_product_by_subcategory($category_id,$sub_category_id){
          $products = $this->db->query("SELECT 
          sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.alert_quantity ,
          sma_products.quantity ,
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
          sma_products.hide_pos 
          
          
          FROM sma_products
          INNER JOIN sma_units ON sma_products.unit=sma_units.id
          WHERE sma_products.category_id = '$category_id' AND sma_products.subcategory_id ='$sub_category_id' AND base_product_id IS NULL");
        if (!is_null($products)) {
            return ( ['products' => $products->result()]);
        } else {
            return array(
                'products' => []
            );
        }
    }
    public function get_product_images($product_id){
        $product_images = $this->db->query("SELECT * FROM sma_product_photos WHERE product_id = '$product_id';");
         if (!is_null($product_images)) {
            return ( ['images' => $product_images->result()]);
        } else {
            return array(
                'images' => []
            );
        }
    }
    
    public function get_product_varients($product_id){
       $product_variants =  $this->db->query("SELECT 
          sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.alert_quantity ,
          sma_products.quantity ,
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
          sma_products.hide_pos 
          
          
          FROM sma_products
          INNER JOIN sma_units ON sma_products.unit=sma_units.id
          WHERE  sma_products.base_product_id = '$product_id'");
         if (!is_null($product_variants)) {
            return ( ['product_variants' => $product_variants->result()]);
        } else {
            return array(
                'product_variants' => []
            );
        } 
    }
    
    public function get_product_details(){
         $products = $this->db->query("SELECT * FROM sma_products WHERE base_product_id IS NULL ;")->result();
         return $products;
         
    }
    public function get_product_by_brand(){
        $brand_id = $_POST['brand_id'];
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
        $this->db->from('sma_products');
        $this->db->join('sma_units','sma_products.unit = sma_units.id');
        $this->db->where('sma_products.brand',$brand_id);
        $products=$this->db->get()->result_array();
        
        return ['status' => true, 'msg' => 'products by brand' , 'data' => $products];
    }
    public function get_product_search(){
        $search_query = $_POST['search_query'];
        $this->db->select('
        sma_products.id AS product_id,
          sma_products.code,
          sma_products.name ,
          sma_units.name AS product_unit,
          sma_products.cost ,
          sma_products.price ,
          sma_products.alert_quantity ,
          sma_products.quantity ,
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
        $this->db->from('sma_products');
        $this->db->join('sma_units','sma_products.unit = sma_units.id');
        $this->db->like('sma_products.name', $search_query);
        $this->db->or_like('sma_products.code', $search_query);
        $this->db->or_like('sma_products.barcode_symbology', $search_query);
        
        $products=$this->db->get()->result_array();
        if(sizeof($products)>0){
            foreach($products as $prod){
                $this->db->select('
                sma_products.id AS product_id,
                  sma_products.code,
                  sma_products.name ,
                  sma_units.name AS product_unit,
                  sma_products.cost ,
                  sma_products.price ,
                  sma_products.alert_quantity ,
                  sma_products.quantity ,
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
                $this->db->from('sma_products');
                $this->db->join('sma_units','sma_products.unit = sma_units.id');
                $this->db->where('base_product_id',$prod['product_id']);
                $product_vari = $this->db->get()->result_array()[0];
                $new['product_id'] = $prod['product_id'];
                $new['code'] = $prod['code'];
                $new['name'] = $prod['name'];
                $new['product_unit'] = $prod['product_unit'];
                $new['cost'] = $prod['cost'];
                $new['price'] = $prod['price'];
                $new['alert_quantity'] = $prod['alert_quantity'];
                $new['quantity'] = $prod['quantity'];
                $new['image'] = $prod['image'];
                $new['tax_rate'] = $prod['tax_rate'];
                $new['track_quantity'] = $prod['track_quantity'];
                $new['details'] = $prod['details'];
                $new['barcode_symbology'] = $prod['barcode_symbology'];
                $new['product_details'] = $prod['product_details'];
                $new['type'] = $prod['type'];
                $new['slug'] = $prod['slug'];
                $new['category_id'] = $prod['category_id'];
                $new['subcategory_id'] = $prod['subcategory_id'];
                $new['featured'] = $prod['featured'];
                $new['weight'] = $prod['weight'];
                $new['views'] = $prod['views'];
                $new['second_name'] = $prod['second_name'];
                $new['hide'] = $prod['hide'];
                $new['hide_pos'] = $prod['hide_pos'];
                $new['brand'] = $prod['brand'];
                if(sizeof($product_vari)>0){
                    $new['product_variants'] = $product_vari;
                }else{
                    $new['product_variants'] = [];
                }
                $final_result[] = $new;
            }
        }
        
        return ['status' => true, 'msg' => 'products by search' , 'data' => $final_result];
        
    }
    public function get_product_details_by_id($product_id){
        $this->db->select('*');
        $this->db->from('sma_products');
        $this->db->where('id',$product_id);
        $produc_details = $this->db->get()->result_array()[0];
        return ['status' => true,'msg' => 'product details' , 'data' => $produc_details];


    }
    public function get_product_details_id($product_id){

        $this->db->select('
                sma_products.id AS product_id,
                  sma_products.code,
                  sma_products.name ,
                  sma_units.name AS product_unit,
                  sma_products.cost ,
                  sma_products.price ,
                  sma_products.alert_quantity ,
                  sma_products.quantity ,
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
        $this->db->from('sma_products');
        $this->db->join('sma_units','sma_products.unit = sma_units.id');
        $this->db->where('sma_products.id',$product_id);
        $produc_details = $this->db->get()->result_array()[0];
        return ['status' => true,'msg' => 'product details' , 'data' => $produc_details];
    }

    public function get_product_image_id($product_id){

        $this->db->select('
                
                  image 
                
                ');
        $this->db->from('sma_products');
        $this->db->where('id',$product_id);
        $produc_details = $this->db->get()->result_array()[0];
        return ['status' => true,'msg' => 'product image' , 'data' => $produc_details];
    }

}