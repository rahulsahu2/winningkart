@extends('layouts.app')
@section('content')
<?php 
    $env = env('API_IMAGE_URL');
    $jsonArray = json_decode($setting, true);
    $commonsetting = json_decode($commonsetting, true);
    $GetTopRatedProducts = json_decode($GetTopRatedProducts, true);
    $FlashSaleProductsList = json_decode($GetFlashSaleProductsList, true);
    $FeaturedProducts = json_decode($FeaturedProductsList, true);
    $NewProducts = json_decode($NewProductsList, true);
    $seller = json_decode($myShop, true);

    $bestofferproducts = $jsonArray['bestofferproducts'] ?? [];
    $influencerPicks = $jsonArray['influencerPicks'] ??[];
    $section8 = $jsonArray['section8'] ??[];
    $topbrands = $jsonArray['topbrands'] ??[];
    $featuredBrandProducts = $jsonArray['featuredCategoryProducts'] ?? [];
    $topCategoriesProducts = $jsonArray['topCategoriesProducts'] ??[];
    $bestDiscountProducts = $jsonArray['bestDiscountProducts'] ??[];
?>

<!-- More Categories For You -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][0]['custom'] ?? ""}}</h3>

        <div class="moreCatemain">
            <div class="swiper moreCatemainSlider">
                <div class="swiper-wrapper">
                    @if($jsonArray && array_key_exists("homepage_categories",$jsonArray))
                    @foreach($jsonArray['homepage_categories'] as $key => $value)
                    <div class="swiper-slide">
                        <div class="moreCateCard">
                            <div class="moreCateCardImg">
                                <a href="#!">
                                    <img src="{{env('API_IMAGE_URL').$value['image']}}" alt="{{$value['slug']}}">
                                </a>
                            </div>
                            <h3>{{$value['name']}}</h3>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][1]['custom'] ?? ""}}</h3>
        <div class="beautyslidemain">
            <div class="swiper beautySlider">
                <div class="swiper-wrapper">
                    @if($jsonArray && array_key_exists("sliders",$jsonArray))
                    @foreach($jsonArray['sliders'] as $slider)
                    @if($slider['status'] == 1)
                    <div class="swiper-slide beautySliderslide">
                        <img src="{{env('API_IMAGE_URL').$slider['image']}}" alt="{{$slider['product_slug']}}">
                        <div class="beautySlideTitle">
                            <h3>{{$slider['title_two']}}</h3>
                            <a href="/product/{{$slider['serial']}}"><i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>

