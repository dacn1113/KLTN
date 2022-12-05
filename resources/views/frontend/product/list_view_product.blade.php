@foreach($products as $product)
<div class="category-product-inner wow fadeInUp">
  <div class="products">
    <div class="product-list product">
      <div class="row product-list-row">
        <div class="col col-sm-4 col-lg-4">
          <div class="product-image">
            <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
          </div>
          <!-- /.product-image --> 
        </div>
        <!-- /.col -->
        @php
           $avg = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
           @endphp
        <div class="col col-sm-8 col-lg-8">
          <div class="product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
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
            <div class="product-price"> <span class="price"> {{ number_format($product->selling_price) }} đ</span>  </div>
            @else
<div class="product-price"> <span class="price"> {{ number_format($product->discount_price )}} đ</span> <span class="price-before-discount"> {{ number_format($product->selling_price )}} đ</span> </div>
            @endif
            
            <!-- /.product-price -->
            <div class="description m-t-10">
            	@if(session()->get('language') == 'hindi') {{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif</div>
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">

                    @if(session()->get('language') == 'hindi')
               <button class="btn btn-primary icon " type="button" title="Thêm vào giỏ" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productViewvn(this.id)"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ </button>
               @else
               <button class="btn btn-primary icon" type="button" title="Add" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> Add to cart</button>
               @endif
               
          </li>
                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                  
                </ul>
              </div>
              <!-- /.action --> 
            </div>
            <!-- /.cart --> 
            
          </div>
          <!-- /.product-info --> 
        </div>
        <!-- /.col --> 
      </div>



         @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp    

                      <!-- /.product-list-row -->
                      <div>
            @if ($product->discount_price == NULL)
            @if(session()->get('language') == 'hindi')
            <div class="tag new"><span>Mới</span></div>
            @else
            <div class="tag new"><span>New</span></div>
            @endif
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>



                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
    @endforeach