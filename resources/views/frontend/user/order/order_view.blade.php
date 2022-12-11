@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       <div class="col-md-2">
       </div>

       <div class="col-md-8">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Ngày</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Tổng cộng</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Thanh toán</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Hóa đơn</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Trạng thái</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Chức năng </label>
                </td>
                
              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ number_format($order->amount) }} đ</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

         <td class="col-md-2">
          <label for=""> 

    @if($order->status == 'Pending')        
        <span class="badge badge-pill badge-warning" style="background: #800080;"> Chưa giải quyết </span>
        @elseif($order->status == 'confirm')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Xác nhận </span>

          @elseif($order->status == 'processing')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Xử lý </span>

          @elseif($order->status == 'picked')
         <span class="badge badge-pill badge-warning" style="background: #808000;">Chờ vận chuyển</span>

          @elseif($order->status == 'shipped')
         <span class="badge badge-pill badge-warning" style="background: #808080;">Đang vận chuyển </span>

          @elseif($order->status == 'delivered')
         <span class="badge badge-pill badge-warning" style="background: #008000;"> Đã giao hàng </span>

          @if($order->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;">Yêu cầu trả lại </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Hủy đơn </span>

      @endif
            </label>
        </td>

         <td class="col-md-1">
          <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Xem </a>

           <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Hóa đơn </a>
          
        </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection