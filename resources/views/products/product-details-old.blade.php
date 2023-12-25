@extends('layouts.app')
@section('content')
<?php
$data = json_decode($data,true);
$env = env("API_IMAGE_URL");

$product = $data['product'] ?? [];
$category = $data['product']['category'] ?? [];
$varinats = $data['product']['active_variants'] ?? [];
$gallery = $data["gallery"] ??[];
$productDescription = $data['productDescription'] ?? [];
$productIngredient = $data['productIngredient'] ?? [];

?>
<div class="container">
    <div class="breadcrumbMain">
        <div class="breadcrumbInner">
            <a href="{{Route('home')}}">Home <i class="bi bi-chevron-right"></i></a>
            <a href="{{Route('category',$product['category_id'] ?? '')}}">{{$category['name'] ?? 'NA'}}<i class="bi bi-chevron-right"></i></a>
            <a>{{$product['name'] ?? ''}}</a>
        </div>
    </div>
</div>
<div class="product-detile-box">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="productGallerymain">
                    <div class="productMainPreview">
                        <div class="xzoomMain">
                            <img class="xzoom" id="xzoom-default" 
                                src="{{$env.$product['thumb_image']}}"
                                xoriginal="{{$env.$product['thumb_image']}}"
                                xpreview="{{$env.$product['thumb_image']}}" 
                            />
                        </div>
                        <div class="xzoom-thumbs">
                            <a class="xzoom-gallery xactive" href="{{$env.$product['thumb_image']}}">
                                <img class="xzoom-gallery" src="{{$env.$product['thumb_image']}}" width=80 height=80>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="productDtlsBox">
                    <h4 class="productTitle">{{$product['name']}}</h4>
                    <div class="prodcutReviewBx">
                        @if($product['averageRating'] > 0)
                        <span class="TotalRatings">
                            {{$product['averageRating']}} <i class="bi bi-star-fill"></i>
                        </span>
                        <span class="Totalrevies pointer">
                            <a href="#reviewTab">{{count($product['avg_review'])}} Reviews</a>
                        </span>
                        @endif
                        <span class="SubmitReveiw addreviewBtn pointer">
                            Write a Reviews
                        </span>
                    </div>

                    <div class="short-des">
                        <h3>Product Summary</h3>
                        <p>{!! $product['short_description'] !!}</p>
                    </div>
                    <div class="productPrice">
                    <p>₹{{$product['offer_price']}} <del>₹{{$product['price']}}</del><span>{{
                        number_format((($product['price'] - $product['offer_price']) /
                        $product['price']) * 100,2)}}%</span></p>
                    </div>

                    <div class="productVariationsbx">
                        <h3>Select Variant</h3>
                        <div class="productVariationslist">
                            @foreach($varinats as $var)
                            <div class="productVariations">
                                <input type="radio" id="{{$var['id']}}" name="{{$var['name']}}" {{$product['id'] == $var['product_id'] ? 'checked':''}}>
                                <label for="vari1">{{$var['name']}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="product-qty d-flex mb-3 align-items-center">
                        <form>
                            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-
                            </div>
                            <input type="number" id="number" value="0" />
                            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+
                            </div>
                        </form>
                        <div class="productActionbtns">
                            <button class="btn buyNowbtn">Buy Now</button>
                            <button class="btn addToCartbtn"><i class="bi bi-bag"></i> Add to Cart</button>
                        </div>
                    </div>

                    <div class="social-links">
                        <div class="social-icons">
                            <h3>Share</h3>
                            <a href="#" class="social-icon social-facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="social-icon social-twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="social-icon social-whatsapp"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" class="social-icon social-youtube "><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="description-box">
                    <h3>Description</h3>
                    <p>{!!$product['long_description']!!}</p>
                </div>
                @if($product['video_link'])
                <div class="description-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="howtousevide">
                                <iframe src="{{$product['video_link']}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 my-auto">
                            <div class="howtouseInfo">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if(!empty($productIngredient))
            <div class="col-lg-12">
                <div class="description-box">
                    <h3>Ingredients</h3>
                    <div class="moreCatemain">
                        <div class="swiper moreCatemainSlider">
                            <div class="swiper-wrapper">
                                @foreach($productIngredient as $pi)
                                <div class="swiper-slide">
                                    <div class="moreCateCard">
                                        <div class="moreCateCardImg">
                                            <a>
                                                <img src="{{$env.$pi['image']}}" alt="{{$pi['title']}}">
                                            </a>
                                        </div>
                                        <h3>{{$pi['title']}}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next custNavbtn"></div>
                            <div class="swiper-button-prev custNavbtn"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($productDescription))
            <div class="col-lg-12">
                <div class="productBenefitbx">
                    <h3>{{$product['name']}} Benefits</h3>
                    @php $count = 0; @endphp
                    @foreach($productDescription as $pd)
                    <div class="row mb-3">
                        @if($count % 2 == 0)
                        <div class="col-lg-5 pr-0">
                            <div class="productBenefitimg">
                                <img src="{{$env.$pd['image']}}" alt="{{$pd['title']}}">
                            </div>
                        </div>
                        <div class="col-lg-7 pl-0">
                            <div class="productBenefitinfo">
                                <h3>{{$pd['title']}}</h3>
                                <p>{{$pd['description']}}</p>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-7 pl-0">
                            <div class="productBenefitinfo">
                                <h3>{{$pd['title']}}</h3>
                                <p>{{$pd['description']}}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 pr-0">
                            <div class="productBenefitimg">
                                <img src="{{$env.$pd['image']}}" alt="{{$pd['title']}}">
                            </div>
                        </div>
                        @endif
                    </div>
                    @php $count++; @endphp
                    @endforeach
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="description-box mt-4 mb-3" id="reviewTab">
                    <h3>REVIEWS (0)</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="add-review">
                                <div class="d-flex align-items-center right-review">
                                    <div class="review-imag-box">
                                        <img src="assets/images/review-imag.png">
                                    </div>
                                    <div class="review-text">
                                        <h3>Mr. Gautam</h3>
                                        <div class="pdstarrating text-left " style="margin-bottom: 6px;">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="add-review">
                                <h4>Ratings & Reviews</h4>
                                <div class="mt-4 d-flex align-items-center" style="gap:40px;">
                                    <div class="d-flex align-items-center " style="gap:10px;">
                                        <div class="over-a">
                                            <h2>4.4/5</h2>
                                        </div>
                                        <div class="Overall-Rating">
                                            <h4>Overall Rating</h4>
                                            <p>10507 verified ratings</p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="searchInput position-relative">
                                            <button type="button" class="btn signInBtn write-review addreviewBtn">Write
                                                Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fixcart -->
<section class="addreview">
    <div class="row mr-0 justify-content-end">
        <div class="col-lg-3 px-0">
            <div class="fixedCartMain position-relative">
                <div class="fixedCartInner ">
                    <div class="fixCartHead">
                        <h2>Add a Review</h2>
                        <a class="fxCloseCart pointer text-decoration-none text-dark"><i class="bi bi-x-lg"></i></a>
                    </div>
                    <div class="fixCartproductsmain">
                        <p style="line-height: 23px;">Your email address will not be published. Required fields are
                            marked <span class="star-r">*</span></p>
                        <div class="address-form">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Your review <span
                                            class="star-r">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Name <span class="star-r">*</span></label>
                                    <input type="text" placeholder="Name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Email ID <span
                                            class="star-r">*</span></label>
                                    <input type="text" placeholder="Email ID" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fixCartButton">
                        <a href="#!" class="cartProceed">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection