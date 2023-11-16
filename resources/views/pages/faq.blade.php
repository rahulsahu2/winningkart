@extends('layouts.app')
@section('content')
<?php 
    $data = json_decode($data,true);
?>

<section class="faqSec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($data['faqs'] as $id)
                    @php 
                     $slug = str_replace(' ', '-', $id['category'] ?? '');
                     @endphp
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                        <div class="faqOptionBox">
                            <a href="{{route('FaqDetail',$slug)}}">
                            <div class="faqIcon">
                                <img src="assets/images/icons/{{$slug}}.png" alt="{{$id['category'] ?? ''}}">  
                            </div>
                            <h3>{{$id['category'] ?? ''}}</h3>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="writeReview">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="accordHeader card-header" id="headingOne">
                            <h2 class="mb-0">
                                <div class="faqAccrdTitle text-left" data-toggle="collapse" data-target="#collapseOne" 
                                aria-expanded="true" aria-controls="collapseOne">
                                <h3><i class="bi bi-chat-right-text"></i> Write to us</h3>
                                </div>
                            </h2>
                            </div>
                        
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="formBoxmain">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="formBoxinner mb-3">
                                                <select class="form-control mb-3">
                                                    <option disabled selected>What do you need help with?</option>
                                                    @foreach($data['faqs'] as $id)
                                                        <option value="{{$id['category']}}" >{{$id['category']}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control mb-3" placeholder="Subject">
                                                <textarea rows="8" class="form-control" placeholder="Description"></textarea>
                                            </div>
                                            <div class="formBoxinner d-flex justify-content-end">
                                                <button type="button" class="btn faqBtn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection