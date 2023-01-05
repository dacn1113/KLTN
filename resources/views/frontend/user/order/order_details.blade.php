@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

      <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Chi tiết vận chuyển</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Khách hàng : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th>  Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Tỉnh/thành phố : </th>
               <th> {{ $order->division->division_name }} </th>
            </tr>

             <tr>
              <th> Quận/huyện : </th>
               <th> {{ $order->district->district_name }} </th>
            </tr>

             <tr>
              <th> Địa chỉ : </th>
               <th>{{ $order->state->state_name }}</th>
            </tr>

            <tr>  <th> Địa chỉ chi tiết : </th>
              <th> {{ $order->notes }}</th></tr>

            <tr>
              <th> Mã bưu chính : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Ngày đặt: </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Chi tiết đặt hàng - 
<span class="text-danger"> Mã hóa đơn : {{ $order->invoice_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  Tên khác hàng : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  Số điện thoại : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> Phương thức : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Mã hóa đơn  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Tổng thanh toán : </th>
               <th>{{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Trạng thái : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>

           
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // 2ND end col md -5 -->


      <div class="row">



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Hình ảnh</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Tên sản phẩm </label>
                </td>

                <td class="col-md-3">
                  <label for=""> Mã sản phẩm</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Màu sắc </label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Kích thước/thể loại </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Số lượng </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Giá tiền </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Download file</label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $item->product->product_name_hin }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $item->color }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $item->size }}</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> {{ $item->qty }}</label>
                </td>

          <td class="col-md-2">
                  <label for=""> Gốc: {{ $item->price }}</label>
                  <label>Tổng: {{ $item->price * $item->qty}}</label>
                </td>


@php 

$file = App\Models\Product::where('id',$item->product_id)->first();
@endphp

             <td class="col-md-1">
              @if($order->status == 'pending')  
              <strong>
 <span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong> 
                
              @elseif($order->status == 'confirm')  

<a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">  
  <strong>
 <span class="badge badge-pill badge-success" style="background: #FF0000;"> Download </span>  </strong> </a> 
              @endif


                </td>




                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>
 
         
       </div> <!-- / end col md 8 --> 
        
      </div> <!-- // END ORDER ITEM ROW -->

      @if($order->status !== "Đã giao")
      
      @else

      @php 
      $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
      @endphp


      @if($order)
      <form action="{{ route('return.order',$order->id) }}" method="post">
        @csrf

  <div class="form-group">
    <label for="label"> Lý do trả lại đơn hàng:</label>
    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Lý do trả lại</textarea>    
  </div>

  <button type="submit" class="btn btn-danger">Order Return</button>

</form>
   @else

   <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
   
   @endif 



  @endif
<br><br>


		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection