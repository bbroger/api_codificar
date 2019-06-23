@extends('layouts.app')

@section('content')
	
	<div class="text-center">
		<h2>Deputados em exercício</h2>
	</div>

	<div class="container-fluid">
		<div class="text-center">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">NOME</th>
						<th scope="col">PARTIDO</th>
						<th scope="col">TAG</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($deputados as $key => $deputado)
						<tr>
							<td>{{ $deputado->id }}</td>
							<td>{{ $deputado->nome }}</td>
							<td>{{ $deputado->partido }}</td>
							<td>{{ $deputado->tag_localizacao }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop