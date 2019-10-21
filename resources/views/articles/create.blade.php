@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-4">
		{!! Form::open(['route'=>'articles.store']) !!}


		{!! Field::text('name',
					['label'=>'Nombre',
					 'placeholder'=>'Ingrese Nombre']) !!}

		{!! Field::textarea('description',
					['label'=>'Descripcion',
					'placeholder'=>'Ingrese Descripcion',
					'rows'=>4]) !!}


		{!! Field::select('user_id',$users,null,[
						'label'=>'Usuarios',
						'empty'=>'-- SELECCIONAR --'
					]) !!}


		{!! Form::submit('GRABAR',['class'=>'btn btn-primary']) !!}


		{!! Form::close() !!}
	</div>
</div>

@endsection