@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
 
@endphp


  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ url('admin/dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Bảng điều khiển</span>
          </a>
        </li>  
		
        @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);

        @endphp
<li class="header nav-small-cap"> </li>
       @if($brand == true) 
        <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
          <a href="#">
            <i data-feather="layers"></i>
            <span>Thương hiệu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>Danh sách thương hiệu</a></li>
            
          </ul>
        </li> 
        @else
        @endif
		  
       @if($category == true)
        <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
          <a href="#">
            <i data-feather="list"></i> <span>Danh mục </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>Danh mục chính</a></li>
         <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i> Danh mục phụ</a></li>
<li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Danh mục con</a></li>


                      </ul>
        </li>

        @else
        @endif

     @if($product == true)
		
        <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
          <a href="#">
            <i data-feather="coffee"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i> Thêm sản phẩm</a></li>

             <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Quản lý sản phẩm </a></li>
             
          </ul>
        </li> 		  

        @else
        @endif

     @if($slider == true)


         <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
          <a href="#">
            <i data-feather="sliders"></i>
            <span>Trình chiếu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Quản lý sản phẩm trình chiếu</a></li>

             
             
          </ul>
        </li>   

        @else
        @endif

     @if($coupons == true)

         <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
          <a href="#">
            <i data-feather="gift"></i>
            <span>Mã khuyến mãi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Quản lý mã giảm giá</a></li>

             
             
          </ul>
        </li>      
        @else
        @endif

     @if($shipping == true)


         <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
          <a href="#">
            <i data-feather="truck"></i>
            <span>Khu vực vận chuyển </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Thành phố</a></li>

         <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Quận, huyện</a></li>

         <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Khu phố, thị trấn</a></li>

             
             
          </ul>
        </li>        
        @else
        @endif

     @if($blog == true)


        <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
          <a href="#">
            <i data-feather="bell"></i>
            <span>Quản lý Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog danh mục</a></li>

        <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>Danh sách bài đăng </a></li>

         <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Thêm Blog</a></li>
  
          </ul>
        </li>       

        @else
        @endif

     @if($setting == true)

<li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
          <a href="#">
            <i data-feather="settings"></i>
            <span>Quản lý cài đặt </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Thiết lập trang web</a></li>

        <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Thiết lập Seo</a></li>
 
  
          </ul>
        </li>

        @else
        @endif

     @if($returnorder == true)

        <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
          <a href="#">
            <i data-feather="package"></i>
            <span>Trả lại đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Yêu cầu trả</a></li>

        <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>Toàn bộ yêu cầu</a></li>
 
  
          </ul>
        </li>    

        @else
        @endif

     @if($review == true)


          <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Quản lý bình luận</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Bình luận chờ duyệt</a></li>

        <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Toàn bộ bình luận</a></li>
 
  
          </ul>
        </li>    

        @else
        @endif

   
		 
        <li class="header nav-small-cap"> </li>

        
		    @if($orders == true)
        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Đơn hàng </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Đơn hàng chờ</a></li>

        <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Đơn nhận</a></li>

        <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Xử lý đơn</a></li>

      <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Chờ tiếp nhận vận chuyển </a></li>

      <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Vận chuyển đơn</a></li>

     <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Đơn đã vận chuyển</a></li>
  
  <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Hủy đơn</a></li>

             
             
          </ul>
        </li>         
        @else
        @endif

     @if($stock == true)


 <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
          <a href="#">
            <i data-feather="box"></i>
            <span>Quản lý kho </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Sản phẩm trong kho</a></li>

        
          </ul>
        </li>    

		    @else
        @endif

     @if($reports == true)

		 <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
          <a href="#">
            <i data-feather="clipboard"></i>
            <span>Quản lý báo cáo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>Toàn bộ báo cáo</a></li>

        
          </ul>
        </li>         
 

        @else
        @endif

     @if($alluser == true)

     <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i data-feather="user"></i>
            <span>Người dùng </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>Toàn bộ người dùng </a></li>

        
          </ul>
        </li>    
        @else
        @endif

     @if($adminuserrole == true)


        <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
          <a href="#">
            <i data-feather="users"></i>
            <span>Phân quyền quản trị </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>Toàn bộ tài khoản </a></li>

        
          </ul>
        </li>    

        @else
        @endif

        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="{{ url('/') }}" class="link" data-toggle="tooltip" title="" data-original-title="Shop" aria-describedby="tooltip92529"><i class="ti-home"></i></a>
		<!-- item-->
		<a href="https://mailtrap.io/inboxes" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Stripe"><i class="ti-credit-card"></i></a>
	</div>
  </aside>