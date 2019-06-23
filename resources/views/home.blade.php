@extends('layouts.app')

@section('navbar')
@stop

@section('content')
<div class="text-center" id="loader">
	<div class="row">
		<div class="container align-center">
			<img src="{{ asset('img/reload.gif') }}" width="450px" alt="reload" draggable="false">
		</div>
	</div>		
	<h1 class="display-4">Por favor, aguarde!</h1>
</div>

<script>
	setTimeout(function () {
	  	window.location.href= "{{ route('config') }}";
	}, 1000);
</script>
@stop