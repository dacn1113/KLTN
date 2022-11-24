@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Publish All Reviews </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Tóm tắt  </th>
								<th>Bình luận </th>
								<th>Người sử dụng </th>
								<th>Sản phẩm  </th>
								<th>Trạng thái </th>
								<th>Hoạt động</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($review as $item)
	 <tr>
		<td> {{ $item->summary }}  </td>
		<td> {{ $item->comment }}  </td>
		<td>  {{ $item->user->name }}  </td>

		<td> {{ $item->product->product_name_en }}  </td>
		<td>
		@if($item->status == 0)
      <span class="badge badge-pill badge-primary">Chưa giải quyết </span>
       @elseif($item->status == 1)
       <span class="badge badge-pill badge-success">Công bố </span>
		@endif

		  </td>

		<td width="25%">
  <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger" id="delete">Xóa bỏ </a>
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






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection