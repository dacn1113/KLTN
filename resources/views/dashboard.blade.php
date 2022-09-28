@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
        <div class="col-dm-2">
            <div class="card">
                <h3 class="text-center" ><span class="text-danger">Hi...</span>
                    <strong>
                        {{Auth::user()->name}}
                    </strong>
                    Welcome to Shop
                </h3>
            </div>
        </div>
        <div class="col-dm-2">
            
        </div>
    </div>
    </div>
</div>
@endsection