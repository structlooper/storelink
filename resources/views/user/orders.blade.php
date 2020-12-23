@extends('layouts.app')
@section('title')
    Orders
@endsection

@section('content')
    <div class="modal" tabindex="-1" role="dialog" id="order_details">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body" >
                    <div class="order_header_details">

                        <div class="form-group">

                        <label >
                           <strong>Order Date</strong> : tiowhgih
                        </label>
                    </div>
                    </div>

                    <hr>
                    <div id="order_details-body">

                    </div>
                </div>
                <div class="modal-footer" id="order_details-footer">

                </div>
            </div>
        </div>
    </div>
    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        @include('user.profile_sidebar')
                        <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5">
                                            Order List
                                        </h5>
                                    </div>
                                    <div class="order-list-tabel-main table-responsive">
                                        <table class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(sizeof($user_orders) > 0)

                                                @foreach($user_orders as $j => $ord)
{{--                                            {{print_r($ord)}}<?php exit; ?>--}}
@php
$final_add = $ord->address_line_1 .', '. $ord->address_line_2.' '.$ord->locality;
@endphp
                                            <tr>
                                                <td>{{ $j+1 }}</td>
                                                <td>
                                                   {{ date('D ,M y',strtotime($ord->date)) }}
                                                </td>
                                                <td><span class="badge badge-primary">{{ $ord->sale_status }}</span></td>
                                                <td class="float-right">{{ number_format($ord->grand_total,2) }} ₹</td>
                                                <td><a data-toggle="tooltip" data-placement="top" title="" href="javascript:void(0)" data-original-title="View Detail" class="btn btn-info btn-sm " onclick="view_order_details({{ $ord->id}},'{{date('D ,M y',strtotime($ord->date))}}','{{$final_add}}','{{ $ord->sale_status }}','{{ $ord->payment_method }}')"><i class="mdi mdi-eye"></i></a></td>
                                            </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">No orders found!!</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- Data Tables -->
    <link href="{{asset('website/vendor/datatables/datatables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('website/vendor/datatables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.datatabel').DataTable();
        } );

        function view_order_details($order_id,order_date,final_address,order_status,pay){
            $.ajax({
                method:"POST",
                url:"{{ route('order_details') }}",
                data: {
                    order_id: $order_id ,
                    _token:"{{ csrf_token() }}" ,
                },
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function(result) {
                    $('.order_header_details').html(`
                     <div class="mt-2">
                        <label >
                           <strong>Order Date</strong> : ${order_date}
                        </label>
                    </div>
                    <div class="mt-2">
                        <label >
                           <strong>Order Delivery Address</strong> : ${final_address}
                        </label>
                    </div>
                    <div class="mt-2">
                        <label >
                           <strong>Order Status</strong> : ${order_status}
                        </label>
                         <label >
                           <strong> Payment Mod</strong> : ${pay}
                        </label>
                    </div>
                    `)
                    if (result.data.length > 0) {
                        let subtotal = 0.00;
                        let finalTotal = 0.00;
                        let main_price = 0.00;
                        let tax_price = 0.00;

                        console.log(result)
                        $.each(result.data, function (key, val) {
                            let p_tax = val.tax ? parseFloat(val.tax) : 0.00
                            subtotal += (parseFloat(val.price) * parseInt(val.qty))
                            finalTotal += (parseFloat(val.price) + p_tax) * parseInt(val.qty)
                            main_price += (parseFloat(val.cost) + p_tax) * parseInt(val.qty)
                            tax_price += p_tax * parseInt(val.qty)
                            $('.product-count' + val.product_id).html(val.qty)
                            // subtotal += (parseFloat(val.price) * parseInt(val.qty))
                            // finalTotal += (parseFloat(val.price) + parseFloat(val.tax_rate)) * parseInt(val.qty)
                            // main_price += (parseFloat(val.cost) + parseFloat(val.tax_rate)) * parseInt(val.qty)
                            // tax_price += parseFloat(val.tax_rate) * parseInt(val.qty)
                            if (key == 0) {
                                $('#order_details-body').html(`
                      <div class="cart-list-product">
                        <img class="img-fluid" src="{{ $data['image_url'].'assets/uploads/thumbs/' }}${val.image}" alt="">
                        <!-- <span class="badge badge-success">50% OFF</span> -->
                        <h5><a href="#">${val.name}</a></h5>
                        <p class="offer-price mb-0"><span class="regular-price">${parseFloat(val.cost).toFixed(2) }₹</span><i class="mdi mdi-tag-outline"></i> </p>
                                           <p class="offer-price mb-0">${parseFloat(val.price).toFixed(2) }₹<i class="mdi mdi-tag-outline"></i>  X ${parseInt(val.qty)} = ${parseFloat(val.price).toFixed(2) * parseInt(val.qty)}₹</p>
                    </div>
                    `)
                            } else {
                                $('#order_details-body').append(`
                      <div class="cart-list-product">
                        <img class="img-fluid" src="{{ $data['image_url'].'assets/uploads/thumbs/' }}${val.image}" alt="">
                        <!-- <span class="badge badge-success">50% OFF</span> -->
                        <h5><a href="#">${val.name}</a></h5>
                        <p class="offer-price mb-0"><span class="regular-price">${parseFloat(val.cost).toFixed(2) }₹</span><i class="mdi mdi-tag-outline"></i> </p>
                                           <p class="offer-price mb-0">${parseFloat(val.price).toFixed(2) }₹<i class="mdi mdi-tag-outline"></i>  X ${parseInt(val.qty)} = ${parseFloat(val.price).toFixed(2) * parseInt(val.qty)}₹</p>

                    </div>
                    `)
                            }
                        });
                        let savings = main_price - subtotal
                        let svaing = (savings * 100) / main_price
                        $('#order_details-footer').html(`
                        <div class="col-12">
            <h6>Sub Total <strong class="float-right text-dark" id="final_amount">${subtotal} ₹</strong></h6>
            <h6>Delivery Charges <strong class="float-right text-success">FREE</strong></h6>
            <h6>tax <strong class="float-right text-dark">${tax_price.toFixed(2)} ₹</strong></h6>
            <h6>Your total savings <strong class="float-right text-danger">${svaing.toFixed(2)} %</strong></h6>
<hr>
            <h6>Total <strong class="float-right text-secondary grand_ttl" >${finalTotal} ₹<strong></h6>
        </div>
                        `)

                        $('#order_details').modal('show')
                    }else{
                        alert('Sorry! no product found')
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
    </script>
@endsection
