<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminprofileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(5);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    public function AdminProfileEdit()
    {
        $editData = Admin::find(5);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    public function AdminProfileStore(Request $request)
    {
        // $id = Auth::user()->id;
        $data = Admin::find(5);
        $data->name = $request->name;
        // $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            // 'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Admin::find(5)->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(5);
            $admin->password = hash::make($request->password);
            $admin->save();
            Auth::logout();

            // session()->flash('message', 'Password Update Succsessfully');
            return redirect()->route('admin.logout');
        } else {
            // session()->flash('message', 'Old password is not match');
            return redirect()->back();
        }
    }
}