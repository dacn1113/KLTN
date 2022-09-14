@extends('frontend.main_master')
@section('content')

{{-- @php
$user = DB::table('users')->where('id',Auth::user()->id)->first();   
@endphp --}}

<div class="body-content">
    <div class="container">
        <div class="row">
        <div class="col-md-2"><br>

            <img class="card-img-top" style="border-radius: 50%" src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" 
            height="100%" width="100%">
            <br><br>

            <ul class="list-group list-group-flush">
                <a href="{{route('dashboard')}}"class="btn btn-primary btn-sm btn-block">Home</a>
                <a href="{{route('user.profile')}}"class="btn btn-primary btn-sm btn-block">Profile Update</a>
                <a href=" "class="btn btn-primary btn-sm btn-block">Change Password</a>
                <a href="{{route('user.logout')}}"class="btn btn-primary btn-sm btn-block">Logout</a>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h3 class="text-center" ><span class="text-danger"></span>
                    Update Your Password
                </h3>
                <div class="card-body">
                    <form method="POST" action="{{route('user.password.update')}}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Current Password <span></span></label>
                            <input  name="oldpassword" id="current_password" type="password" class="form-control unicase-form-control text-input">
                        </div>
                
                
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">New Password<span></span></label>
                            <input name="password" id="password" type="password" class="form-control unicase-form-control text-input">
                          </div>

                     
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Passwor <span></span></label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control unicase-form-control text-input">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
    </div>
</div>
@endsection