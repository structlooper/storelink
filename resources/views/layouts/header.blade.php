<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>{{ $data['site_settings']->site_name }} | @yield('title')  </title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ $data['logo_url']  }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="{{ asset('website/vendor/icons/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- Select2 CSS -->
    <link href="{{ asset('website/vendor/select2/css/select2-bootstrap.css') }}" />
    <link href="{{ asset('website/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('website/css/osahan.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('website/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('website/vendor/owl-carousel/owl.theme.css') }}">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0ztr7esW-B9pyRKUYEa5d8CxLPnCdtdA&callback=initMap&libraries=places&v=weekly"
        defer
    ></script>
    <style>
        .width_mix {
            max-width: 180px;
            min-width: 180px;
            max-height: 47px;
            min-height: 47px;
            overflow: hidden;
            /*overflow-y: hidden;*/
            text-overflow: ellipsis;

        }
        #partitioned {
            padding-left: 15px;
            letter-spacing: 42px;
            border: 0;
            background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-size: 50px 1px;
            background-repeat: repeat-x;
            background-position-x: 35px;
            width: 300px;
        }
        .clear{
            clear:both;
            margin-top: 20px;
        }

        #searchResult{
            list-style: none;
            padding: 0px;
            width: 250px;
            position: absolute;
            margin: 0;
        }

        #searchResult li{
            background: lavender;
            padding: 4px;
            margin-bottom: 1px;
        }

        #searchResult li:nth-child(even){
            background: cadetblue;
            color: white;
        }

        #searchResult li:hover{
            cursor: pointer;
        }

        input[type=text]{
            padding: 5px;
            width: 250px;
            letter-spacing: 1px;
        }
    </style>
@yield('style')

