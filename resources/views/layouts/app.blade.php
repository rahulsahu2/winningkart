<!DOCTYPE html>
<html lang="en">
<?php
    $path = env('API_IMAGE_URL');
    $root = env('API_URL');

    $session = \App\Services\APIServices\Common::GetSession();
    $user = null;
    if($session){
        $user = $session->notification->original->user;
    }
    $jsonArray =  json_decode(\App\Services\APIServices\Common::GetHeader(), true);
    $mydata = json_decode(\App\Services\APIServices\Common::GetShopHeader(), true);
    $csetting = json_decode(\App\Services\APIServices\Common::GetCommonHeader(), true);
    
    $favicon = $path.$csetting['setting']['favicon'];
    $logo = $path.$csetting['setting']['logo'];
    $title = $jsonArray['seoSetting']['seo_title'];
    $desc = $jsonArray['seoSetting']['seo_title'];

    $footer = $csetting['footer'];
    $metatag = $csetting['seo_setting'][0]['seo_title'];
    $metaDesc = $csetting['seo_setting'][0]['seo_description'];
    $image = $logo;
    
    if(isset($customMetaTag) && isset($customMetaDesc) && isset($customTitle) && isset($customImage)){
        $metatag = $customMetaTag;
        $metaDesc = $customMetaDesc;
        $title = $customTitle;
        $image = $customImage;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="shortcut icon" href="{{$logo}}">-->
    <!--<link rel="apple-touch-icon" href="{{$logo}}">-->
    <!--<link rel="image_src" href="{{$logo}}"> -->
    <link rel="icon" type="image/x-icon" href="{{$path.$csetting['setting']['logo']}}">
    <link rel="search" type="application/opensearchdescription+xml" title="WinningKart" href="/opensearch.xml">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta property="og:type" content= "website" />
    <meta id="meta-location" property="og:url" content=""/>
    <meta property="og:site_name" content="Winning Kart" />
    <meta property="og:image" itemprop="image primaryImageOfPage" content="{{$image}}" />
    <meta name="twitter:card" content="summary"/>
    <meta id="meta-twitter" name="twitter:domain" content=""/>
    <meta name="twitter:title" property="og:title" itemprop="name" content="{{$title}}" />
    <meta name="twitter:description" property="og:description" itemprop="description" content="{{$metaDesc}}" />
    <link rel="icon" type="image/x-icon" href="{{$favicon}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/xzoom.css')}}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        document.querySelector('#meta-location').setAttribute('content', location.href);
        document.querySelector('#meta-twitter').setAttribute('content', location.href);
    </script>
    <title>{{ $title }}</title>
</head>

<body>
    <div class="main">
    <header class="desktopHeader">
    <div class="topBar">
                <div class="topBar-BG">
                    <img src="assets/images/topbabg.webp">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <ul class="topBarlinks">
                                <li class="topBarlinksitem">
                                    <a href="#!">
                                        <i class="bi bi-phone"></i>
                                        <span>Get App</span></a>
                                </li>
                                <!-- <li class="topBarlinksitem">
                                    <a href="#!"><i class="bi bi-geo-alt"></i><span>Store & Events</span></a>
                                </li>
                                <li class="topBarlinksitem">
                                    <a href="#!"><i class="bi bi-gift"></i><span>Gift Card</span></a>
                                </li> -->
                                <li class="topBarlinksitem">
                                    <a href="#!"><i class="bi bi-question-circle"></i><span>Help</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middleHeader">
                <div class="container">
                    <div class="middleHeader-row row position-relative">
                        <div class="col-lg-7" style="position: un;">
                            <div class="middleHeaderLeft">
                                <div class="logo">
                                    <a href="{{route('home')}}">
                                        <img src="{{$path.$csetting['setting']['logo']}}" alt="logo">
                                    </a>
                                </div>
                                <div class="mainNav">
                                    <ul>
                                        <li><a href="javascript:void(0)">Brand</a>
                                            <div class="megaSubmenumain">
                                                <div class="row bandMenu mx-0">
                                                    <div class="col-lg-4">
                                                        <div class="brandSearchmain">
                                                            <div class="brandSearchinner">
                                                                <div class="position-relative">
                                                                    <i class="bi bi-search"></i>
                                                                    <input class="form-control"
                                                                        placeholder="Search Brands" id="search">
                                                                    <i class="bi bi-x-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="topBrandListmain position-relative">
                                                            <div class="aplabetSelect">
                                                                <div class="aplabetSelectScroll">
                                                                    @foreach (range('A', 'Z') as $char) 
                                                                    <a href="#!">{{$char}}</a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3>Topbrands</h3>
                                                            <div class="topBrandListinner" id="list">
                                                                <h4>#</h4>
                                                                @if($jsonArray && array_key_exists("brands",$jsonArray))
                                                                @foreach($jsonArray['brands'] as $arr)
                                                                <a href="{{route('brand-details',['slug' => $arr['slug']])}}">{{$arr['name']}}</a>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 px-0">
                                                        <div class="bransLaunchesmain">
                                                            <ul class="nav nav-pills brandPills" id="pills-tab"
                                                                role="tablist">
                                                                @php $index = 0; @endphp
                                                                @if($jsonArray && array_key_exists("additionalCategory",$jsonArray))
                                                                @foreach($jsonArray['additionalCategory'] as $menuItemsCategoryBrand)
                                                                    <li class="nav-item brandItem" role="presentation">
                                                                        <button class="nav-link brandLink {{$index == 0 ? 'active' : ''}}"
                                                                            id="pills-popular-tab" data-toggle="pill"
                                                                            data-target="#pills-{{$menuItemsCategoryBrand['category_id']}}" type="button"
                                                                            role="tab" aria-controls="pills-{{$menuItemsCategoryBrand['category_id']}}"
                                                                            aria-selected="true">{{$menuItemsCategoryBrand['category']['name'] ?? ''}}</button>
                                                                    </li>
                                                                @php $index++; @endphp
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            <div class="tab-content" id="pills-tabContent">
                                                            @if($jsonArray && array_key_exists("additionalCategory",$jsonArray))
                                                                @php $index = 0; @endphp
                                                                 @foreach($jsonArray['additionalCategory'] as $menuItemsCategoryBrand)
                                                                <div class="tab-pane {{$index == 0 ? 'active' : ''}}" id="pills-{{$menuItemsCategoryBrand['category_id']}}"
                                                                    role="tabpanel" aria-labelledby="pills-{{$menuItemsCategoryBrand['category_id']}}-tab">
                                                                    <div class="brnadimgbxrow">
                                                                        @foreach($jsonArray['featuredBrands'] as $brand)
                                                                            @if($brand['category_id'] == $menuItemsCategoryBrand['category_id'])
                                                                            <div class="brnadimgbxcol">
                                                                                <a href="{{route('brand-details',['slug' => $brand['brands']['slug']])}}">
                                                                                <img src="{{env('API_IMAGE_URL').($brand['brands']['logo'] ?? '')}}" alt="{{$brand['brands']['slug'] ?? ''}}">
                                                                                </a>
                                                                            </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                @php $index++; @endphp
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="offers.html">Offer</a>
                                        </li>
                                        <li><a href="winning-kart-fashion.html">Winning Kart</a>
                                            <div class="megaSubmenumain">
                                                <div class="winkartsubmenumain">
                                                    <div class="row mx-0">
                                                        <div class="col-lg-8 pr-0">
                                                            <div class="row winkartlinks">
                                                                @if($mydata && array_key_exists("categories",$mydata))
                                                                    @foreach($mydata['categories'] as $category)
                                                                    <div class="col-lg-3 px-2">
                                                                        <div class="winkartlinkbx">
                                                                            <a href="category/{{$category['id']}}">{{$category['name']}}</a>
                                                                            <ul>
                                                                                @foreach($category['active_sub_categories'] as $subCategory)
                                                                                <li><a href="/subcategory-by-category/{{$subCategory['id']}}">{{$subCategory['name']}}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 pr-0">
                                                            <div class="winkartmenubanner">
                                                            @if($mydata && array_key_exists("shopPageSidebarBanner",$mydata))
                                                                <img src="{{env('API_IMAGE_URL').$mydata['shopPageSidebarBanner']['image']}}" alt="">
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="luxe-range.html">Luxe Range</a></li>
                                        <li><a href="{{Route('products')}}">Shop All Products</a></li>
                                        <li><a href="combos.html">Combos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 my-auto">
                            <div class="middleHeaderRight">
                                <div class="headSearchmain">
                                    <div class="searchInput position-relative">
                                        <i class="bi bi-search"></i>
                                        <input type="text" placeholder="Search on Winning Kart" class="form-control">

                                        @if ($session)
                                                <div class="cart">
                                                    <div class="userLoginhead">
                                                        <div class="profileLabel">
                                                            <i class="bi bi-person"></i>
                                                            <span>{{$user->name}}</span>
                                                        </div>
                                                        <div class="userLogindropdown">
                                                            <a href="{{Route('user.profile')}}"><i class="bi bi-person"></i> Profile</a>
                                                            <a href="my-orders.html"><i class="bi bi-box-seam"></i> Orders</a>
                                                            <a href="wishlist.html"><i class="bi bi-heart"></i> Wishlist</a>
                                                            <a href="{{Route('user.logout')}}"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                                        </div>
                                                    </div>
                                                    <button class="btn cartBtn">
                                                        <i class="bi bi-bag"></i>
                                                        <span class="cartcounter">10</span>
                                                    </button>
                                                </div>
                                            @else
                                                <a href="{{ route('login') }}"><button type="button" class="btn signInBtn">Sign
                                                        in</button></a>
                                                <div class="cart" title="Login to see your cart">
                                                    <button class="btn cartBtn">
                                                        <i class="bi bi-bag"></i>
                                                    </button>
                                                </div>
                                        @endif

                                        <div class="searchSuggest">
                                            <h3>Trending Searches</h3>
                                            <div class="searchesLink">
                                                <a href="#!"><i class="bi bi-arrow-up-right"></i>Cosmetics</a>
                                                <a href="#!"><i class="bi bi-arrow-up-right"></i>Face Mask</a>
                                                <a href="#!"><i class="bi bi-arrow-up-right"></i>Lipsticks</a>
                                                <a href="#!"><i class="bi bi-arrow-up-right"></i>Hand Sanitisers</a>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @if(Session::has('danger'))
            <div class="alert alert-danger" role="alert">
                {{is_array(Session::get('danger')) ? implode(Session::get('danger')) : Session::get('danger')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{is_array(Session::get('success')) ? implode(Session::get('success')) : Session::get('success')}}
            </div>
        @endif




        @yield('content')

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


        <footer>
            <div class="container">
                <div class="row footerRow">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">

                        <div class="footerLinkBox">
                            <div class="footerLogo">
                                <a href="{{route('home')}}">
                                    <img src="{{$path.$csetting['setting']['logo']}}" alt="logo"
                                        style="max-width: 100%;">
                                </a>
                            </div>
                            <p class="footerAbtus">
                            @if($footer && array_key_exists("about_us",$footer))
                               {{$footer['about_us']}}
                            @endif
                            </p>

                            <div class="socailLinks">
                            @if($csetting && array_key_exists("social_links",$csetting))
                                @foreach($csetting['social_links'] as $social)
                                <a href="{{$social['link']}}"><i class="{{$social['icon']}}"></i></a>
                                @endforeach
                            @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                        @if($csetting && array_key_exists("footer_first_col",$csetting))
                            <h3>{{$csetting['footer_first_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_first_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                        @if($csetting && array_key_exists("footer_second_col",$csetting))
                        <h3>{{$csetting['footer_second_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_second_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                        @if($csetting && array_key_exists("footer_third_col",$csetting))
                        <h3>{{$csetting['footer_third_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_third_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="preFooter">
                <div class="copyrights">
                    <p>© 2023 Winning Kart | All Rights Reserved | Handcrafted with ♡ by Sachdeva Technologies</p>
                </div>
            </div>
        </footer>
    </div>
    <script>
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
}
</script>

<script>
        const searchInput = document.getElementById('search');
        const list = document.getElementById('list').getElementsByTagName('a');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            
            for (let i = 0; i < list.length; i++) {
                const item = list[i].textContent.toLowerCase();
                if (item.includes(searchTerm)) {
                    list[i].style.display = 'block';
                } else {
                    list[i].style.display = 'none';
                }
            }
        });
    </script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
<script src="{{asset('assets/product-zoom/setup.js')}}"></script>
<script src="{{asset('assets/product-zoom/foundation.min.js')}}"></script>
<!--<script src="{{asset('assets/js/jquery.slim.min.js')}}"></script>-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Swiper JS -->

<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.js"></script>-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/product-zoom/custom.js')}}"></script>
<script src="{{asset('assets/product-zoom/xzoom.min.js')}}"></script>

</body>
<html>