@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-xl">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Quản trị Đổi mật khẩu</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="post" action="{{ route('update.change.password') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Mật khẩu hiện tại <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="current_password" name="oldpassword" class="form-control" required="" > 
</div>
	</div>


	<div class="form-group">
		<h5>Mật khẩu mới <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="password" name="password" class="form-control" required="" > </div>
	</div>



	<div class="form-group">
		<h5>Xác nhận mật khẩu<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" > </div>
	</div>
					
				</div> <!-- end cold md 6 --> 
				
			</div>	<!-- end row 	 -->	

 
	  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Xác nhận">					 
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
 


	  </div>

 

@endsection