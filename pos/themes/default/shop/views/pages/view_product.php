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
                            <?php $r++; }?>
                            
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
                            <?php $r++; }?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Store Navigation -->
<div class="wrapper wrapper-product">
        <div class="container">
            <div class="product-detail">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-image-slider">
                            <div class="img-wrapper"><img class="img-fluid" src="<?= base_url() ?>assets/uploads/<?= $product->image ?>"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="offer-tag offer-tag-inner">
                            <?php
                                if (!$featured_products->promotion) {
                                ?>
                                <span class="badge badge-success">Promo</span>
                                <?php
                                    } 
                                ?>
                            </div>
                            <h5 class="product-name"><?= $product->name; ?><?php if (!empty($product->second_name)) { ' '.$product->second_name; }?><br></h5>
                            <div class="product-rating">
                                <div class="rating-score"><span>4.2</span></div>
                                <div class="rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            </div>
                            <div class="brand-more">
                                <p>More by&nbsp;<?= $brand ? '<a href="' . site_url('brand/' . $brand->slug) . '" class="line-height-lg">' . $brand->name . '</a>' : ''; ?><i class="la la-angle-right ml-1"></i></a></p>
                            </div>
                            
                            <h5 class="<?php if($product->promotion){ echo'product-mrp';}else{echo 'product-price';}?> mb-0">Product MRP: <?php if (!$shop_settings->hide_price) { ?>
                            <span class="ml-2 <?php if ($product->promotion) {echo 'product-price-old';}else{echo 'product-price-new';}?>"><?= '₹'.$this->sma->convertMoney(isset($product->special_price) ? $product->special_price : $product->price); ?></span>
                            <?php } ?></h5>
                            <?php if ($product->promotion) {?>
                            <h5 class="product-price mb-0">Selling Price:<span class="ml-2 product-price-new"><?php echo '₹'.$this->sma->convertMoney($product->promo_price);?></span></h5><?php }?>
                                <span class="product-tax-disclaimar">(Inclusive of all taxes)<br></span>
                            <div class="location-tooltip">
                                <div class="tooltip-inner-head"><span class="font-weight-bold price-tooltip">Prices shown are for Gurugram.&nbsp;<span class="font-weight-normal">Where are you?</span></span><span class="close-tooltip"><i class="la la-close"></i></span></div>
                                <form class="location-detect"
                                    method="post">
                                    <div class="form-group">
                                        <div class="input-group"><input class="form-control" type="text" placeholder="Type your City (e.g Chennai, Pune)">
                                            <div class="input-group-append"><button class="btn btn-detect" type="button"><i class="typcn typcn-location-arrow-outline mr-1"></i>Detect</button></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php if (!$shop_settings->hide_price) {
                                                        ?>
                                        <?php if (($product->type != 'standard' || $warehouse->quantity > 0) || $Settings->overselling) {
                                                            ?>
                            <div class="product-variants-list"><label>Available in:</label>
                                <div class="variant-button-group"><button class="btn variant-selected" type="button">1 <?= $unit->name; ?></button><button class="btn" type="button">500 <?= $unit->name ?></button></div>
                            </div>
                            <div class="product-add-cart"><button class="btn btn-cart" type="button">Add to Cart</button></div>
                            <?php } else {
                                echo '<h6 class="mt-3">' . lang('item_out_of_stock') . '</h6>';
                            } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product-details-main">
                            <h6 class="product-details-header">Product Details</h6>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Key Features</span></div>
                                <div class="product-attr-desc"><span>Premium quality grains<br></span><span>Naturally healthy and tasty<br></span><span>Rich in protein and dietary fibre<br></span><span>Popularly used in making salads, curries and sprouts<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Unit</span></div>
                                <div class="product-attr-desc"><span><?= $unit->name; ?><br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Color</span></div>
                                <div class="product-attr-desc"><span>Green<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Shelf Life</span></div>
                                <div class="product-attr-desc"><span>6 months<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Manufacturer Details</span></div>
                                <div class="product-attr-desc"><span>Udit Fresh Foods Pvt. Ltd, C-465, DSIDC Narela Industrial Area, Delhi-110040, India Fssai Lic No.: 10013011001235 , J. P. Broadline Distribution Co. Pvt. Ltd, PLOT NO-A-255, TTC INDUSTRIAL, AREA,MIDC AREA ,MAHAPE-400705, Navi Mumbai Municipal Corporation (Thane Zone-2) (Maharashtra) - 400705, Fssai Lic No. : 11518015000256,PUNIT PROTEINS PVT LTD, SANGMA ROAD PADKA,DIST VADODARA, Pincode : 391440, Fssai Lic No. :10713024000357MAYURANK FOODS , H.No-115F/116F)S.M.BOSE/ ROAD,PANIHATI,OPP,DUCKBACK FACTORY,P.O.AGARPARA,KOLKATA-700109,WARD-09, PANIHATI MUNICIPALITY, North Twenty Four Parganas(West Bengal) -700109, Fssai Lic No. 12819013000386 |VIAND FOODS, -NO:4-122/1,TURKYAMJAL,HAYATHNAGAR(MDL), R.R DIST, FSSAI Lic No. 13617010000319 | Ramalingeshwara food Processors, #18-4-42/3/3 TO 4,Shamsheergunj,Hyderabad, Telangana-500053, FSSAI Lic No. 13614015000670 |"GPA FOODS PVT LTD2262-2265, HSIIDC INDUSTRIAL AREA,FOOD PARK,RAI,Sonepath131029 ;fssai no-10814020000067""GPA FOODS PVT LTD/"TIRUPATI FOODS INDUSTRIES PVT LTD 409, FOOD PARK HSIIDC, RAI Sonepath 131029, FSSAI No-10814020000034<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Marketed By</span></div>
                                <div class="product-attr-desc"><span>Hands On Trades Pvt. Ltd.<br>19, RPS, Sheikh Sarai 1<br>New Delhi - 110 017<br>10017011003999<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Country of Origin<br></span></div>
                                <div class="product-attr-desc"><span>India<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Seller<br></span></div>
                                <div class="product-attr-desc"><span>90Minutes Retail Pvt Ltd (https://bit.ly/2QuoDoe)<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Description<br></span></div>
                                <div class="product-attr-desc"><span>With the Grofers Mother's Choice Chilka/Split Green Moong Dal, you will be living and eating healthy. One of the easiest foods to digest, Chilka/Split Moong Dal is an excellent substitute in diets and weight loss plans. A powerhouse of proteins, Chilka is an important part of the vegetarian diet. Rich in iron and lowers the blood pressure. Moong dal is great for improving blood circulation in the body. Immense care has been taken to source premium-quality grains for this product.<br></span></div>
                            </div>
                            <div class="product-attributes">
                                <div class="product-attr-name"><span>Disclaimer<br></span></div>
                                <div class="product-attr-desc"><span>Every effort is made to maintain accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.<br></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (!empty($other_products)) {
            ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="products-top-list mt-0 products-top-list-inner">
                    <div class="products-top-listbar">
                        <h5 class="mb-0 head">More like this</h5>
                    </div>
                    <div class="products-top-inner">
                        <div class="row">
                        <?php
                            $r = 0;
                            foreach (array_chunk($other_products, 1) as $fps) {
                        ?>
                        <?php
                            foreach ($fps as $fp) {
                        ?>
                            <div class="col-6 col-lg-3 px-2">
                                <div class="card product-card">
                                    <div class="card-body p-3">
                                    <a href="<?= site_url('product/' . $fp->slug); ?>">
                                    <?php
                                        if ($fp->promotion) {
                                    ?>
                                    <span class="badge badge-right theme"><?= lang('promo'); ?></span>
                                    <?php
                                    } ?>
                                        <div class="products-top-inner-img">
                                            <?php if(!empty($ctg->image)):?>
                                                <img src="<?php echo base_url('assets/uploads/' . $fp->image);?>" class="img-fluid" alt="<?= $fp->name; ?>">
                                            <?php else:?>
                                                <img src="<?php echo base_url('assets/uploads/icecream.jpg');?>" class="img-fluid" alt="<?= $fp->name; ?>">
                                            <?php endif?>
                                        </div>
                                        <?php if (!$shop_settings->hide_price) { ?>
                                        <div class="products-top-price">
                                        <?php
                                        if ($fp->promotion) {
                                            echo '<h5 class="mb-0 mt-2">₹' .$this->sma->convertMoney($fp->promo_price). '<br></h5>';
                                            echo '<p class="text-muted mb-0 mt-2"><span style="text-decoration: line-through;">₹'.$this->sma->convertMoney(isset($fp->special_price) && !empty($fp->special_price) ? $fp->special_price : $fp->price).'</span><br></p>';
                                        } else {
                                            echo '<h5 class="mb-0 mt-2">₹'.$this->sma->convertMoney(isset($fp->special_price) && !empty($fp->special_price) ? $fp->special_price : $fp->price).'<br></h5>';
                                        } ?>
                                        </div>
                                        <div class="products-top-list-inner">
                                            <p class="product-name"><?= $fp->name; ?><br></p>
                                        </div>
                                    </a>
                                        <div class="btn-group cart-button-group" role="group"><button class="btn btn-add-left" type="button">ADD</button><button class="btn btn-add-right" type="button">+</button></div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php $r++;}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>