</head>
<body>
<div class="modal fade login-modal-main" id="bd-example-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-modal">
                    <div class="row">
                        <div class="col-lg-6 pad-right-0">
                            <div class="login-modal-left" >
                                <img src="{{ $data['logo_url'] }}">
                            </div>
                        </div>
                        <div class="col-lg-6 pad-left-0">
                            <button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                <span class="sr-only">Close</span>
                            </button>
{{--                            <form>--}}
                                <div class="login-modal-right">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="login" role="tabpanel">
                                            <h5 class="heading-design-h5">Login to your account</h5>
                                            <div id="phone_section">

                                                <fieldset class="form-group">
                                                    <label>Enter Mobile number</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">+91</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Enter phone number" id="login_number" minlength="10" maxlength="10">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="button" class="btn btn-lg btn-secondary btn-block btn-login" onclick="submitPhoneNumberAuth()">Next</button>
                                                </fieldset>
                                                <div id="recaptcha-container"></div>
                                            </div>
                                            <div id="otp_section" style="display: none">

                                                <fieldset class="form-group">
                                                    <label>Enter Otp</label>
                                                    <div class="input-group mb-3">

                                                        <input type="text" class="" id="partitioned"  maxlength="6">
                                                    </div>
                                                </fieldset>
                                                    <fieldset class="form-group">
                                                        <button type="button" class="btn btn-lg btn-secondary btn-block btn-login" onclick="submitPhoneNumberAuthCode()">Next</button>
                                                    </fieldset>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                </div>
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="navbar-top bg-success pt-2 pb-2">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 text-center">--}}
{{--                <a href="shop.html" class="mb-0 text-white">--}}
{{--                    20% cashback for new users | Code: <strong><span class="text-light">OGOFERS13 <span class="mdi mdi-tag-faces"></span></span> </strong>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<nav class="navbar   navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"> <img src="{{ $data['logo_url']  }}" alt="logo" width="80"> </a>
        <a class="location-top location" style="max-width: 193px; max-height:27px; overflow: hidden" href="javascript:void(0)"><i class="mdi mdi-map-marker-circle " aria-hidden="true"></i> My location</a>
        <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
                <div class="top-categories-search">
                    <div class="input-group">
{{--                        <span class="input-group-btn categories-dropdown">--}}
{{--                           <select class="form-control-select">--}}
{{--                                 @if($data['categories'])--}}
{{--                                   @foreach($data['categories'] as $cat)--}}
{{--                                       <option >{{ str_replace('&amp;','&', $cat->name) }}</option>--}}
{{--                                   @endforeach--}}
{{--                               @else--}}
{{--                                   <option >Categories</option>--}}
{{--                               @endif--}}

{{--                           </select>--}}
{{--                        </span>--}}

                        <input class="form-control" id="search_prod"  name="search_prod" placeholder="Search products in Your City" aria-label="Search products in Your City" type="text">

                        <span class="input-group-btn" id="search_btn">

                        <button class="btn btn-secondary" type="button"  onclick="search_btn_1()"> <i class="mdi mdi-file-find" ></i> Search</button>
                        </span>

                    </div>
                </div>
            </div>

            <div class="my-2 my-lg-0">
                <ul class="list-inline main-nav-right">
                    @if(is_null(Session::get('user_data')))
                    <li class="list-inline-item">
                        <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="btn btn-link"><i class="mdi mdi-account-circle"></i> Login/Sign Up </a>
                    </li>
                    @else
                    <li class="list-inline-item dropdown text-light">
                        <a class=" dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-account-circle"></i><span class="text-white" >@if(Session::get('user_data')['first_name'] == null or Session::get('user_data')['first_name'] == 'null') {{Session::get('user_data')['phone'] }} @else {{ Session::get('user_data')['first_name'] }} @endif </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-account" aria-hidden="true"></i>  My Profile</a>
                            <a class="dropdown-item" href="{{ route('address') }}"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>  My Address</a>
{{--                            <a class="dropdown-item" href="wishlist.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>  Wish List </a>--}}
                            <a class="dropdown-item" href="{{ route('orders')}}"><i class="mdi mdi-truck" aria-hidden="true"></i>  Order List</a>
                            <a class="dropdown-item log-out-button" href="javascript:void(0)" id="log-out-button"><i class="mdi mdi-logout" aria-hidden="true"></i>  Logout</a>
                        </div>
                    </li>
                    @endif
                    <li class="list-inline-item cart-btn">
                        <a href="javascript:void(0)" data-toggle="offcanvas" class="btn btn-link border-none" id="cart-item"><i class="mdi mdi-cart"></i> My Cart <small class="cart-value">0</small></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container ">
    <ul class="list-group" style=" margin-left: 225px;
    max-width: 550px;" id="result">


    </ul>
</div>
<nav class="navbar   navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile" @if(Request::url() == route('home')) style="display: none;" @endif id="fixNav" style="margin-bottom: -2px;">

    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link shop" href="javascript:void(0)"><span class="mdi mdi-store"></span> Super Store</a>--}}
{{--                </li>--}}


                @foreach( $data['categories'] as $cat)

{{--                    <li class="nav-item dropdown text-center" >--}}
{{--                        <div class="width_mix">--}}
{{--                    <a class="nav-link dropdown-toggle" href="{{ route('shop_main',$cat->slug) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        {{ str_replace('&amp;','&', $cat->name) }}--}}
{{--                    </a>--}}
{{--                        <?php $subcat = App\Helper\CategoryHepler::getSubCategoryByCategory($cat->id);  ?>--}}

{{--                    <div class="dropdown-menu" >--}}
{{--                        @if(sizeof($subcat) > 0)--}}
{{--                        @foreach($subcat as $sub)--}}
{{--                        <a class="dropdown-item" href="{{ $data['image_url'] }}../shop/{{$sub->slug}}"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>  {{ $sub->name }}</a>--}}
{{--                        @endforeach--}}
{{--                        @endif--}}

{{--                    </div>--}}
{{--                        </div>--}}
{{--                </li>--}}
                    <li class=" text-center" >
                        <div class="width_mix">
                    <a class="nav-link dropdown" href="{{ route('shop_main',$cat->slug) }}" >
                        {{ str_replace('&amp;','&', $cat->name) }}
                    </a>

                        </div>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
</nav>

