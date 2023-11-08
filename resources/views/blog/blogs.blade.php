@extends('layouts.app')
@section('content')
<?php 
$root = env('API_IMAGE_URL');
$blogs = json_decode($data,true);
?>
<div class="blogLisiingMain">
    <div class="container">
        <div class="row">
            @foreach($blogs['blogs']['data'] as $bd)
            @if($bd['status'] == 1 && $bd['show_homepage'] == 1)
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="blogCardmain">
                    <div class="blogImage">
                        <a href="{{route('Blog',$bd['slug'])}}">
                            <img src="{{$root.$bd['image']}}" alt="{{$bd['title']}}">
                        </a>
                    </div>
                    <div class="blogCardinfo">
                        <span>{{$bd['category']['name']}}</span>
                        <h3><a href="{{route('Blog',$bd['slug'])}}">{{$bd['title']}}</a></h3>
                        <p>{{strip_tags($bd['description'])}}</p>
                        <a href="{{route('Blog',$bd['slug'])}}">Read more</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- <a href="#" >Load More</a> -->
</div>
<script>

</script>
@endsection