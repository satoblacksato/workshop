@extends('layouts.app')

@section('content')
		<div class="container">
			<div class="col-md-12">

				@can('article-create')
				 <a class="btn btn-info" href="{{route('articles.create')}}">CREAR</a>
				@endcan
				
					<table class="table">
						<tr>
							<td>NOMBRE</td>
							<td>DESCRIPCION</td>
							<td>USUARIO</td>

							@if(auth()->user()->can('article-delete')||
							    auth()->user()->can('article-show') ||
							    auth()->user()->can('article-update'))

									<td>ACCIONES</td>
							@endif
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

			@can('article-delete')	
			<button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
			@endcan
@can('article-update')
<a class="btn btn-primary btn-sm" href="{{ route('articles.edit',$article)}}">EDITAR</a>
@endcan

@can('article-show')
<a class="btn btn-primary btn-sm" href="{{ route('articles.show',$article)}}">VER</a>
@endcan

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