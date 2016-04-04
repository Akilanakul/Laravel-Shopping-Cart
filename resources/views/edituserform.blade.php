@extends('template')

@section('content')
		
		<h2>Update user details</h2>
	
	
			{!! Form::model($user,array('url' => 'users/'.$user->id,'method'=>'put')) !!}
				<fielset>
					<label for="">Username</label>
					{{form::text('username')}} 
					{!!$errors->first('username','<p class="error">:message</p>')!!}

					<label for="">Email</label>
					{{form::text('email')}}
					{!!$errors->first('email','<p class="error">:message</p>')!!}
					
					
					<label for="">Firstname</label>
					{{form::text('firstname')}}
					{!!$errors->first('firstname','<p class="error">:message</p>')!!}

					
					<label for="">Lastname</label>
					{{form::text('lastname')}}
					{!!$errors->first('lastname','<p class="error">:message</p>')!!}
					
					<input type="submit" value="update">

				</fielset>
		{!! Form::close() !!}


@stop