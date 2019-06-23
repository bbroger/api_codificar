@extends('layouts.app')

@section('content')

	<div class="text-center">
		<h2>Redes Sociais utilizadas pelos Deputados</h2>
	</div>

	<div class="container-fluid">
		<div class="text-center">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">REDE SOCIAL</th>
						<th scope="col">USUÁRIOS</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($redes_sociais as $rs)
						<tr>
							<td>{{ $rs->redeSocial }}</td>
							<td>{{ $rs->qtd_deputados }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="text-center">
		<a href="{{ route('redes_sociais.mais_utilizadas') }}" target="_blank"><button class="btn btn-primary">Clique aqui para acessar o retorno da API</button></a>
	</div>	
@stop