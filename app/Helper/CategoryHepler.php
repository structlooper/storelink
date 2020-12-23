<?php


namespace App\Helper;

use DB;
class CategoryHepler
{
    public static function getSubCategoryByCategory($cat_id){
        if (!is_null($cat_id)){
            return DB::table('sma_categories')
                ->where('parent_id',$cat_id)
                ->get()->toArray();
        }else{
            return [];
        }
    }
}
