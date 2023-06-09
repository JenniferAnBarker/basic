<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function allBlog() {
        $blog = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('blog'));
    }// End Method

    public function addBlog() {
        return view('admin.blog_category.blog_category_add');
    }// End Method

    public function storeBlog(Request $request) {
        // $request->validate([
        //     'blog_category' => 'required',
        // ],[
        //     'blog_category.required' => 'Name is required.',
        // ]);
           
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog category updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }// End Method

    public function editBlog($id) {
        $blog = BlogCategory::find($id);
        return view('admin.blog_category.blog_category_edit',compact('blog'));
    }// End Method

    public function updateBlog(Request $request) {
        $blog_id = $request->id;
        
        BlogCategory::findOrFail($blog_id)->update([
            'blog_category' => $request->blog_category
        ]);

        $notification = array(
            'message' => 'Updates to blog saved!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }// End Method

    public function deleteBlog($id) {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog category deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }// End Method
}
