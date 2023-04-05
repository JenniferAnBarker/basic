<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
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
    
    public function addBlogs() {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_add',compact('categories'));
    }// End Method

    public function storeBlog(Request $request) {
        if($request->file('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $saveurl = 'upload/blog/'.$name_gen;

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_image' => $saveurl,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'created_at' => Carbon::now()
            ]);

        } else {
            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'created_at' => Carbon::now()
            ]);
        }
        
        $notification = array([
            'message' => 'Blog page made successfully!',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.blogs')->with($notification);
    }// End Method

    public function editBlog($id) {
        $blog = Blog::findOrfail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_edit',compact('blog','categories'));
    }
}
