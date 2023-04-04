<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function allBlogs() {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all',compact('blogs'));
    }// End Method
}
