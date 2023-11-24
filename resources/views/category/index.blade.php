@extends('layouts.app')
@section('content')
<div class="categoryBg">
    <!-- <div class="container">
                <div class="breadcrumbMain">
                    <div class="breadcrumbInner">
                        <a href="#!">Home <i class="bi bi-chevron-right"></i></a>
                        <a href="#!">Luxe <i class="bi bi-chevron-right"></i></a>
                        <a href="#!">Makeup</a>
                    </div>
                </div>
            </div> -->
    <div class="catlistMain">
        <!-- <h3 class="secTitle text-center">Category Title</h3> -->
        <div class="catlistslidemain">
            <div class="swiper catListSlider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="catListSliderCard">
                            <a href="#!">
                                <img src="assets/images/catslide-1.avif" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="catListSliderCard">
                            <a href="#!">
                                <img src="assets/images/catslide-2.avif" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="catListSliderCard">
                            <a href="#!">
                                <img src="assets/images/catslide-3.avif" alt="">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
            </div>
        </div>
    </div>

    <!-- 
            <section>
                <div class="container">
                    <h3 class="secTitle text-center">SHOP BY CATEGORY</h3>
                    <div class="row">
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        <div class="col-lg-2 px-2">
                            <a href="#!" class="text-decoration-none">
                            <div class="shopCateMain">
                                <img src="assets/images/cateshop.jpg" alt="">
                                <div class="shopCateinfo">
                                    <h3>Shampoos</h3>
                                    <span><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                             </a>
                        </div>
                        
                    </div>
                </div>
            </section> -->
    <section class="mb-3">
        <div class="container">
            <h3 class="secTitle text-center">SHOP BY CATEGORY</h3>

            <div class="brandSmallmain">
                <div class="swiper brandSmallSlider swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-33b891c6cd99b21010" aria-live="polite">
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
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="3 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="4 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="5 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="6 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="7 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="8 / 9"
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
                        <div class="swiper-slide" role="group" aria-label="9 / 9"
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

    <section>
        <div class="container">
            <h3 class="secTitle text-center">BRANDS YOU WILL LOVE</h3>
            <div class="row">
                <div class="col-lg-3 px-2">
                    <a href="#!" class="text-decoration-none">
                        <div class="brandLoveMain">
                            <div class="brandLoveImg">
                                <img src="assets/images/brand-love.avif" alt="">
                            </div>
                            <div class="brandLoveInfo">
                                <p>Flat 10% Off</p>
                                <span>On Haircare Regimes</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 px-2">
                    <a href="#!" class="text-decoration-none">
                        <div class="brandLoveMain">
                            <div class="brandLoveImg">
                                <img src="assets/images/brand-love.avif" alt="">
                            </div>
                            <div class="brandLoveInfo">
                                <p>Flat 10% Off</p>
                                <span>On Haircare Regimes</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 px-2">
                    <a href="#!" class="text-decoration-none">
                        <div class="brandLoveMain">
                            <div class="brandLoveImg">
                                <img src="assets/images/brand-love.avif" alt="">
                            </div>
                            <div class="brandLoveInfo">
                                <p>Flat 10% Off</p>
                                <span>On Haircare Regimes</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 px-2">
                    <a href="#!" class="text-decoration-none">
                        <div class="brandLoveMain">
                            <div class="brandLoveImg">
                                <img src="assets/images/brand-love.avif" alt="">
                            </div>
                            <div class="brandLoveInfo">
                                <p>Flat 10% Off</p>
                                <span>On Haircare Regimes</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <h3 class="secTitle text-center">SHOP BY HAIR CONCERN</h3>
            <div class="hairconslidemain">
                <div class="swiper hairconSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-1.avif" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-2.avif" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-3.avif" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-3.avif" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-3.avif" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hairconSliderCard">
                                <a href="#!">
                                    <img src="assets/images/hiarconslide-3.avif" alt="">
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

    <section>
        <div class="container">
            <h3 class="secTitle text-center">BESTSELLERS</h3>
            <div class="brandfeatInmain">
                <div class="swiper brandfeatInSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="productSlideCard">
                                <div class="productslideImg">
                                    <a href="#!">
                                        <img src="assets/images/product.avif" alt="">
                                    </a>
                                </div>
                                <div class="productslideinfo">
                                    <h3><a href="#!">Maybelline New York Lash Sensational Sky High Waterproof
                                            Mascara</a></h3>
                                    <div class="pdPricecard">
                                        <p>₹699<del>₹799</del><span>15%</span></p>
                                        <div class="pdSize">
                                            <span>6 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="swiper-button-next custNavbtn"></div>
                    <div class="swiper-button-prev custNavbtn"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h3 class="secTitle text-center">TRENDING NOW</h3>
            <div class="row">
                <div class="col-lg-6 px-2">
                    <div class="trendingCard">
                        <a href="#!">
                            <img src="assets/images/trending.jpg" alt="">
                            <div class="trendingInfobx">
                                <h3>Trending Title</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quaerat nobis, soluta laboriosam minus dolorum repellendus!</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 px-2">
                    <div class="trendingCard">
                        <a href="#!">
                            <img src="assets/images/trending.jpg" alt="">
                            <div class="trendingInfobx">
                                <h3>Trending Title</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quaerat nobis, soluta laboriosam minus dolorum repellendus!</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 px-2">
                    <div class="trendingCard">
                        <a href="#!">
                            <img src="assets/images/trending.jpg" alt="">
                            <div class="trendingInfobx">
                                <h3>Trending Title</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quaerat nobis, soluta laboriosam minus dolorum repellendus!</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 px-2">
                    <div class="trendingCard">
                        <a href="#!">
                            <img src="assets/images/trending.jpg" alt="">
                            <div class="trendingInfobx">
                                <h3>Trending Title</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quaerat nobis, soluta laboriosam minus dolorum repellendus!</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h3 class="secTitle text-center">SPECIAL OFFER</h3>
            <div class="row">
                <div class="col-lg-3 px-2">
                    <div class="budgetCard">
                        <a href="#!">
                            <img src="assets/images/budget-1.jpeg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="budgetCard">
                        <a href="#!">
                            <img src="assets/images/budget-2.jpeg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="budgetCard">
                        <a href="#!">
                            <img src="assets/images/budget-3.jpeg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 px-2">
                    <div class="budgetCard">
                        <a href="#!">
                            <img src="assets/images/budget-4.jpeg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection