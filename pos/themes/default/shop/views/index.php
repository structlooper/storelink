<!-- Start: Store Navigation -->
<div class="sub-header" id="site-nav">
        <div class="sub-header__wrapper">
            <div class="wrapper pos-wrapper">
                <div class="sub-header_right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#">Home</a></li>
                        <?php

                        if ($isPromo) {
                                    ?>
                            <li class="list-inline-item <?= $m == 'shop' && $v == 'products' && $this->input->get('promo') == 'yes' ? 'active' : ''; ?>"><a href="<?= shop_url('products?promo=yes'); ?>"><?= lang('promotions'); ?></a></li>
                            <?php
                                } ?>
                        <li class="list-inline-item more-category" id="categories-dropdown"><a href="javascript:void(0)">Categories<i class="icon-arrow-down ml-2"></i></a>
                            <ul class="list-unstyled list-more-category hide text-left" id="categories-sublist">
                            <?php
                            foreach ($categories as $pc) {
                        ?>
                                <li><a href="<?= site_url('category/' . $pc->slug) ?>"><?= $pc->name; ?></a></li>
                            <?php }?>
                            </ul>
                        </li>
                        <li class="list-inline-item more-category" id="brands-dropdown"><a href="javascript:void(0)">Brands<i class="icon-arrow-down ml-2"></i></a>
                        <ul class="list-unstyled list-more-category hide text-left" id="brands-sublist">
                        <?php
                            $r = 0;
                            foreach (array_chunk($brands, 1) as $bd) {
                        ?>
                        <?php
                            foreach ($bd as $bs) {
                        ?>
                                <li><a href="<?= site_url('brands/' . $bs->id) ?>"><?= $bs->name; ?></a></li>
                            <?php }?>
                            <?php $r++; }?>
                            </ul>
                        </li>
                        <li class="list-inline-item <?= $m == 'shop' && $v == 'products' && $this->input->get('promo') != 'yes' ? 'active' : ''; ?>"><a href="<?= shop_url('products'); ?>">Products</a></li>
                        <li class="list-inline-item"><a href="#">Checkout</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Store Navigation -->
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="store-categories">
                    <a href="nv/products-grid.html">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-16.jpg"></div>
                            <div class="product-title">
                                <h6>Grocery &amp; Staples<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1487.jpg"></div>
                            <div class="product-title">
                                <h6>Vegetables &amp; Fruits<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-163.jpg"></div>
                            <div class="product-title">
                                <h6>Personal Care<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-18.jpg"></div>
                            <div class="product-title">
                                <h6>Household Items<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1878.jpg"></div>
                            <div class="product-title">
                                <h6>Kitchen &amp; Dining Needs<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-13.jpg"></div>
                            <div class="product-title">
                                <h6>Biscuits, Snacks &amp; Chocolates<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-12.jpg"></div>
                            <div class="product-title">
                                <h6>Beverages<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-14.jpg"></div>
                            <div class="product-title">
                                <h6>Breakfast &amp; Diary<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1616.jpg"></div>
                            <div class="product-title">
                                <h6>Best Value<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-15.jpg"></div>
                            <div class="product-title">
                                <h6>Noodles, Sauces &amp; Instant Food<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1379.jpg"></div>
                            <div class="product-title">
                                <h6>Home Furnishing and Decor<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-4.jpg"></div>
                            <div class="product-title">
                                <h6>Fresh &amp; Frozen<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1788.jpg"></div>
                            <div class="product-title">
                                <h6>Lowest Price<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-5.jpg"></div>
                            <div class="product-title">
                                <h6>Pet Care<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-7.jpg"></div>
                            <div class="product-title">
                                <h6>Baby Care<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1047.jpg"></div>
                            <div class="product-title">
                                <h6>Home Accessories<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1710.jpg"></div>
                            <div class="product-title">
                                <h6>Fashion &amp; Lifestyle<br></h6>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="store-categories--product">
                            <div class="product-image"><img src="https://webcdn.grofers.com/cdn/pdp/category-l0-1879.jpg"></div>
                            <div class="product-title">
                                <h6>Home Appliances<br></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>



    <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">

        <div class="carousel-inner">
            <?php foreach ($primary_banner as $key => $bnr) {  ?>
            <div class="carousel-item  <?php if($key == 0){ ?>active <?php }?>">
                <img src="<?= $bnr['image'] ?>" class="d-block w-100" alt="..."  height="400">
            </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only ">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">
            <div class="col">
                <div class="products-top-list mt-0">
                    <div class="products-top-listbar">
                        <h5 class="mb-0 head"><?= lang('fruits-veggies')?></h5><a class="btn btn-more --><?= $m == 'shop' && $v == 'products' && $this->input->get('promo') != 'yes' ? 'active' : ''; ?>" href="<?= shop_url('products'); ?>">See all</a></div>
                        <?php
                            $r = 0;
                            foreach (array_chunk($featured_products, 4) as $fps) {
                        ?>
                    <div class="products-top-inner">
                        <div class="row">
                        <?php
                            foreach ($fps as $fp) {
                        ?>
                            <div class="col-6 col-lg-3 px-2">

                                <div class="card product-card">
                                <a href="--><?= site_url('product/' . $fp->slug); ?>" style="text-decoration:none">
                                    <div class="card-body p-3">
                                    <?php
                                        if ($fp->promotion) {
                                    ?>
                                    <div class="offer-tag"><span class="badge badge-success">59% OFF</span></div>
                                    <?php
                                        }
                                    ?>
                                        <div class="products-top-inner-img"><img class="img-fluid" src="--><?= base_url('assets/uploads/' . $fp->image); ?>" alt="<?= $fp->name; ?>"></div>
                                        <div class="products-top-price mt-3">
                                        <?php
                                                            if ($fp->promotion) {
                                                                echo '<h5 class="mb-0">'.$this->sma->convertMoney($fp->promo_price). '</h5>';
                                                                echo '<p class="text-muted mb-0">' . $this->sma->convertMoney(isset($fp->special_price) && !empty(isset($fp->special_price)) ? $fp->special_price : $fp->price) . '<br></p>';

                                                            } else {
                                                                echo '<h5 class="mb-0">'.$this->sma->convertMoney(isset($fp->special_price) && !empty(isset($fp->special_price)) ? $fp->special_price : $fp->price).'</h5>';
                                                            } ?>
                                        </div>
                                        <div class="products-top-list-inner">
                                            <p class="mb-0 product-name"><?= $fp->name; ?><br></p>
                                            <p class="text-muted">4 units (0.75-1 kg)<br></p>
                                        </div>
                                    </a>
                                        <div class="btn-group cart-button-group add-to-cart" role="group" data-id="--><?//= $fp->id; ?><!--"><button class="btn btn-add-left" type="button">ADD</button><button class="btn btn-add-right" type="button">+</button></div>
                                    </div>
                                </div>

                            </div>
                        <?php }?>
                        </div>
                    </div>
                <?php $r++; }?>
                </div>
            </div>
        </div>
<div class=" container">
    <div class="col-12">
        <div class="delivery-note"><img class="img-fluid" src="https://cdn.grofers.com/layout-engine/2020-10/Gif-FnV-2.gif" draggable="false"></div>
    </div>
</div>
<!-- Section Start: Categories-->
<div class="row mt-3">
            <div class="col-12">
                <div class="cat-box">
                    <div class="cat-box-outer">
                        <div class="row">
                            <div class="col-2">
                                <div class="cat-image"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,w=145,h=140/app/images/category/cms_images/icon/icon_cat_16_v_3_500_1605795544.jpg"></div>
                            </div>
                            <div class="col">
                                <div>
                                    <p class="promo-offer">Upto 72% off</p>
                                    <h5 class="cat-head">Grocery &amp; Staples</h5>
                                    <p class="cat-items">Pulses, Atta &amp; Other Flours, Rice &amp; Other Grains, Dry Fruits &amp; Nuts, Edible Oils, Ghee &amp; Vanaspati, Spices, Salt &amp; Sugar, Organic Staples, Grocery Best Offers<br></p>
                                </div>
                                <div class="view-cat"><i class="icon-arrow-down"></i></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="cat-sublist">
                                    <div class="cat-sublist-flex">
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Pulses</p>
                                            <p class="promo-offer">Upto 44% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Atta &amp; Other Flours</p>
                                            <p class="promo-offer">Upto 55% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Rice &amp; Other Grains</p>
                                            <p class="promo-offer">Upto 57% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Dry Fruits &amp; Nuts</p>
                                            <p class="promo-offer">Upto 72% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Edible Oils</p>
                                            <p class="promo-offer">Upto 67% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Ghee &amp; Vanaspati</p>
                                            <p class="promo-offer">Upto 26% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Spices</p>
                                            <p class="promo-offer">Upto 45% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Salt &amp; Sugar</p>
                                            <p class="promo-offer">Upto 54% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Organic Staples</p>
                                            <p class="promo-offer">Upto 23% off</p>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="cat-sublist-box"><img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=50,h=64/app/images/category/cms_images/icon/1010_1602132172454.png">
                                            <p class="cat-head">Grocery Best Offers</p>
                                            <p class="promo-offer">Upto 60% off</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
       <!-- Section End-->                 
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>