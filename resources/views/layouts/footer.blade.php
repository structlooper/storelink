
<!-- Footer -->
<section class="section-padding footer bg-white border-top" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h4 class="mb-5 mt-0"><a class="logo" href="{{route('home')}}"><img src="{{ $data['logo_url'] }}" alt="tbo"></a></h4>
                <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-phone"></i> {{ $data['shop_settings']->phone }}</a></p>
{{--                <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-cellphone-iphone"></i> 12345 67890, 56847-98562</a></p>--}}
                <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> {{ $data['shop_settings']->email }}</a></p>
{{--                <p class="mb-0"><a class="text-primary" href="#"><i class="mdi mdi-web"></i> www.askbootstrap.com</a></p>--}}
            </div>
            <div class="col-lg-2 col-md-2">
                <h6 class="mb-4">TOP Brands </h6>
                <ul>
                    @if($data['brands'])
                        @foreach($data['brands'] as $bnd)
                            @if(is_null($bnd->slug ))
                            @else
                            <li><a href="{{ route('brands',$bnd->slug ? $bnd->slug :'7up' ) }}">{{ $bnd->name }}</a></li>
                            @endif
                        @endforeach
                    @else
                        <li>No brands to show</li>
                    @endif
                    <ul>
            </div>
            <div class="col-lg-2 col-md-2">
                <h6 class="mb-4">CATEGORIES</h6>
                <ul>
                    @if($data['categories'])
                        @foreach($data['categories'] as $cat)
                    <li><a href="{{ route('shop_main',$cat->slug) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    @else
                        <li>No categories to show</li>
                    @endif
                    <ul>
            </div>
            <div class="col-lg-2 col-md-2">
                <h6 class="mb-4">ABOUT</h6>
                <ul>
                    <li><a href="javascript:void(0)">About us</a></li>
                    <li><a href="{{route('privacy_Policy')}}">Privacy policy</a></li>
                    <li><a href="javascript:void(0)">Return policy</a></li>

{{--                    <li><a href="#">Copyright</a></li>--}}
                    <ul>
            </div>
            <div class="col-lg-3 col-md-3">
                <h6 class="mb-4">Download App</h6>
                <div class="app">
                    <a href="#"><img src="{{ asset('website/img/google.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website/img/apple.png') }}" alt=""></a>
                </div>
{{--                <h6 class="mb-3 mt-4">GET IN TOUCH</h6>--}}
{{--                <div class="footer-social">--}}
{{--                    <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>--}}
{{--                    <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>--}}
{{--                    <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>--}}
{{--                    <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>--}}
{{--                    <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>--}}
{{--                    <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>
<!-- End Footer -->
<!-- Copyright -->
<section class="pt-4 pb-4 footer-bottom">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">{{ $data['site_settings']->site_name }}</strong>. All Rights Reserved<br>
                    <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a href="javascript:void(0)" target="_blank" class="text-primary">Sikarwar Software</a>
                    </small>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right">
                <img alt="osahan logo" src="{{ asset('website/img/payment_methods.png') }}">
            </div>
        </div>
    </div>
</section>
<!-- End Copyright -->

<div class="footer-fix-nav shadow">
    <div class="row mx-0">
        <div class="col @if(Request::url() == route('home')) active @endif">
            <a href="{{ route('home') }}"><i class="mdi mdi-home"></i></a>
        </div>
        <div class="col border-0 @if(Request::url() == route('address')) active @endif">
            <a href="{{ route('address') }}"><i class="mdi mdi-account-location"></i></a>
        </div>
        <div class="col">
            <a data-toggle="collapse" data-target="#navbarText" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
        </div>
        <div class="col @if(Request::url() == route('orders')) active @endif">
            <a href="{{ route('orders') }}"><i class="mdi mdi-truck"></i></a>
        </div>
        <div class="col @if(Request::url() == route('profile')) active @endif">
            <a href="{{ route('profile') }}"><i class="mdi mdi-account-circle"></i></a>
        </div>
    </div>
</div>
{{--<nav id="main-nav">--}}

{{--    <ul class="first-nav">--}}
{{--        <li class="search" data-nav-custom-content>--}}
{{--            <div class="form-container">--}}
{{--                <form class="search-form" action="https://www.google.com/search" target="_blank" method="get">--}}
{{--                    <input type="text" name="q" placeholder="Search..." autocomplete="off">--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="cryptocurrency">--}}
{{--            <a href="#" target="_blank">All Fruits</a>--}}
{{--            <ul>--}}
{{--                <li><a href="#">Fresh & Herbs</a></li>--}}
{{--                <li><a href="#">Seasonal Fruits</a></li>--}}
{{--                <li class="add">--}}
{{--                    <a href="#" data-nav-close="false" data-add="['Litecoin','Dogecoin','Bitcoin Cash','ZCash']">Add Coin</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <ul class="second-nav">--}}
{{--        <li class="devices">--}}
{{--            <span>Imported Fruits</span>--}}
{{--            <ul>--}}
{{--                <li class="mobile">--}}
{{--                    <a href="#">Citrus</a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">Super Smart Phone</a></li>--}}
{{--                        <li><a href="#">Thin Magic Mobile</a></li>--}}
{{--                        <li><a href="#">Performance Crusher</a></li>--}}
{{--                        <li><a href="#">Futuristic Experience</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="television">--}}
{{--                    <a href="#">Cut Fresh & Herbs</a>--}}
{{--                    <div class="subnav-container">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">Flat Superscreen</a></li>--}}
{{--                            <li><a href="#">Gigantic LED</a></li>--}}
{{--                            <li><a href="#">Power Eater</a></li>--}}
{{--                            <li><a href="#">3D Experience</a></li>--}}
{{--                            <li><a href="#">Classic Comfort</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="camera">--}}
{{--                    <a href="#">Seasonal Fruits</a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">Smart Shot</a></li>--}}
{{--                        <li><a href="#">Power Shooter</a></li>--}}
{{--                        <li><a href="#">Easy Photo Maker</a></li>--}}
{{--                        <li><a href="#">Super Pixel</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li data-nav-custom-content>--}}
{{--                    <div class="custom-message">--}}
{{--                        You can add any custom content to your navigation items. This text is just an example.--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="magazines">--}}
{{--            <a href="#magazines">Fresh & Herbs</a>--}}
{{--            <ul>--}}
{{--                <li><a href="#">National Geographic</a></li>--}}
{{--                <li><a href="#">Scientific American</a></li>--}}
{{--                <li><a href="#">The Spectator</a></li>--}}
{{--                <li><a href="#">The Rambler</a></li>--}}
{{--                <li><a href="#">Physics World</a></li>--}}
{{--                <li><a href="#">Popular Science</a></li>--}}
{{--                <li><a href="#">Popular Mechanics</a></li>--}}
{{--                <li><a href="#">Sky & Telescope</a></li>--}}
{{--                <li><a href="#">Discover</a></li>--}}
{{--                <li><a href="#">New Scientist</a></li>--}}
{{--                <li><a href="#">Psychology Today</a></li>--}}
{{--                <li><a href="#">Wired</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="store">--}}
{{--            <a href="#">Store</a>--}}
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="#">Fresh & Herbs</a>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="#">Women's Clothing</a>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Tops</a></li>--}}
{{--                                <li><a href="#">Dresses</a></li>--}}
{{--                                <li><a href="#">Trousers</a></li>--}}
{{--                                <li><a href="#">Shoes</a></li>--}}
{{--                                <li><a href="#">Sale</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Men's Clothing</a>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Shirts</a></li>--}}
{{--                                <li><a href="#">Trousers</a></li>--}}
{{--                                <li><a href="#">Shoes</a></li>--}}
{{--                                <li><a href="#">Sale</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li><a href="#">Jewelry</a></li>--}}
{{--                <li><a href="#">Music</a></li>--}}
{{--                <li><a href="#">Grocery</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="collections"><a href="#collections">Collections</a></li>--}}
{{--        <li class="nolink">No Link</li>--}}
{{--        <li class="disabled"><a href="#" disabled>Disabled Link</a></li>--}}
{{--        <li class="add">--}}
{{--            <a href="#" data-nav-close="false" data-add="['Charts', 'Logs', 'Tests', 'Profile']">Add Item</a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <ul class="bottom-nav">--}}
{{--        <li class="github">--}}
{{--            <a href="#" target="_blank">--}}
{{--                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="email">--}}
{{--            <a href="#" target="_blank">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="ko-fi">--}}
{{--            <a href="#" target="_blank">--}}
{{--                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.426 2.683-2.566 2.658-3.734 4.352.24 7.422-2.831 6.649-6.916zm-11.062 3.511c-1.246 1.453-4.011 3.976-4.011 3.976s-.121.119-.31.023c-.076-.057-.108-.09-.108-.09-.443-.441-3.368-3.049-4.034-3.954-.709-.965-1.041-2.7-.091-3.71.951-1.01 3.005-1.086 4.363.407 0 0 1.565-1.782 3.468-.963 1.904.82 1.832 3.011.723 4.311zm6.173.478c-.928.116-1.682.028-1.682.028V7.284h1.77s1.971.551 1.971 2.638c0 1.913-.985 2.667-2.059 3.015z"/></svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--</nav>--}}


<div class="cart-sidebar">
    <div class="cart-sidebar-header" >
        <h5>
            My Cart <span class="text-success cart-item-2">(0 item)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
            </a>
        </h5>
    </div>
    <div class="cart-sidebar-body">

    </div>
    <div class="cart-sidebar-footer" style="display: none;">

    </div>
</div>

<script>
    function login_function(){
        $('.btn-login').html('Loading...')
        let phone = $('#login_number').val();
        if (phone == '' || phone == undefined) {
                alert("{{ route('login') }}");
                alert('Please enter a phone number');
        }else{
            $.ajax({
                method:"POST",
                url:"{{ $data['image_url'].'/api/User/login' }}",
                data: { phone:phone,device_token:'web_login' },
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function(result) {
                    decode_token(result.data.token,result.data.phone)
                },
                error: function(fail)
                {
                    alert('internal server error please refresh page')
                    console.log("fail");
                },
            });

        }
    }
    function decode_token(token,phone){
        $.ajax({
            method:"POST",
            url:"{{ route('login') }}",
            data: { Authorization:token , phone:phone ,_token:"{{ csrf_token() }}"},
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(result) {
                if (result.status == false){
                    alert(result.msg)
                }else {
                    console.log(result)
                    setTimeout(function(){
                        window.location.reload();
                    },1000);

                }
            },

            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                console.log(fail.responseText);
            },
        });
    }
    function cart_data(){
        @if(!is_null(Session::get('user_data')) )
        let token = "{{ Session::get('user_data')['token'] }}"
        $.ajax({
            method:"POST",
            url:"{{ $data['image_url'].'/api/cart' }}",
            data: { Authorization: token},
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(result) {
                if (result.status == false){
                    alert(result.msg)
                }else {
                    $('#cart-item').html(`<i class="mdi mdi-cart"></i> My Cart <small class="cart-value">${result.data.items}</small>`)
                    //             $('#cart-item-2').html(`<h5>
                    //     My Cart <span class="text-success">(${result.data.items} item)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
                    //     </a>
                    // </h5>`)
                    $('.cart-item-2').html(`(${result.data.items} item)`)

                    let subtotal = 0.00;
                    let finalTotal = 0.00;
                    let main_price = 0.00;
                    let tax_price = 0.00;
                    if (result.data.items == 0) {
                        $('.cart-sidebar-body').html(``)
                        $('.cart-sidebar-footer').hide()
                    } else {
                        $.each(result.data.products, function (key, val) {
                            let p_tax = val.tax_rate ? parseFloat(val.tax_rate) : 0.00
                            $('.product-count' + val.product_id).html(val.qty)
                            subtotal += (parseFloat(val.price) * parseInt(val.qty))
                            finalTotal += (parseFloat(val.price) + p_tax) * parseInt(val.qty)
                            main_price += (parseFloat(val.cost) + p_tax) * parseInt(val.qty)
                            tax_price += p_tax * parseInt(val.qty)
                            if (key == 0) {
                                $('.cart-sidebar-body').html(`
                      <div class="cart-list-product">
                        <a class="float-right remove-cart" href="javascript:void(0)" onclick="delete_qty(${val.product_id})"><i class="mdi mdi-close"></i></a>
                        <img class="img-fluid" src="{{ $data['image_url'].'/assets/uploads/thumbs/' }}${val.image}" alt="">
                        <!-- <span class="badge badge-success">50% OFF</span> -->
                        <h5><a href="#">${val.name}</a></h5>
                        <h6><button class="btn btn-sm" onclick="add_qty(${val.product_id})"><span class="mdi mdi-plus"></span></button> <span style="font-size:15px;">${val.qty}</span> <button class="btn btn-sm" onclick="remove_qty(${val.product_id})"><span class="mdi mdi-minus"></span></button>
                        <p class="offer-price mb-0">${parseFloat(val.price).toFixed(2) * parseInt(val.qty)}₹<i class="mdi mdi-tag-outline"></i> <span class="regular-price">${parseFloat(val.cost).toFixed(2) * parseInt(val.qty)}₹</span></p>
                    </div>
                    `)
                            } else {
                                $('.cart-sidebar-body').append(`
                      <div class="cart-list-product">
                        <a class="float-right remove-cart" href="javascript:void(0)" onclick="delete_qty(${val.product_id})"><i class="mdi mdi-close"></i></a>
                        <img class="img-fluid" src="{{ $data['image_url'].'/assets/uploads/thumbs/' }}${val.image}" alt="">
                        <!-- <span class="badge badge-success">50% OFF</span> -->
                        <h5><a href="#">${val.name}</a></h5>
                        <h6><button class="btn btn-sm" onclick="add_qty(${val.product_id})"><span class="mdi mdi-plus"></span></button> <span style="font-size:15px;">${val.qty}</span> <button class="btn btn-sm" onclick="remove_qty(${val.product_id})"><span class="mdi mdi-minus"></span></button>
                        <p class="offer-price mb-0">${parseFloat(val.price).toFixed(2) * parseInt(val.qty)}₹<i class="mdi mdi-tag-outline"></i> <span class="regular-price">${parseFloat(val.cost).toFixed(2) * parseInt(val.qty)}₹</span></p>
                    </div>
                    `)
                            }
                        });
                        let savings = main_price - subtotal
                        let svaing = (savings * 100) / main_price
                        $('.cart-sidebar-footer').show()
                        $('.cart-sidebar-footer').html(`
                     <div class="cart-store-details">
            <h6>Sub Total <strong class="float-right text-dark" id="final_amount">${subtotal} ₹</strong></h6>
            <h6>Delivery Charges <strong class="float-right text-success">FREE</strong></h6>
            <h6>tax <strong class="float-right text-dark">${tax_price.toFixed(2)} ₹</strong></h6>
            <h6>Your total savings <strong class="float-right text-danger">${svaing.toFixed(2)} %</strong></h6>
                    <h6>Total <strong class="float-right text-secondary grand_ttl">${finalTotal} ₹<strong></h6>

        </div>

        <a href="{{ route('checkout') }}"><button class="btn btn-secondary btn-lg btn-block text-left" type="button" @if(Request::url() == url('user/checkout')) style="display:none;" @endif><span class="float-left" ><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>${finalTotal} ₹</strong> <span class="mdi mdi-chevron-right"></span></span></button></a>
                    `)


                    }
                }
            },

            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                // console.log(fail.responseText);
            },
        });
        @else
        console.log('please login')
        @endif
    }
    function add_qty(product_id){
        let token;
        @if(!is_null(Session::get('user_data')))
            token = '{{ Session::get('user_data')['token'] }}'
        @else
            token = 'null';
        @endif
        $.ajax({
            method:"POST",
            url:"{{ $data['image_url'].'/api/cart/add' }}",
            data: { Authorization: token , product_id:product_id ,qty:1},
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(result) {
                if (result.status == true) {
                    // window.location.reload();
                    cart_data();
                }else{
                    alert(result.msg)
                }
            },
            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                // console.log(fail.responseText);
            },
        });
    }
    function remove_qty(product_id){
        let token;
        @if(!is_null(Session::get('user_data')))
            token = '{{ Session::get('user_data')['token'] }}'
        @else
            token = 'null';
        @endif
        $.ajax({
            method:"POST",
            url:"{{ $data['image_url'].'/api/cart/remove' }}",
            data: { Authorization: token , product_id:product_id ,qty:1},
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(result) {
                if (result.status == true) {
                    cart_data();
                }else{
                    alert(result.msg)
                }
            },
            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                // console.log(fail.responseText);
            },
        });
    }
    function delete_qty(product_id){
        let token;
        @if(!is_null(Session::get('user_data')))
            token = '{{ Session::get('user_data')['token'] }}'
        @else
            token = 'null';
        @endif
        $.ajax({
            method:"POST",
            url:"{{ $data['image_url'].'/api/cart/remove' }}",
            data: { Authorization: token , product_id:product_id ,qty:0 },
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(result) {
                if (result.status == true) {
                    cart_data();
                }else{
                    alert(result.msg)
                }
            },
            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                // console.log(fail.responseText);
            },
        });
    }


</script>
<!-- Bootstrap core JavaScript -->

<script src="{{ asset('website/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- select2 Js -->
<script src="{{ asset('website/vendor/select2/js/select2.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('website/vendor/owl-carousel/owl.carousel.js')}}"></script>
<!-- Custom -->
<script src="{{asset('website/js/custom.js') }}"></script>
<script src="{{ asset('website/js/hc-offcanvas-nav.js?ver=4.1.1')}}"></script>
<link rel="stylesheet" href="{{ asset('website/js/demo.css?ver=3.4.0') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- End: Footer -->

<script>
    // jQuery.ready(function (){

        function loadLoction(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition)
            }else{
                console.log('geo location not support')
            }
        }

    // })
    (function($) {
        var $main_nav = $('#main-nav');
        var $toggle = $('.toggle');

        var defaultOptions = {
            disableAt: false,
            customToggle: $toggle,
            levelSpacing: 40,
            navTitle: 'All Categories',
            levelTitles: true,
            levelTitleAsBack: true,
            pushContent: '#container',
            insertClose: 2
        };

        // call our plugin
        var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

        // add new items to original nav
        $main_nav.find('li.add').children('a').on('click', function() {
            var $this = $(this);
            var $li = $this.parent();
            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');

            items.shift();

            if (!items.length) {
                $li.remove();
            }
            else {
                $this.attr('data-add', JSON.stringify(items));
            }

            Nav.update(true);
        });

        // demo settings update

        const update = (settings) => {
            if (Nav.isOpen()) {
                Nav.on('close.once', function() {
                    Nav.update(settings);
                    Nav.open();
                });

                Nav.close();
            }
            else {
                Nav.update(settings);
            }
        };

        $('.actions').find('a').on('click', function(e) {
            e.preventDefault();

            var $this = $(this).addClass('active');
            var $siblings = $this.parent().siblings().children('a').removeClass('active');
            var settings = eval('(' + $this.data('demo') + ')');

            update(settings);
        });

        $('.actions').find('input').on('change', function() {
            var $this = $(this);
            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {
                update(settings);
            }
            else {
                var removeData = {};
                $.each(settings, function(index, value) {
                    removeData[index] = false;
                });

                update(removeData);
            }
        });

        $('.log-out-button').click(function (){
            $('body').append(`
            <form action="{{ route('logout') }}" method="post" id="logoutForm" style="display:none;">
                @csrf

            </form>
            `)
            $('#logoutForm').submit()
        })

        cart_data();

        $('.add-cart-product').click(function (){
            let prod_id = $(this).attr('product_id')
            @if(!is_null(Session::get('user_data')))

                $('.add-product-cart'+prod_id).html(`
                                        <button class="btn btn-sm" onclick="add_qty(${prod_id})"><span class="mdi mdi-plus"></span></button> <span style="font-size:15px;" class="product-count${prod_id}">1</span> <button class="btn btn-sm" onclick="remove_qty(${prod_id})"><span class="mdi mdi-minus"></span></button>

                `)
            add_qty(prod_id)
            @else
                alert('please login first')
            @endif

        })


        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                search_btn_1();
            }
            // $('#search_prod').blur(function (){
            //     $('#result').html('')
            // })
        });

        loadLoction();

    })(jQuery);
    $(window).scroll(function() {
        if ( $(window).scrollTop() >= 80 ) {
            $('#fixNav').addClass('fixed-top')
        } else {
            $('#fixNav').removeClass('fixed-top')
        }
    });

    function search_btn_1(){

        $('#search_btn').html(`                        <button class="btn btn-secondary" type="button" > <div class="spinner-border spinner-grow-sm text-warning" role="status">
                              <span class="sr-only">Loading...</span>
                            </div></button>
`)
        $('#result').html('');
        const searchField = $('#search_prod').val();
        if (searchField == '' || searchField == undefined){
            $('#result').html('');
            $('#search_btn').html(`                        <button class="btn btn-secondary" type="button" onclick="search_btn_1()"> <i class="mdi mdi-file-find"></i> Search</button>`)
        }else {
            $.ajax({
                method: "POST",
                url: "{{ $data['image_url'].'/api/product/search' }}",
                data: {search_query: searchField},
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function (result) {
                    if (result.status == true) {
                        $.each(result.data, function (i, prod) {
                            if (i == 0) {
                                $('#result').html(`
                               <li class="list-group-item btn btn-outline-warning text-left" style="max-height:55px; overflow:hidden">
            <a href="{{ url('single') }}/${prod.slug}" > <div class="">
                    {{--<img src="{{ $data['image_url'] }}assets/uploads/thumbs/${prod.image}" >--}}
                                <h6>${prod.name} <p>${prod.slug}</p></h6>

                </div> </a>
        </li>
                        `)
                            } else {

                                $('#result').append(`
                                 <li class="list-group-item btn btn-outline-warning text-left" style="max-height:55px;overflow:hidden">
            <a href="{{ url('single') }}/${prod.slug}" > <div class="">
                    {{--<img src="{{ $data['image_url'] }}assets/uploads/thumbs/${prod.image}" >--}}
                    <h6>${prod.name} <p>${prod.slug}</p></h6>

                </div> </a>
        </li>
                        `)
                            }
                        });
                        $('#search_btn').html(`                        <button class="btn btn-secondary" type="button" onclick="search_btn_1()"> <i class="mdi mdi-file-find"></i> Search</button>
`)
                    } else {
                        $('#search_btn').html(`                        <button class="btn btn-secondary" type="button" onclick="search_btn_1()"> <i class="mdi mdi-file-find"></i> Search</button>
`)

                        alert(result.msg)
                    }
                },
                error: function (fail) {
                    $('#search_btn').html(`<i class="mdi mdi-file-find"></i> Search`)

                    alert('internal server error please refresh page')
                    console.log("fail");
                    // console.log(fail.responseText);
                },
            });
        }
    }



    function showPosition(position){
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;
    let geo_result = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA0ztr7esW-B9pyRKUYEa5d8CxLPnCdtdA&latlng="+lat+","+lng+""
    $.get({
        url:geo_result,
        success(data){
            // console.log(data)
            let ad_1 = data.results[0].address_components[3].long_name;
            let ad_2 = data.results[0].address_components[5].long_name;
            let ad_3 = data.results[0].address_components[6].long_name;
            let formated_address = ad_1+', '+ad_2 +' '+ad_3;
            $('.location').html('<i class="mdi mdi-map-marker-circle " aria-hidden="true"></i>'+formated_address)
        },
        error(error){
            console.log('map not load internal error')
        }
    })

}
</script>
<!-- Add the latest firebase dependecies from CDN -->
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>

<script>
    // Paste the config your copied earlier
    var firebaseConfig = {
        apiKey: "AIzaSyCc86h8PRxDMCtdogHOYrUhO7qtB6pNfxo",
        authDomain: "thelocation-best-one-22bb3.firebaseapp.com",
        projectId: "the-best-one-22bb3",
        storageBucket: "the-best-one-22bb3.appspot.com",
        messagingSenderId: "927758053588",
        appId: "1:927758053588:web:78c9f2868b9aecfb898b41",
        measurementId: "G-NJFZS4D3XG"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    //firebase.analytics();

    // Create a Recaptcha verifier instance globally
    // Calls submitPhoneNumberAuth() when the captcha is verified
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
            size: "normal",
            callback: function(response) {
                submitPhoneNumberAuth();
            }
        }
    );

    // This function runs when the 'sign-in-button' is clicked
    // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
    function submitPhoneNumberAuth() {
        // e.preventDefault();
        var phoneNumber = '+91'+ document.getElementById("login_number").value;
        var appVerifier = window.recaptchaVerifier;
        firebase
            .auth()
            .signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                $('#phone_section').hide('slow')
                $('#otp_section').show('slow')
            })
            .catch(function(error) {
                console.log(error);
                $('#phone_section').hide('slow')
                $('#otp_section').show('slow')
            });
    }

    // This function runs when the 'confirm-code' button is clicked
    // Takes the value from the 'code' input and submits the code to verify the phone number
    // Return a user object if the authentication was successful, and auth is complete
    function submitPhoneNumberAuthCode() {
        var code = document.getElementById("partitioned").value;
        confirmationResult
            .confirm(code)
            .then(function(result) {
                var user = result.user;
                console.log(user);
                login_function()
            })
            .catch(function(error) {
                alert('verification error')
                console.log(error);

            });
    }

    // //This function runs everytime the auth state changes. Use to verify if the user is logged in
    // firebase.auth().onAuthStateChanged(function(user) {
    //     if (user) {
    //         console.log("USER LOGGED IN");
    //     } else {
    //         // No user is signed in.
    //         console.log("USER NOT LOGGED IN");
    //     }
    // });




</script>
    <script>

$('.bycategory').click(function() {
//  alert($(this).attr('value'));

 let urlajax = $(".hehehe").attr('value');
 let dataaa =$(this).attr('value')
//   alert(dataaa);
    if(this.checked){
        console.log("Making request");
         $.ajax({
             type: "POST",
             url: "{{ $data['image_url'].'/api/product'}}",
             data:  {category_id:'dataaa'},
             xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",
             success: function(data) {

                $("#ajax123").hide();

             var testArray = data.data;
            if(testArray.length!=0)

          {
            $.each(testArray, function( index, value ) {
                   console.log(value);
                   var html = '<div class="col-md-4"><div class="product"><a href="../single/"'+value.slug+'><div class="product-header"><span class="badge badge-success">50% OFF</span><img class="img-fluid" src="{{ $data['image_url']}}img/item/'+value.image+'" alt=""><span class="veg text-success mdi mdi-circle"></span></div><div class="product-body"><h5>'+value.name+'</h5><h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - '+value.weight+'gm</h6></div><div class="product-footer"><button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button><p class="offer-price mb-0">'+value.price+'</p><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">'+value.cost+'</span></p></div></a></div></div>';

                   $("#ajax1234").append(html);
            });


             }
             else
             {
                  $("#ajax1234").append("<h1>No data Found");
             }
             },
             error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                console.log(fail.responseText);
            },
         });

         }
   });
