@extends('layouts.app')
@section('content')
    <?php
    $env = env('API_IMAGE_URL');
    $pagetitle = $data->pageTitle ?? [];
    $slider = $data->slider ?? [];
    $shopByType = $data->shopByType ?? [];
    $topPicks = $data->topPicks ?? [];
    $shopConcern = $data->shopConcern ?? [];
    $section5 = $data->section5 ?? [];
    $trendingNow = $data->trendingNow ?? [];
    $bestSellers = $data->bestSellers ?? [];
    $count = 0;
    ?>
     <div class="categoryBg">
        @if (!empty($slider))
        <div class="catlistMain">
            <div class="catlistslidemain">
                <div class="swiper catListSlider">
                    <div class="swiper-wrapper">
                        @foreach($slider as $s)
                        <div class="swiper-slide">
                            <div class="catListSliderCard" style="max-height: 13em">
                                <a href="$s->link">
                                    <img src="{{$env.$s->image}}" alt="{{$s->title}}">
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
        @endif

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($shopByType) && !empty($title))
        <section class="mb-3">
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="brandSmallmain">
                    <div class="swiper brandSmallSlider swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-33b891c6cd99b21010" aria-live="polite">
                            @foreach($shopByType as $s)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 9" style="width: 172.857px; margin-right: 10px;">
                                <div class="brandSmallCard">
                                    <div class="brandSmallCardImg">
                                        <a href="{{$s->link}}">
                                            <img src="{{$env.$s->image}}" alt="{{$s->title}}">
                                        </a>
                                    </div>
                                    <h3>{{$s->title}}</h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next custNavbtn" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-33b891c6cd99b21010" aria-disabled="false"></div>
                        <div class="swiper-button-prev custNavbtn swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-33b891c6cd99b21010" aria-disabled="true"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
            </div>
        </section>
        @endif

        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($topPicks) && !empty($title))
        <section>
            <div class="container-fluid">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="beautyslidemain">
                    <div class="swiper beautySlider">
                        <div class="swiper-wrapper">
                            @foreach($topPicks as $t)
                            <div class="swiper-slide beautySliderslide">
                                <img src="{{$env.$t->image}}" alt="{{$t->title}}">
                                <div class="beautySlideTitle">
                                    <h3>{{$t->title}}</h3>
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
        @if (!empty($section5) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">HAIR COLOR & STYLING</h3>
                <div class="row">
                    @foreach($section5 as $s)
                    <div class="col-lg-3 px-2">
                        <a href="{{$s->link}}" class="text-decoration-none">
                            <div class="brandLoveMain">
                                <div class="brandLoveImg">
                                    <img src="{{$env.$s->image}}" alt="{{$s->title}}">
                                </div>
                                <div class="brandLoveInfo">
                                    <p>{{$s->title}}</p>
                                    <span>{{$s->description}}</span>
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
                            @foreach($shopConcern as $s)
                            <div class="swiper-slide">
                                <div class="hairconSliderCard">
                                    <a href="{{$s->link}}">
                                        <img src="{{$env.$s->image}}" alt="{{$s->title}}">
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
        @if (!empty($bestSellers) && !empty($title))
        <section>
            <div class="container">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="brandfeatInmain">
                    <div class="swiper brandfeatInSlider">
                        <div class="swiper-wrapper">
                            @foreach($bestSellers as $b)
                            <div class="swiper-slide">
                                <div class="productSlideCard">
                                    <div class="productslideImg">
                                        <a href="{{Route("products",$b->product->slug)}}">
                                            <img src="{{$env.$b->product->thumb_image}}" alt="{{$b->product->slug}}">
                                        </a>
                                    </div>
                                    <div class="productslideinfo">
                                        <h3 class="trainlingStr"><a href="{{Route("products",$b->product->slug)}}">{{$b->product->name}}</a></h3>
                                        <div class="pdPricecard">
                                            <p>₹{{$b->product->offer_price}}<del>₹{{$b->product->price}}</del>
                                                <span>{{number_format((($b->product->price - $b->product->offer_price) / $b->product->price) * 100,2)}}%</span>
                                            </p>
                                            <div class="pdSize ">
                                                <span>{{$b->product->totalSold}} sold</span>
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
                <h3 class="secTitle text-center">TRENDING NOW</h3>
                <div class="row">
                    @foreach($trendingNow as $t)
                    <div class="col-lg-6 px-2">
                        <div class="trendingCard">
                            <a href="{{$t->link}}">
                                <img src="{{$env.$t->image}}" alt="{{$t->title}}">
                                <div class="trendingInfobx">
                                    <h3>{{$t->title}}</h3>
                                    <p>{{$t->description}}</p>
                                </div>
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
