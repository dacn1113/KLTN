@extends('frontend.main_master')
@section('content')

{{-- <div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href=".">Trangchủ</a></li>
				<li class='active'><a>Forget Password</a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> --}}

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Quên mật khẩu</h4>
	<p class="">Không sao cả, hãy điền thông tin vào bên dưới!</p>
    <form method="POST" action="{{route('password.email')}}">
        @csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
		    <input id="email" name="email" type="email" class="form-control unicase-form-control text-input">
		</div>
	  
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gửi lên Email tài khoản</button>
	</form>					
</div>
<!-- Sign-in -->

	</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
{{-- @include('frontend.body.brands') --}}
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection