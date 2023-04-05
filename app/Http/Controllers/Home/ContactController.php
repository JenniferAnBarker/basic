<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact() {
        $contact = Contact::find(1);
        return view('frontend.contact',compact('contact'));
    }
}
