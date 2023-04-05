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


    public function updateFooter(Request $request) {
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
        ]);

        $notification = array(
            'message' => 'Footer updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method
}
