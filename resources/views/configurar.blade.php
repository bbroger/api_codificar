@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="mb-4 center-block text-center">
			<a href="{{ route('loader') }}"><h4 class="btn btn-success">Importar informações do WebService</h4></a>
		</div>
	</div>
@stop