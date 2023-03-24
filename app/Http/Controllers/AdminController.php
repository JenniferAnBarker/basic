<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'You have successfully logged out!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function profile() {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    } // End Method

    public function edit() {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit',compact('editData'));
    } // End Method

    public function store(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array (
            'message' => 'Changes Saved!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } // End Method

    public function changePassword(){
       
        return view('admin.admin_change_password');
    } // End Method

    public function updatePassword(Request $request){

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            session()->flash('message','Password Updated!');
            return redirect()->back();
        }else{
            session()->flash('message','Current Password Is Incorrect');
            return redirect()->back();
        };
    } // End Method
}
