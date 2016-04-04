@extends('template')

@section('content')
		
		<h2>Update product details</h2>
	
	
			{!! Form::model($product,array('url' => 'products/'.$product->id,'method'=>'put')) !!}
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
					{{form::text('photo')}}
					{!!$errors->first('photo','<p class="error">:message</p>')!!}
					
					<label for="">Type</label>
					{{form::text('type_id')}}
					{!!$errors->first('type_id','<p class="error">:message</p>')!!}

					<input type="submit" value="update">

				</fielset>
		{!! Form::close() !!}


@stop