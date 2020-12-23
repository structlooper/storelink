<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (DEMO && ($m == 'main' && $v == 'index')) {
    ?>
<div class="page-contents padding-top-no">
    <div class="container">
        <div class="alert alert-info margin-bottom-no">
            <p>
                <strong>Shop module is not complete item but add-on to Stock Manager Advance and is available separately.</strong><br>
                This is joint demo for main item (Stock Manager Advance) and add-ons (POS & Shop Module). Please check the item page on codecanyon.net for more info about what's not included in the item and you must read the page there before purchase. Thank you
            </p>
        </div>
    </div>
</div>
<?php
} ?>
<!-- Start: Footer -->
<div class="footer">
        <div class="container">
            <div class="quality-marks">
                <div class="row">
                    <div class="col">
                        <div class="quality-icon best-prices"></div>
                        <div class="d-table-cell quality-description">
                            <div class="quality-marks-name"><span>Best Prices &amp; Offers<br></span></div>
                            <div>
                                <p class="mb-0">Cheaper prices than your local supermarket, great&nbsp;<a href="https://grofers.com/grand-orange-bag-days">c</a>ashback offers&nbsp;to top it off.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quality-icon genuine-products"></div>
                        <div class="d-table-cell quality-description">
                            <div class="quality-marks-name"><span>Wide Assortment<br></span></div>
                            <div>
                                <p class="mb-0">Choose from 5000+ products across food, personal care, household &amp; other categories.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quality-icon easy-returns"></div>
                        <div class="d-table-cell quality-description">
                            <div class="quality-marks-name"><span>Easy Returns<br></span></div>
                            <div>
                                <p class="mb-0">Not satisfied with a product? Return it at the doorstep &amp; get a refund within hours.<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 pt-3 border-top">
                <div class="row">
                    <div class="col">
                        <div class="cat-links">
                            <h6 class="font-weight-bold">Categories</h6>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled">
                                    <?php
                            $r = 0;
                            foreach (array_chunk($categories, 1) as $cats) {
                        ?>
                        <?php
                            if($r <= 5){
                            foreach ($cats as $ctg) {
                        ?>
                                <li><a href="<?= $ctg->id; ?>"><?= $ctg->name; ?></a></li>
                            <?php }}?>
                            <?php $r++; }?>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-unstyled">
                                    <?php
                            $r = 0;
                            foreach (array_chunk($categories, 1) as $cats) {
                        ?>
                        <?php
                            if($r > 5 && $r < 12){
                            foreach ($cats as $ctg) {
                        ?>
                                <li><a href="<?= $ctg->id; ?>"><?= $ctg->name; ?></a></li>
                            <?php }}?>
                            <?php $r++; }?>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-unstyled">
                                    <?php
                            $r = 0;
                            foreach (array_chunk($categories, 1) as $cats) {
                        ?>
                        <?php
                            if($r > 12){
                            foreach ($cats as $ctg) {
                        ?>
                                <li><a href="<?= $ctg->id; ?>"><?= $ctg->name; ?></a></li>
                            <?php }}?>
                            <?php $r++; }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cat-links border-right-0">
                            <div class="row">
                                <div class="col">
                                    <h6 class="font-weight-bold">Useful Links</h6>
                                    <ul class="list-unstyled">
                                        <li><a href="<?= site_url('page/' . $shop_settings->about_link); ?>">About Us</a></li>
                                        <li><a href="<?= site_url('page/' . $shop_settings->offer_link); ?>">Offers</a></li>
                                        <li><a href="<?= shop_url('privacy-policy'); ?>">Privacy Policy</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="<?= site_url('page/' . $shop_settings->tnc_link); ?>">Terms &amp; Conditions</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <div>
                                        <h6 class="font-weight-bold">Download App</h6>
                                        <div class="download-links"><a href="#"><img src="https://grofers.com/images/home/google-play_1x-6d4f8e0.png"></a><a href="#"><img src="https://grofers.com/images/home/app-store_1x-8362160.png"></a></div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="font-weight-bold">Social Connect</h6>
                                        <ul class="list-inline social-list mb-0">
                                        <?php if (!empty($shop_settings->facebook)) { ?>
                                            <li class="list-inline-item"><a target="_blank" href="<?= $shop_settings->facebook; ?>"><i class="fab fa-facebook"></i></a>
                                        <?php } if (!empty($shop_settings->twitter)) { ?>
                                            <a target="_blank" href="<?= $shop_settings->twitter; ?>"><i class="fab fa-twitter"></i></a>
                                        <?php } if (!empty($shop_settings->linkedin)) { ?>
                                            <a target="_blank" href="<?= $shop_settings->linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                                        <?php } if (!empty($shop_settings->instagram)) { ?>
                                            <a target="_blank" href="<?= $shop_settings->instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="brands-list border-top">
                        <h6 class="font-weight-bold">Brands</h6>
                        <ul class="list-inline">
                        <?php
                            $r = 0;
                            foreach (array_chunk($brands, 1) as $bd) {
                        ?>
                        <?php
                            foreach ($bd as $bs) {
                        ?>
                                <li class="list-inline-item"><a href="<?= $bs->name; ?>"><?= $bs->name; ?></a></li>
                            <?php }?>
                            <?php $r++; }?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="payment-methods">
                        <div class="row">
                            <div class="col">
                                <h6 class="font-weight-bold">Payment Options</h6><img src="https://grofers.com/images/payment/mobikwik-6d9eed3.png"><img src="https://grofers.com/images/payment/paytm-1cc911c.png"><img src="https://grofers.com/images/payment/visa-42f212a.png">
                                <img
                                    src="https://grofers.com/images/payment/mastercard-fafd4ad.png"><img src="https://grofers.com/images/payment/maestro-be32af5.png"><img src="https://grofers.com/images/payment/rupay-77f4f26.png"><img src="https://grofers.com/images/payment/bhim-upi-3c1ef19.png"><span>Net Banking</span><span>Cash On Delivery</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="copyright">© The Best One, Copyrights 2020. All Rights Reserved | Made with ❤ by Infirment Technologies Pvt. Ltd</p>
        </div>
    </div>
    <!-- End: Footer -->
<script>
    function login_function(){
        let phone = $('#login_number').val();
        $('.btn-login').html('Loading...')
        if (phone == '' || phone == undefined){
            alert('Please enter a phone number');
        }else{
            $.ajax({
               method:"POST",
               url:"<?= base_url('api/User/login') ?>",
               data: { phone:phone,device_token:'web_login' },
               xhrFields: {
                   withCredentials: true
               },
               async: false,
               crossDomain: true,
               dataType: "json",

               success: function(result) {
                  decode_token(result.data.token)
               },
               error: function(fail)
               {
                   alert('internal server error please refresh page')
                   console.log("fail");
               },
            });

        }
    }
    function decode_token(token){
        $.ajax({
            method:"POST",
            url:"<?= base_url('api/User/verify_web') ?>",
            data: { Authorization:token },
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
                    setTimeout(function(){
                        window.location.reload();
                    },2000);

                }
            },

            error: function(fail)
            {
                alert('internal server error please refresh page')
                console.log("fail");
            },
        });
    }
