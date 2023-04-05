<?php

namespace App\Http\Controllers\Home;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function footerSetup() {
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all',compact('allfooter'));
    }// End Method
}
