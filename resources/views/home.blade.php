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
    $pagetitle = $jsonArray['section_title'];
    $count = 0;
    $homepage_categories = $jsonArray['homepage_categories'] ?? [];
    $sliders = $jsonArray['sliders'] ?? [];
    $bestofferproducts = $jsonArray['bestofferproducts'] ?? [];
    $trproducts = $jsonArray['shopbyconcern'] ?? [];
    $banner1 = $jsonArray['sliderBannerOne'] ?? [];
    $banner2 = $jsonArray['sliderBannerTwo'] ?? [];
    $influencerPicks = $jsonArray['influencerPicks'] ?? [];
    $section8 = $jsonArray['section8'] ?? [];
    $topbrands = $jsonArray['topbrands'] ?? [];
    $featuredBrandProducts = $jsonArray['featuredCategoryProducts'] ?? [];
    $topCategoriesProducts = $jsonArray['topCategoriesProducts'] ?? [];
    $bestDiscountProducts = $jsonArray['bestDiscountProducts'] ?? [];
    $bestSellerBanners = $jsonArray['bestSellerBanners'] ?? [];
    ?>

    <!-- More Categories For You -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($homepage_categories) && !empty($title))
        <section>
            <div class="container-fluid">
                <h3 class="secTitle">{{ $title }}</h3>
                <div class="moreCatemain">
                    <div class="swiper moreCatemainSlider">
                        <div class="swiper-wrapper">
                            @foreach ($homepage_categories as $key => $value)
                                <div class="swiper-slide">
                                    <div class="moreCateCard">
                                        <div class="moreCateCardImg">
                                            <a href="{{ Route('category', ['slug' => $value['slug']]) }}">
                                                <img src="{{ $env . $value['image'] }}" alt="{{ $value['slug'] }}">
                                            </a>
                                        </div>
                                        <h3>{{ $value['name'] }}</h3>
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
    @endif

    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($sliders) && !empty($title))
        <section>
            <div class="container-fluid">
                <h3 class="secTitle">{{ $title }}</h3>
                <div class="beautyslidemain">
                    <div class="swiper beautySlider">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $slider)
                                @if ($slider['status'] == 1)
                                    <div class="swiper-slide beautySliderslide">
                                        <img src="{{ $env . $slider['image'] }}" alt="{{ $slider['product_slug'] }}">
                                        <div class="beautySlideTitle">
                                            <h3>{{ $slider['title_two'] }}</h3>
                                            <a href="/product/{{ $slider['product_slug'] }}"><i
                                                    class="bi bi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-button-next custNavbtn"></div>
                        <div class="swiper-button-prev custNavbtn"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Best Offers For You -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($bestofferproducts) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{ $title }}</h3>
                <div class="row">
                    @foreach ($bestofferproducts as $product)
                        <div class="col-lg-3 col-md-6 px-2">
                            <a href="/product/{{ $product['product']['slug'] }}" class="text-decoration-none">
                                <div class="brandLoveMain">
                                    <div class="brandLoveImg">
                                        @php $disocunt = number_format((($product['product']['price'] - $product['product']['offer_price']) / $product['product']['price']) * 100, 0); @endphp
                                        <span class="pdbadge">{{ $disocunt > 0 ? $disocunt : 0 }}% OFF</span>
                                        <img src="{{ $env . $product['product']['thumb_image'] }}"
                                            alt="{{ $product['product']['slug'] }}">
                                    </div>
                                    <div class="brandLoveInfo">
                                        <p class="trainlingStr">{{ $product['product']['name'] }}</p>
                                        <span>In offer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Shop By COncern -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($trproducts) && !empty($title))
        <section>
            <div class="container-fluid">
                <h3 class="secTitle">{{ $title }}</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="boxesRow">
                            @php $count1 = 0; @endphp
                            @foreach ($trproducts as $arr)
                                <div class="boxesCol">
                                    <img src="{{ $env . $arr['image'] ?? '' }}" alt="{{ $arr['title'] ?? '' }}">
                                    <a href="{{ $arr['link'] ?? '' }}">{{ $arr['title'] ?? '' }}</a>
                                </div>
                                @php $count1 = $count1 +1; @endphp
                                @if ($count1 == 4)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            @php $count1 = 0; @endphp
                            @foreach ($trproducts as $arr)
                                @php $count1 = $count1 +1; @endphp
                                @if ($count1 == 5)
                                    <div class="largeBanner">
                                        <img src="{{ $env . $arr['image'] ?? '' }}" alt="{{ $arr['title'] ?? '' }}">
                                        <a href="{{ $arr['id'] ?? '' }}">{{ $arr['title'] ?? '' }}</a>
                                    </div>
                                @break
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div class="boxesRow">
                            @php $count1 = 0; @endphp
                            @foreach ($trproducts as $arr)
                                @php $count1 = $count1 +1; @endphp
                                @if ($count1 > 5)
                                    <div class="boxesCol w-100">
                                        <img src="{{ $env . $arr['image'] ?? '' }}"
                                            alt="{{ $arr['title'] ?? '' }}">
                                        <a href="{{ $arr['link'] ?? '' }}">{{ $arr['title'] ?? '' }}</a>
                                    </div>
                                @endif
                                @if ($count1 == 7)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Shop By COncern -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($topbrands) && !empty($title))
        <section>
        <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
            <div class="row justify-content-center">
                @foreach ($topbrands as $flashsale)
                    <div class="col-lg-4 col-md-6">
                        <div class="brandsCard">
                            <a href="{{ $flashsale['link'] }}">
                                <div class="brandsCardimg">
                                    <img src="{{ $env . $flashsale['image'] }}" alt="{{ $flashsale['title'] }}">
                                </div>
                                <div class="brandsCardinfo">
                                    <h3>{{ $flashsale['title'] }}</h3>
                                    <p>{{ $flashsale['description'] }}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </section>
    @endif

    <!-- 2 banner -->
    @if (!empty($banner1) && !empty($banner2))
        <section>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="bannersCard">
                            <a href="/products/{{ $banner1['id'] ?? '' }}">
                                <img src="{{ $env . $banner1['image'] ?? '' }}" alt="{{ $banner1['product_slug'] ?? '' }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="bannersCard">
                            <a href="/products/{{ $banner2['id'] ?? '' }}">
                                <img src="{{ $env . $banner2['image'] ?? '' }}" alt="{{ $banner2['product_slug'] ?? '' }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($bestSellerBanners) && !empty($title))
        <section>
            <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
                @foreach ($bestSellerBanners as $banner)
                <div class="bannersCard">
                    <a href="{{ $banner['link'] }}">
                        <img src="{{ $env . $banner['image'] ?? '' }}" alt="{{ $banner['title'] ?? '' }}">
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Brand Featured In -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($featuredBrandProducts) && !empty($title))
        <section>
            <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
                <div class="brandfeatInmain">
                    <div class="swiper brandfeatInSlider">
                        <div class="swiper-wrapper">
                            @foreach ($featuredBrandProducts as $fproduct)
                                <div class="swiper-slide">
                                    <div class="productSlideCard">
                                        <div class="productslideImg">
                                            <a href="/product/{{ $fproduct['product']['slug'] }}">
                                                <img src="{{ $env . $fproduct['product']['thumb_image'] }}" alt="{{ $fproduct['product']['slug'] }}">
                                            </a>
                                        </div>
                                        <div class="productslideinfo">
                                            <h3 class ="trainlingStr">
                                                <a href="/product/{{ $fproduct['product']['slug'] }}">
                                                    {{ $fproduct['product']['short_name'] }}
                                                </a>
                                            </h3>
                                            <div class="pdPricecard">
                                                @php $discount = number_format((($fproduct['product']['price'] - $fproduct['product']['offer_price']) / $fproduct['product']['price']) * 100, 2); @endphp
                                                <p>
                                                    {{ $fproduct['product']['offer_price'] }}
                                                    <del>₹{{ $fproduct['product']['price'] }}</del>
                                                    <span>₹{{ $discount > 0 ? $discount : 0 }}%</span>
                                                </p>
                                                <div class="pdSize">
                                                    <span>{{ $fproduct['product']['totalSold'] }} sold</span>
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
    @endif

    <!-- Influencer Picks -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($influencerPicks) && !empty($title))
        <section>
            <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
                <div class="influenceMain">
                    <div class="swiper influenceSlider">
                        <div class="swiper-wrapper">
                            @foreach ($influencerPicks as $inf)
                                <div class="swiper-slide">
                                    <div class="influenceCard">
                                        <div class="influenceImg">
                                            <a href="{{ $inf['link'] }}">
                                                <img src="{{ $env . $inf['image'] }}" alt="{{ $inf['title'] }}">
                                            </a>
                                        </div>
                                        <div class="influenceInfo">
                                            <h3>{{ $inf['title'] }}</h3>
                                            <p>{{ $inf['description'] }}</p>
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
    @endif

