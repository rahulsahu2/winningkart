<?php

namespace App\Http\Controllers;

use App\Services\APIServices\Common;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $common;

    public function __construct(Common $commonservice)
    {
        $this->common = $commonservice;
    }
     /**
     * Display content of privacy policy page.
     */
    public function Blogs(Request $request)
    {
        $data = "";
        if($request->search){
            $data = $this->common->GetBlogsByQuery("?search=".$request->search);            
        }
        else if($request->category){
            $data = $this->common->GetBlogsByQuery("?category=".$request->category);
        }
        else{
            $data = $this->common->GetBlogs();
        }

        return view('blog.blogs',compact('data'));
    }

    public function Blog($slug)
    {
        $data = $this->common->GetBlogbyId($slug);
        return view('blog.blog-detail',compact('data'));
    }
}
