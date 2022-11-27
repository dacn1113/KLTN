@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
@if(session('language') == 'hindi')
Thanh toán sản phẩm
@else
Product payment
@endif
@endsection


{{-- <div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->  --}}




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
	 
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
			 <div class="col-md-6 col-sm-6 already-registered-login">
				@if(session('language') == 'hindi')
		 <h4 class="checkout-subtitle"><b>Xác nhận thông tin khách hàng</b></h4>
			@else
			<h4 class="checkout-subtitle"><b>Confirm customer information</b></h4>
			@endif
			
	<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
		@csrf

		@if(session('language') == 'hindi')

		<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Tên khách hàng</b>  <span>*</span></label>
	    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
	  </div>  <!-- // end form group  -->
	 

	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
	    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Số điện thoại</b>  <span>*</span></label>
	    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Mã bưu chính </b> <span>*</span></label>
	    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
	  </div>  <!-- // end form group  -->
@else

<div class="form-group">
	<label class="info-title" for="exampleInputEmail1"><b>Customer name</b>  <span>*</span></label>
	<input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
  </div>  <!-- // end form group  -->
 

<div class="form-group">
	<label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
	<input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
  </div>  <!-- // end form group  -->


<div class="form-group">
	<label class="info-title" for="exampleInputEmail1"><b>Phone</b>  <span>*</span></label>
	<input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
  </div>  <!-- // end form group  -->


  <div class="form-group">
	<label class="info-title" for="exampleInputEmail1"><b>Post code</b> <span>*</span></label>
	<input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
  </div>  <!-- // end form group  -->
@endif
	 
	 
				</div>	
				<!-- guest-login -->


 


				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					 

<div class="form-group">
	@if(session('language') == 'hindi')
	<h5><b>Chọn khu vực vận chuyển </b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Chọn một tỉnh hoặc thành phố</option>
			@foreach($divisions as $item)
 
			<option value="{{ $item->id }}">{{ $item->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>Quận hoặc huyện</b>  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Chọn quận hoặc huyện</option>
			 
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>Phường hoặc thị trấn</b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="state_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Chọn phường hoặc thị trấn</option>
			 
		</select>
		@error('state_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
				 
					 
    <div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Địa chỉ nhà hoặc cơ quan <span>*</span></label>
	     <textarea class="form-control" cols="30" rows="5" placeholder="Địa chỉ" name="notes"></textarea>
	  </div>  <!-- // end form group  -->



					



					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
	@else
	<h5><b>Select shipping area</b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select a province or city</option>
			@foreach($divisions as $item)
 
			<option value="{{ $item->id }}">{{ $item->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>County or district</b>  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select a county or district</option>
			 
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>Ward or town</b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="state_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select ward or town</option>
			 
		</select>
		@error('state_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
				 
					 
    <div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Home or work address <span>*</span></label>
	     <textarea class="form-control" cols="30" rows="5" placeholder="Address" name="Notes"></textarea>
	  </div>  <!-- // end form group  -->



					



					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
	@endif
</div>
<!-- End checkout-step-01  -->


					    
					  	
					</div><!-- /.checkout-steps -->
				</div>




				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
@if(session('language') == 'hindi')
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Thông tin thanh toán của bạn</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

					@foreach($carts as $item)
					<li> 
						<strong>Hình ảnh: </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>

					<li> 
						<strong>Số lượng: </strong>
						 ( {{ $item->qty }} )

						 <strong>Màu sắc: </strong>
						 {{ $item->options->color }}

						 <strong>Kích cỡ: </strong>
						 {{ $item->options->size }}
					</li>
                    @endforeach 
     
					<hr>
		 <li>
		 	@if(Session::has('coupon'))
			<strong>Giá gốc: </strong> {{ number_format($cartTotal) }}đ <hr>
			<strong>Tên mã giảm giá: </strong> {{ session()->get('coupon')['coupon_name'] }}
			( {{ session()->get('coupon')['coupon_discount'] }} % )
			<hr>
			<strong>Số tiền giảm : </strong> {{ number_format(session()->get('coupon')['discount_amount']) }} đ
			<hr>
			<strong>Tổng thanh toán : </strong> {{ number_format(session()->get('coupon')['total_amount']) }} đ 
			<hr>
		 	@else
			<strong>Giá gốc: </strong> {{ number_format($cartTotal) }} đ <hr>
			<strong>Tổng thanh toán : </strong> {{ number_format( $cartTotal) }} đ<hr>
		 	@endif 
		 </li>
					 
					

				</ul>		
			</div>
		</div>
	</div>
	@else
	<div class="checkout-progress-sidebar ">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="unicase-checkout-title">Your payment information</h4>
				</div>
				<div class="">
					<ul class="nav nav-checkout-progress list-unstyled">
	
						@foreach($carts as $item)
						<li> 
							<strong>Image product: </strong>
							<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
						</li>
	
						<li> 
							<strong>Amount: </strong>
							  {{ $item->qty }} 
	
							 <strong>Color: </strong>
							 {{ $item->options->color }}
	
							 <strong>Size: </strong>
							 {{ $item->options->size }}
						</li>
						@endforeach 
		 
						<hr>
			 <li>
				 @if(Session::has('coupon'))
				<strong>Product price: </strong> {{ number_format($cartTotal) }}đ <hr>
				<strong>Discount code: </strong> {{ session()->get('coupon')['coupon_name'] }}
				( {{ session()->get('coupon')['coupon_discount'] }} % )
				<hr>
				<strong>Amount to be reduced : </strong> {{ number_format(session()->get('coupon')['discount_amount']) }} đ
				<hr>
				<strong>Payment amount : </strong> {{ number_format(session()->get('coupon')['total_amount']) }} đ 
				<hr>
				 @else
				<strong>Principal payment amount: </strong> {{ number_format($cartTotal) }} đ <hr>
				<strong>Payment amount : </strong> {{ number_format( $cartTotal) }} đ<hr>
				 @endif 
			 </li>
						 
						
	
					</ul>		
				</div>
			</div>
		</div>

	@endif
</div> 
<!-- checkout-progress-sidebar --> </div>







	<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				@if(session('language') == 'hindi')
		    	<h4 class="unicase-checkout-title">Chọn phương thức thanh toán</h4>
				@else
		    	<h4 class="unicase-checkout-title">Select a payment method</h4>
				@endif
		    </div>


		    <div class="row">
		    	<div class="col-md-4">
		   <label for="">Stripe</label> 		
       <input type="radio" name="payment_method" value="stripe">
       <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">Card</label> 		
       <input type="radio" name="payment_method" value="card">	
		<img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">Trả sau</label> 		
       <input type="radio" name="payment_method" value="cash">	
	   <img src="{{ asset('frontend/assets/images/payments/6.png') }}">   		
		    	</div> <!-- end col md 4 -->

				 	
			</div> <!-- // end row  -->
<hr>
@if(session('language') == 'hindi')
  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Tiếp tục thanh toán</button>
@else
<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Continue to pay</button>
@endif

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>



 



</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->
 







<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->



 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="state_id"]').empty(); 
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });



 $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
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