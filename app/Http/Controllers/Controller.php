<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use View;

class Controller extends BaseController
{
    public function __construct()
    {
        $data['image_url'] = url('/pos/');
           
        $data['image_url'] = $data['image_url'] . '/';
        $data['site_settings'] = DB::table('sma_settings')
            ->first();
        $data['categories'] = DB::table('sma_categories')
            ->where('parent_id',0)
            ->orwhere('parent_id',null)
            ->inRandomOrder()
            ->limit(7)
            ->get();
        $data['brands'] = DB::table('sma_brands')
//            ->where('parent_id',0)
//            ->orwhere('parent_id',null)
            ->inRandomOrder()
            ->get();
        $data['shop_settings'] = DB::table('sma_shop_settings')
            ->where('shop_id',1)
            ->first();
            $data['logo_url'] = url('/pos/assets/uploads/logos/'.$data['shop_settings']->logo);
        View::share('data', $data);
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
