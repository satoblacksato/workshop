@extends('layouts.app')

@section('content')
		<div class="container">
			<div class="col-md-12">

				 <a class="btn btn-info" href="{{route('articles.create')}}">CREAR</a>
				
					<table class="table">
						<tr>
							<td>NOMBRE</td>
							<td>DESCRIPCION</td>
							<td>USUARIO</td>
							<td>ACCIONES</td>
						</tr>
						@forelse($articles as $article)

							<tr>
								<td>{{ $article->name }}</td>
								<td>{{ $article->description }}</td>
								<td>{{ optional($article->user)->name }}</td>
								<td>
	{!!Form::open([
				'route'=>['articles.destroy',$article],
				'method'=>'DELETE',
				'onsubmit'=>'return confirm("Quieres eliminar?")'
				])!!}
			<button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>

<a class="btn btn-primary btn-sm" href="{{ route('articles.edit',$article)}}">EDITAR</a>

<a class="btn btn-primary btn-sm" href="{{ route('articles.show',$article)}}">VER</a>


	{!!Form::close()!!}
								</td>
							</tr>

						@empty
								<tr><td colspan="4"></td></tr>

						@endforelse

					</table>
					{!! $articles->render() !!}

			</div>
		</div>
@endsection