@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

	 


<!--   ------------ Add Search Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Tìm kiếm theo ngày </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-date') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Chọn ngày <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="date" class="form-control" > 
	 @error('date') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
 	 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Tìm kiếm theo tháng </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-month') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Chọn tháng  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="month" class="form-control">
			<option label="Chọn 1"></option>
			<option value="January">Tháng 1</option>
			<option value="February">Tháng 2</option>
			<option value="March">Tháng 3</option>
			<option value="April">Tháng 4</option>
			<option value="May">Tháng 5</option>
			<option value="Jun">Tháng 6</option>
			<option value="July">Tháng 7</option>
			<option value="August">Tháng 8</option>
			<option value="September">Tháng 9</option>
			<option value="October">Tháng 10</option>
			<option value="November">Tháng 11</option>
			<option value="December">Tháng 12</option>


		</select> 

	 @error('month') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div> 


 <div class="form-group">
		<h5>Chọn năm  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year_name" class="form-control">
			<option label="Chọn 1"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>





			   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Chọn năm </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-year') }}" >
	 	@csrf
					   
<div class="form-group">
		<h5>Chọn năm <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year" class="form-control">
			<option label="Chọn 1"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>   

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Tìm">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>








 <!--   ------------End  Add Search Page -------- -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection