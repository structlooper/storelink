@extends('layouts.app')
@section('title')
    Checkout
@endsection

@section('style')
    <style>
        .btn-lg.round {
            border-radius: 24px;
        }
    </style>
@endsection
@section('content')
    <div class="modal" tabindex="-1" role="dialog" id="comationOrderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Place order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <h5 class="card-header">My Cart <span class="text-secondary float-right cart-item-2">(0 item)</span></h5>
                        <div class="card-body pt-0 pr-0 pl-0 pb-0 cart-sidebar-body" style="max-height:300px; overflow: auto">

                        </div>
                        <div class="cart-sidebar-footer" >

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" id="final-cash-btn" onclick="cashOndelivery()"></button>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-step">
                        <div class="accordion" id="accordionExample">
                            <div class="card checkout-step-one">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="number">1</span> Delivery Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @if(sizeof($user_address)>0)
                                            @foreach( $user_address as $key => $add)
                                        <div class="form-check form-group" >
                                                <input class="form-check-input mt-1" type="radio" name="user_address" id="address{{ $key }}" value="{{ $add->address_id }}" style="transform: scale(1.5);" >

                                                <label class="form-check-label btn btn-block btn-outline-secondary  text-left" style="font-size: 15px; height: 50px;"  for="address{{ $key }}" onclick="checkedAddress()">
                                                    {{ $add->address_line_1 }} , {{ $add->address_line_2 }} ,{{ $add->map_address }}
                                                    @if($add->locality != '')
                                                        <br>
                                                    <span>{{ $add->locality }}</span>
                                                        @endif

                                                </label>

                                        </div>
                                                <hr>
                                            @endforeach
                                        @else
                                            <div class="form-check form-group" >
                                                <a href="{{ route('add_address') }}" class="btn btn-lg btn-primary"> Add New address</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card checkout-step-two" style="display: none">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="number">2</span> Payment
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapsed" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class=" form-group" >
                                            <h5 for="note">Note</h5>

                                            <div class="form-group ">
                                                <textarea name="note" id="note" class="form-control"></textarea>
                                            </div>

                                        </div>
                                            <h5>Please select your payment method</h5>
                                            <div class="form-group row ">
                                                <div class="col-sm-6">

                                            <button type="button" style="width:100%" class="form-check-label btn btn-lg btn-outline-primary border  text-left online-payment-btn" onclick="onlinePayment()" >
                                               <i class="mdi mdi-paypal"></i> Online payment

                                            </button>
                                                </div>
                                                <div class="col-sm-6">

                                                <button type="button" style="width: 100%" class="form-check-label btn btn-lg btn-outline-danger border  text-left "  onclick="confirmation()">
                                               <i class="mdi mdi-truck-fast"></i> Cash on Delivery

                                profile            </button>
                                            </div>
                                            </div>
                                            <hr>

                                    </div>
                                </div>
                            </div>
                            <div class="card" id="final-step" style="display: none">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="number">3</span> Order Complete
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="col-lg-10 col-md-10 mx-auto order-done">
                                                <i class="mdi mdi-check-circle-outline text-secondary"></i>
                                                <h4 class="text-success">Congrats! Your Order has been Placed..</h4>
{{--                                                <p>--}}
{{--                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum. Sed ex est, Sed ex est, consectetur eget consectetur, Lorem ipsum dolor sit amet...--}}
{{--                                                </p>--}}
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('orders') }}"><button type="submit" class="btn btn-secondary mb-2 btn-lg">See Order Details</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">My Cart <span class="text-secondary float-right cart-item-2">(0 item)</span></h5>
                        <div class="card-body pt-0 pr-0 pl-0 pb-0 cart-sidebar-body" style="max-height:300px; overflow: auto">

                        </div>
                        <div class="cart-sidebar-footer" >

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function checkedAddress(){
            $('.checkout-step-one').hide('slow')
            $('.checkout-step-two').show()
        }
        function confirmation(){
            let amount = $('.grand_ttl').html()
            $('#final-cash-btn').html(`Proceed to place order <i class="mdi mdi-truck-fast"></i> ${amount}`)
            $('#comationOrderModal').modal('show')
        }

        function cashOndelivery(){
            let amount = $('.grand_ttl').html()
            $('#final-cash-btn').html('loading.....')
            let note = $('#note').val()
            let address_id = $('input[name="user_address"]:checked').val();
            let token;
            @if(!is_null(Session::get('user_data')))
                token = '{{ Session::get('user_data')['token'] }}'
            @else
                token = 'null';
            @endif
            $.ajax({
                method:"POST",
                url:"{{ $data['image_url'].'api/cart/checkout' }}",
                data: { Authorization: token ,
                    payment_type:"cash" ,
                    payment_status:"PENDING" ,
                    note:note ,
                    address_id:address_id
                },
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function(result) {
                    if (result.status == true) {
                        // window.location.reload();
                        $('#comationOrderModal').modal('hide')
                        $('.checkout-step-two').hide('slow')
                        cart_data()
                        $('#final-step').show()
                    }else{
                        alert(result.msg)
                        $('#final-cash-btn').html(`Proceed to place order <i class="mdi mdi-truck-fast"></i> ${amount}`)
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
        function onlinePayment(){
            let token;
            @if(!is_null(Session::get('user_data')))
                token = '{{ Session::get('user_data')['token'] }}'
            @else
                token = 'null';
            @endif
            let amount = parseFloat($('.grand_ttl').html()) * 10
            $('.online-payment-btn').html('loading.....')
            let note = $('#note').val()
            let address_id = $('input[name="user_address"]:checked').val();
            var options = {
                "key": "{{ $razorpay_credentials->razorpay_key_id }}",
                "amount": amount * 10, // Example: 2000 paise = INR 20
                "name": "{{ $data['site_settings']->site_name }}",
                "description": "description",
                "image": "{{ $data['logo_url'] }}",// COMPANY LOGO
                "handler": function (response) {
                    if(response.razorpay_payment_id != '') {

                        $.ajax({
                            method: "POST",
                            url: "{{ $data['image_url'].'api/cart/checkout' }}",
                            data: {
                                Authorization: token,
                                payment_type: "online",
                                payment_status: "paid",
                                note: note,
                                address_id: address_id
                            },
                            xhrFields: {
                                withCredentials: true
                            },
                            async: false,
                            crossDomain: true,
                            dataType: "json",

                            success: function (result) {
                                if (result.status == true) {
                                    // window.location.reload();
                                    $('.checkout-step-two').hide('slow')
                                    cart_data()
                                    $('#final-step').show()
                                } else {
                                    alert(result.msg)
                                    $('.online-payment-btn').html(` <i class="mdi mdi-paypal"></i> Online payment`)
                                }
                            },
                            error: function (fail) {
                                alert('internal server error please refresh page')
                                console.log("fail");
                                // console.log(fail.responseText);
                            },
                        });
                    }
                    // AFTER TRANSACTION IS COMPLETE YOU WILL GET THE RESPONSE HERE.
                },
                "prefill": {
                    "name": "{{ Session::get('user_data')['first_name'] }}", // pass customer name
                    "email": '',// customer email
                    "contact": '{{ Session::get('user_data')['phone'] }}' //customer phone no.
                },
                "theme": {
                    "color": "#15b8f3" // screen color
                }
            };
            console.log("options");
            console.log(options);
            var propay = new Razorpay(options);
            propay.open();
        }

    </script>
    @endsection
