@extends('layouts.app')
@section('content')
@php
$env = env('API_IMAGE_URL');
$brand = $data->brand;
$pagetitle = $data->pageTitle;
//print_r($pagetitle);

$banner = $data->brandBanner;
$brandcategories = $data->brandCategories;
$brandBestSellers = $data->brandBestSeller;
$brandDescription = $data->brandDescription;
$brandOffers = $data->brandOffers;
$categories = $data->products->original->categories;
$products = $data->products->original->products->data;
$count = 0;
@endphp

<div class="categoryBg">
    <div class="container">
        <div class="breadcrumbMain">
            <div class="breadcrumbInner">
                <a href="{{Route('home')}}">Home <i class="bi bi-chevron-right"></i></a>
                <a href="{{Route('brands')}}">Brand <i class="bi bi-chevron-right"></i></a>
                <a>{{$brand->name}}</a>
            </div>
        </div>
    </div>

    @if(!empty($banner))
    <section class="categorbannerMain">
        <div class="container">
            <!-- <h3 class="secTitle text-center">Category Title</h3> -->
            <div class="categoryslidemain">
                <div class="swiper categorySlider">
                    <div class="swiper-wrapper">
                        @foreach($banner as $row)
                        <div class="swiper-slide swiper-slide-active" style="width: 690px;" role="group"
                            aria-label="1 / 2">
                            <div class="categorySliderCard">
                                <a href="{{$row->link}}">
                                    <img src="{{$env.$row->image}}" alt="{{$row->title}}">
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

    <!-- More Categories For You -->
    @php $title = $pagetitle[$count++]->custom; @endphp
    @if(!empty($brandcategories) && !empty($title))
    <section class="mb-3">
        <div class="container">
            <h3 class="secTitle text-center">{{$title}}</h3>
            <div class="brandSmallmain">
                <div class="swiper brandSmallSlider">
                    <div class="swiper-wrapper">
                        @foreach($brandcategories as $cat)
                        <div class="swiper-slide">
                            <div class="brandSmallCard">
                                <div class="brandSmallCardImg">
                                    <a href="{{$cat->link}}">
                                        <img src="{{$env.$cat->image}}" alt="{{$cat->title}}">
                                    </a>
                                </div>
                                <h3>{{$cat->title}}</h3>
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
    @if(!empty($brandOffers) && !empty($title))
    <section class="mb-3">
        <div class="container">
            <h3 class="secTitle text-center">{{$title}}</h3>
            <div class="discovermoreMain">
                <div class="swiper discovermoreSlider">
                    <div class="swiper-wrapper">
                        @foreach($brandOffers as $offer)
                        <div class="swiper-slide">
                            <div class="discovermoreCard">
                                <div class="discovermoreImg">
                                    <a href="{{$offer->link}}">
                                        <img src="{{$env.$offer->image}}" alt="{{$offer->title}}">
                                        <div class="discovermoreInfo">
                                            <h3>{{$offer->title}}</h3>
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

