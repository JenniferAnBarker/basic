<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact() {
        $contact = Contact::find(1);
        return view('frontend.contact',compact('contact'));
    }// End Method

    public function storeMessage(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'subject.required' => 'Subject is required.',
            'phone.required' => 'Phone number is required.',
            'message.required' => 'Message is required.',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Message Sent!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function contactMessage() {
        $contact = Contact::latest()->get();
        return view('admin.contact.contact_messages',compact('contact'));
    }// End Method

    public function deleteMessage($id) {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('contact.message')->with($notification);
    }// End Method
}
