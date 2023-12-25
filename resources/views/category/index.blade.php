@extends('layouts.app')
@section('content')
    @php

        $env = env('API_IMAGE_URL');
        $category = $data->category;
        $pagetitle = $data->pageTitle;
        $banner = $data->CategoryBanner;
        $categorySubCategories = $data->categorySubCategories;
        $categoryofferBrands = $data->categoryofferBrands;
        $shopConcern = $data->shopConcern;
        $categoryBestSeller = $data->categoryBestSeller;
        $trendingNow = $data->trendingNow;
        $categoryOffers = $data->categoryOffers;
        $count = 0;
    @endphp

    <div class="categoryBg">
        <div class="container">
            <div class="breadcrumbMain">
                <div class="breadcrumbInner">
                    <a href="{{ Route('home') }}">Home <i class="bi bi-chevron-right"></i></a>
                    <a href="{{ Route('brands') }}">Category <i class="bi bi-chevron-right"></i></a>
                    <a>{{ $category->name }}</a>
                </div>
            </div>
        </div>

        @if (!empty($banner))
            <section class="categorbannerMain">
                <div class="container">
                    <!-- <h3 class="secTitle text-center">Category Title</h3> -->
                    <div class="categoryslidemain">
                        <div class="swiper categorySlider">
                            <div class="swiper-wrapper">
                                @foreach ($banner as $row)
                                    <div class="swiper-slide swiper-slide-active" style="width: 690px;" role="group"
                                        aria-label="1 / 2">
                                        <div class="categorySliderCard">
                                            <a href="{{ $row->link }}">
                                                <img src="{{ $env . $row->image }}" alt="{{ $row->title }}">
                                            </a>
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
        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($categorySubCategories) && !empty($title))
            <section class="mb-3">
                <div class="container">
                    <h3 class="secTitle text-center">{{ $title }}</h3>
                    <div class="brandSmallmain">
                        <div class="swiper brandSmallSlider swiper-initialized swiper-horizontal swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-33b891c6cd99b21010" aria-live="polite">
                                @foreach ($categorySubCategories as $sub)
                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 9"
                                    style="width: 172.857px; margin-right: 10px;">
                                    <div class="brandSmallCard">
                                        <div class="brandSmallCardImg">
                                            <a href="#!">
                                                <img src="assets/images/categoryimage.avif" alt="">
                                            </a>
                                        </div>
                                        <h3>Category Title</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next custNavbtn" tabindex="0" role="button" aria-label="Next slide"
                                aria-controls="swiper-wrapper-33b891c6cd99b21010" aria-disabled="false"></div>
                            <div class="swiper-button-prev custNavbtn swiper-button-disabled" tabindex="-1" role="button"
                                aria-label="Previous slide" aria-controls="swiper-wrapper-33b891c6cd99b21010"
                                aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($categoryofferBrands) && !empty($title))
            <section>
                <div class="container">
                    <h3 class="secTitle text-center">{{$title}}</h3>
                    <div class="row">
                        @foreach($categoryofferBrands as $ob)
                        <div class="col-lg-3 px-2">
                            <a href="{{$ob->link}}" class="text-decoration-none">
                                <div class="brandLoveMain">
                                    <div class="brandLoveImg">
                                        <img src="{{$env.$ob->image}}" alt="{{$ob->title}}">
                                    </div>
                                    <div class="brandLoveInfo">
                                        <p>{{$ob->title}}</p>
                                        <span>{{$ob->description}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($shopConcern) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="hairconslidemain">
                    <div class="swiper hairconSlider">
                        <div class="swiper-wrapper">
                            @foreach($shopConcern as $sc)
                            <div class="swiper-slide">
                                <div class="hairconSliderCard">
                                    <a href="{{$sc->link}}">
                                        <img src="{{$env.$sc->image}}" alt="{{$sc->title}}">
                                    </a>
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

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($categoryBestSeller) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="brandfeatInmain">
                    <div class="swiper brandfeatInSlider">
                        <div class="swiper-wrapper">
                            @foreach($categoryBestSeller as $bs)
                            @php $prod = $bs->product; @endphp
                            <div class="swiper-slide">
                                <div class="productSlideCard">
                                    <div class="productslideImg">
                                        <a href="{{Route('product',[$prod->slug])}}">
                                            <img src="{{$env.$prod->thumb_image}}" alt="{{$prod->slug}}">
                                        </a>
                                    </div>
                                    <div class="productslideinfo">
                                        <h3><a href="{{Route('product',[$prod->slug])}}"></a>
                                        </h3>
                                        <div class="pdPricecard">
                                            <p>₹{{$prod->offer_price}}<del>₹{{$prod->price}}</del>
                                                <span>{{number_format((($prod->price - $prod->offer_price) / $prod->price) * 100,2)}}%</span>
                                            </p>
                                            <div class="pdSize">
                                                <span>{{$prod->totalSold}} sold</span>
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

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($trendingNow) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="row">
                    @foreach($trendingNow as $tn)
                    <div class="col-lg-6 px-2">
                        <div class="trendingCard">
                            <a href="{{$tn->link}}">
                                <img src="{{$env.$tn->image}}" alt="{{$tn->title}}">
                                <div class="trendingInfobx">
                                    <h3>{{$tn->title}}</h3>
                                    <p>{{$tn->description}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($categoryOffers) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="row">
                    @foreach($categoryOffers as $co)
                    <div class="col-lg-3 px-2">
                        <div class="budgetCard">
                            <a href="{{$co->link}}">
                                <img src="{{$env.$co->image}}" alt="{{$co->title}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection
