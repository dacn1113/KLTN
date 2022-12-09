

  <div class="logo-slider-inner">	
    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">


      @foreach($brand as $item)
      <div class="item m-t-15">
        <a href="#" class="image">
          <img width="130" height="80" data-echo="{{asset($item->brand_image)}}" src="{{asset($item->brand_image)}}" alt="">
        </a>	
      </div><!--/.item-->
@endforeach
      {{-- <div class="item m-t-10">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand3.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand6.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item-->

      <div class="item">
        <a href="#" class="image">
          <img data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
        </a>	
      </div><!--/.item--> --}}
      </div><!-- /.owl-carousel #logo-slider -->
  </div><!-- /.logo-slider-inner -->

