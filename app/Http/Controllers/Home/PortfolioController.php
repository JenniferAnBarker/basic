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

    

    public function editPortfolio($id) {
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.portfolio_edit',compact('portfolio'));
    }// End Method

    public function updatePortfolio(Request $request) {
        $port_id = $request->id;

        if($request->file('portfolio_image')){
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;

            Portfolio::findOrFail($port_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Updates to portfolio saved!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);
        } else {
            Portfolio::findOrFail($port_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            $notification = array(
                'message' => 'Updates to portfolio saved!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);
        }
    }// End Method

    public function deletePortfolio($id) {
        
        $port = Portfolio::findOrFail($id);
        $img = $port->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Portfolio Data Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }// End Method

    public function portfolioDetails($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }// End Method
    
    public function homePortfolio() {
        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    }// End Method
}
