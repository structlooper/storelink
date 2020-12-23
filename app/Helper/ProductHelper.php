<?php


namespace App\Helper;
use DB;

class ProductHelper
{
    public static function getProductByOffer($offer_id){
        if (!is_null($offer_id)){
            return DB::table('sma_offer_products')
                ->select(
                    'sma_products.id as product_id',
                    'sma_products.code',
                    'sma_products.name',
                    'sma_units.name as product_unit',
                    'sma_products.cost',
                    'sma_products.price',
                    'sma_products.alert_quantity',
                    'sma_products.quantity',
                    'sma_products.image',
                    'sma_products.tax_rate',
                    'sma_products.track_quantity',
                    'sma_products.details',
                    'sma_products.barcode_symbology',
                    'sma_products.product_details',
                    'sma_products.type',
                    'sma_products.slug',
                    'sma_products.category_id',
                    'sma_products.subcategory_id',
                    'sma_products.featured',
                    'sma_products.weight',
                    'sma_products.views',
                    'sma_products.second_name',
                    'sma_products.hide',
                    'sma_products.hide_pos',
                    'sma_products.brand'
                )
                ->join('sma_products','sma_products.id','=','sma_offer_products.product_id')
                ->join('sma_units','sma_units.id','=','sma_products.unit')
                ->where('sma_offer_products.offer_id',$offer_id)

                ->get()->toArray();
        }else{
            return [];
        }
    }

}
