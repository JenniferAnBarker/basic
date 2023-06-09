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
        
        $request->validate([
            'blog_image' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_tags' => 'required',
        ],[
            'blog_image.required' => 'Image is required.',
            'blog_title.required' => 'Title is required.',
            'blog_description.required' => 'Description is required.',
            'blog_tags.required' => 'Tags are required.',
        ]);

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
    }// End Method

    public function updateBlog(Request $request) {
        $whichBlog = $request->id;

        if($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $saveurl = 'upload/blog/'.$name_gen;

            Blog::findOrFail($whichBlog)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_image' => $saveurl,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);
        } else {
            Blog::findOrFail($whichBlog)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);
        }

        $notification = array([
            'message' => 'Blog page updated successfully!',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.blogs')->with($notification);
    }// End Method

    public function deleteBlog($id) {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blogs')->with($notification);
    }// End Method

    public function blogDetails($id) {

        $allBlogs = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);

        $tags = explode(',',$blog->blog_tags);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
         return view('frontend/blog_details',compact('blog','allBlogs','categories','tags'));
    }// End Method

    public function categoryBlog($id) {
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $catname = BlogCategory::findOrFail($id);
        return view('frontend.category_blog_details',compact('blogpost','allBlogs','categories','catname'));
    }// End Method

    public function homeBlog() {
        $allblogs = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('allblogs','categories'));
    }// End Method
}