<!-- Best Offers For You -->
<section>
    <div class="container">
        <h3 class="secTitle text-center">{{$jsonArray['section_title'][2]['custom'] ?? ""}}</h3>
        <div class="row">
            @foreach($bestofferproducts as $product)
            <div class="col-lg-3 col-md-6 px-2">
                <a href="/product/{{$product['product']['slug']}}" class="text-decoration-none">
                    <div class="brandLoveMain">
                        <div class="brandLoveImg">
                            <span class="pdbadge">{{ number_format((($product['product']['price'] - $product['product']['offer_price']) /
                                $product['product']['price']) * 100,2)}}% OFF</span>
                            <img src="{{$env.$product['product']['thumb_image']}}" alt="{{$product['product']['slug']}}">
                        </div>
                        <div class="brandLoveInfo">
                            <p>{{$product['product']['name']}}</p>
                            <span>In offer</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Shop By COncern -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][3]['custom'] ?? ""}}</h3>
        <div class="row">
            <?php $trproducts = $jsonArray['shopbyconcern'] ?? [];?>
            <div class="col-lg-6">
                <div class="boxesRow">
                    @php $count = 0; @endphp
                    @foreach($trproducts as $arr)
                    @if($arr['ismain'] == 0)
                    @php $count = $count +1; @endphp
                    <div class="boxesCol">
                        <img src="{{env('API_IMAGE_URL').$arr['image'] ?? ''}}" alt="{{$arr['title'] ?? ''}}">
                        <a href="{{$arr['link'] ?? ''}}">{{$arr['title'] ?? ''}}</a>
                    </div>
                    @if($count == 3)
                    @break
                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        @foreach($trproducts as $arr)
                        @if($arr['ismain'] == 1)
                        <div class="largeBanner">
                            <img src="{{env('API_IMAGE_URL').$arr['image'] ?? ''}}" alt="{{$arr['title'] ?? ''}}">
                            <a href="{{$arr['id'] ?? ''}}">{{$arr['title'] ?? ''}}</a>
                        </div>
                        @break
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div class="boxesRow">
                            @php $count = 0; @endphp
                            @foreach($trproducts as $arr)
                            @if($arr['ismain'] == 0)
                            @php $count = $count +1; @endphp
                            @if($count > 3)
                            <div class="boxesCol w-100">
                                <img src="{{env('API_IMAGE_URL').$arr[$arrCount]['image'] ?? ''}}"
                                    alt="{{$arr[$arrCount]['title'] ?? ''}}">
                                <a href="{{$arr[$arrCount]['link'] ?? ''}}">{{$arr[$arrCount]['title'] ?? ''}}</a>
                            </div>
                            @endif
                            @if($count == 3)
                            @break
                            @endif
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop By COncern -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][4]['custom'] ?? ''}}</h3>
        <div class="row justify-content-center">
            @foreach($topbrands as $flashsale)
            <div class="col-lg-4 col-md-6">
                <div class="brandsCard">
                    <a href="{{$flashsale['link']}}">
                        <div class="brandsCardimg">
                            <img src="{{env('API_IMAGE_URL').$flashsale['image']}}" alt="{{$flashsale['title']}}">
                        </div>
                        <div class="brandsCardinfo">
                            <h3>{{$flashsale['title']}}</h3>
                            <p>{{$flashsale['description']}}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- 2 banner -->
<section>
    <div class="container-fluid">
        <!-- <h3 class="secTitle">Top Brands</h3> -->
        <div class="row justify-content-center">
            <?php $banner = $jsonArray['sliderBannerOne'] ?? [] ?>
            <div class="col-lg-6 col-md-6">
                <div class="bannersCard">
                    <a href="/products/{{$banner['id'] ?? ''}}">
                        <img src="{{env('API_IMAGE_URL').$banner['image'] ?? ''}}"
                            alt="{{$banner['product_slug'] ?? ''}}">
                    </a>
                </div>
            </div>
            <?php $banner = $jsonArray['sliderBannerTwo'] ?? [] ?>
            <div class="col-lg-6 col-md-6">
                <div class="bannersCard">
                    <a href="/products/{{$banner['id'] ?? ''}}">
                        <img src="{{env('API_IMAGE_URL').$banner['image'] ?? ''}}"
                            alt="{{$banner['product_slug'] ?? ''}}">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Only at winnigkart -->
<!-- <section>
            <div class="container-fluid">
                <h3 class="secTitle">{{$jsonArray['section_title'][5]['custom'] ?? ''}}</h3>
                <div class="beautyslidemain">
                    <div class="swiper onlyAtWinningSlider">
                        <div class="swiper-wrapper">
                        @if($seller && array_key_exists("products",$seller))
                            @foreach($seller['products']['data'] as $fproduct)
                                <div class="swiper-slide">
                                    <div class="onlyAtWinningcard">
                                        <a href="/produts/{{$fproduct['id']}}">
                                        <img src="{{env('API_IMAGE_URL').$fproduct['thumb_image']}}" alt="{{$fproduct['slug']}}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="swiper-button-next custNavbtn"></div>
                        <div class="swiper-button-prev custNavbtn"></div>
                    </div>
                </div>
            </div>
        </section> -->

