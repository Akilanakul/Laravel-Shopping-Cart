@extends('template')

@section('content')
		
		<h2>Create product </h2>

		{!! Form::open(array('url' => 'products','files'=>true)) !!}
				<fielset>
					<label for="">Productname</label>
					{{form::text('name')}}
					{!!$errors->first('name','<p class="error">:message</p>')!!}

					<label for="">Description</label>
					{{form::text('description')}}
					{!!$errors->first('description','<p class="error">:message</p>')!!}
					
					<label for="">Price</label>
					{{form::text('price')}}
					{!!$errors->first('price','<p class="error">:message</p>')!!}

					<label for="">Photo</label>
					{{Form::file('photo')}}
					{!!$errors->first('photo','<p class="error">:message</p>')!!}
					
					
					<label for="">Type</label>
					{{Form::select('type_id', \App\models\Type::lists('name','id'))}}
					{!!$errors->first('type_id','<p class="error">:message</p>')!!}

					<input type="submit" value="Create">
				</fielset>
		{!! Form::close() !!}


@stop