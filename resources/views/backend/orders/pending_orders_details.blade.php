@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Chi tiết đơn hàng</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Chi tiết đơn hàng</li>
								 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 
<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Chi tiết vận chuyển</strong> </h4>
				  </div>
				  

<table class="table">
            <tr>
              <th> Tên người nhận: </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Số điện thoại người nhận : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Khu vực : </th>
               <th> {{ $order->division->division_name }} </th>
            </tr>

             <tr>
              <th> Quận : </th>
               <th> {{ $order->district->district_name }} </th>
            </tr>

             <tr>
              <th> Địa chỉ : </th>
               <th>{{ $order->state->state_name }} </th>
            </tr>

            <tr>
              <th> Địa chỉ chi tiết: </th>
               <th>{{ $order->notes }} </th>
            </tr>

            <tr>
              <th> Mã bưu điện : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Ngày gửi : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Chi tiết đơn hàng</strong><span class="text-danger"> Hóa đơn : {{ $order->invoice_no }}</span></h4>
				  </div>
				   

<table class="table">
            <tr>
              <th>  Tên : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  Diện thoại : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> Thanh toán : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> CMND : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Hóa đơn  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th>Giá thanh toán: </th>

              @if ($order->payment_method=='Stripe')
              <td> {{ number_format($order->amount) }} Dolar</td>
              @else
              <td> {{ number_format($order->amount) }} Vnd</td>
              @endif
            </tr>

            <tr>
              <th> Trạng thái : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>


            <tr>
              <th>  </th>
               <th> 
               	@if($order->status == 'Chưa giải quyết')
               	<a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Nhận đơn</a>
                 <a href="{{ route('cancel-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Hủy đơn</a>

               	@elseif($order->status == 'Xác nhận')
               	<a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Xử lý đơn hàng</a>

               	@elseif($order->status == 'Nhận đơn')
               	<a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Xác nhận đơn hàng được vận chuyển</a>

               	@elseif($order->status == 'Chờ vận chuyển')
               	<a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Chuyển đơn hàng </a>

               	@elseif($order->status == 'Đang vận chuyển')
                <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Đã giao hàng</a>

               	@endif

                 </th>
            </tr>

           
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->





<div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					 
				  </div>



 <table class="table">
            <tbody>
  
              <tr>
                <td width="10%">
                  <label for=""> Hình ảnh</label>
                </td>

                 <td width="20%">
                  <label for=""> Tên sản phẩm </label>
                </td>

             <td width="10%">
                  <label for=""> Mã sản phẩm</label>
                </td>


               <td width="10%">
                  <label for=""> Màu sắc </label>
                </td>

                <td width="10%">
                  <label for=""> Kích cỡ </label>
                </td>

                  <td width="10%">
                  <label for=""> Số lượng </label>
                </td>

               <td width="10%">
                  <label for=""> Đơn giá </label>
                </td>
                
               <td width="10%">
                <label for=""> Tổng </label>
              </td>
              </tr>


              @foreach($orderItem as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->product->product_name_hin }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->color }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->size }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">

          @if ($item->payment_method=='Stripe')
          <label for=""> {{ number_format($item->price) }}$</label>
        </td>
        <td width="10%">
          <label for=""> {{ number_format($item->price * $item->qty)}}$ </label>

        
          @else
          <label for=""> {{ number_format($item->price) }}đ</label>
        </td>
        <td width="10%">
          <label for=""> {{ number_format($item->price * $item->qty)}}đ </label>

        
          @endif
                </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>










				  
				</div>
			  </div>  <!--  // cod md -12 -->









 

 

 


		  </div>
		  <!-- /. end row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection