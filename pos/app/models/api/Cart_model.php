<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
       
    }
    public function check_product_cart($u_id,$p_id){
        $status = 'ADDED';
         
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$u_id' AND cart_status = '$status';");
          
        if (sizeof($user_cart->result()) > 0) {
            $cart_id = $user_cart->result()[0]->cart_id;
            $user_cart_product = $this->db->query("SELECT 
          *
          FROM sma_user_cart_products
          WHERE cart_id = '$cart_id' AND product_id = '$p_id' AND variant_id IS NULL;");
          if(sizeof($user_cart_product->result()) > 0){
                $this->db->where('cart_id', $cart_id);
             $this->db->where('product_id', $p_id);
             $this->db->update('sma_user_cart_products', ['qty' => intval($user_cart_product->result()[0]->qty)+1]);
              return array('status' => 1);
          }else{
             return array(
                'status' => 0
            );  
          }
        } else {
            return array(
                'status' => 0
            );
        }
          
    }
    
    // public function check_product_variant_cart($u_id,$p_id,$v_id){
        
    //     $status = 'ADDED';
    //     $user_cart = $this->db->query("SELECT 
    //       *
    //       FROM sma_user_cart
    //       WHERE user_id = '$u_id' AND cart_status = '$status';");
    //     if (sizeof($user_cart->result()) > 0) {
    //         $cart_id = $user_cart->result()[0]->cart_id;
            
    //         $user_cart_product = $this->db->query("SELECT 
    //       *
    //       FROM sma_user_cart_products
    //       WHERE cart_id = '$cart_id' AND product_id = '$p_id' AND variant_id = '$v_id';");
          
    //       if(sizeof($user_cart_product->result()) > 0){
    //          $this->db->where('cart_id', $cart_id);
    //          $this->db->where('product_id', $p_id);
    //          $this->db->where('variant_id', $v_id);
    //          $this->db->update('sma_user_cart_products', ['qty' => intval($user_cart_product->result()[0]->qty)+1]);
    //           return array('status' => 1);
    //       }else{
    //          return array(
    //             'status' => 0
    //         );  
    //       }
    //     } else {
    //         return array(
    //             'status' => 0
    //         );
    //     }
          
    // }
    public function add_product_cart($u_id,$p_id,$qty){
         $status = 'ADDED';
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$u_id' AND cart_status = '$status';"); 
          if (sizeof($user_cart->result()) > 0) {
               $cart_id = $user_cart->result()[0]->cart_id;
              
          }else{
              $data = ['user_id' => $u_id,'created_at' => strtotime(date('Y-m-d H:i:s'))];
              $this->db->insert('sma_user_cart',$data);
              $cart_id = $this->db->insert_id();
              
          }
           $data = [
                   'cart_id' => $cart_id,
                   'product_id' => $p_id,
                   'qty' => $qty
                   ];
                   $this->db->insert('sma_user_cart_products',$data);
          if($this->db->affected_rows() == 1){
              return true;
          }else{
             return false;
          }
    }
    
    public function add_product_variant_cart($u_id,$p_id,$v_id,$qty){
       
         $status = 'ADDED';
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$u_id' AND cart_status = '$status';"); 
          if (sizeof($user_cart->result()) > 0) {
               $cart_id = $user_cart->result()[0]->cart_id;
              
          }else{
              $data = ['user_id' => $u_id,'created_at' => strtotime(date('Y-m-d H:i:s'))];
              $this->db->insert('sma_user_cart',$data);
              $cart_id = $this->db->insert_id();
              
          }
          
           $data = [
                   'cart_id' => $cart_id,
                   'product_id' => $p_id,
                   'variant_id' => $v_id,
                   'qty' => $qty
                   ];
                   $this->db->insert('sma_user_cart_products',$data);
          if($this->db->affected_rows() == 1){
              return true;
          }else{
             return false;
          }
    }
    
    public function get_cart_data($user_id){
       $status = 'ADDED';
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$user_id' AND cart_status = '$status';"); 
          $cart = $user_cart->result()[0];
          $data['cart_id'] = $cart->cart_id;
          $data['user_id'] = $cart->user_id;
        //   $data['note'] = $cart->note;
        //   $data['cart_status'] = $cart->cart_status;
          $data['created_at'] = date('Y-m-d H:m',$cart->created_at);
        
          $products = $this->db->query("
                  SELECT 
                  sma_products.id AS product_id,
                  sma_products.code,
                  sma_products.name ,
                  sma_user_cart_products.qty ,
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
                  sma_products.hide_pos 
                  FROM sma_user_cart_products  INNER JOIN sma_products ON sma_user_cart_products.product_id = sma_products.id 
                  INNER JOIN sma_units ON sma_products.unit=sma_units.id 
                  WHERE sma_user_cart_products.cart_id = '$cart->cart_id';
                  ")->result(); 
          $data['items'] = count($products);
          
          $data['products'] = $products; 
            
        return $data;
          
    }
        public function check_product_user_cart($u_id,$p_id){
        $status = 'ADDED';
        
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$u_id' AND cart_status = '$status';");
          
        if (sizeof($user_cart->result()) > 0) {
            $cart_id = $user_cart->result()[0]->cart_id;
            $user_cart_product = $this->db->query("SELECT 
          *
          FROM sma_user_cart_products
          WHERE cart_id = '$cart_id' AND product_id = '$p_id' AND variant_id IS NULL;");
        
          if(sizeof($user_cart_product->result()) > 0){
              return array('status' => 1);
          }else{
             return array(
                'status' => 0
            );  
          }
        } else {
            return array(
                'status' => 0
            );
        }
          
    }
    // public function check_product_variant_user_cart($u_id,$p_id,$v_id){
    //     $status = 'ADDED';
        
    //     $user_cart = $this->db->query("SELECT 
    //       *
    //       FROM sma_user_cart
    //       WHERE user_id = '$u_id' AND cart_status = '$status';");
          
    //     if (sizeof($user_cart->result()) > 0) {
    //         $cart_id = $user_cart->result()[0]->cart_id;
    //         $user_cart_product = $this->db->query("SELECT 
    //       *
    //       FROM sma_user_cart_products
    //       WHERE cart_id = '$cart_id' AND product_id = '$p_id' AND variant_id = '$v_id';");
        
    //       if(sizeof($user_cart_product->result()) > 0){
    //           return array('status' => 1);
    //       }else{
    //          return array(
    //             'status' => 0
    //         );  
    //       }
    //     } else {
    //         return array(
    //             'status' => 0
    //         );
    //     }
          
    // }
    
    public function remove_product_from_cart($user_id,$product_id,$qty){
         $status = 'ADDED';
      
        $user_cart = $this->db->query("SELECT 
          *
          FROM sma_user_cart
          WHERE user_id = '$user_id' AND cart_status = '$status';"); 
          if (sizeof($user_cart->result()) > 0) {
               $cart_id = $user_cart->result()[0]->cart_id;
               $user_cart_product = $this->db->query("SELECT 
              *
              FROM sma_user_cart_products
              WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND variant_id IS NULL;");
              
               if($qty == 0 or $user_cart_product->result()[0]->qty == 1){
                  
                   $this->db->where('cart_id', $cart_id);
                   $this->db->where('product_id', $product_id);
                   $this->db->where('variant_id', null);
                   $this->db->delete('sma_user_cart_products');
                   
                   return ['status' => true, 'msg' => 'Product deleted successfully'];
               }else{
                  $this->db->where('cart_id', $cart_id);
                  $this->db->where('product_id', $product_id);
                  $this->db->where('variant_id', null);
                  $this->db->update('sma_user_cart_products', ['qty' => intval($user_cart_product->result()[0]->qty)-1]);  
                  
                   return ['status' => true, 'msg' => 'Product count decreased successfully'];
                  
               }
             
          }else{
              
              return false;
              
          }
           
    }
    // public function remove_product_variant_from_cart($user_id,$product_id,$variant_id,$qty){
    //      $status = 'ADDED';
      
    //     $user_cart = $this->db->query("SELECT 
    //       *
    //       FROM sma_user_cart
    //       WHERE user_id = '$user_id' AND cart_status = '$status';"); 
    //       if (sizeof($user_cart->result()) > 0) {
    //           $cart_id = $user_cart->result()[0]->cart_id;
    //           $user_cart_product = $this->db->query("SELECT 
    //           *
    //           FROM sma_user_cart_products
    //           WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND variant_id = '$variant_id';");
              
    //           if($qty == 0 or $user_cart_product->result()[0]->qty == 1){
                  
    //               $this->db->where('cart_id', $cart_id);
    //               $this->db->where('product_id', $product_id);
    //               $this->db->where('variant_id', $variant_id);
    //               $this->db->delete('sma_user_cart_products');
                   
    //               return ['status' => true, 'msg' => 'Product deleted successfully'];
    //           }else{
    //               $this->db->where('cart_id', $cart_id);
    //               $this->db->where('product_id', $product_id);
    //               $this->db->where('variant_id', $variant_id);
    //               $this->db->update('sma_user_cart_products', ['qty' => intval($user_cart_product->result()[0]->qty)-1]);  
                  
    //               return ['status' => true, 'msg' => 'Product count changed successfully'];
                  
    //           }
             
    //       }else{
              
    //           return false;
              
    //       }
           
    // }
    
    public function checkout_order($data){
        	       // print_r($data);exit;
        	       
        	    $this->db->select("*");
                $this->db->from("sma_user_cart");
                $this->db->where('user_id',$data["user_id"]);
                $this->db->where('cart_status','ADDED');
                $cart_data = $this->db->get()->result_array()[0];
                
                $this->db->select("sma_products.id AS product_id,
                  sma_products.code,
                  sma_products.name ,
                  sma_user_cart_products.qty ,
                  sma_units.name AS product_unit,
                  sma_products.cost ,
                  sma_products.price ,
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
                  sma_products.hide_pos ");
                $this->db->from("sma_user_cart_products");
                $this->db->join('sma_products', 'sma_products.id = sma_user_cart_products.product_id');
                $this->db->join('sma_units', 'sma_units.id = sma_products.unit');
                $this->db->where('sma_user_cart_products.cart_id',$cart_data['cart_id']);
                $cart_products = $this->db->get()->result_array();
                if(sizeof($cart_data) == 0 or sizeof($cart_products) == 0){ return ['status' => false, 'msg' => 'cart is blank' ,'data' => []];}
                
                
                $sales_data['date'] = date('Y-m-d H:i:s');        
                $sales_data['reference_no'] = 'SALE/APPLICATION'.str_replace('-', '/', date('Y-m-d'));        
                $sales_data['customer_id'] = $data['user_id'];        
                $sales_data['customer'] = 'Application-user';        
                // $sales_data['biller_id'] = 3;        
                // $sales_data['biller'] = 'Test Biller';        
                $sales_data['note'] = $data['note'];   
                $price = 0.00;
                $product_tax = 0.00;
                foreach($cart_products as $p){
                    $price += doubleval($p['price']) * intval($p['qty']);
                    $product_tax += doubleval($p['tax_rate']) * intval($p['qty']) ?? 0;
                }
                
                $sales_data['total'] = $price;
                $sales_data['product_discount'] = 0.00;
                $sales_data['product_tax'] = $product_tax;
                $sales_data['total_tax'] = $product_tax;
                $sales_data['grand_total'] = $price + $product_tax;
                $sales_data['sale_status'] = 'ORDERED';
                $sales_data['payment_status'] = strtoupper($data['payment_status']);
                $sales_data['total_items'] = count($cart_products);
                if($sales_data['payment_status'] == 'PENDING'){ $sales_data['paid'] = 0.00; }else{ $sales_data['paid'] = $sales_data['grand_total']; };
                $sales_data['api'] = 1;
                $sales_data['address_id'] = $data['address_id'];
                $sales_data['payment_method'] = $data['payment_type'];
                
                $this->db->insert('sma_sales',$sales_data);
                $sale_id = $this->db->insert_id();
                // $sale_id = 19;
                if(is_null($sale_id)){return ['status' => false,'msg' => 'order not saved' , 'data' => []];}
                foreach($cart_products as $c_p){
                    $sma_sale_items['sale_id'] = $sale_id;
                    $sma_sale_items['product_id'] = $c_p['product_id'];
                    $sma_sale_items['product_code'] = $c_p['code'];
                    $sma_sale_items['product_name'] = $c_p['name'];
                    $sma_sale_items['product_type'] = $c_p['type'];
                    $sma_sale_items['product_type'] = $c_p['type'];
                    $sma_sale_items['net_unit_price'] = $c_p['cost'];
                    $sma_sale_items['unit_price'] = $c_p['cost'];
                    $sma_sale_items['quantity'] = $c_p['qty'];
                    $sma_sale_items['item_tax'] = $c_p['tax_rate'];
                    $sma_sale_items['tax'] = $c_p['tax_rate'];
                    $sma_sale_items['subtotal'] = $c_p['price'];
                    $sma_sale_items['real_unit_price'] = $c_p['price'];
                    $sma_sale_items['product_unit_code'] = $c_p['code'];
                    $sma_sale_items['unit_quantity'] = $c_p['qty'];
                    
                    $this->db->insert('sma_sale_items',$sma_sale_items);
                    
                }
                $this->db->where('cart_id',$cart_data['cart_id']);
                $this->db->update('sma_user_cart',['cart_status' => 'COMPLETED']);
                // return $query->result_array();
                $this->db->select('*');
                $this->db->from('sma_sales');
                $this->db->where('id',$sale_id);
                $order = $this->db->get()->result_array()[0];
                
                $this->db->select('*');
                $this->db->from('sma_sale_items');
                $this->db->where('sale_id',$sale_id);
                $order_products = $this->db->get()->result_array();
                
                $order['order_products'] = $order_products;
            return ['status' => true,'msg' => 'order details' , 'data' => $order];
    }

}