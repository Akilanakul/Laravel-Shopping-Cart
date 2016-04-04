@extends('template')

@section('content')
			
			<h2>Your Details</h2>

			<h4>First name:</h4>
			<div data-editable="firstname" data-url="{!!url('users/'.$user->id)!!}">{{$user->firstname}}</div>

			<h4>Last name:</h4>
			<div data-editable="lastname"
				data-url="{!!url('users/'.$user->id)!!}">{{$user->lastname}}</p>

			<h4>Email:</h4>
			<p data-editable="email" data-url="{!!url('users/'.$user->id)!!}">{{$user->email}}</p>
			<textarea name="" id="" cols="30" rows="10"></textarea>
			<form action="foobar" method="post" class="dropzone">
				
			</form>
			<div id="token">{{csrf_token()}}</div>
			
			
@stop
@section('scripts.footer')
<script scr="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@stop