@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Đổi mật khẩu</h4>

    <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">		
            <div class="form-group">
                <x-jet-label for="exampleInputEmail1" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
		    <input id="password" name="password" type="password" class="form-control unicase-form-control text-input">
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Nhập lại mật khẩu <span>*</span></label>
		    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control unicase-form-control text-input">
		</div>
	  
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Cài đặt lại mật khẩu mới </button>
	</form>					
</div>
<!-- Sign-in -->

	</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection