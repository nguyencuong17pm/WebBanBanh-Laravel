@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
	
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d62796.969153158876!2d105.42417129956509!3d10.357026307285674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zY-G7rWEgaMOgbmcgYsOhbmggZ-G6p24gTG9uZyBYdXnDqm4sIEFuIEdpYW5n!5e0!3m2!1svi!2s!4v1570289351369!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
	</div>
	
@endsection