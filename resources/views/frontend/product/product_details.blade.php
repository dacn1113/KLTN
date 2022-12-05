@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
@endsection
	
<style>
	.checked {
  color: orange;
}

</style>


<!-- ===== ======== HEADER : END ============================================== -->
{{-- <div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> --}}
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
{{-- <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> --}}
</div>		
  
    
    
    	<!-- ====== === HOT DEALS ==== ==== -->
   @include('frontend.common.hot_deals')
<!-- ===== ===== HOT DEALS: END ====== ====== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
{{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget --> --}}
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        {{-- <div class="item"> 
            <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }} " alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png') }} " alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member2.png') }} " alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item --> --}}

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ===== ========== Testimonials: END ======== =============== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

        	@foreach($multiImag as $img)
            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
  <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name ) }} ">
                    <img class="img-responsive" alt="" src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }} " />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach
            

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

			@foreach($multiImag as $img)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
     <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }} " />
                    </a>
                </div>
				@endforeach
              



            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->   

@php 
	$reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();

	$avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');

@endphp


					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">


							<h1 class="name" id="pname">
@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
							 </h1>
							
			<div class="rating-reviews m-t-20">
				<div class="row"> 
					<div class="col-sm-3">
						 
   @if($avarage == 0)
   No Rating Yet 
   @elseif($avarage == 1 || $avarage < 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
   @elseif($avarage == 2 || $avarage < 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
  @elseif($avarage == 3 || $avarage < 4)
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

  @elseif($avarage == 4 || $avarage < 5)
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
  @elseif($avarage == 5 || $avarage < 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
   @endif


					</div>



					<div class="col-sm-8">
						<div class="reviews">
							<a href="#" class="lnk">({{ count($reviewcount) }} Reviews)</a>
						</div>
					</div>
				</div><!-- /.row -->		
			</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

<div class="description-container m-t-20">
	@if(session()->get('language') == 'hindi') {{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif
</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

	<div class="col-sm-6">
		<div class="price-box">
       @if ($product->discount_price == NULL)
       <span id="none" class="price">{{ number_format($product->selling_price) }}đ</span>
	   <span id="dcprice" class="price"></span>
	   <span id="slprice" class="price-strike"></span>
       @else
       <span id="dcprice" class="price">{{ number_format($product->discount_price) }} đ
	   {{-- <input type="hidden" id="pprice" name="price" value="{{ $product->discount_price}}"?> --}}
	   </span>
	   <span  id="slprice" class="price-strike">{{ number_format($product->selling_price) }} đ</span>
	   </span>
       @endif

	   {{-- <span  id="dcprice" class="price">đ</span>
	   <span  id="slprice" class="price">đ</span> --}}

			
	
</div>
	</div>

		<div class="col-sm-6">
			<div class="favorite-button m-t-10">
				<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
				    <i class="fa fa-heart"></i>
				</a>
				<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
				   <i class="fa fa-signal"></i>
				</a>
				<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
				    <i class="fa fa-envelope"></i>
				</a>
			</div>
		</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->


 <!--     /// Add Product Color And Product Size ///// -->

<div class="row">
									

	<div class="col-sm-6">

<div class="form-group">

	<label class="info-title control-label">Choose Color <span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
		<option selected="" disabled="">--Choose Color--</option>
		@foreach($product_color_en as $color)
		<option value="{{ $color }}">{{ ucwords($color) }}</option>
		 @endforeach
	</select> 

</div> <!-- // end form group -->
		 
	</div> <!-- // end col 6 -->

		<div class="col-sm-6">

{{-- <div class="form-group">
	@if($product->product_size_en == null)

	@else	

	<label class="info-title control-label">Choose Size <span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
		<option selected="" disabled="">--Choose Size--</option>
		@foreach($product_size_en as $size)
		<option value="{{ $size }}">{{ ucwords($size) }}</option>
		 @endforeach
	</select> 

	@endif
	
</div> <!-- // end form group --> --}}




@php
$sizes = DB::table('price_products')->where('pro_id',$product->id)->get();
@endphp

{{-- <span id="price">$: {{$product->selling_price}}</span> --}}
<label class="info-title control-label">Choose Size <span> </span></label>
<select class="form-control unicase-form-control selectpicker" style="display: none;" name="size" id="size">

@foreach($sizes as $size)
<option>{{$size->size}}</option>
@endforeach
</select>	
<input type="hidden" value="{{$product->id}}"  id="proDum"/>
			 
		</div> <!-- // end col 6 -->

	 </div><!-- /.row -->



 <!--     /// End Add Product Color And Product Size ///// -->








	<div class="quantity-container info-container">
		<div class="row">
			
			<div class="col-sm-2">
				<span class="label">Qty :</span>
			</div>
			
			<div class="col-sm-2">
				<div class="cart-quantity">
					<div class="quant-input">
		                <div class="arrows">
		                  {{-- <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
		                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div> --}}
		                </div>
		                <input type="number" class="form-control" id="qty" value="1" min="1">
						
	              </div>
	            </div>
			</div>

			<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

			<div class="col-sm-7">
				@if(session()->get('language') == 'hindi')
				<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> THÊM VÀO GIỎ HÀNG</button>
				@else
				<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
			    @endif 
			</div>

			
		</div><!-- /.row -->
	</div><!-- /.quantity-container -->

							

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
     <div class="addthis_inline_share_toolbox_8tvu"></div>
            
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								@if(session()->get('language') == 'hindi') 
								<li class="active"><a data-toggle="tab" href="#description">MÔ TẢ</a></li>
								<li><a data-toggle="tab" href="#review">NHẬN XÉT</a></li>
								@else
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								@endif
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
<div id="description" class="tab-pane in active">
	<div class="product-tab">
		<p class="text">@if(session()->get('language') == 'hindi') 
			{!! $product->long_descp_hin !!} @else {!! $product->long_descp_en !!} @endif</p>
	</div>	
								</div><!-- /.tab-pane -->

<div id="review" class="tab-pane">
	<div class="product-tab">
												
		<div class="product-reviews">
			@if(session()->get('language') == 'hindi') 
			<h4 class="title">Nhận xét từ người dùng</h4>
			@else
			<h4 class="title">Customer Reviews</h4>
			@endif

@php
$reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();

// $users = DB::table('reviews')->where('product_id',$product->id)->selectRaw('rating, count(*) * 100.0 / sum(count(*)) over() as phantram ,count(rating) as soluong')->groupBy('rating')->get();
// $rt5=0;
// $rt4=0;
// $rt3=0;
// $rt2=0;
// $rt1=0;
// foreach ($users as $it => $item) {
// 	if ($item->rating==5) {
// 		$rt5= $item->phantram;
// 	}
// 	if ($item->rating==4) {
// 		$rt4= $item->phantram;
// 	}
// 	if ($item->rating==3) {
// 		$rt3= $item->phantram;
// 	}
// 	if ($item->rating==2) {
// 		$rt2= $item->phantram;
// 	}
// 	if ($item->rating==1) {
// 		$rt1= $item->phantram;
// 	}
// }
@endphp			

	<div class="reviews">
		 
<div class="form-container">	
	<hr style="border:1px solid #f1f1f1">
	
	<div class="row">

	  <div class="side">
		<div>5 star</div>
	  </div>

	  <div class="middle">
		<div class="bar-container">
		<div class="" style="width: {{round($rt5,2)}}%; height: 18px; background-color: #04AA6D;"></div>
		</div>
	</div>

	<div class="side right">
	  <div>{{$count5}}</div>
	  </div>

	  <div class="side">
		<div>4 star</div>
	  </div>
	  <div class="middle">
		<div class="bar-container">
			<div class="" style="width: {{round($rt4,2)}}%; height: 18px; background-color: #2196F3;"></div>
		</div>
	</div>
	<div class="side right">
	  <div>{{$count4}}</div>
	
	  </div>
	  <div class="side">
		<div>3 star</div>
	  </div>
	  <div class="middle">
		<div class="bar-container">
			<div class="" style="width: {{round($rt3,2)}}%; height: 18px; background-color: #00bcd4;"></div>
		</div>
	</div>
	<div class="side right">
	  <div>{{$count3}}</div>
	  </div>
	  <div class="side">
		<div>2 star</div>
	  </div>
	  <div class="middle">
		<div class="bar-container">
			<div class="" style="width: {{round($rt2,2)}}%; height: 18px; background-color: #ff9800;"></div>
		</div>
	</div>
	<div class="side right">
	  <div>{{$count2}}</div>
	
	  </div>
	  <div class="side">
		<div>1 star</div>
	  </div>
	  <div class="middle">
		<div class="bar-container">
			<div class="" style="width: {{round($rt1,2)}}%; height: 18px; background-color: #f44336;"></div>
		</div>
	  </div>
	  <div class="side right">
		<div>{{$count1}}</div>
	  </div>
	</div>
	</div>
		@foreach($reviews as $item)
		@if($item->status == 0)

		@else
			<hr style="border:1px solid #f1f1f1">
		<div class="review">

        <div class="row">
			<div class="col-md-6">
			<img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>


 @if($item->rating == NULL)

 @elseif($item->rating == 1)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 4)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>

@endif



			</div>

			<div class="col-md-6">
				
			</div>			
		</div> <!-- // end row -->



			<div class="review-title"><span class="summary">{{ $item->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
			<div class="text">"{{ $item->comment }}"</div>
		 </div>

		 @endif
	@endforeach
	
	</div><!-- /.reviews -->

		</div><!-- /.product-reviews -->
										

										
<div class="product-add-review">

	<div class="review-table">
		 
	</div><!-- /.review-table -->
											
		<div class="review-form">
			@guest
			@if(session()->get('language') == 'hindi') 
<p> <b> Bạn cần phải đăng nhập mới có thể nhận xét sản phẩm này <a href="{{ route('login') }}">Đăng nhập</a> </b> </p>
@else
<p> <b> For Add Product Review. You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>
@endif
			@else 
			<button class="btn btn-primary btn-upper" onclick="myFunction()">@if(session()->get('language') == 'hindi') Bình luận @else Review @endif</button>
			<div  id="myDIV" class="form-container">
				
  <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
  	@csrf
  	<input type="hidden" name="product_id" value="{{ $product->id }}">
	  
<table class="table">	
	<thead>
		<tr>
			@if(session()->get('language') == 'hindi') 
			<th class="cell-label">&nbsp;</th>
			<th>1 sao</th>
			<th>2 sao</th>
			<th>3 sao</th>
			<th>4 sao</th>
			<th>5 sao</th>
			@else
			<th class="cell-label">&nbsp;</th>
			<th>1 star</th>
			<th>2 stars</th>
			<th>3 stars</th>
			<th>4 stars</th>
			<th>5 stars</th>
			@endif
		</tr>
	</thead>	
	<tbody>
		<tr>	
			@if(session()->get('language') == 'hindi') 
			<td class="cell-label">Chất lượng</td>
			@else
			<td class="cell-label">Quality</td>
			@endif
			<td><input type="radio" name="quality" class="radio" value="1"></td>
			<td><input type="radio" name="quality" class="radio" value="2"></td>
			<td><input type="radio" name="quality" class="radio" value="3"></td>
			<td><input type="radio" name="quality" class="radio" value="4"></td>
			<td><input type="radio" name="quality" class="radio" value="5"></td>
		</tr>
		 
	</tbody>
</table>
 

	<div class="row">
		<div class="col-sm-6">
			 
			<div class="form-group">
				@if(session()->get('language') == 'hindi')
				<label for="exampleInputSummary">Tiêu đề <span class="astk">*</span></label>
				@else 
				<label for="exampleInputSummary">Title <span class="astk">*</span></label>
				@endif
	 <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
			</div><!-- /.form-group -->
		</div>

		<div class="col-md-6">
			<div class="form-group">
				@if(session()->get('language') == 'hindi') 
				<label for="exampleInputReview">Nhận xét <span class="astk">*</span></label>
				@else
				<label for="exampleInputReview">Review <span class="astk">*</span></label>
				@endif
     <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
			</div><!-- /.form-group -->
		</div>
	 </div><!-- /.row -->
	
	 <div class="action text-right">
		@if(session()->get('language') == 'hindi') 
		<button type="submit" class="btn btn-primary btn-upper">GỬI NHẬN XÉT</button>
		@else
		<button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
		@endif
	</div><!-- /.action -->

</form><!-- /.cnt-form -->
			</div><!-- /.form-container -->

   @endguest


		</div><!-- /.review-form -->

	</div><!-- /.product-add-review -->										
	
</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

<div id="tags" class="tab-pane">
<div class="product-tag">
	
	<h4 class="title">Product Tags</h4>
	<form role="form" class="form-inline form-cnt">
		<div class="form-container">

			<div class="form-group">
				<label for="exampleInputTag">Add Your Tags: </label>
				<input type="email" id="exampleInputTag" class="form-control txt">
				

			</div>

			<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
		</div><!-- /.form-container -->
	</form><!-- /.form-cnt -->

	<form role="form" class="form-inline form-cnt">
		<div class="form-group">
			<label>&nbsp;</label>
			<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
		</div>
	</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
<section class="section featured-product wow fadeInUp">
	@if(session()->get('language') == 'hindi') 
	<h3 class="section-title">Sản phẩm tương tự</h3>
	@else
	<h3 class="section-title">Releted products</h3>
	@endif
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


{{-- <a>{{$relatedProduct->id}}</a> --}}
		@foreach($relatedProduct as $product)
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			@php
			$avg = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
			@endphp
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
				@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
			{{-- <div class="rating rateit-small"></div> --}}
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
			<div class="description"></div>
			


 @if ($product->discount_price == NULL)
<div class="product-price">	
				<span class="price">
					{{ number_format($product->selling_price) }}	 đ</span> 
			</div><!-- /.product-price -->
 @else

<div class="product-price">	
				<span class="price">
					{{ number_format($product->discount_price) }}	 đ</span>
			  <span class="price-before-discount"> {{ number_format($product->selling_price) }} đ</span>								
			</div><!-- /.product-price -->
 @endif


			
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
	 	@endforeach





			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

</div>






<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>


 <script>function myFunction() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
  }
  </script>


<style>
	* {
  box-sizing: border-box;
}



.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 15px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top: 10px;
}

.middle {
  float: left;
  width: 70%;
  margin-top: 10px;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  /* Hide the right column on small screens */
  .right {
    display: none;
  }
}
</style>
@endsection