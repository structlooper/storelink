@extends('layouts.app')
@section('title')
Home
@endsection

@section('content')
    <section class="top-category section-padding">
        <div class="container">
            <div class="owl-carousel owl-carousel-category">
                @foreach($cat as $c)
                    <div class="item">
                        <div class="category-item">
                            <a href="{{ route('shop_main',$c->slug) }}">
                                <img class="img-fluid" src="{{ $c->image ? $data['image_url'].'/assets/uploads/thumbs/'.$c->image: asset('website/img/slider/slider2.jpg') }}" alt="">
                                <h6>{{ str_replace('&amp;','&',$c->name) }}</h6>
                                <p class="badge badge-success">{{ $c->title }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

<section class="carousel-slider-main text-center border-top border-bottom bg-white">
    <div class="owl-carousel owl-carousel-slider">
        @foreach( $cat_banner as $key => $bnr)
        <div class="item">
            <a href="{{ route('shop_main',$bnr->slug) }}"><img class="img-fluid" src="{{ $bnr->image }}" alt="First slide" ></a>
        </div>
            @endforeach

    </div>
</section>

@if(isset($offer_banner))
@foreach($offer_banner as $i => $ofr)
    <?php $offer_products = App\Helper\ProductHelper::getProductByOffer($ofr->offer_id);  ?>

@if( $i == 1)
    <section class="carousel-slider-main text-center border-top border-bottom bg-white">
        <div class="owl-carousel owl-carousel-slider">
            @foreach( $brand_banner as $key => $bnr)

                <div class="item">
                    <a href="{{ url('brands').'/'.$bnr->slug }}"><img class="img-fluid" src="{{ $bnr->image }}" alt="First slide"></a>
                </div>
            @endforeach

        </div>
    </section>
@elseif( $i == 0)
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
                                <img class="img-fluid" src="{{ $data['image_url'].'/assets/uploads/thumbs/'.$ofrpd->image }}" alt="">
                                <span class="veg text-success mdi mdi-circle"></span>
                            </div>
                            <div class="product-body">
                                <h5>{{ $ofrpd->name }}</h5>
                                <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - {{ $ofrpd->product_unit }}</h6>
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

@else
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">{{ $ofr->offer_title }} <span class="badge badge-primary">{{ $ofr->offer_amount }} <?php if($ofr->offer_type == "PERCENT") { echo '%'; }else{ echo '₹' ;}?> OFF</span>
{{--                    <a class="float-right text-secondary" href="shop.html">View All</a>--}}
                </h5>
            </div>
            <div class="row no-gutters">

            @if(sizeof($offer_products) > 0)
                @foreach( $offer_products as $j => $ofrpd)
                        <div class="col-md-3">
                            <div class="product">
                                <a href="{{ route('detail',$ofrpd->slug) }}">
                                    <div class="product-header">
                                        <span class="badge badge-success">{{ number_format(((intval($ofrpd->cost) - intval($ofrpd->price))*100)/intval($ofrpd->cost),2) }}% OFF</span>
                                        <img class="img-fluid" src="{{ $data['image_url'].'/assets/uploads/thumbs/'.$ofrpd->image }}" alt="">
                                        <span class="veg text-success mdi mdi-circle"></span>
                                    </div>
                                    <div class="product-body">
                                        <h5>{{ $ofrpd->name }}</h5>
                                        <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - {{ $ofrpd->product_unit }}</h6>
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
            @endif
            </div>


        </div>
    </section>

@endif
@endforeach
@endif
{{--<section class="offer-product">--}}
{{--    <div class="container">--}}
{{--        <div class="row no-gutters">--}}
{{--            <div class="col-md-6">--}}
{{--                <a href="#"><img class="img-fluid" src="{{ asset('website/img/ad/1.jpg') }}" alt=""></a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <a href="#"><img class="img-fluid" src="{{ asset('website/img/ad/2.jpg') }}" alt=""></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="section-padding bg-white border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-truck-fast"></i>
                    <h6>Free & Same Day Delivery</h6>
{{--                    <p>Lorem ipsum dolor sit amet, cons...</p>--}}
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-basket"></i>
                    <h6>100% Satisfaction Guarantee</h6>
{{--                    <p>Rorem Ipsum Dolor sit amet, cons...</p>--}}
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-tag-heart"></i>
                    <h6>Great Daily Deals Discount</h6>
{{--                    <p>Sorem Ipsum Dolor sit amet, Cons...</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
