<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>Quản trị viên - Bảng điều khiển</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

@include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->

@include('admin.body.slidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
   
@yield('admin')


	  </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.body.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->

    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	
	<!-- Vendor JS -->
	<script src=" {{asset('backend/js/vendors.min.js')}}"></script>
    <script src=" {{asset('backend/assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src=" {{asset('backend/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src=" {{asset('backend/assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src=" {{asset('backend/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	

	<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>

	<!-- /// Tgas Input Script -->
	<script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

	<!-- // CK EDITOR  --> 
	 <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
	 <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
	 <script src="{{ asset('backend/js/pages/editor.js') }}"></script>
	 
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
	

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
	<script>
	 @if(Session::has('message'))
	 var type = "{{ Session::get('alert-type','info') }}"
	 switch(type){
		case 'info':
		toastr.info(" {{ Session::get('message') }} ");
		break;
		case 'success':
		toastr.success(" {{ Session::get('message') }} ");
		break;
		case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
		break;
		case 'error':
		toastr.error(" {{ Session::get('message') }} ");
		break; 
	 }
	 @endif 
	</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(function(){
$(document).on('click','#delete',function(e){
	e.preventDefault();
	var link = $(this).attr("href");


			  Swal.fire({
				title: 'Bạn có chắn chứ?',
				text: "Xóa dữ dữ liệu này?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đúng!'
			  }).then((result) => {
				if (result.isConfirmed) {
				  window.location.href = link
				  Swal.fire(
					'Đã xóa!',
					'Bạn đã xóa dữ liệu này.',
					'Thành công'
				  )
				}
			  }) 


});

});

</script>
	
</body>
</html>
