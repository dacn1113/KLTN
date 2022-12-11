@extends('frontend.main_master')
@section('content')
<!-- @php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp -->

<div class="body-content">
	<div class="container">
		<div class="row">
      
		 @include('frontend.common.user_sidebar')

			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card">
  	<h3 class="text-center"><span class="text-danger">Thay đổi mật khẩu</span><strong> </strong>   </h3>

  	<div class="card-body">
  		


  		<form method="post" action="{{ route('user.password.update') }}">
  			@csrf


         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Mật khẩu cũ <span> </span></label>
            <input type="password" id="current_password" name="oldpassword" class="form-control" >
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">mật khẩu mới <span> </span></label>
            <input type="password" id="password" name="password" class="form-control">
        </div>


        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Nhập lại mật khẩu <span> </span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

         

         <div class="form-group">            
           <button type="submit" class="btn btn-danger">Thay đổi</button>
        </div>         
 

  			
  		</form>  		
  	</div>

 
  	
  </div>
				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection