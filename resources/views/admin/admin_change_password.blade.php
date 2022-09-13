@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="card-body">

            <h4 class="card-title">Admin Change Password </h4><br><br>
            
            @if (count($errors))
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
            @endforeach
            @endif

            <form method="post" action="{{route('update.change.password')}}">
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input name="password" class="form-control" type="password" id="password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input name="password_confirmation" class="form-control" type="password" id="password_confirmation">
                </div>
            </div>
        
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
            </form>
        </div>
    </div>
</div>

@endsection

