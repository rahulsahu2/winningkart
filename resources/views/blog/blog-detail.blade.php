@extends('layouts.app',['customMetaDesc'=> $blog['blog']['seo_description'],'customMetaTag'=> $blog['blog']['seo_title'],'customTitle' => $blog['blog']['title']])
@section('content')
<?php 
$root = env('API_IMAGE_URL');
$blog = json_decode($data, true);
?>
<style>
    * {
        box-sizing: border-box;
    }
    .link{
        text-decoration:none;
        color:black;
    }

    /* Header/Blog Title */
    .header {
        padding: 30px;
        font-size: 40px;
        text-align: center;
        background: white;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
    }

    /* Right column */
    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Footer */
    .footer {
        padding: 20px;
        text-align: center;
        background: #ddd;
        margin-top: 20px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {

        .leftcolumn,
        .rightcolumn {
            width: 100%;
            padding: 0;
        }
    }
    .card-horizontal {
    display: flex;
    flex: 1 1 auto;
}
</style>
<div class="container">
    <div class="header">
        <h2>{{$blog['blog']['title']}}</h2>
    </div>

    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h5>Published on {{ date_format(date_create($blog['blog']['created_at']),"d M Y")}}</h5>
                <div class="blogDetailimg">
                    <img src="{{$root.$blog['blog']['image']}}" alt="{{$blog['blog']['title']}}">
                </div>
                <div class="blogDetailinfo">
                    {!! $blog['blog']['description'] !!}
                </div>
            </div>
            <div class="card">
                <div class="fluid">
                    <a class="btn btn-sm btn-social btn-fb" href="https://www.facebook.com/sharer/sharer.php?u={{route('Blog',$blog['blog']['slug'])}}" target="_blank" title="Share this post on Facebook">
                        <i class="bi bi-facebook"></i> Share
                    </a>
                    <a class="btn btn-sm btn-social btn-tw" href="https://twitter.com/intent/tweet?text={{$blog['blog']['title']}}&amp;url={{route('Blog',$blog['blog']['slug'])}}" target="_blank" title="Share this post on Twitter">
                        <i class="bi bi-twitter"></i> Tweet
                    </a>
                    <a class="btn btn-sm btn-social btn-in" href="https://www.linkedin.com/shareArticle?mini=true&url={{route('Blog',$blog['blog']['slug'])}}&amp;title={{$blog['blog']['title']}}" target="_blank" title="Share this post on LinkedIn">
                    <i class="bi bi-linkedin" data-fa-transform="grow-2"></i> Share
                    </a>
                </div>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>Search</h2>
                <div class="searchInput position-relative" style="width:100%">
                    <i class="bi bi-search"></i>
                    <input id="searchfield" type="text" placeholder="Search blogs" class="form-control">
                </div>
            </div>
            <div class="card">
                    <h3>Popular Post</h3>
                    @foreach($blog['popularPosts'] as $pop)
                    <a class="row mt-3 link" target="_blank" href="{{route('Blog',$pop['blog']['slug'])}}">
                        <div class="col-sm-4">
                            <img src="{{$root.$pop['blog']['image']}}" alt="{{$pop['blog']['title']}}" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            {{ substr(strip_tags($pop['blog']['description']), 0, 60)}}
                        </div>
                    </a>
                    @endforeach
            </div>
            <div class="card">
                <h3>Top Categories</h3>
                <div class="list-group">
                    @foreach($blog['categories'] as $cat)
                    @if($cat['status'] == 1)
                        <a href="{{route('Blogs',"category=".$cat['slug'])}}" class="list-group-item link">{{$cat['name']}}</a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        // Get the input element by its ID
        const urlInput = document.getElementById('searchfield');
        
        // Add an event listener for the "keyup" event
        urlInput.addEventListener('keyup', function(event) {
            // Check if the Enter key (key code 13) was pressed
            if (event.keyCode === 13) {
                // Get the URL entered in the input
                const url = urlInput.value;
                
                // Redirect to the entered URL in a new tab
                window.open('/blogs?search=' + url,"_self");
                
                // Clear the input field
                urlInput.value = '';
            }
        });
    </script>
@endsection