</script>
<!-- Add the latest firebase dependecies from CDN -->
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>

<script>
    // Paste the config your copied earlier
    var firebaseConfig = {
        apiKey: "AIzaSyCc86h8PRxDMCtdogHOYrUhO7qtB6pNfxo",
        authDomain: "the-best-one-22bb3.firebaseapp.com",
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
        var phoneNumber = document.getElementById("login_number").value;
        alert(phoneNumber)
        var appVerifier = window.recaptchaVerifier;
        firebase
            .auth()
            .signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                $('#footer_1').hide('fast')
                $('#footer_2').hide('show')
            })
            .catch(function(error) {
                console.log(error);
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
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    //This function runs everytime the auth state changes. Use to verify if the user is logged in
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            console.log("USER LOGGED");

            login_function();
        } else {
            // No user is signed in.
            console.log("USER NOT LOGGED IN");
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="<?= $assets; ?>js/bs-init.js"></script>
<script src="<?= $assets; ?>js/slick.min.js"></script>
<script src="<?= $assets; ?>js/custom.js"></script>
<script src="<?= $assets; ?>js/libs.min.js"></script>
<script src="<?= $assets; ?>js/scripts.min.js"></script>


<script type="text/javascript">
    var m = '<?= $m; ?>', v = '<?= $v; ?>', products = {}, filters = <?= isset($filters) && !empty($filters) ? json_encode($filters) : '{}'; ?>, shop_color, shop_grid, sorting;

    var cart = <?= isset($cart) && !empty($cart) ? json_encode($cart) : '{}' ?>;
    var site = {base_url: '<?= base_url(); ?>', site_url: '<?= site_url('/'); ?>', shop_url: '<?= shop_url(); ?>', csrf_token: '<?= $this->security->get_csrf_token_name() ?>', csrf_token_value: '<?= $this->security->get_csrf_hash() ?>', settings: {display_symbol: '<?= $Settings->display_symbol; ?>', symbol: '<?= $Settings->symbol; ?>', decimals: <?= $Settings->decimals; ?>, thousands_sep: '<?= $Settings->thousands_sep; ?>', decimals_sep: '<?= $Settings->decimals_sep; ?>', order_tax_rate: false, products_page: <?= $shop_settings->products_page ? 1 : 0; ?>}, shop_settings: {private: <?= $shop_settings->private ? 1 : 0; ?>, hide_price: <?= $shop_settings->hide_price ? 1 : 0; ?>}}

    var lang = {};
    lang.page_info = '<?= lang('page_info'); ?>';
    lang.cart_empty = '<?= lang('empty_cart'); ?>';
    lang.item = '<?= lang('item'); ?>';
    lang.items = '<?= lang('items'); ?>';
    lang.unique = '<?= lang('unique'); ?>';
    lang.total_items = '<?= lang('total_items'); ?>';
    lang.total_unique_items = '<?= lang('total_unique_items'); ?>';
    lang.tax = '<?= lang('tax'); ?>';
    lang.shipping = '<?= lang('shipping'); ?>';
    lang.total_w_o_tax = '<?= lang('total_w_o_tax'); ?>';
    lang.product_tax = '<?= lang('product_tax'); ?>';
    lang.order_tax = '<?= lang('order_tax'); ?>';
    lang.total = '<?= lang('total'); ?>';
    lang.grand_total = '<?= lang('grand_total'); ?>';
    lang.reset_pw = '<?= lang('forgot_password?'); ?>';
    lang.type_email = '<?= lang('type_email_to_reset'); ?>';
    lang.submit = '<?= lang('submit'); ?>';
    lang.error = '<?= lang('error'); ?>';
    lang.add_address = '<?= lang('add_address'); ?>';
    lang.update_address = '<?= lang('update_address'); ?>';
    lang.fill_form = '<?= lang('fill_form'); ?>';
    lang.already_have_max_addresses = '<?= lang('already_have_max_addresses'); ?>';
    lang.send_email_title = '<?= lang('send_email_title'); ?>';
    lang.message_sent = '<?= lang('message_sent'); ?>';
    lang.add_to_cart = '<?= lang('add_to_cart'); ?>';
    lang.out_of_stock = '<?= lang('out_of_stock'); ?>';
    lang.x_product = '<?= lang('x_product'); ?>';
    lang.r_u_sure = '<?= lang('r_u_sure'); ?>';
    lang.x_reverted_back = "<?= lang('x_reverted_back'); ?>";
    lang.delete = '<?= lang('delete'); ?>';
    lang.line_1 = '<?= lang('line1'); ?>';
    lang.line_2 = '<?= lang('line2'); ?>';
    lang.city = '<?= lang('city'); ?>';
    lang.state = '<?= lang('state'); ?>';
    lang.postal_code = '<?= lang('postal_code'); ?>';
    lang.country = '<?= lang('country'); ?>';
    lang.phone = '<?= lang('phone'); ?>';
    lang.is_required = '<?= lang('is_required'); ?>';
    lang.okay = '<?= lang('okay'); ?>';
    lang.cancel = '<?= lang('cancel'); ?>';
    lang.email_is_invalid = '<?= lang('email_is_invalid'); ?>';
    lang.name = '<?= lang('name'); ?>';
    lang.full_name = '<?= lang('full_name'); ?>';
    lang.email = '<?= lang('email'); ?>';
    lang.subject = '<?= lang('subject'); ?>';
    lang.message = '<?= lang('message'); ?>';
    lang.required_invalid = '<?= lang('required_invalid'); ?>';

    update_mini_cart(cart);
</script>

<?php if ($m == 'shop' && $v == 'product') {
        ?>
<script type="text/javascript">
$(document).ready(function ($) {
  $('.rrssb-buttons').rrssb({
    title: '<?= $product->code . ' - ' . $product->name; ?>',
    url: '<?= site_url('product/' . $product->slug); ?>',
    image: '<?= base_url('assets/uploads/' . $product->image); ?>',
    description: '<?= $page_desc; ?>',
    // emailSubject: '',
    // emailBody: '',
  });
});
</script>
<?php
    } ?>
<script type="text/javascript">
<?php if ($message || $warning || $error || $reminder) {
        ?>
$(document).ready(function() {
    <?php if ($message) {
            ?>
        sa_alert('<?=lang('success'); ?>', '<?= trim(str_replace(["\r", "\n", "\r\n"], '', addslashes($message))); ?>');
    <?php
        }
        if ($warning) {
            ?>
        sa_alert('<?=lang('warning'); ?>', '<?= trim(str_replace(["\r", "\n", "\r\n"], '', addslashes($warning))); ?>', 'warning');
    <?php
        }
        if ($error) {
            ?>
        sa_alert('<?=lang('error'); ?>', '<?= trim(str_replace(["\r", "\n", "\r\n"], '', addslashes($error))); ?>', 'error', 1);
    <?php
        }
        if ($reminder) {
            ?>
        sa_alert('<?=lang('reminder'); ?>', '<?= trim(str_replace(["\r", "\n", "\r\n"], '', addslashes($reminder))); ?>', 'info');
    <?php
        } ?>
});
<?php
    } ?>
</script>
<script type="text/javascript" src="<?= base_url('assets/custom/shop.js') ?>"></script>
<!-- <script>
    if(!get('shop_grid')) {
        store('shop_grid', '.three-col');
    }
</script> -->
</script>
</body>
</html>
