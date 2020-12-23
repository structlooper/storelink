<?php defined('BASEPATH') or exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">if (parent.frames.length !== 0) { top.location = '<?= site_url(); ?>'; }</script>
    <title><?= 'The Best One - '.$page_title; ?></title>
    <meta name="description" content="<?= $page_desc; ?>">
    <meta property="og:url" content="<?= isset($product) && !empty($product) ? site_url('product/' . $product->slug) : site_url(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $page_title; ?>" />
    <meta property="og:description" content="<?= $page_desc; ?>" />
    <meta property="og:image" content="<?= isset($product) && !empty($product) ? base_url('assets/uploads/' . $product->image) : base_url('assets/uploads/logos/' . $shop_settings->logo); ?>" />
    <link rel="icon" type="image/png" sizes="850x466" href="<?= $assets; ?>images/thebestone_logo.png?h=41d1ef837b351d735cb64b21d985f737">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800">
    <link rel="stylesheet" href="<?= $assets; ?>css/Flaticon.css?">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="<?= $assets; ?>fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/custom.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/nav-light.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/navigation.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/responsive.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/slick-theme.css">
    <link rel="stylesheet" href="<?= $assets; ?>css/slick.css">
    <link rel="shortcut icon" href="<?= $assets; ?>images/icon.png">
    <style>
        #partitioned {
            padding-left: 15px;
            letter-spacing: 42px;
            border: 0;
            background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-size: 50px 1px;
            background-repeat: repeat-x;
            background-position-x: 35px;
            width: 220px;
            min-width: 220px;
        }

        #divInner{
            left: 0;
            position: sticky;

        }

        #divOuter{
            width: 190px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<!-- Start: Navigation -->
    <nav class="navbar navbar-expand-md sticky-top navigation">
        <div class="container-fluid"><a class="navbar-brand" href="<?= base_url(); ?>"><img alt="<?= $shop_settings->shop_name; ?>" src="<?= $assets; ?>images/thebestone_logo.png"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#nav-top"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav-top">
            
                <?= shop_form_open('products', 'id="product-search-form"'); ?>
                    <div class="form-inline">
                        <div class="nav-form">
                            <input class="form-control" type="text" placeholder="Search for products">
                            <button class="btn search-btn" type="submit"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                <?= form_close();?>
            
                
                <ul class="nav navbar-nav ml-auto">
                <?php
                                if (!is_null($this->session->userdata('user_id'))) {

                                    ?>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link px-0" data-toggle="dropdown" aria-expanded="false" href="#"><?= $this->session->userdata('first_name')?><i class="icon-arrow-down ml-2"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="logged-user">
                                                <img> <p class="mb-0"><?= $this->session->userdata('phone')?></p> </div>
                                            <a class="dropdown-item text-left" href="<?= shop_url('orders'); ?>"><i class="icon-notebook mr-2"></i>My Orders<p class="mb-0">View past orders / Report an issue</p></a>
                                            <a class="dropdown-item text-left" href="<?= shop_url('address');?>"><i class="icon-location-pin mr-2"></i>My Addresses</a>
                                            <a class="dropdown-item text-left" href="<?= shop_url('faq');?>"><i class="icon-question mr-2"></i>FAQs</a>
                                            <a class="dropdown-item text-left" href="<?= shop_url('offers');?>"><i class="icon-magic-wand mr-2"></i>Offers</a>
                                            <a class="dropdown-item text-left" href="<?= site_url('logout');?>"><i class="icon-user mr-2"></i><?= lang('logout'); ?></a>
                                            </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link cart-browse" href="javascript:void(0)"><span class="badge">2</span><i class="typcn typcn-shopping-cart mr-2"></i><?= lang('my_cart');?></a></li>
                                    <?php
                                }  else {
                                    ?>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link p-0" data-toggle="dropdown" aria-expanded="false" href="#">My Account<span><?= lang('login'); ?><i class="icon-arrow-down ml-2"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><button class="btn btn-account-login" type="button"><?= lang('login'); ?></button><a class="dropdown-item text-left" href="#"><i class="icon-question mr-2"></i>FAQs</a><a class="dropdown-item text-left" href="#"><i class="icon-magic-wand mr-2"></i>Offers</a></div>
                    </li>
                    <li class="nav-item"><a class="nav-link cart-browse" href="javascript:void(0)"><i class="typcn typcn-shopping-cart mr-2"></i><?= lang('my_cart');?></a></li>
                                <?php } ?>
                </ul>
        </div>
        </div>
    </nav>

    <div class="modal fade modal-login" role="dialog" tabindex="-1" id="modal-login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-head mb-0">Phone Number Verification</h5>
                </div>
                <div class="modal-footer" id="footer_1">
                    <p class="text-center my-3 font-weight-bold">Enter your phone number to<br>Login/Sign up<br></p>
                    <form class="login-form">
                        <div class="login-input" ><input class="form-control input-number" id="login_number" type="tel" maxlength="10"></div>
                        <button class="btn btn-primary btn-block my-3 btn-login" id ="btn-login" onclick="login_function()" type="button" >Next</button>
                        <div id="recaptcha-container"></div>
                    </form>
                </div>
                <div class="modal-footer" id="footer_2" style="display: none">
                    <p class="text-center my-3 font-weight-bold col-12">Enter otp to<br>Login / Sign up<br></p>
                    <form class="login-form">
                        <div id="divOuter">
                            <div id="divInner">
                                <input id="partitioned" type="text" maxlength="4" />
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block my-3 btn-login"  onclick="submitPhoneNumberAuthCode()" type="button" >Next</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade cart-empty-modal" role="dialog" tabindex="-1" id="cart-empty-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content cart-modal-content">
                <div class="modal-header cart-head">
                    <h5 class="modal-title"><?= lang('my_cart');?></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body empty-cart">
                    <div class="empty-cart"><img src="https://grofers.com/images/cart/empty-cart_2x-da3645a.png" alt="empty" width="160px">
                        <h5 class="mt-5 mb-0 font-weight-bold"><?= lang('empty_cart');?><br></h5>
                        <p class="mb-0 mt-1">Your favourite items are just a click away<br></p>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-block btn-cart" type="button">Start Shopping</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade cart-modal" role="dialog" tabindex="-1" id="cart-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content cart-modal-content">
                <div class="modal-header cart-head">
                    <h5 class="modal-title">My Cart</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body p-0">
                    <div class="cart-store-details">
                        <div>
                            <div class="float-left"><span>Sub Total</span></div>
                            <div class="float-right"><span>₹149<br></span></div>
                            <div class="clearfix"></div>
                        </div>
                        <div>
                            <div class="float-left"><span>Delivery Charges<i class="la la-question-circle ml-2" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" title="Shop ₹450 more to get free delivery"></i></span></div>
                            <div class="float-right delivery-rate"><span>+ ₹39<br></span></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="cart-items">
                        <div class="cart-items-product cart-card" id="cart-table">
                            <div class="cart-card-img"><img class="img-fluid" src="https://cdn.grofers.com/app/images/products/full_screen/pro_389672.jpg"></div>
                            <div class="cart-product-details"><span class="cart-product-name"><?= lang('product'); ?></span><span class="cart-product-unit">1 kg</span>
                                <div class="cart-product-items">
                                    <div class="add-cart-model"><button class="btn add-cart-btn" id="btn-desc" type="button">-</button><span id="qty-val"><input type="text" class="form-control qty-value" value="1"></span><button class="btn add-cart-btn" id="btn-inc" type="button">+</button></div><span class="new-price"><?= lang('price'); ?><br></span><span class="total-value"><?= lang('subtotal'); ?><br></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="cart-promo-info">Promo code can be applied on payment page<br></p><a class="btn btn-block btn-cart btn-checkout" role="button" href="../checkout.html"><span>Proceed to Checkout</span><span class="total">₹149<i class="la la-angle-right"></i><br></span></a></div>
            </div>
        </div>
    </div>
