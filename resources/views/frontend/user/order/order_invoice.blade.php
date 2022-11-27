<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<title>Invoice</title>

<style type="text/css">
    * {
      font-family: DejaVu Serif, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 10px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        /* font-family: serif; */
        margin-top: 20px;
    }
</style>

</head>
<body>
  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Biên lai mua hàng</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Shop Head Office
               Email:admin@example.com <br>
               Mob: 1245454545 <br>
               Tp HCM ,Tan Binh: <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Tên khách hàng:</strong> {{ $order->name }}<br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Điện thoại:</strong> {{ $order->phone }} <br>

           @php
            $div = $order->division->division_name;
            $dis = $order->district->district_name;
            $state = $order->state->state_name;
            $dc = $order->notes;
           @endphp
            
           <strong>Địa chỉ :</strong> {{ $state }} {{ $dc }},{{ $dis }},{{$div}} <br>
           <strong>Mã bưu chính:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> {{ $order->invoice_no}}</h3>
           Ngày đặt: {{ $order->order_date }} <br>
           Ngày nhận: {{ $order->delivered_date }} <br>
           Thanh toán: {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Thông tin sản phẩm</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Kích thước</th>
        <th>Màu sắc</th>
        <th>Mã code</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tổng </th>
      </tr>
    </thead>
    <tbody>

     @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>
        <td align="center">

          @if($item->size == NULL)
           ----
          @else
            {{ $item->size }}
          @endif
            
        </td>
        <td align="center">{{ $item->color }}</td>
        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">{{ number_format($item->price) }} Vnd</td>
        <td align="center">{{ number_format($item->price * $item->qty) }} Vnd</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Total:</span>{{ number_format($order->amount )}}Vnd</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Cám ơn bạn vì đã mua sản phẩm từ cửa hàng chúng tôi.</p>
  </div>
  <div class="authority float-right mt-5">
      <p>---------------------------</p>
      <h5>Kí tên</h5>
    </div>
</body>
</html>