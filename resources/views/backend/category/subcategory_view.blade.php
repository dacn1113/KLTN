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
				  <h3 class="box-title">Danh mục cấp 2</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Danh mục cấp 1 </th>
								<th>Danh mục cấp 2 En</th>
								<th>Danh mục cấp 2 Vn </th>
								<th>Hành động</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($subcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }}  </td>
		<td>{{ $item->subcategory_name_en }}</td>
		 <td>{{ $item->subcategory_name_hin }}</td>
		 <td width="30%">
			<a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info" title="Chỉnh sửa"><i class="fa fa-pencil"></i> </a>
			<a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" title="Xóa " id="delete">
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Thêm danh mục cấp 2</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


						<form method="post" action="{{ route('subcategory.store') }}" >
	 	@csrf


	 <div class="form-group">
	<h5>Chọn danh mục cấp 1 <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">Chọn</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
	</div>


	<div class="form-group">
		<h5>Danh mục cấp 2 En <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="text" name="subcategory_name_en" class="form-control" >
			@error('subcategory_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Danh mục cấp 2 Vn <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="text" name="subcategory_name_hin" class="form-control" >
			@error('subcategory_name_hin') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm ">					 
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