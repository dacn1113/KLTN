@extends('frontend.main_master')
@section('content')

{{-- <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb --> --}}

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Đăng nhập</h4>
    <p class="">Xin chào, Chào mừng bạn đến với đăng nhập và đăng ký</p>
    <div class="social-sign-in outer-top-xs">
        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Đăng nhập bằng facebook</a>
        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Đăng nhập bằng Twitter</a>
        <a></a>
    </div>
   

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf 

 
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email người dùng <span>*</span></label>
            <input type="text" id="email" name="email" class="form-control unicase-form-control text-input">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>Tài khoản hoặc mật khâu không đúng </strong>
            </span>
            @enderror
          
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
        </div>
        <div class="checkbox outer-xs">
            <label>
                <input type="checkbox"  onclick="myFunction()" >Hiện mật khẩu
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Bạn quên mật khẩu?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
    </form>   
<script>    
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
</script>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Tạo một tài khoản mới</h4>
    <p class="text title-tag-line">Để tạo tài khoản vui lòng điền thông tin bên dưới!</p>
   
    <form method="POST" action="{{ route('register') }}">
            @csrf

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Tên người dùng <span>* </span></label>
            <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" required>
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email <span>* </span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
            {{-- @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>Email đã tồn tại</strong>
            </span>
            @enderror --}}
        </div>
        
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Số điện thoại <span>* </span></label>
            <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input" maxlength="10">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>Mật khẩu nhập không khớp</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Xác nhận mật khẩu <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>Mật khẩu nhập không khớp</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng ký</button>
    </form>
    
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->




{{-- @include('frontend.body.brands') --}}


<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->






@endsection