<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][6]['custom'] ?? ''}}</h3>
        <div class="bannersCard">
            <?php $bannersale =  $jsonArray['flashSale'] ?? []; ?>
            <a href="/sale/{{$bannersale['id'] ?? ''}}">
                <img src="{{env('API_IMAGE_URL').$bannersale['homepage_image'] ?? ''}}"
                    alt="{{$bannersale['title'] ?? ''}}">
            </a>
        </div>
    </div>
</section>

<!-- Brand Featured In -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][7]['custom'] ?? ''}}</h3>

        <div class="brandfeatInmain">
            <div class="swiper brandfeatInSlider">
                <div class="swiper-wrapper">
                    @foreach($featuredBrandProducts as $fproduct)
                    <div class="swiper-slide">
                        <div class="productSlideCard">
                            <div class="productslideImg">
                                <a href="/product/{{$fproduct['product']['slug']}}">
                                    <img src="{{$env.$fproduct['product']['thumb_image']}}"
                                        alt="{{$fproduct['product']['slug']}}">
                                </a>
                            </div>
                            <div class="productslideinfo">
                                <h3>
                                    <a href="/product/{{$fproduct['product']['slug']}}">
                                        {{$fproduct['product']['short_name']}}
                                    </a>
                                </h3>
                                
                                <div class="pdPricecard">
                                    <p>₹{{$fproduct['product']['offer_price']}}<del>₹{{$fproduct['product']['price']}}</del><span>{{
                                            number_format((($fproduct['product']['price'] - $fproduct['product']['offer_price']) /
                                            $fproduct['product']['price']) * 100,2)}}%</span></p>
                                    <div class="pdSize">
                                        <span>{{$fproduct['product']['totalSold']}} sold</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>

<!-- Influencer Picks -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][8]['custom'] ?? ''}}</h3>

        <div class="influenceMain">
            <div class="swiper influenceSlider">
                <div class="swiper-wrapper">
                    @foreach($influencerPicks as $inf)
                    <div class="swiper-slide">
                        <div class="influenceCard">
                            <div class="influenceImg">
                                <a href="{{$inf['link']}}">
                                    <img src="{{$env.$inf['image']}}" alt="{{$inf['title']}}">
                                </a>
                            </div>
                            <div class="influenceInfo">
                                <h3>{{$inf['title']}}</h3>
                                <p>{{$inf['description']}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>
<!-- Top Categories Peoduct -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][9]['custom'] ?? ''}}</h3>

        <div class="brandfeatInmain">
            <div class="swiper brandfeatInSlider">
                <div class="swiper-wrapper">
                    @foreach($topCategoriesProducts as $cat)
                    <div class="swiper-slide">
                        <div class="productSlideCard">
                            <div class="productslideImg">
                                <a href="/product/{{$cat['product']['slug']}}">
                                    <img src="{{$env.$cat['product']['thumb_image']}}" alt="{{$cat['product']['slug']}}">
                                </a>
                            </div>
                            <div class="productslideinfo">
                                <h3>
                                    <a href="/products/{{$cat['product']['slug']}}">{{$cat['product']['name']}}</a>
                                </h3>
                                <div class="pdPricecard">
                                    <p>₹{{$cat['product']['offer_price']}}<del>₹{{$cat['product']['price']}}</del><span>{{
                                            number_format((($cat['product']['price'] - $cat['product']['offer_price']) /
                                            $cat['product']['price']) * 100,2)}}%</span></p>
                                    <div class="pdSize">
                                        <span>{{$cat['product']['sold_qty']}} sold</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>
