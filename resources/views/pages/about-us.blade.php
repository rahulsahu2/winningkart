@extends('layouts.app')
@section('content')
<?php 
    $data = json_decode($data,true);
    $apiurl = env("API_IMAGE_URL");
?>
<section class="aboutUsSec" id="aboutWin">
    <div class="abtImge">
        <img src="{{$apiurl.$data['aboutUs']['banner_image']}}" alt="banner image">
    </div>
    <div class="container">
        <div class="aboutUsmain">
            {!! $data['aboutUs']['description'] !!}
        </div>
        <div class="visionSec">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="visionBoxinner">
                      {!!  $data['aboutUs']['leftdescription'] !!}
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="visionBoxinner">
                    {!!  $data['aboutUs']['rightdescription'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  


<section class="careerSec" id="carrerFormId">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="careerImge">
                    <img src="{{$apiurl.$data['aboutUs']['sidebanner_image']}}" alt="Career Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="careerTitle">
                    <h1>Submit Your Resume</h1>
                    <p>We will back to you shortly.</p>
                </div>
                <div class="careerForm">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="formBox">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="formBox">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="formBox">
                                    <input type="text" class="form-control" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="formBox">
                                    <input type="file" class="file-form-control" >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="formBox">
                                    <textarea class="form-control" rows="8" placeholder="Profile Summary"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="careerBtnBx text-right">
                                    <button type="button" class="btn btnCareerBtn">Apply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonial-id">
    <div class="container-fluid">
        <h3 class="secTitle text-center">Testimonials</h3>

        <div class="testimonialeMain">
            <div class="swiper testimonialeSlider">
                <div class="swiper-wrapper">
                    @if($data['testimonials'])
                    @foreach($data['testimonials'] as $id)
                    @if($id['status'] == 1)
                    <div class="swiper-slide">
                        <div class="testimonialeCard">
                            <div class="testiimg">
                                <img src="{{$apiurl.$id['image']}}" alt="{{$id['name']}}">
                            </div>
                            <h3>{{$id['name'].'('.$id['designation'].')'}}</h3>
                            <p>{{$id['comment']}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                <div class="swiper-button-next custNavbtn"></div>
                <div class="swiper-button-prev custNavbtn"></div>
                </div>
        </div>
    </div>
</section>
@endsection('content')