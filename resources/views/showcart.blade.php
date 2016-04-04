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
	<link rel="stylesheet" href="stylesheets/base.css">
<!-- 	<link rel="stylesheet" href="stylesheets/skeleton.css"> -->
	<link rel="stylesheet" href="stylesheets/layout.css">

	

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
					<li><a href="{{url('types/'.$type->id)}}">{{$type->name}}</a></li>
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
					<li><a href="{{url('orders/$order->id')}}">Orders</a></li>

				
				</ul>
			</nav>
		</header>
		<div class="main group">
			<h2>Your cart</h2>
		
			<div class="cart">
				<div>
					<span>
						<h4>Product</h4>
					</span>
					<span>
						<h4>Price</h4>
					</span>
					<span>
						<h4>Quantity</h4>
					</span>
					<span>
						<h4>Subtotal</h4>
					</span>
				</div>
				
				@foreach(Cart::contents() as $item)
				<div>
					<span>{{$item->name}}</span>
					<span>{{$item->price}}</span>
					<span>{{$item->quantity}}</span>
					<span>{{$item->price*$item->quantity}}</span>
					<span>
					
					{!! Form::open(array('url' => 'cart-items/'.$item->identifier,'method'=>'delete')) !!}
					{{-- this will not make post request it will make delete request --}}
							<input type="submit" value="Delete">
					{!! Form::close() !!}
					
						
					</span>
				</div>

				@endforeach		
				<div>
					<span></span><span></span><span><h4>Total</h4></span><span><h4>{{Cart::total()}}</h4></span>
				</div>
			</div>

			{!! Form::open(array('url' => 'orders')) !!}
					{{-- this will not make post request it will make delete request --}}
							<input type="submit" value="Checkout">
			{!! Form::close() !!}
			
		</div>
		<footer></footer>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>