<!-- Discover More at winning kart -->
<section>
    <div class="container-fluid">
        <h3 class="secTitle">{{$jsonArray['section_title'][10]['custom'] ?? ''}}</h3>

        <div class="discovermoreMain">
            <div class="swiper discovermoreSlider">
                <div class="swiper-wrapper">
                    @foreach($bestDiscountProducts as $bestd)
                    <div class="swiper-slide">
                        <div class="discovermoreCard">
                            <div class="discovermoreImg">
                                <a href="{{$bestd['link']}}">
                                    <img src="{{$env.$bestd['image']}}" alt="{{$bestd['title']}}">
                                    <div class="discovermoreInfo">
                                        <h3>{{$bestd['title']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>
</section>

<!-- Fixcart -->
<section class="fixedCart">
    <div class="row mr-0 justify-content-end">
        <div class="col-lg-4 px-0">
            <div class="fixedCartMain position-relative">
                <div class="fixedCartInner ">
                    <div class="cartCalcmainbx">
                        <div class="fixCartHead">
                            <h2>Shopping Cart</h2>
                            <a class="fxCloseCart pointer text-decoration-none text-dark"><i class="bi bi-x-lg"></i></a>
                        </div>
                        <div class="fixCartproductsmain">
                            <div class="fixCartproductslist">
                                <div class="fixCartproductscard">
                                    <div class="fixCartimgcol">
                                        <div class="fixCartimg">
                                            <img src="{{asset('assets/images/product.avif')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="fixCartinfo">
                                        <a href="#!">SP Luxe Oil Keratin Restore Mask</a>
                                        <div class="fixCartqty">
                                            <span>Qty: </span>
                                            <div class="cartQtybx">
                                                <button class="Qtybtn"><i class="bi bi-dash-lg"></i></button>
                                                <input type="text" value="1">
                                                <button class="Qtybtn"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                        <span class="fixCartprice">₹1663</span>
                                        <button class="fixCartDelete"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fixCartButton">
                            <div class="fxCartCoupanmain">
                                <div class="fxCartCoupaninner">
                                    <!-- <input type="checkbox" name="coupanApply" id="coupanApply" class="d-none"> -->
                                    <label for="coupanApply" class="ApplycoupanBtn"><i class="bi bi-percent"></i> Apply
                                        Coupan</label>
                                </div>
                            </div>
                            <div class="fxCartCalcmain">
                                <div class="fxCartCalcinner">
                                    <h3>Price Details</h3>
                                    <p>
                                        <span>Bag MRP (3 items)</span>
                                        <span>₹3060</span>
                                    </p>
                                    <p>
                                        <span>Bag Discount</span>
                                        <span>₹349</span>
                                    </p>
                                    <p>
                                        <span>Shipping</span>
                                        <span>Free</span>
                                    </p>
                                </div>
                            </div>

                            <div class="fxproductcalc">
                                <h3>Subtotal</h3>
                                <span>₹2000</span>
                            </div>
                            <!-- <a href="#!" class="cartView">VIEW CART</a> -->
                            <a href="cart.html" class="cartProceed">CHECKOUT</a>
                        </div>
                    </div>

                    <!-- Apply Coupan Box -->
                    <div class="applyCoupanMain">
                        <div class="applyCoupanInner">
                            <div class="fixCartHead">
                                <h2>Apply Coupan</h2>
                                <a class="fxCloseapplycoupan pointer text-decoration-none text-dark"><i
                                        class="bi bi-x-lg"></i></a>
                            </div>
                            <div class="fxCartCoupanmain">
                                <div class="fxCartCoupaninner">
                                    <div class="coupanBox">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Apply Coupan" class="form-control">
                                            <button class="btn coupanApplyBtn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="coupanListMain">
                                <div class="noCoupanFound">
                                    <div class="noCoupanFoundinner">
                                        <img src="{{asset('assets/images/promo-code.png')}}" alt="">
                                        <p>You seem to have no Coupons. Please try again after some time.</p>
                                    </div>
                                </div>
                                <div class="coupanListinner">
                                    <div class="coupanListCard">
                                        <div class="coupanicon">
                                            <i class="bi bi-percent"></i>
                                        </div>
                                        <div class="couapnDetails">
                                            <h3>COUPANCODE</h3>
                                            <P>Lorem ipsum dolor sit amet consectetur.</P>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fixCartButton">
                                <!-- <a href="#!" class="cartView">VIEW CART</a> -->
                                <button type="button" class="cartProceed fxCloseapplycoupan">PROCEED</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection