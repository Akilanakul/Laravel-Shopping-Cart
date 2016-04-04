@extends('template')

@section('content')
		
		<h2>Login form</h2>
		
		{!! Form::open(array('url' => 'login')) !!}
				<fielset>
					{{form::label('username','Username')}}
					{{form::text('username')}}
					{!!$errors->first('username','<p class="error">:message</p>')!!}

					{{form::label('password','Password')}}
					{{form::password('password')}}

					<input type="submit" value="Login">
				</fielset>
		{!! Form::close() !!}
	
	{{Session::get("message")}}

@endsection