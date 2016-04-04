@if(Request::ajax() == false)
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Your Page Title Here :)</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('stylesheets/base.css')}}">
<!-- 	<link rel="stylesheet" href="stylesheets/skeleton.css"> -->
	<link rel="stylesheet" href="{{asset('stylesheets/layout.css')}}">
	{{-- ****asset is a function***** --}}
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->


	<div class="container">
		<header>
			<h2 class="logo">Aquatrader <i class="icon-tint"></i></h2>
			<nav>
				<ul class="group">
					
					@foreach(App\models\Type::all() as $type)
					<li ><a class="nav-type" href="{{url('types/'.$type->id)}}">{{$type->name}}</a></li>
					@endforeach

					@if(Auth::check())
					<li class="clear"><a href="{{url('users/'.Auth::user()->id)}}">Account <i class="icon-user"></i></a></li>
					<li><a href="{{url('logout')}}">Logout <i class="icon-lock"></i></a></li>

					@else
					<li class="clear"><a href="{{url('users/create')}}">Register<i class="icon-user"></i></a></li>
					<li><a href="{{url('login')}}">Login <i class="icon-lock"></i></a></li>
					@endif

					<li><a href="" >2 items <i class="icon-shopping-cart"></i></a></li>
					<li><a href="">About</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="{{url('orders')}}">Orders</a></li>

				
				</ul>
			</nav>
		</header>
		<div class="main group">
		@endif
			<!-- ***************blade specific syntax -->
			@yield('content')
	@if(Request::ajax() == false)


		</div>
		<footer></footer>

	</div><!-- container -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
  @yield('scripts.footer')
	<script src="{{asset('js/jquery.history.js')}}"></script>
	<script src="{{asset('js/jquery.jeditable.js')}}"></script>
	<script src="{{asset('js/spin.js')}}"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{asset('js/main.js')}}"></script>


<!-- End Document
================================================== -->
</body>
</html>
@endif