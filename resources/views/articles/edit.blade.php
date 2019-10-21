@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-4">
{!! Form::open(['route'=>['articles.update',$article]
				,'method'=>'PUT'
					    ]) !!}


		{!! Field::text('name',$article->name,
					['label'=>'Nombre',
					 'placeholder'=>'Ingrese Nombre']) !!}

		{!! Field::textarea('description',
					$article->description,
					['label'=>'Descripcion',
					'placeholder'=>'Ingrese Descripcion',
					'rows'=>4]) !!}


		{!! Field::select('user_id',
						$users,
						$article->user_id,
						['label'=>'Usuarios',
						'empty'=>'-- SELECCIONAR --']
						)!!}


		{!! Form::submit('GRABAR',['class'=>'btn btn-primary']) !!}


		{!! Form::close() !!}
	</div>
</div>

@endsection