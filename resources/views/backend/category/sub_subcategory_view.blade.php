@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 
			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Danh sách danh mục cấp 3</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Danh mục 1 </th>
								<th>Danh mục cấp 2</th>
								<th>Danh mục cấp 3</th>
								<th>Hành động</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($subsubcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }}  </td>
		<td>{{ $item['subcategory']['subcategory_name_hin'] }}</td>
		<td>{{ $item->subsubcategory_name_hin }}</td>
		<td width="30%">
 <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Chỉnh sữa"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" title="Xóa" id="delete">
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
				  <h3 class="box-title">Thêm danh mục cấp 3</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
 <form method="post" action="{{ route('subsubcategory.store') }}" >
	 	@csrf
					   
	 <div class="form-group">
	<h5>Chọn danh mục cấp 1 <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">Lựa chọn</option>
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
	<h5>Chọn danh mục cấp 2 <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  >
			<option value="" selected="" disabled="">Lựa chọn</option>
			 
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
	<div class="form-group">
		<h5>Danh mục cấp 3 En <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_en" class="form-control" >
     @error('subsubcategory_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>
	<div class="form-group">
		<h5>Danh mục cấp 3 Vn  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_hin" class="form-control" >
     @error('subsubcategory_name_hin') 
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
  
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
@endsection