<!-- Top Categories Peoduct -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($topCategoriesProducts) && !empty($title))
        <section>
            <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
                <div class="brandfeatInmain">
                    <div class="swiper brandfeatInSlider">
                        <div class="swiper-wrapper">
                            @foreach ($topCategoriesProducts as $cat)
                                <div class="swiper-slide">
                                    <div class="productSlideCard">
                                        <div class="productslideImg">
                                            <a href="/product/{{ $cat['product']['slug'] }}">
                                                <img src="{{ $env . $cat['product']['thumb_image'] }}" alt="{{ $cat['product']['slug'] }}">
                                            </a>
                                        </div>
                                        <div class="productslideinfo">
                                            <h3 class="trainlingStr">
                                                <a href="/products/{{ $cat['product']['slug'] }}">{{ $cat['product']['name'] }}</a>
                                            </h3>
                                            <div class="pdPricecard">
                                                <p>
                                                    @php $discount = number_format((($cat['product']['price'] - $cat['product']['offer_price']) / $cat['product']['price']) * 100, 2); @endphp
                                                    ₹{{ $cat['product']['offer_price'] }}
                                                    <del>₹{{ $cat['product']['price'] }}</del>
                                                    <span>{{ $discount > 0 ? $discount : 0 }}%</span>
                                                </p>
                                                <div class="pdSize">
                                                    <span>{{ $cat['product']['sold_qty'] }} sold</span>
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
    @endif

    <!-- Discover More at winning kart -->
    @php $title = $pagetitle[$count++]['custom']; @endphp
    @if (!empty($bestDiscountProducts) && !empty($title))
        <section>
            <div class="container-fluid">
            <h3 class="secTitle">{{ $title }}</h3>
                <div class="discovermoreMain">
                    <div class="swiper discovermoreSlider">
                        <div class="swiper-wrapper">
                            @foreach ($bestDiscountProducts as $bestd)
                                <div class="swiper-slide">
                                    <div class="discovermoreCard">
                                        <div class="discovermoreImg">
                                            <a href="{{ $bestd['link'] }}">
                                                <img src="{{ $env . $bestd['image'] }}" alt="{{ $bestd['title'] }}">
                                                <div class="discovermoreInfo">
                                                    <h3>{{ $bestd['title'] }}</h3>
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
    @endif
@endsection
