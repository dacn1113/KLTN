@php

    $id = Auth::user()->id;
    $user = App\Models\User::find($id);

@endphp


<div class="col-md-2"><br> 
				<img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
				
				<ul class="list-group list-group-flush">
<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Trang chủ</a>

<a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Cập nhật thông tin</a>

<a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Đổi mật khẩu </a>

<a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Đơn hàng của tôi</a>

<a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Đơn hàng trả lại</a>

<a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Đơn hàng hủy</a>

<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Đăng xuất </a>
					
				</ul>
				
			</div> <!-- // end col md 2 -->