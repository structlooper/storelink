<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<!-- Start: Store Navigation -->
<div class="sub-header" id="site-nav">
        <div class="sub-header__wrapper">
            <div class="wrapper">
                <div class="sub-header_left"><a href="<?= site_url()?>"><span><br><i class="fas fa-store mr-2"></i>Super Store - Gurgaon Surya Vihar ES2<br></span></a></div>
                <div class="sub-header_right">
                    <ul class="list-inline mb-0">
                        <?php
                            $r = 0;
                            foreach (array_chunk($categories, 1) as $cats) {
                        ?>
                        <?php
                            if($r <= 4){
                            foreach ($cats as $ctg) {
                        ?>
                                <li class="list-inline-item"><a href="<?= site_url('category/' . $ctg->slug) ?>"><?= $ctg->name; ?></a></li>
                            <?php }}?>
                            <?php $r++; } if($r > 4){ ?>
                        <li class="list-inline-item more-category"><a href="#">More<i class="icon-arrow-down ml-2"></i></a>
                            <ul class="list-unstyled list-more-category hide text-left">
                                    <?php
                                    $r = 0;
                                    foreach (array_chunk($categories, 1) as $cats) {
                                ?>
                                <?php
                                    if($r > 4){
                                    foreach ($cats as $ctg) {
                                ?>
                                <li><a href="<?= $ctg->slug; ?>"><?= $ctg->name; ?></a></li>
                                <?php }}?>
                            <?php $r++; } }?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Store Navigation -->



<div class="container mt-5">
        <div class="product-navigation">
            <div class="row">
                <div class="col-xl-3">
                    <div class="side-nav border-right">
                        <h6 class="font-weight-bold my-5"><a class="text-decoration-none" href="#">Grocery &amp; Staples</a></h6>
                        <ul class="nav category-list">
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Pulses</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Arhar</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Moong</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Urad</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Rajma & Chana</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Soya</div></a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Atta &amp; Other Flours</span></div>
                                </a>
                            <ul class="category-list-sublist">
                                <li class="category-list-subitem"><a href="#"><div class="category-item-details">Atta</div></a></li>
                                <li class="category-list-subitem"><a href="#"><div class="category-item-details">Besan & Sooji/Rava</div></a></li>
                                <li class="category-list-subitem"><a href="#"><div class="category-item-details">Other Flours</div></a></li>
                                <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Flours</div></a></li>
                            </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Rice &amp; Other Grains</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Basmati</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Sonamasuri & Kolam</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Other Rice</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Poha</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Daliya</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Dry Fruits &amp; Nuts</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Almonds & Cashews</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Nuts & Seeds</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Other Dry Fruits</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Dates</div></a></li>
                                    <li class="category-list-subitem"><a href="nav-link nav-detail"><div class="category-item-details">Dry Fruits Gift Packs</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Edible Oils</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Health Oils</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Mustard Oils</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Sunflower Oils</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Olive Oils</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Rice Bran Oil</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Ghee &amp; Vanaspati</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Ghee</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Vanaspati</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Spices</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Whole Spices</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Powered Spices</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Ready Masala</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Cooking Paste & Others</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Salt &amp; Sugar</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Sugar</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Salt</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Sugar Free</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Jaggery & Others</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><i class="icon ion-plus"></i><span>Organic Staples</span></div>
                                </a>
                                <ul class="category-list-sublist">
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Pulses</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Flour</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Spices</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Rice</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Salt</div></a></li>
                                    <li class="category-list-subitem"><a href="#"><div class="category-item-details">Organic Sugar</div></a></li>
                                </ul>
                            </li>
                            <li class="nav-item category-list-item">
                                <a class="nav-link nav-detail p-0" href="#">
                                    <div class="category-item-details"><span>Grocery Best Offers</span></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="section-right">
                        <div class="category-navs">
                            <div class="img-widget-box"><img class="img-fluid" src="https://grofers.com/images/banners/banner-edlp-e3d1bbb.jpg"><a class="banner-help" href="#"><img data-toggle="tooltip" data-bs-tooltip="" data-placement="right" class="img-widget-info-icon" src="https://grofers.com/images/info-icon-e12305e.png" title="Terms &amp; Conditions"></a></div>
                            <ol
                                class="breadcrumb breadcrumb-navs">
                                <li class="breadcrumb-item"><a href="#"><span>Home</span></a></li>
                                <li class="breadcrumb-item"><a href="#"><span>Grocery &amp; Staples</span></a></li>
                                <li class="breadcrumb-item"><a href="#"><span>Pulses</span></a></li>
                                </ol>
                                <p class="category-navs__current">Pulses</p>
                                <div class="product-filter">
                                    <div><label class="dropdown__title-label mb-0">Sort by</label><select class="custom-select dropdown__menu"><option value="" selected="">Relevance</option><option value="">Price (Low to High)</option><option value="">Price (High to Low)</option><option value="">Discount (High to Low)</option><option value="">Name (A - Z)</option></select></div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="products-top-list mt-0 product-grid">
                                <div class="products-top-inner">
                                    <div class="row">
                                        <div id="results" class="grid"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
