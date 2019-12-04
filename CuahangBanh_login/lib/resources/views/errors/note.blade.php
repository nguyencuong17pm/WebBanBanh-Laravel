@if(Session::has('error'))
	<p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

@foreach($errors->all() as $error)
	<p class="alert alert-danger">{{$error}}</p>
@endforeach


@if(Session::has('error_thanhcong'))
	<p class="alert alert-success">{{Session::get('error_thanhcong')}}</p>
@endif

@foreach($errors->all() as $error_thanhcong)
	<p class="alert alert-success">{{$error_thanhcong}}</p>
@endforeach