</script>


  <script>

$('.bybrands').click(function() {
//  alert($(this).attr('value'));


 let dataaa =$(this).attr('value')
//   alert(dataaa);
    if(this.checked){
        console.log("Making request");
         $.ajax({
             type: "POST",
             url: "{{ $data['image_url'].'/api/product/product_brand'}}",
             data:  {brand_id:'dataaa'},
             xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

             success: function(data) {
                $("#ajax1234").hide();
                $("#ajax123").hide();

             var testArray = data.data;
            if(testArray.length!=0)

          {
            $.each(testArray, function( index, value ) {
                  console.log(value);
                  var html = '<div class="col-md-4"><div class="product"><a href="../single/"'+value.slug+'><div class="product-header"><span class="badge badge-success">50% OFF</span><img class="img-fluid" src="{{ $data['image_url']}}img/item/'+value.image+'" alt=""><span class="veg text-success mdi mdi-circle"></span></div><div class="product-body"><h5>'+value.name+'</h5><h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - '+value.weight+'gm</h6></div><div class="product-footer"><button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button><p class="offer-price mb-0">'+value.price+'</p><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">'+value.cost+'</span></p></div></a></div></div>';

                  $("#ajax12345").append(html);
            });


             }
             else
             {
                  $("#ajax12345").append("<h1>No data Found");
             }
             },
             error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
                console.log(fail.responseText);
            },
         });

         }
   });

</script>
    @yield('js')
</body>
</html>
