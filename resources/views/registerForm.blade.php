@extends('template')

@section('content')
		
		<h2>Register form</h2>
		{!! Form::open(array('url' => 'users')) !!}
				<fielset>
					<label for="">Username</label>
					{{form::text('username')}}
					{!!$errors->first('username','<p class="error">:message</p>')!!}

					<label for="">Email</label>
					{{form::text('email')}}
					{!!$errors->first('email','<p class="error">:message</p>')!!}
					
					<label for="">Password</label>
					{{form::password('password')}}
					{!!$errors->first('password','<p class="error">:message</p>')!!}

					<label for="">Confirmed Password</label>
					{{form::password('password_confirmation')}}
					{!!$errors->first('password_confirmation','<p class="error">:message</p>')!!}
					
					<label for="">Firstname</label>
					{{form::text('firstname')}}
					{!!$errors->first('firstname','<p class="error">:message</p>')!!}

					<label for="">Lastname</label>
					{{form::text('lastname')}}
					{!!$errors->first('lastname','<p class="error">:message</p>')!!}

					<input type="reset" value="Reset">
					<input type="submit" value="register">
				</fielset>
		{!! Form::close() !!}


@stop