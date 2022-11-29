@foreach($products as $product)
  <div class="col-sm-6 col-md-4 wow fadeInUp">
    <div class="products">
      <div class="product">
        <div class="product-image">
          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
          <!-- /.image -->

           @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp     
          
          <div>
            @if ($product->discount_price == NULL)
            @if(session('language') == 'hindi')
            <div class="tag new"><span>Mới</span></div>
            @else
            <div class="tag new"><span>new</span></div>
            @endif
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>


        </div>
        <!-- /.product-image -->
        
        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
          	@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>


@if ($product->discount_price == NULL)
<div class="product-price"> <span class="price"> {{ number_format($product->selling_price) }} đ</span>   </div>

@else

<div class="product-price"> <span class="price"> {{ number_format($product->discount_price) }} đ</span> <span class="price-before-discount"> {{ number_format($product->selling_price) }} đ</span> </div>
@endif



          
          <!-- /.product-price --> 
          
        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                @if(session()->get('language') == 'hindi')
                <button class="btn btn-primary icon" type="button" title="Thêm vào giỏ" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productViewvn(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                @else
                <button class="btn btn-primary icon" type="button" title="Add" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i></button>
                @endif
                
              </li>
              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
      </div>
      <!-- /.product --> 
      
    </div>
    <!-- /.products --> 
  </div>
  <!-- /.item -->
  @endforeach
               