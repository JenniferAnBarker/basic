<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    public function homeSlider(){
        $homeSlide = HomeSlide::find(1);

        return view('admin.home_slide.home_slide_all',compact('homeSlide'));
    }
}
