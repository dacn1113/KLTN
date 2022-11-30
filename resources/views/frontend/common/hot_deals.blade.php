@php
$hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
     @endphp

     <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
      @if(session()->get('language') == 'hindi')
          <h3 class="section-title">Ửu đãi lớn</h3>
          @else
          <h3 class="section-title">Hot deals</h3>
          @endif
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">



        @foreach($hot_deals as $product)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper"> 
                  <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp   

              @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
              @else
              <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                    off</span></div>
              @endif

                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">Ngày</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">Giờ</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">Phút</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">Giây</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                @php
                $avg = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                @endphp

  <div class="product-info text-left m-t-20">
    <h3 class="name"><a href="detail.html">
      @if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
      <div>
        @if($avg == 0)
   No Rating Yet 
   @elseif($avg == 1 || $avg < 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
   @elseif($avg == 2 || $avg < 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
  @elseif($avg == 3 || $avg < 4)
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

  @elseif($avg == 4 || $avg < 5)
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
  @elseif($avg == 5 || $avg < 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
   @endif
      </div>
<style>
  .checked {
  color: orange;
}

</style>

      @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> {{ number_format($product->selling_price) }} đ</span></div>
      @else
      <div class="product-price"> <span class="price"> {{ number_format($product->discount_price) }} đ</span> <span class="price-before-discount">{{ number_format($product->selling_price )}} đ</span> </div>
      @endif

    <!-- /.product-price --> 

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Thêm giỏ hàng</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
             @endforeach <!-- // end hot deals foreach -->





          </div>
          <!-- /.sidebar-widget --> 
        </div>