<!DOCTYPE html>
<html lang="en">
<?php
    $path = env('API_IMAGE_URL');
    $root = env('API_URL');
    
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
    <link rel="shortcut icon" href="{{$logo}}">
    <link rel="apple-touch-icon" href="{{$logo}}">
    <link rel="image_src" href="{{$logo}}"> 
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
                                <li class="topBarlinksitem">
                                    <a href="#!"><i class="bi bi-geo-alt"></i><span>Store & Events</span></a>
                                </li>
                                <li class="topBarlinksitem">
                                    <a href="#!"><i class="bi bi-gift"></i><span>Gift Card</span></a>
                                </li>
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
                                                                @foreach($jsonArray['brands'] as $arr)
                                                                <a href="{{route('brand.show',['id' => $arr['id']])}}">{{$arr['name']}}</a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 px-0">
                                                        <div class="bransLaunchesmain">
                                                            <ul class="nav nav-pills brandPills" id="pills-tab"
                                                                role="tablist">
                                                                @foreach($jsonArray['additionalCategory'] as $menuItemsCategoryBrand)
                                                                    <li class="nav-item brandItem" role="presentation">
                                                                        <button class="nav-link brandLink"
                                                                            id="pills-popular-tab" data-toggle="pill"
                                                                            data-target="#pills-{{$menuItemsCategoryBrand['category_id']}}" type="button"
                                                                            role="tab" aria-controls="pills-{{$menuItemsCategoryBrand['category_id']}}"
                                                                            aria-selected="true">{{$menuItemsCategoryBrand['category']['name']}}</button>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content" id="pills-tabContent">
                                                                 @foreach($jsonArray['additionalCategory'] as $menuItemsCategoryBrand)
                                                                <div class="tab-pane" id="pills-{{$menuItemsCategoryBrand['category_id']}}"
                                                                    role="tabpanel" aria-labelledby="pills-{{$menuItemsCategoryBrand['category_id']}}-tab">
                                                                    <div class="brnadimgbxrow">
                                                                        @foreach($jsonArray['featuredBrands'] as $brand)
                                                                            @if($brand['category_id'] == $menuItemsCategoryBrand['category_id'])
                                                                            <div class="brnadimgbxcol">
                                                                                <a href="{{route('brand.show',['id' => $brand['brand_id']])}}">
                                                                                <img src="{{env('API_IMAGE_URL').$brand['brands']['logo']}}" alt="{{$brand['brands']['slug']}}">
                                                                                </a>
                                                                            </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                @endforeach
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
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 pr-0">
                                                            <div class="winkartmenubanner">
                                                                <img src="{{env('API_IMAGE_URL').$mydata['shopPageSidebarBanner']['image']}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="luxe-range.html">Luxe Range</a></li>
                                        <li><a href="shop-all.html">Shop All Products</a></li>
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

                                        @if (Route::has('login'))
                                            @auth
                                                <div class="cart">
                                                    <div class="userLoginhead">
                                                        <div class="profileLabel">
                                                            <i class="bi bi-person"></i>
                                                            <span>{{auth()->user()->name}}</span>
                                                        </div>
                                                        <div class="userLogindropdown">
                                                            <a href="{{route('user.profile')}}"><i class="bi bi-person"></i> Profile</a>
                                                            <a href="my-orders.html"><i class="bi bi-box-seam"></i> Orders</a>
                                                            <a href="wishlist.html"><i class="bi bi-heart"></i> Wishlist</a>
                                                            <a href="{{route('user.logout')}}"><i class="bi bi-box-arrow-right"></i> Logout</a>
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

                                                <!-- @if (Route::has('register'))
                                                                <a href="{{ route('register') }}"><button type="button" class="btn signInBtn">Register</button></a>
                                                            @endif -->
                                            @endauth
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

        @if(Route::currentRouteName() === 'home')
    
            <div class="bottomHeader">
                <div class="container">
                    <div class="bottomHeaderinner">
                        <ul>
                            <li class="navLink">
                                <a href="#!">Makeup</a>
                                <div class="subMenu">
                                    <div class="row subMenuRow">
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="navLink">
                                <a href="#!">Hair</a>
                                <div class="subMenu">
                                    <div class="row subMenuRow">
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="navLink">
                                <a href="#!">Skin</a>
                                <div class="subMenu">
                                    <div class="row subMenuRow">
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="navLink">
                                <a href="#!">Appliances</a>
                                <div class="subMenu">
                                    <div class="row subMenuRow">
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 px-2">
                                            <div class="subMenuLinks" style="background-color: #f7f7f7">
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                                <div class="subMenuLinksinner">
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                    <a href="#!">Child Menu</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="navLink">
                                <a href="#!">Bath & Body</a>
                            </li>
                            <li class="navLink">
                                <a href="#!">Natural</a>
                            </li>
                            <li class="navLink">
                                <a href="#!">Mom & Baby</a>
                            </li>
                            <li class="navLink">
                                <a href="#!">Health & Wellness</a>
                            </li>
                            <li class="navLink">
                                <a href="#!">Men</a>
                            </li>
                            <li class="navLink">
                                <a href="#!">Fragrance</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        @endif

        </header>


        @if(Session::has('danger'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('danger')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif




        @yield('content')




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
                               {{$footer['about_us']}}
                            </p>

                            <div class="socailLinks">
                                @foreach($csetting['social_links'] as $social)
                                <a href="{{$social['link']}}"><i class="{{$social['icon']}}"></i></a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                            <h3>{{$csetting['footer_first_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_first_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                        <h3>{{$csetting['footer_second_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_second_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="footerLinkBox">
                        <h3>{{$csetting['footer_third_col']['columnTitle']}}</h3>
                            @foreach($csetting['footer_third_col']['col_links'] as $links)
                            <a href="{{$links['link']}}" class="footerLink">{{$links['title']}}</a>
                            @endforeach
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
<script src="{{asset('assets/js/jquery.slim.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Swiper JS -->
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
<html>