@extends('layouts.app')
@section('title')
Home
@endsection

@section('content')



{{--      <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">--}}
{{--         <div class="container">--}}
{{--            <div class="row">--}}
{{--               <div class="col-md-12">--}}
{{--                  <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits & Vegetables</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </div>--}}
{{--      </section>--}}
      <section class="shop-single section-padding pt-3">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="shop-detail-slider">
                        <div class="favourite-icon">
                           <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="javascript:void(0)" data-original-title="<?php  $discountinper=100*($detailProduct[0]->cost-$detailProduct[0]->price)/ $detailProduct[0]->cost;  echo round($discountinper);?>% OFF"><i class="mdi mdi-tag-outline"></i></a>
                        </div>
                         <div id="sync1" class="owl-carousel">
                              <?php foreach($detailProduct['imagesss'] as $image) {

                            //   print_r($image);
                              ?>
                           <div class="item" style="height:100%;"><img alt="" src="{{ $data['image_url'].'assets/uploads/thumbs/'.$image->photo }}" class="img-fluid img-center"></div>
                            <?php } ?>
                           <!--<div class="item"><img alt="" src="img/item/2.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/3.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/4.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/5.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/6.jpg" class="img-fluid img-center"></div>-->
                        </div>
                        <div id="sync2" class="owl-carousel">

                           <div ><img alt="no image found" src="{{ $data['image_url'].'/assets/uploads/thumbs/'.$detailProduct[0]->image }}" class="img-fluid img-center" height="60%"></div>

                           <!--<div class="item"><img alt="" src="img/item/2.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/3.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/4.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/5.jpg" class="img-fluid img-center"></div>-->
                           <!--<div class="item"><img alt="" src="img/item/6.jpg" class="img-fluid img-center"></div>-->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shop-detail-right">
                     <span class="badge badge-success"> <?php  $discountinper=100*($detailProduct[0]->cost-$detailProduct[0]->price)/ $detailProduct[0]->cost;  echo round($discountinper);?>% OFF </span>
                     <h2><?php  print_r($detailProduct[0]->name); ?></h2>
{{--                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -  <?php print_r($unit_name); ?></h6>--}}
                     <p class="regular-price"><i class="mdi mdi-tag-outline"></i> MRP : ₹<?php  print_r(number_format((float)$detailProduct[0]->cost, 2, '.', '')); ?></p>
                     <p class="offer-price mb-0">Discounted price : <span class="text-success">₹<?php  print_r(number_format((float)$detailProduct[0]->price, 2, '.', '')); ?></span></p>
                     <a href="javascript:void(0)" class="add-product-cart{{ $detailProduct[0]->id }}"><button type="button" <?php if($detailProduct[0]->quantity<0) { ?> disabled <?php } ?> class="btn btn-secondary btn-lg add-cart-product" product_id="{{ $detailProduct[0]->id }}"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> </a>
                     <div class="short-description">
                        <h5>
                           Product Details
                           <p class="float-right">Availability: <span class="badge badge-success"><?php if($detailProduct[0]->quantity>0) { ?> In Stock <?php } else { ?> Out of stock <?php } ?></span></p>
                        </h5>
                        <p><b><?php  print_r($detailProduct[0]->name); ?></b> </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@if(isset($offer_banner))
    @foreach($offer_banner as $i => $ofr)
        @if($i === 0)
        <?php $offer_products = App\Helper\ProductHelper::getProductByOffer($ofr->offer_id);  ?>
    <section class="product-items-slider section-padding">
    <div class="container">
        <div class="section-header">
            <h5 class="heading-design-h5">{{ $ofr->offer_title }} <span class="badge badge-info">{{ $ofr->offer_amount }} <?php if($ofr->offer_type == "PERCENT") { echo '%'; }else{ echo '₹' ;}?> OFF</span>
                {{--                    <a class="float-right text-secondary" href="shop.html">View All</a>--}}
            </h5>
        </div>
        <div class="owl-carousel owl-carousel-featured">
            @if(sizeof($offer_products) > 0)
                @foreach( $offer_products as $ofrpd)
                    <div class="item">
                        <div class="product">
                            <a href="{{ route('detail',$ofrpd->slug) }}">
                                <div class="product-header">
                                    <span class="badge badge-success">{{ number_format(((intval($ofrpd->cost) - intval($ofrpd->price))*100)/intval($ofrpd->cost),2) }}% OFF</span>
                                    <img class="img-fluid" src="{{ $data['image_url'].'assets/uploads/thumbs/'.$ofrpd->image }}" alt="">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5>{{ $ofrpd->name }}</h5>
{{--                                    <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - {{ $ofrpd->product_unit }}</h6>--}}
                                </div>
                            </a>

                            <div class="product-footer">
                                <div class="add-product-cart{{$ofrpd->product_id}}">

                                    @if($ofrpd->quantity == 0)
                                        <button type="button" class="btn btn-secondary btn-sm float-right" disabled><i class="mdi mdi-cart-outline"></i> Out of Stock</button>

                                    @else
                                        <button type="button" class="btn btn-secondary btn-sm float-right add-cart-product" product_id="{{ $ofrpd->product_id }}"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>

                                    @endif
                                </div>

                                <p class="offer-price mb-0">{{ number_format(intval($ofrpd->price),2) }} ₹ <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">{{ number_format(intval($ofrpd->cost),2) }} ₹</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                No product found
            @endif


        </div>
    </div>
</section>
        @endif
    @endforeach
@endif
        <!-- Footer -->
      @endsection
