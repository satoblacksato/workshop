@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-4">

		{!! Field::text('name',$article->name,
					['label'=>'Nombre','readonly']) !!}

		{!! Field::textarea('description',
					$article->description,
					['label'=>'Descripcion'
					,'readonly',
					'rows'=>4]) !!}


		{!! Field::text('user_id',
						$article->user->name,
						['label'=>'Usuarios','readonly']
						)!!}


	</div>
</div>

@endsection