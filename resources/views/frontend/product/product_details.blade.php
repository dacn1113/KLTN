@extends('frontend.main_master')
@section('content')

@section('title')
{{ $product->product_name_en }} Thông tin chi tiết sản phẩm
@endsection



<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			{{-- <ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul> --}}
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">

</div>		
  
    
    	<!-- ====== === HOT DEALS ==== ==== -->
   @include('frontend.common.hot_deals')
<!-- ===== ===== HOT DEALS: END ====== ====== -->					


 

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
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">


							<h1 class="name" id="pname">
@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
							 </h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Nhận xét)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Tình trạng :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">Trong kho</span>
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
       <span class="price">${{ $product->selling_price }}</span>
       @else
       <span class="price">${{ $product->discount_price }}</span>
			<span class="price-strike">${{ $product->selling_price }}</span>
       @endif

			
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

	<label class="info-title control-label">Chọn màu <span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
		<option selected="" disabled="">--Chọn--</option>
		@foreach($product_color_en as $color)
		<option value="{{ $color }}">{{ ucwords($color) }}</option>
		 @endforeach
	</select> 

</div> <!-- // end form group -->
		 
	</div> <!-- // end col 6 -->

		<div class="col-sm-6">

<div class="form-group">
	@if($product->product_size_en == null)

	@else	

	<label class="info-title control-label">Chọn kích cở <span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
		<option selected="" disabled="">--Chọn--</option>
		@foreach($product_size_en as $size)
		<option value="{{ $size }}">{{ ucwords($size) }}</option>
		 @endforeach
	</select> 

	@endif
	
</div> <!-- // end form group -->

			 
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
		                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
		                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
		                </div>
		                <input type="text" id="qty" value="1" min="1">
	              </div>
	            </div>
			</div>

			<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

			<div class="col-sm-7">
				<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ</button>
			</div>

			
		</div><!-- /.row -->
	</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								<li><a data-toggle="tab" href="#review">Nhận xét</a></li>
					
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
											<h4 class="title">Phản hồi khách hàng</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">Chúng tôi yêu sản phẩm này</span><span class="date"><i class="fa fa-calendar"></i><span>1 ngày trước</span></span></div>
													<div class="text">"Sản phẩm này rất tốt tôi hài lòng về nó."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Viết đánh giá của riêng bạn</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 Sao</th>
																<th>2 Sao</th>
																<th>3 Sao</th>
																<th>4 Sao</th>
																<th>5 Sao</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Đánh giá</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Sản phẩm liên quan</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">



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
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
				@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>


 @if ($product->discount_price == NULL)
<div class="product-price">	
				<span class="price">
					${{ $product->selling_price }}	 </span> 
			</div><!-- /.product-price -->
 @else

<div class="product-price">	
				<span class="price">
					${{ $product->discount_price }}	 </span>
			  <span class="price-before-discount">$ {{ $product->selling_price }}</span>								
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















@endsection