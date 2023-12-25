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
                    <a href="#!">Home <i class="bi bi-chevron-right"></i></a>
                    <a href="#!">Product Name <i class="bi bi-chevron-right"></i></a>
                    <a href="#!">Product Name </a>
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
                                    <img class="xzoom" id="xzoom-default" src="../assets/images/gallery/preview/01_b_car.jpg" 
                                    xoriginal="../assets/images/gallery/original/01_b_car.jpg" xpreview="../assets/images/gallery/preview/01_b_car.jpg"/>
                                </div>
                                <div class="xzoom-thumbs">
                                    <a class="" href="../assets/images/gallery/original/01_b_car.jpg">
                                        <img class="xzoom-gallery" src="../assets/images/gallery/thumbs/01_b_car.jpg"  >
                                    </a>
                                    <a class="" href="../assets/images/gallery/original/02_o_car.jpg">
                                        <img class="xzoom-gallery" src="../assets/images/gallery/preview/02_o_car.jpg">
                                    </a>
                                    <a class="" href="../assets/images/gallery/original/03_r_car.jpg">
                                        <img class="xzoom-gallery" src="../assets/images/gallery/preview/03_r_car.jpg">
                                    </a>
                                    <a class="" href="../assets/images/gallery/original/04_g_car.jpg">
                                        <img class="xzoom-gallery" src="../assets/images/gallery/preview/04_g_car.jpg">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="productDtlsBox">
                                <h4 class="productTitle">Maybelline New York Lash Sensational Sky High Waterproof Mascara</h4>

                                <div class="prodcutReviewBx">
                                    <span class="TotalRatings">
                                        4.2 <i class="bi bi-star-fill"></i>
                                    </span>
                                    <span class="Totalrevies pointer">
                                        <a href="#reviewTab">26 Reviews</a>
                                    </span>
                                    <span class="SubmitReveiw addreviewBtn pointer">
                                        Write a Reviews
                                    </span>
                                </div>

                                <div class="short-des">
                                    <h3>Product Summary</h3>
                                    <p>Ultrices eros in cursus turpis massa cursus mattis.
                                        Volutpat ac tincidunt vitae semper quis lectus.
                                        Aliquam id diam maecenas ultricies mi eget mauris.</p>
                                </div>
                                <div class="productPrice">
                                    <p><del>₹799</del> ₹699 <span>15%</span></p>
                                </div>

                                <div class="productVariationsbx">
                                    <h3>Select size</h3>
                                    <div class="productVariationslist">
                                        <div class="productVariations">
                                            <input type="radio" id="vari1" name="variation" checked>
                                            <label for="vari1">Size 1</label>
                                        </div>
                                        <div class="productVariations">
                                            <input type="radio" id="vari2" name="variation">
                                            <label for="vari2">Size 2</label>
                                        </div>
                                        <div class="productVariations">
                                            <input type="radio" id="vari3" name="variation">
                                            <label for="vari3">Size 3</label>
                                        </div>
                                    </div>
                                </div>
                               
                                
                                
                                <div class="product-qty d-flex mb-3 align-items-center">
                                    <form>
                                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                        <input type="number" id="number" value="0" />
                                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
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
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam qui rerum praesentium velit possimus quisquam hic voluptatibus sapiente officiis nobis molestias, necessitatibus aspernatur asperiores, quo animi? Delectus facere sunt sequi.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam qui rerum praesentium velit possimus quisquam hic voluptatibus sapiente officiis nobis molestias, necessitatibus aspernatur asperiores, quo animi? Delectus facere sunt sequi.</p>
                        </div>
                        <div class="description-box">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="howtousevide">
                                        <iframe src="https://www.youtube.com/embed/Ttw4hdrr3v4?si=r60Dt1IKC_wYlsVp&amp;start=8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-auto">
                                    <div class="howtouseInfo">
                                        <h3>How To Use</h3>
                                        <ul>
                                            <li>Gently massage into hair ensuring that entire scalp is covered.</li>
                                            <li>The treatment works as a natural conditioner if left on for at least 20 minutes.</li>
                                            <li>Cleanse post-treatment with a mild shampoo and warm water.</li>
                                            <li>May also be left on overnight if desired.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="description-box">
                            <h3>Ingredients</h3>
                            <div class="moreCatemain">
                                <div class="swiper moreCatemainSlider">
                                    <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="moreCateCard">
                                            <div class="moreCateCardImg">
                                                <a href="#!">
                                                    <img src="../assets/images/categoryimage.avif" alt="">
                                                </a>
                                            </div>
                                            <h3>Category Title</h3>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="swiper-button-next custNavbtn"></div>
                                    <div class="swiper-button-prev custNavbtn"></div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    

                    <div class="col-lg-12">
                        <div class="productBenefitbx">
                            <h3>Bringadi Oil Benefits</h3>
                            <div class="row mb-3">
                                <div class="col-lg-5 pr-0">
                                    <div class="productBenefitimg">
                                        <img src="https://static.kamaayurveda.in/pub/media/Pwa_benefits/nbring_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 pl-0">
                                    <div class="productBenefitinfo">
                                        <h3>Hair fall treatment oil proven to reduce hairfall*</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae veritatis dolorem atque exercitationem repudiandae. 
                                            Voluptates, enim. Illo libero officiis id quas, hic, nobis totam corporis perferendis ipsa dolorum vero placeat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-7 pr-0">
                                    <div class="productBenefitinfo">
                                        <h3>Hair fall treatment oil proven to reduce hairfall*</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae veritatis dolorem atque exercitationem repudiandae. 
                                            Voluptates, enim. Illo libero officiis id quas, hic, nobis totam corporis perferendis ipsa dolorum vero placeat.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 pl-0">
                                    <div class="productBenefitimg">
                                        <img src="https://static.kamaayurveda.in/pub/media/Pwa_benefits/nbring_1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-5 pr-0">
                                    <div class="productBenefitimg">
                                        <img src="https://static.kamaayurveda.in/pub/media/Pwa_benefits/nbring_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 pl-0">
                                    <div class="productBenefitinfo">
                                        <h3>Hair fall treatment oil proven to reduce hairfall*</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae veritatis dolorem atque exercitationem repudiandae. 
                                            Voluptates, enim. Illo libero officiis id quas, hic, nobis totam corporis perferendis ipsa dolorum vero placeat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="description-box mt-4 mb-3" id="reviewTab">
                            <h3>REVIEWS (0)</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="add-review">
                                        <div class="d-flex align-items-center right-review">
                                            <div class="review-imag-box">
                                                <img src="../assets/images/review-imag.png">
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
                                                    <button type="button" class="btn signInBtn write-review addreviewBtn">Write Review</button>
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
        @endsection