@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Danh sách thương hiệu <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Thương hiệu tiếng Anh </th>
								<th>Thương hiệu tiếng Việt </th>
								<th>Hình ảnh</th>
								<th>Hoạt động</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($brands as $item)
	 <tr>
		<td>{{ $item->brand_name_en }}</td>
		<td>{{ $item->brand_name_hin }}</td>
		<td><img src="{{ asset($item->brand_image) }}" style="width: 70px; height: 40px;"> </td>
		<td>
 <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Chỉnh sửa"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Xóa" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Brand Page -------- -->
          <div class="col-4">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Thêm mới thương hiệu </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Tên thương hiệu tiếng Anh <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="brand_name_en" class="form-control" > 
	 @error('brand_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5>Tên thương hiệu tiếng Việt <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="brand_name_hin" class="form-control" >
     @error('brand_name_hin') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>



	<div class="form-group">
		<h5>Hình ảnh thương hiệu <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="brand_image" class="form-control" >
     @error('brand_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm">					 
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
@endsection