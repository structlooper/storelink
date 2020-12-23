@extends('layouts.app')
@section('title')
Shop
@endsection

@section('style')
    <style>
        .position_class{
            max-width: 286px;
            margin-left: 85px;
            margin-top: 55px;
            overflow: auto;
        }
    </style>
@endsection

@section('content')






      <section class="shop-list section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-3" >
               <div id="fixSide" >
				   <div class="shop-filters" >
					  <div id="accordion">
						 <div class="card" >
							<div class="card-header" id="headingOne">
							   <h5 class="mb-0">
								  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      @if(Request::is('brands/*')) Category @else Sub-Category @endif <span class="mdi mdi-chevron-down float-right"></span>
								  </button>
							   </h5>
							</div>
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							   <div class="card-body card-shop-filters" style="max-height: 500px; overflow: auto">
								  <!--<form class="form-inline mb-3">-->
									 <!--<div class="form-group">-->
										<!--<input type="text" class="form-control" placeholder="Search By Category">-->
										<!--<button type="submit" class="pl-2 pr-2 btn btn-secondary btn-lg"><i class="mdi mdi-file-find"></i></button>-->
									 <!--</div>-->
								  <!--</form>-->

                          <?php $i=1;
                          foreach($subCatAll as $subCat) {   $idd="cb".$i; ?>

								 <div class="custom-control custom-checkbox">
                                     @if(Request::is('brands/*'))
                                         <a href="{{ route('shop_main',$subCat->slug)}}"  class="btn text-dark btn-outline-warning @if(Request::url() == route('shop',$subCat->slug)) active @endif"><?php echo $subCat->name; ?></a>

                                     @else
                                         <a href="{{ route('shop',$subCat->slug)}}"  class="btn text-dark btn-outline-warning @if(Request::url() == route('shop',$subCat->slug)) active @endif"><?php echo $subCat->name; ?></a>

                                         @endif


								  </div>
                          <?php $i++; } ?>

								  <!-- <div class="custom-control custom-checkbox"> -->
									 <!-- <input type="checkbox" class="custom-control-input" id="cb8">
									 <label class="custom-control-label" for="cb8">Fresh & Herbs <span class="badge badge-primary">5% OFF</span></label>
								  </div>  -->
								  <!-- <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb2">
									 <label class="custom-control-label" for="cb2">Seasonal Fruits <span class="badge badge-secondary">NEW</span></label>
								  </div>
								  <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb3">
									 <label class="custom-control-label" for="cb3">Imported Fruits <span class="badge badge-danger">10% OFF</span></label>
								  </div>
								  <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb4">
									 <label class="custom-control-label" for="cb4">Citrus <span class="badge badge-info">50% OFF</span></label>
								  </div>
								  <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb5">
									 <label class="custom-control-label" for="cb5">Cut Fresh & Herbs</label>
								  </div>
								  <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb6">
									 <label class="custom-control-label" for="cb6">Seasonal Fruits <span class="badge badge-success">25% OFF</span></label>
								  </div>
								  <div class="custom-control custom-checkbox">
									 <input type="checkbox" class="custom-control-input" id="cb7">
									 <label class="custom-control-label" for="cb7">Fresh & Herbs <span class="badge badge-primary">5% OFF</span></label>
								  </div> -->
							   </div>
							</div>
						 </div>
						 <!--<div class="card">-->
							<!--<div class="card-header" id="headingTwo">-->
							<!--   <h5 class="mb-0">-->
							<!--	  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
							<!--	  Price <span class="mdi mdi-chevron-down float-right"></span>-->
							<!--	  </button>-->
							<!--   </h5>-->
							<!--</div>-->
							<!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">-->
							<!--   <div class="card-body card-shop-filters">-->
							<!--	  <div class="custom-control custom-checkbox">-->
							<!--		 <input type="checkbox" class="custom-control-input" id="1">-->
							<!--		 <label class="custom-control-label" for="1">$68 to $659 <span class="badge badge-warning">50% OFF</span></label>-->
							<!--	  </div>-->
							<!--	  <div class="custom-control custom-checkbox">-->
							<!--		 <input type="checkbox" class="custom-control-input" id="2">-->
							<!--		 <label class="custom-control-label" for="2">$660 to $1014</label>-->
							<!--	  </div>-->
							<!--	  <div class="custom-control custom-checkbox">-->
							<!--		 <input type="checkbox" class="custom-control-input" id="3">-->
							<!--		 <label class="custom-control-label" for="3">$1015 to $1679</label>-->
							<!--	  </div>-->
							<!--	  <div class="custom-control custom-checkbox">-->
							<!--		 <input type="checkbox" class="custom-control-input" id="4">-->
							<!--		 <label class="custom-control-label" for="4">$1680 to $1856</label>-->
							<!--	  </div>-->
							<!--   </div>-->
							<!--</div>-->
						 <!--</div>-->
{{--						 <div class="card">--}}
{{--							<div class="card-header" id="headingThree">--}}
{{--							   <h5 class="mb-0">--}}
{{--								  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--								  Brand <span class="mdi mdi-chevron-down float-right"></span>--}}
{{--								  </button>--}}
{{--							   </h5>--}}
{{--							</div>--}}
{{--							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">--}}
{{--							   <div class="card-body card-shop-filters">--}}
{{--								  <!--<form class="form-inline mb-3">-->--}}
{{--									 <!--<div class="form-group">-->--}}
{{--										<!--<input type="text" class="form-control" placeholder="Search By Brand">-->--}}
{{--									 <!--</div>-->--}}
{{--									 <!--<button type="submit" class="btn btn-secondary ml-2">GO</button>-->--}}
{{--								  <!--</form>-->--}}
{{--								  <?php--}}
{{--								  $b=1;--}}
{{--								  foreach($brands as $brandd) { ?>--}}

{{--								  <div class="custom-control custom-checkbox">--}}
{{--									 <input type="checkbox" value="<?php echo $brandd->id ?>" class="custom-control-input bybrands" id="<?php echo "b".$b;?>">--}}
{{--									  <?php--}}
{{--								      if(is_null($brandd->slug))--}}
{{--								      { ?>--}}
{{--								         <a href="{{ $data['image_url'] }}../brands/7UP" >--}}
{{--								   <?php    }else {--}}
{{--								  ?>--}}
{{--								  <a href="{{ $data['image_url'] }}../shop/{{$brandd->slug}}" >--}}
{{--								      <?php } ?> <?php echo $brandd->name; ?></a>--}}

{{--									 <!--<span class="badge badge-warning">50% OFF</span>-->--}}

{{--								  </div>--}}
{{--								  <?php $b++; } ?>--}}
{{--								  <!--<div class="custom-control custom-checkbox">-->--}}
{{--									 <!--<input type="checkbox" class="custom-control-input" id="b2">-->--}}
{{--									 <!--<label class="custom-control-label" for="b2">Seasonal Fruits <span class="badge badge-secondary">NEW</span></label>-->--}}
{{--								  <!--</div>-->--}}

{{--							   </div>--}}
{{--							</div>--}}
{{--						 </div>--}}
{{--						 <div class="card">--}}
{{--							<div class="card-header" id="headingThree">--}}
{{--							   <h5 class="mb-0">--}}
{{--								  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">--}}
{{--								  Category<span class="mdi mdi-chevron-down float-right"></span>--}}
{{--								  </button>--}}
{{--							   </h5>--}}
{{--							</div>--}}
{{--							<div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">--}}
{{--							   <div class="card-body" style="max-height: 500px; overflow: auto;">--}}
{{--								  <div class="list-group">--}}
{{--								      <?php foreach($randcat as $cat) {--}}
{{--								      ?>--}}
{{--									 <a href="{{ $data['image_url'] }}../shop-main/{{$cat->slug}}" class="list-group-item list-group-item-action"><?php echo $cat->name; ?></a>--}}
{{--									 <?php } ?>--}}

{{--								  </div>--}}
{{--							   </div>--}}
{{--							</div>--}}
{{--						 </div>--}}
					  </div>
				   </div>
				   <div class="left-ad mt-4">
					  <img class="img-fluid" src="http://via.placeholder.com/254x557" alt="">
				   </div>
				</div>
				</div>
               <div class="col-md-9">
{{--                  <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>--}}
                  <div class="shop-head">
{{--                     <a href="#"><span class="mdi mdi-home"></span> Home</a> <span class="mdi mdi-chevron-right"></span> <a href="#"></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>--}}
                     <!--<div class="btn-group float-right mt-2">-->
                     <!--   <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                     <!--   Sort by Products &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                     <!--   </button>-->
                        <!--<div class="dropdown-menu dropdown-menu-right">-->
                        <!--   <a class="dropdown-item" href="#">Relevance</a>-->
                        <!--   <a class="dropdown-item" href="#">Price (Low to High)</a>-->
                        <!--   <a class="dropdown-item" href="#">Price (High to Low)</a>-->
                        <!--   <a class="dropdown-item" href="#">Discount (High to Low)</a>-->
                        <!--   <a class="dropdown-item" href="#">Name (A to Z)</a>-->
                        <!--</div>-->
                     <!--</div>-->
                     <h5 class="mb-3"><?php echo $catdata[0]->name; ?></h5>
                  </div>
                  <div id="ajax12345" class="row no-gutters">
                       </div>
                   <div id="ajax1234" class="row no-gutters">
                       </div>
                  <div id="ajax123" class="row no-gutters">

                  <?php foreach($allProduct as $product)
                  {

                     // echo $product->quantity;
                     ?>
                     <div class="col-md-4">
                        <div class="product">
                           <a href="../single/<?php echo $product->slug; ?>">
                              <div class="product-header">
                                 <span class="badge badge-success"><?php  $discountinper=100*($product->cost-$product->price)/ $product->cost;  echo round($discountinper);?>% OFF</span>
                                 <img class="img-fluid" src="{{ $data['image_url'].'assets/uploads/thumbs/'.$product->image ?? asset('website/img/item/7.jpg') }}" alt="">
                                 <span class="veg text-success mdi mdi-circle"></span>
                              </div>
                              <div class="product-body">
                                 <h5><?php echo $product->name; ?></h5>
{{--                                 <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - <?php print_r($product->unit); ?></h6>--}}
                              </div>
                              <div class="product-footer">
                              <?php if($product->quantity>0) { ?>
                                 <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                 <?php } else {?>
                                 <button disabled type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i>Out of stock</button>
                                 <?php } ?>
                                 <p class="offer-price mb-0"><?php  print_r(number_format((float)$product->price, 2, '.', '')); ?> ₹<i class="mdi mdi-tag-outline"></i><br><span class="regular-price"><?php  print_r(number_format((float)$product->cost, 2, '.', '')); ?> ₹</span></p>
                              </div>
                           </a>
                        </div>
                     </div>
                  <?php } ?>

                  </div>

               </div>
            </div>
         </div>
      </section>
{{--      <section class="product-items-slider section-padding bg-white border-top">--}}
{{--         <div class="container">--}}
{{--            <div class="section-header">--}}
{{--               <h5 class="heading-design-h5">Best Offers View <span class="badge badge-primary">20% OFF</span>--}}
{{--                  <a class="float-right text-secondary" href="shop.html">View All</a>--}}
{{--               </h5>--}}
{{--            </div>--}}
{{--            <div class="owl-carousel owl-carousel-featured">--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/7.jpg" alt="">--}}
{{--                           <span class="veg text-success mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/8.jpg" alt="">--}}
{{--                           <span class="non-veg text-danger mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/9.jpg" alt="">--}}
{{--                           <span class="non-veg text-danger mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/10.jpg" alt="">--}}
{{--                           <span class="veg text-success mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/11.jpg" alt="">--}}
{{--                           <span class="veg text-success mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--               <div class="item">--}}
{{--                  <div class="product">--}}
{{--                     <a href="single.html">--}}
{{--                        <div class="product-header">--}}
{{--                           <span class="badge badge-success">50% OFF</span>--}}
{{--                           <img class="img-fluid" src="img/item/12.jpg" alt="">--}}
{{--                           <span class="veg text-success mdi mdi-circle"></span>--}}
{{--                        </div>--}}
{{--                        <div class="product-body">--}}
{{--                           <h5>Product Title Here</h5>--}}
{{--                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>--}}
{{--                        </div>--}}
{{--                        <div class="product-footer">--}}
{{--                           <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>--}}
{{--                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>--}}
{{--                        </div>--}}
{{--                     </a>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </div>--}}
{{--      </section>--}}

      @endsection

@section('js')
    <script>
        let isMobile = false; //initiate as false
        // device detection
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
            isMobile = true;
        }
        if (isMobile === false) {
            $(window).scroll(function () {
                let topOfFooter = $('#footer').position().top;

                // Distance user has scrolled from top, adjusted to take in height of sidebar (570 pixels inc. padding).
                let scrollDistanceFromTopOfDoc = $(document).scrollTop() + 500;
                console.log(topOfFooter + ' ' + scrollDistanceFromTopOfDoc)
                // Difference between the two.
                let scrollDistanceFromTopOfFooter = scrollDistanceFromTopOfDoc - topOfFooter;
                // If user has scrolled further than footer,

                if ($(window).scrollTop() >= 80) {
                    $('#fixSide').addClass('fixed-top col-md-3 position_class')
                    $('#collapseOne').addClass('show')

                } else {
                    $('#fixSide').removeClass('fixed-top col-md-3 position_class')
                    // $('.collapse').removeClass('show')
                }

                if (scrollDistanceFromTopOfDoc > topOfFooter) {
                    $('#fixSide').removeClass('fixed-top col-md-3 position_class')
                    $('.collapse').removeClass('show')
                }
            });
        }
    </script>
@endsection
