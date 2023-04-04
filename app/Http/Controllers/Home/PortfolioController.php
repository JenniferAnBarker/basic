<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\HomeSlide;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function allPortfolio() {

        $portfolio = Portfolio::latest()->get();

        return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }// End Method

    public function addPortfolio(){
        return view('admin.portfolio.portfolio_add');
    }// End Method

    public function storePortfolio(Request $request) {

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ],[
            'portfolio_name.required' => 'Name is required.',
            'portfolio_title.required' => 'Title is required.'
        ]);
            
        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Portfolio updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }// End Method
}
