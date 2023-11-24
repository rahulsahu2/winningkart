@extends('layouts.app')
@section('content')
<?php
$data = json_decode($data,true);
//print_r($data);
$ImageUrl = env('API_IMAGE_URL');
$categories = $data['categories'] ?? [];
$products = $data['products']['data'];
$banner = $data['shopPageCenterBanner']??[];
$sidebanner = $data['shopPageSidebarBanner']??[];
$brands = $data['brands'] ?? [];
?>

<div class="categoryBg">
    <section class="categorbannerMain">
        <div class="container">
            <!-- <h3 class="secTitle text-center">Category Title</h3> -->
            <div class="categoryslidemain">
                <div class="swiper categorySlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="categorySliderCard">
                                <a href="/category?<?php $banner['product_slug'] ?>">
                                    <img src="<?php echo $ImageUrl.$banner['image']; ?>" alt="<?php echo $banner['title_one']; ?>">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categorySliderCard">
                                <a href="/category?<?php $sidebanner['product_slug'] ?>">
                                    <img src="<?php echo $ImageUrl.$sidebanner['image']; ?>" alt="<?php echo $sidebanner['title_one']; ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next custNavbtn"></div>
                    <div class="swiper-button-prev custNavbtn"></div>
                </div>
            </div>
        </div>
    </section>


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
                            <!-- Brand Filter -->
                            <div class="popCard card">
                                <div class="popHeader card-header" id="Brandaccord">
                                    <div class="popHeaderbtn collapsed" data-toggle="collapse"
                                        data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                        <h3 class="mb-0">Brand </h3>
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>

                                <div id="collapseBrand" class="popcollapse collapse " aria-labelledby="Brandaccord"
                                    data-parent="#popularityaccordion">
                                    <div class="popCardBody card-body">
                                        <div class="brandFiltermain">
                                            <div class="brandSearch">
                                                <input type="text" placeholder="Search" class="form-control">
                                            </div>
                                            <div class="brandfilterSelect">
                                                @foreach($brands as $brand)
                                                <div class="popFiltercard">
                                                    <input type="checkbox" id="<?php echo $brand['slug'] ?>">
                                                    <label for="popFilter1">
                                                        <p class="mb-0"><?php echo $brand['name'] ?></p>
                                                        <span><i class="bi bi-check-lg"></i></span>
                                                    </label>
                                                </div>
                                                @endforeach
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
                                    $td = ($product['is_featured'] == 1 ? 'Featured' : ($product['new_product'] == 1 ? 'New' : ($product['is_best'] == 1 ? 'Best' : '')));
                                    echo '<span class="pdtag">'.$td.'</span>';
                                    ?>
                                    <a href="/product/<?php echo $product['slug']; ?>">
                                        <img src="<?php echo $ImageUrl.$product['thumb_image']; ?>"
                                            alt="<?php echo $product['slug']; ?>">
                                    </a>
                                </div>
                                <div class="productCardinfo">
                                    <h3>
                                        <a href="/product/<?php echo $product['slug']; ?>">
                                            <?php echo $product['name'];?>
                                        </a>
                                    </h3>
                                    <p class="pdprice">MRP:<strong>₹<?php echo $product['price']; ?></strong></p>
                                    <div class="pdstarrating">
                                        @for($i = 0; $i < $product['averageRating'];$i++)
                                            echo '<i class="bi bi-star-fill"></i>'; 
                                        @endfor 
                                        <sapn><?php echo '('.$product['averageRating'].')'; ?></sapn>
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
</div>
@endsection