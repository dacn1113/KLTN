@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
@if(session('language') == 'hindi')
Thanh toán khi nhận 
@else
Cash On Delivery
@endif
@endsection




{{-- <div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Thanh toán khi giao hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->  --}}




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">




                
			
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
	
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								@if(session('language') == 'hindi')
								<h4 class="unicase-checkout-title">Xác nhận thanh toán </h4>
								@else
								<h4 class="unicase-checkout-title">Payment confirmation</h4>
								@endif
							</div>
							<div class="">
								<ul class="nav nav-checkout-progress list-unstyled">
									<hr>
									<li>
										@if(session('language') == 'hindi')
										@if(Session::has('coupon'))

										<strong>Giá gốc: </strong> {{ $cartTotal }} đ<hr>

										<strong>Tên mã giảm giá : </strong> {{ session()->get('coupon')['coupon_name'] }}
										( {{ session()->get('coupon')['coupon_discount'] }} % )
										<hr>

										<strong>Số tiền giảm : </strong> {{ number_format(session()->get('coupon')['discount_amount'] )}} đ
										<hr>
										<strong>Tổng thanh toán : </strong> {{ number_format(session()->get('coupon')['total_amount']) }} đ
										<hr>
										@else
									
										<strong>Giá gốc: </strong> {{ $cartTotal }} đ<hr>
										<strong>Tổng thanh toán: </strong> {{ $cartTotal }} đ<hr>
									
								
						                 @endif 
										 @else
										 @if(Session::has('coupon'))

										<strong>Product price: </strong> {{ $cartTotal }} đ<hr>

										<strong>Discount code : </strong> {{ session()->get('coupon')['coupon_name'] }}
										( {{ session()->get('coupon')['coupon_discount'] }} % )
										<hr>

										<strong>Amount to be reduced : </strong> {{ number_format(session()->get('coupon')['discount_amount']) }} đ 
										<hr>
										<strong>Payment amount : </strong> {{ number_format(session()->get('coupon')['total_amount']) }} đ
										<hr>
										@else
										 <strong>Cost: </strong> {{ $cartTotal }} đ<hr>
										 <strong>Total payment: </strong> {{ $cartTotal }} đ<hr>
										 @endif
										 @endif
					                </li>
								</ul>		
			
							</div>
		
					</div>
	
			</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				@if(session('language') == 'hindi')
				<h4 class="unicase-checkout-title">Thực hiện thanh toán</h4>
				@else
				<h4 class="unicase-checkout-title">Make payments</h4>
			@endif
		    </div>

<form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">

          <img src="{{ asset('frontend/assets/images/payments/cash.png') }}">

            <label for="card-element">

      <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
      <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
      <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
      <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
      <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
      <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
      <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
      <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 

            </label>




        </div>
        <br>
		@if(session('language') == 'hindi')
		<button class="btn btn-primary">Gửi thanh toán</button>
		@else
		<button class="btn btn-primary">Send payment</button>
		@endif
        </form>



		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->








@endsection