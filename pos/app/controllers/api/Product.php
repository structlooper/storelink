<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Product extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
         $this->load->api_model('Product_model');
         $this->load->api_model('Category_model');
       
	}
	public function index_get($product_id){
	    $result = $this->Product_model->get_product_details_id($product_id);
	    $this->response($result);
    }
    public function image_get($product_id){
	    $result = $this->Product_model->get_product_image_id($product_id);
	    $this->response($result);
    }
    
    public function index_post(){
        $category_id = $_POST['category_id'];
        $sub_category_id = $_POST['sub_category_id'];
        if($category_id == null or $category_id == '' or $category_id == 'null'){
            $this->response(['status' => false,'msg' => 'Category_id should not be null','data' => []]);
        }else{
        $check_valid_category = $this->Category_model->check_category_by_id($category_id);
            if(sizeof($check_valid_category['Categories'])>0){
                 if($sub_category_id == null or $sub_category_id == '' or $sub_category_id == 'null'){
                    $products = $this->Product_model->get_product_by_category($category_id);
                }else{
                    $products = $this->Product_model->get_product_by_subcategory($category_id,$sub_category_id);
                }

            foreach($products['products'] as  $prod){
                            
                $product_variants = $this->Product_model->get_product_varients($prod->product_id);
                // print_r($product_variants['product_variants']);exit;
                $new['product_id'] = $prod->product_id;
                $new['code'] = $prod->code;
                $new['name'] = $prod->name;
                $new['product_unit'] = $prod->product_unit;
                $new['cost'] = $prod->cost;
                $new['price'] = $prod->price;
                $new['alert_quantity'] = $prod->alert_quantity;
                $new['quantity'] = $prod->quantity ? $prod->quantity : "0.00";
                $new['image'] = $prod->image;
                $new['tax_rate'] = $prod->tax_rate;
                $new['track_quantity'] = $prod->track_quantity;
                $new['details'] = $prod->details;
                $new['barcode_symbology'] = $prod->barcode_symbology;
                $new['product_details'] = $prod->product_details;
                $new['type'] = $prod->type;
                $new['slug'] = $prod->slug;
                $new['category_id'] = $prod->category_id;
                $new['subcategory_id'] = $prod->subcategory_id;
                $new['featured'] = $prod->featured;
                $new['weight'] = $prod->weight;
                $new['views'] = $prod->views;
                $new['second_name'] = $prod->second_name;
                $new['hide'] = $prod->hide;
                $new['hide_pos'] = $prod->hide_pos;
                $new['product_variants'] = $product_variants['product_variants'];
                $productss[] = $new;
            }
            //   print_r($productss);exit;
            $this->response(['status' => true,'msg' => 'Products','data' => $productss]);
            }else{
            $this->response(['status' => false,'msg' => 'Please enter a valid category','data' => []]);
            }
        }
        
      

    }
    public function images_post(){
        $product_id = $_POST['product_id'];
        $product_images = $this->Product_model->get_product_images($product_id);
        $this->response(['status' => true,'msg' => 'Product Images','data' => $product_images['images']]);
    }
    
    public function ajax_product_get(){
        $result = $this->Product_model->get_product_details();
        if(sizeof($result) > 0){
            $this->response(['status' => true,'msg' => 'products','data' => $result]);
        }else{
            $this->response(['status' => false, 'msg' => 'products not found','data' => []]);
        }

    }
    public function product_brand_post(){
        $result = $this->Product_model->get_product_by_brand();
        $this->response($result);
        
    }
    public function search_post(){
        $result = $this->Product_model->get_product_search();
        $this->response($result);
    }
  
}