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
				  <h3 class="box-title">Danh sách phiếu giảm giá</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Tên phiếu </th>
								<th>Mức giảm</th>
								<th>Thời gian kết thúc</th>
								<th>Trạng thái </th>
								<th>Hoạt động</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($coupons as $item)
	 <tr>
		<td> {{ $item->coupon_name }}  </td>
		<td> {{ $item->coupon_discount }}% </td>
		<td width="25%">
       {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
			 </td>

		<td>
		 	@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
		 	<span class="badge badge-pill badge-success"> Valid </span>
		 	@else
           <span class="badge badge-pill badge-danger"> Invalid </span>
		 	@endif

		 </td>

		<td width="25%">
            <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
            <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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
				  <h3 class="box-title">Thêm phiếu giảm giá </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('coupon.store') }}" >
	 	@csrf
					   

	 <div class="form-group">
		<h5>Tên phiếu <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="coupon_name" class="form-control" > 
	 @error('coupon_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5>Mức giảm(%) <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="coupon_discount" class="form-control" >
     @error('coupon_discount') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Thời gian kết thúc  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
     @error('coupon_validity') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm mới ">					 
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