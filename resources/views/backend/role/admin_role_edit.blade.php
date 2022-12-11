@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Chỉnh sửa người dùng quản trị </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" >
	 	@csrf

	 	<input type="hidden" name="id" value="{{ $adminuser->id }}">	
	 <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">



					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Tên người dùng quản trị  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > </div>
	</div>

				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Email quản trị  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}" > </div>
	</div>

				</div> <!-- end cold md 6 --> 

			</div>	<!-- end row 	 -->	




	<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Điện thoại người dùng quản trị  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" > </div>
	</div>

				</div> <!-- end cold md 6 -->





			</div>	<!-- end row 	 -->	

			<div class="row">


			<div class="col-md-6">

				<div class="form-group">
				  <h5>Mật khẩu quản trị  <span class="text-danger">*</span></h5>
				  <div class="controls">
			   <input type="password" name="password" class="form-control" > </div>
			  </div>
							  
						  </div> <!-- end cold md 6 --> 
						  
					  </div>	<!-- end row 	 -->	
						</div>

	 <div class="row">

				<div class="col-md-6">
		<div class="form-group">
		<h5>Hình ảnh người dùng quản trị<span class="text-danger">*</span></h5>
		<div class="controls">
 <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
	</div>
				</div><!-- end cold md 6 --> 

				<div class="col-md-6">
		
	<img id="showImage" src="{{ (!empty($adminuser->profile_photo_path))? url('upload/admin_images/'.$adminuser->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">				
		

				</div><!-- end cold md 6 -->  
			</div><!-- end row 	 -->	



	 <hr>



	<div class="row">

<div class="col-md-4">
			<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminuser->brand == 1 ? 'checked' : '' }}>
				<label for="checkbox_2">Thương hiệu</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }}>
				<label for="checkbox_3">Danh mục</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->product == 1 ? 'checked' : '' }}>
				<label for="checkbox_4">Sản phẩm</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminuser->slider == 1 ? 'checked' : '' }}>
				<label for="checkbox_5">Trình chiếu</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminuser->coupons == 1 ? 'checked' : '' }}>
				<label for="checkbox_6">Phiếu thưởng</label>
			</fieldset>
		</div>
	</div>
</div>



<div class="col-md-4">
			<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
				<label for="checkbox_7">Vận chuyển</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminuser->blog == 1 ? 'checked' : '' }}>
				<label for="checkbox_8">Blog</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminuser->setting == 1 ? 'checked' : '' }}>
				<label for="checkbox_9">Cài đặt</label>
			</fieldset>


			<fieldset>
				<input type="checkbox" id="checkbox_10" name="returnorder" value="1" {{ $adminuser->returnorder == 1 ? 'checked' : '' }}>
				<label for="checkbox_10">Đơn hàng trả lại</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminuser->review == 1 ? 'checked' : '' }}>
				<label for="checkbox_11">	Nhận xét</label>
			</fieldset>
		</div>
	</div>
</div>




<div class="col-md-4">
	<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
				<label for="checkbox_12">Đơn hàng</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminuser->stock == 1 ? 'checked' : '' }}>
				<label for="checkbox_13">Kho</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $adminuser->reports == 1 ? 'checked' : '' }}>
				<label for="checkbox_14">Báo cáo</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
				<label for="checkbox_15">Toàn bộ người dùng</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
				<label for="checkbox_16">Phân quyền người dùng</label>
			</fieldset>
		</div>
			</div>
		</div>
						</div>





			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật người dùng quản trị">					 
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


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection