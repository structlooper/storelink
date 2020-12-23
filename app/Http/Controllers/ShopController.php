<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ShopController extends Controller
{
    //
   public function category(Request $req)
   {


    $catId=DB::SELECT("SELECT * FROM `sma_categories` WHERE `slug`='$req->slug'");
    $cateId=$catId[0]->id;
    $parentId=$catId[0]->parent_id;
    $allSubCat['subCatAll']=DB::SELECT("SELECT `name`,`id`,`slug` FROM `sma_categories` WHERE `parent_id`='$parentId'");

    // sma_products
    $products['allProduct'] = DB::table('sma_products')->where('subcategory_id', $cateId)->get();
    // $prodId=$products['allProduct'][0]->unit;
    // echo $prodId;
    // $products['allProduct'] = DB::table('sma_units')->where('id', $prodId)->get();
    // exit;
    $products['catdata']=$catId;

    if (sizeof($products) >0) {


        // $newarr=array();
        foreach($products['allProduct'] as $p)
        {
            // print_r($p);
            // exit;
            $UNitIDd=$p->unit;
          $unitCode=DB::table('sma_units')->where('id', $UNitIDd)->get();
          $unitName=$unitCode[0]->name;
        //   $products['allProduct']['unit'][]=$unitCode;
        $p->unit=$unitName;
        $newarr['allProduct'][]=$p;


        }
        $newarr['catdata']=$catId;
        // print_r($newarr);
          $newarr['brands']=DB::table('sma_brands')->inRandomOrder()->limit(6)->get();
        $newarr['randcat']=DB::table('sma_categories')->inRandomOrder()->limit(6)->get();


        //   $products['allProduct']['unit']=$unitCode;
        //   print_r($products['allProduct']['unit']);
        //   exit;
        // return view('shop')->with($products);

// print_r($newarr['allProduct']);
// exit;
        return view('shop')->with($newarr)->with($allSubCat);


    }else{
        return redirect('/')->with('error','No product for this category');
    }
   }

    public function brands(Request $req)
   {
$branddata=DB::SELECT("SELECT * FROM `sma_brands` WHERE `slug`='$req->slug'");
    $brandId=$branddata[0]->id;

    $catId=DB::SELECT("SELECT * FROM `sma_categories` WHERE `id`=11");
    // print_r($catId);
    // exit;
    $cateId=$catId[0]->id;
    $parentId=$catId[0]->parent_id;
    $allSubCat['subCatAll']=DB::SELECT("SELECT `name`,`id`,`slug`,`image` FROM `sma_categories` WHERE `parent_id`='$parentId'");

    // sma_products
    $products['allProduct'] = DB::table('sma_products')->where('brand', $brandId)->get();

    // $prodId=$products['allProduct'][0]->unit;
    // echo $prodId;
    // $products['allProduct'] = DB::table('sma_units')->where('id', $prodId)->get();
    // exit;
    $products['catdata']=$catId;

    if (sizeof($products) >0) {

        $products['brands']=DB::table('sma_brands')->inRandomOrder()->limit(6)->get();
        $products['randcat']=DB::table('sma_categories')->inRandomOrder()->limit(6)->get();
        // return view('shop')->with($products);

        return view('shop')->with($products)->with($allSubCat);


    }else{
        return redirect('/')->with('error','No product for this category');
    }
   }

















   public function categorym(Request $req)
   {


    $catId=DB::SELECT("SELECT * FROM `sma_categories` WHERE `slug`='$req->slug'");
    $cateId=$catId[0]->id;
    // $parentId=$catId[0]->parent_id;
    $allSubCat['subCatAll']=DB::SELECT("SELECT `name`,`id`,`slug`,`image` FROM `sma_categories` WHERE `parent_id`='$cateId'");

    // sma_products
    $products['allProduct'] = DB::table('sma_products')->where('category_id', $cateId)->get();
    // $prodId=$products['allProduct'][0]->unit;
    // echo $prodId;
    // $products['allProduct'] = DB::table('sma_units')->where('id', $prodId)->get();
    // exit;
    $products['catdata']=$catId;

    if (sizeof($products) >0) {

        $products['brands']=DB::table('sma_brands')->inRandomOrder()->limit(6)->get();
        $products['randcat']=DB::table('sma_categories')->inRandomOrder()->limit(6)->get();
        // return view('shop')->with($products);

        return view('shop')->with($products)->with($allSubCat);


    }else{
        return redirect('/')->with('error','No product for this category');
    }
   }

   public function bycat(Request $req)
   {

   }


   public function detail(Request $req)
   {
    $slugId=$req->slug;
    $products['detailProduct'] = DB::table('sma_products')->where('slug', $slugId)->get();
  $prodId=$products['detailProduct'][0]->id;

        $productsi = DB::table('sma_product_photos')->where('product_id', $prodId)->get();
        // print_r($prodId);
        // print_r($productsi);
        // exit;
        $products['detailProduct']['imagesss']=$productsi;
        $unitId=$products['detailProduct'][0]->unit;
         $unitdata = DB::table('sma_units')->where('id', $unitId)->get();
         $products['unit_code']=$unitdata[0]->code;
          $products['unit_name']=$unitdata[0]->name;
        // $products[uni]

       $data['offer_banner'] = DB::table('sma_offers')
           ->inRandomOrder()
           ->limit(2)
           ->get();

    if (sizeof($products) >0) {


        // return view('shop')->with($products);

        return view('single')->with($products)->with($data);


    }else{
        return redirect('/')->with('error','details not available try again ');
    }
   }

  public function ajaxD(Request $request)
   {




       #create or update your data here

       return response()->json(['success'=>'Ajax request submitted successfully']);
   }

}