@php $title = $pagetitle[$count++]->custom; @endphp
@if(!empty($brandBestSellers) && !empty($title))
<section>
    <div class="container">
        <h3 class="secTitle text-center">{{$title}}</h3>
        <div class="brandfeatInmain">
            <div class="swiper brandfeatInSlider">
                <div class="swiper-wrapper">
                    @foreach($brandBestSellers as $bs)
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
@if(!empty($products))
    <section class="categorbannerMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 pl-2">
                    <div class="sideFilters">
                        <div id="popularityaccordion">
                            <!-- Sort By Popularuty -->
                            <div class="popCard card">
                                <div class="popHeader card-header" id="popularityaccord">
                                    <div class="popHeaderbtn collapsed" data-toggle="collapse"
                                        data-target="#collapsepopularity" aria-expanded="true"
                                        aria-controls="collapsepopularity">
                                        <h3 class="mb-0">Sort By : Popularity </h3>
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>

                                <div id="collapsepopularity" class="popcollapse collapse "
                                    aria-labelledby="popularityaccord" data-parent="#popularityaccordion">
                                    <div class="popCardBody card-body">
                                        <div class="popFilterlist">
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter1">
                                                <label for="popFilter1">
                                                    <p class="mb-0">Popularity</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter2">
                                                <label for="popFilter2">
                                                    <p class="mb-0">Discount</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter3">
                                                <label for="popFilter3">
                                                    <p class="mb-0">Name</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter4">
                                                <label for="popFilter4">
                                                    <p class="mb-0">Customer Top Rated</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter5">
                                                <label for="popFilter5">
                                                    <p class="mb-0">New Arrivals</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter6">
                                                <label for="popFilter6">
                                                    <p class="mb-0">Price: High To Low</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                            <div class="popFiltercard">
                                                <input type="checkbox" id="popFilter7">
                                                <label for="popFilter7">
                                                    <p class="mb-0">Price: Low To High</p>
                                                    <span><i class="bi bi-check-lg"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Filter -->
                            <div class="popCard card">
                                <div class="popHeader card-header" id="Priceaccord">
                                    <div class="popHeaderbtn collapsed" data-toggle="collapse"
                                        data-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                        <h3 class="mb-0">Price </h3>
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>

                                <div id="collapsePrice" class="popcollapse collapse " aria-labelledby="Priceaccord"
                                    data-parent="#popularityaccordion">
                                    <div class="popCardBody card-body">
                                        <div class="brandFiltermain">
                                            <div class="brandfilterSelect mt-0">
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Rs. 0 - Rs. 499 <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Rs. 500 - Rs. 999 <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Rs. 1000 - Rs. 1999 <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Rs. 2000 - Rs. 3999 <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Rs. 4000 & Above <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gender Filter -->
                            <div class="popCard card">
                                <div class="popHeader card-header" id="Genderaccord">
                                    <div class="popHeaderbtn collapsed" data-toggle="collapse"
                                        data-target="#collapseGender" aria-expanded="true"
                                        aria-controls="collapseGender">
                                        <h3 class="mb-0">Gender </h3>
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>

                                <div id="collapseGender" class="popcollapse collapse " aria-labelledby="Genderaccord"
                                    data-parent="#popularityaccordion">
                                    <div class="popCardBody card-body">
                                        <div class="brandFiltermain">
                                            <div class="brandfilterSelect mt-0">
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Male <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">Female <strong>(100)</strong></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Discount -->
                            <div class="popCard card">
                                <div class="popHeader card-header" id="Discointaccord">
                                    <div class="popHeaderbtn collapsed" data-toggle="collapse"
                                        data-target="#collapseDiscoint" aria-expanded="true"
                                        aria-controls="collapseDiscoint">
                                        <h3 class="mb-0">Discount </h3>
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>

                                <div id="collapseDiscoint" class="popcollapse collapse "
                                    aria-labelledby="Discointaccord" data-parent="#popularityaccordion">
                                    <div class="popCardBody card-body">
                                        <div class="brandFiltermain">
                                            <div class="brandfilterSelect mt-0">
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="disFilter1">
                                                    <label for="disFilter1">
                                                        <p class="mb-0">70% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="disFilter2">
                                                    <label for="disFilter2">
                                                        <p class="mb-0">60% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="disFilter3">
                                                    <label for="disFilter3">
                                                        <p class="mb-0">50% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter4">
                                                    <label for="popFilter4">
                                                        <p class="mb-0">40% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter5">
                                                    <label for="popFilter5">
                                                        <p class="mb-0">30% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">20% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">10% And Above</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="popFilter1">
                                                    <label for="popFilter1">
                                                        <p class="mb-0">All Discounted Products</p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9 px-2">
                    <div class="productrow row">
                        @foreach($products as $product)
                        <div class="productCol col-lg-4 px-2">
                            <div class="productCardMain">
                                <div class="productCardimage position-relative">
                                    <?php
                                    $td = ($product->is_featured == 1 ? 'Featured' : ($product->new_product == 1 ? 'New' : ($product->is_best == 1 ? 'Best' : '')));
                                    echo '<span class="pdtag">'.$td.'</span>';
                                    ?>
                                    <a href="/product/<?php echo $product->slug; ?>">
                                        <img src="<?php echo $env.$product->thumb_image; ?>"
                                            alt="<?php echo $product->slug; ?>">
                                    </a>
                                </div>
                                <div class="productCardinfo">
                                    <h3>
                                        <a href="/product/<?php echo $product->slug; ?>">
                                            <?php echo $product->name;?>
                                        </a>
                                    </h3>
                                    <p class="pdprice">MRP:<strong>₹<?php echo $product->price; ?></strong></p>
                                    <div class="pdstarrating">
                                        @for($i = 0; $i < $product->averageRating;$i++)
                                            echo '<i class="bi bi-star-fill"></i>'; 
                                        @endfor 
                                        <sapn><?php echo '('.$product->averageRating.')'; ?></sapn>
                                    </div>
                                    <p class="pdsizes">10 Shades</p>
                                </div>
                                <div class="pdaddtocart">
                                    <button class="pdwishlistbtn">
                                        <i class="bi bi-heart"></i>
                                        <!-- <i class="bi bi-heart-fill"></i> -->
                                    </button>
                                    <button class="addtocartbtn">Add to Bag</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Brand Description -->
@if(!empty($brandDescription) && !empty($brandDescription->content))
<div class="container">
    <div class="brandDesc">
       {!! $brandDescription->content !!}
    </div>
</div>
@endif
@endsection