@extends('layouts.app')
@section('content')
    <?php
    $env = env('API_IMAGE_URL');
    $count = 0;
    $pagetitle = $data->pageTitle ?? [];
    $slider = $data->sliders ?? [];
    $bestInBeauty = $data->bestInBeauty ?? [];
    $opByCategories = $data->opByCategories ?? [];
    $bestOffer = $data->bestOffer ?? [];
    $bestBrands = $data->bestBrands ?? [];
    $bestSellers = $data->bestSellers ?? [];
    ?>
    <div class="categoryBg">
        @if (!empty($slider))
        <section class="categorbannerMain">
            <div class="container-fluid">
                <div class="categoryslidemain">
                    <div class="swiper categorySlider">
                        <div class="swiper-wrapper">
                         @foreach($slider as $slide)
                          <div class="swiper-slide">
                            <div class="categorySliderCard">
                                <a href="{{$slider->link}}">
                                    <img src="{{$env.$slide->image}}" alt="{{$slide->title}}">
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
        @if (!empty($bestInBeauty) && !empty($title))
        <section>
            <div class="container-fluid">
                <h3 class="secTitle">{{$title}}</h3>
                <div class="beautyslidemain">
                    <div class="swiper beautySlider">
                        <div class="swiper-wrapper">
                         @foreach($bestInBeauty as $b)
                          <div class="swiper-slide beautySliderslide">
                            <img src="{{$env.$b->image}}" alt="{{$b->title}}">
                            <div class="beautySlideTitle">
                                <h3>{{$b->title}}</h3>
                                <a href="{{$b->link}}"><i class="bi bi-chevron-right"></i></a>
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

        <!-- More Categories For You -->
        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($opByCategories) && !empty($title))
        <section class="mb-3">
            <div class="container-fluid">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="brandSmallmain">
                    <div class="swiper brandSmallSlider">
                        <div class="swiper-wrapper">
                            @foreach($opByCategories as $b)
                            <div class="swiper-slide">
                                <div class="brandSmallCard">
                                    <div class="brandSmallCardImg">
                                        <a href="{{$b->link}}">
                                            <img src="{{$env.$b->image}}" alt="{{$b->title}}">
                                        </a>
                                    </div>
                                    <h3>{{$b->title}}</h3>
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
        @php $title = $pagetitle[$count++]->custom; @endphp
        @if (!empty($bestOffer) && !empty($title))
        <section class="mb-3">
            <div class="container-fluid">
                <h3 class="secTitle text-center">{{$title}}</h3>
                <div class="discovermoreMain">
                    <div class="swiper discovermoreSlider">
                        <div class="swiper-wrapper">
                            @foreach($bestOffer as $b)
                            <div class="swiper-slide">
                                <div class="discovermoreCard">
                                    <div class="discovermoreImg">
                                        <a href="{{$b->link}}">
                                            <img src="{{$env.$b->image}}" alt="{{$b->title}}">
                                            <div class="discovermoreInfo">
                                                <h3>{{$b->title}}</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                        <div class="swiper-button-next custNavbtn"></div>
                        <div class="swiper-button-prev custNavbtn"></div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- Only at winnigkart -->
        @if (!empty($bestBrands))
        <section>
            <div class="container-fluid">
                <div class="bestsellerMain">
                    <div class="swiper bestsellerSlider">
                        <div class="swiper-wrapper">
                            @foreach($bestBrands as $b)
                            <div class="swiper-slide">
                                <div class="bestsellerCard">
                                    <a href="{{Route('brands',$b->brand->slug)}}">
                                        <img src="{{$env.$b->brand->logo}}" alt="{{$b->brand->slug}}">
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
                    <div class="swiper brandfeatInSlider swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-7e6e6dfaa9b9c83f" aria-live="polite">
                            @foreach($bestSellers as $b)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 246px; margin-right: 10px;">
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
                        <div class="swiper-button-next custNavbtn" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-7e6e6dfaa9b9c83f" aria-disabled="false"></div>
                        <div class="swiper-button-prev custNavbtn swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-7e6e6dfaa9b9c83f" aria-disabled="true"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection
