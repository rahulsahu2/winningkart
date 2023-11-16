@extends('layouts.app')
@section('content')
<?php 
    $data = json_decode($data,true);
?>

<section class="faqSec" style="min-height:500px;" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="writeReview faqDetailsbx">
                    <h2>{{$data['faqs'][0]['category']}}</h2>
                    <div class="accordion" id="accordionExample">
                        @if($data)
                        @Foreach($data['faqs'] as $id)
                        <div class="card">
                            <div class="accordHeader card-header" id="headingOne">
                                <div class="faqAccrdTitle text-left collapsed" data-toggle="collapse" data-target="#collapseOne" 
                                aria-expanded="true" aria-controls="collapseOne">
                                <h3 class="justify-content-between">{{$id['question']}}<i class="bi bi-chevron-right"></i></h3>
                                </div>
                            </div>
                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="faqDescBox">
                                    <p>{!! $id['answer']!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection