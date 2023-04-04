<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function aboutPage() {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
    }// End Method

    public function update(Request $request) {
        $about_id = $request->id;

        if($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            
            Image::make($image)->resize(523,605)->save('upload/about_page/'.$name_gen);
            $save_url = 'upload/about_page/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About page saved with image!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
            ]);

            $notification = array(
                'message' => 'About page saved without image!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }// End Method

    public function homeAbout() {
        $aboutdata = About::find(1);

        return view('frontend.about',compact('aboutdata'));
    }// End Method

    public function aboutMulti() {
        return view('admin.about_page.multiImage');
    }// End Method

    public function storeMulti(Request $request) {
        $image = $request->file('multi_image');

        foreach ($image as $mi) {
            $name_gen = hexdec(uniqid()).'.'.$mi->getClientOriginalExtension();
            
            Image::make($mi)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;
            
            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }// End of the Foreach

            $notification = array(
                'message' => 'Multi Image Inserted Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    }// End Method

    public function allMulti() {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi',compact('allMultiImage'));
    }
}