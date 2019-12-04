@extends('master')
@section('content')
<div class="inner-header">

<div class="container">
<div class="pull-left">
	<h6 class="inner-title">Đặt hàng</h6>
</div>

<div class="pull-right">
	<div class="beta-breadcrumb">
		<a href="{{route('trang-chu')}}">Trang chủ </a><span> Đặt hàng</span>
	</div>
	
</div>
<div class="clearfix"></div>
</div>
</div>
	<div class="container">
		<div id="content">
		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}
				@endif</div>
			<div class="row">
				<div class="col-sm-6">
					
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="name">Họ tên</label>
						<input type="text" name="name" placeholder="" required>					
					</div>
					<div class="form-block">
						<label>Giới tính</label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
					</div>
					
					<div class="form-block">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" required placeholder="expample@gmail.com" >
					</div>
					<div class="form-block">
						<label for="adress">Địa chỉ</label>
						<input type="text" id="address" name="address" placeholder="" required=>
						
					</div>
					<div class="form-block">
						<label for="phone">Điện thoại</label>
						<input type="text" id="phone" name="phone" placeholder="" required=>
						</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="notes"></textarea>

					</div>


				</div>

				<div class="col-sm-6">
					<div class="your-order">
					<div class="your-order-head"><h5>Đơn hàng của tôi</h5></div>
					<div class="your-order-body" style="padding: 0px 10px">
						<div class="your-order-item">
							<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<div class="media">
									<img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
									<div class="media-body">
										<p class="font-large">{{$cart['item']['name']}}</p>
										<span class="color-gray your-order-head-info">Đơn giá: {{number_format($cart['price'])}} VNĐ</span>
										<span class="color-gray your-order-head-info">Số lượng: {{$cart['qty']}}</span>
									</div>
								</div>
								@endforeach
								@endif

							</div>
							<div class="clearfix"></div>

						</div >
						<div class="your-order-item">
							<div class="pull-left"><p class="your-order-f18">Tổng thành tiền
								
							</p>
								
							</div>
							<div class="pull-right">
								<h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif VNĐ</h5>
							</div>
							<div class="clearfix"></div>
						</div>
						
					</div>
					<div class="your-oder-head"><h5>HÌNH THỨC THANH TOÁN</h5></div>

					<div class="you-oder-body">
						<ul class="payment_methods methods">
							<li class="payment_method_bacs">
								<input id="payment_method_bacs" type="radio" class="input-radio"  name="payment_method" value="COD" checked="checked" data-order_button_text="" >
								<label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
								<div class="payment_box payment_method_bacs" style="display: block;"> 
									Cửa hàng sẽ gửi bánh đến địa chỉ của bạn, Vui lòng thanh toán tiền cho nhân viên giao hàng...Cảm ơn....
								</div>
							</li>
							<li class="payment_method_cheque">
								<input id="payment_method_cheque" class="input-radio" type="radio" name="payment_method" value="ATM"  data-order_button_text="">
								<label for="payment_method_cheque">
									Chuyển khoản
								</label>
								<div class="payment_box payment_method_cheque" style="display: none;">
									Chuyển tiền đến:
									<br>- STK: 123 456 789
									<br>- Chủ TK: Lê Hoàng Nam
									<br>- Ngân hàng ACB, Chi nhánh An Giang
									
								</div>
							</li>

						</ul>
						
					</div>

					<div class="text-center"> <button type="submit" >Đặt hàng

					</button>
						
					</div>
				</div>
				</div>
			</div>
		
		</form>	

		</div>

	</div>


@endsection