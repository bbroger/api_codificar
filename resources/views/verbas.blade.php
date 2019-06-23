@extends('layouts.app')

@section('content')

	<div class="text-center">		
		<h2>Verba indenizatória - 2017</h2>
		<p>
			Selecione o mês e veja os 5 Deputados que mais utilizaram verba indenizatória:
		</p>
	</div>	

	<div class="container-fluid">
		<div class="text-center">
			@for ($i = 1; $i < 13; $i++)
				@if ($i == 1)
					<a href="{{ route('verbas.janeiro') }}" target="_blank"><button class="btn btn btn-primary">Janeiro</button></a>						
				@elseif ($i == 2)
					<a href="{{ route('verbas.fevereiro') }}" target="_blank"><button class="btn btn btn-primary">Fevereiro</button></a>							
				@elseif ($i == 3)
					<a href="{{ route('verbas.marco') }}" target="_blank"><button class="btn btn btn-primary">Março</button></a>
				@elseif ($i == 4)
					<a href="{{ route('verbas.abril') }}" target="_blank"><button class="btn btn btn-primary">Abril</button></a>
				@elseif ($i == 5)
					<a href="{{ route('verbas.maio') }}" target="_blank"><button class="btn btn btn-primary">Maio</button></a>							
				@elseif ($i == 6)
					<a href="{{ route('verbas.junho') }}" target="_blank"><button class="btn btn btn-primary">Junho</button></a>					
				@elseif ($i == 7)
					<a href="{{ route('verbas.julho') }}" target="_blank"><button class="btn btn btn-primary">Julho </button></a>							
				@elseif ($i == 8)
					<a href="{{ route('verbas.agosto') }}" target="_blank"><button class="btn btn btn-primary">Agosto</button></a>
				@elseif ($i == 9)
					<a href="{{ route('verbas.setembro') }}" target="_blank"><button class="btn btn btn-primary">Setembro</button></a>
				@elseif ($i == 10)
					<a href="{{ route('verbas.outubro') }}" target="_blank"><button class="btn btn btn-primary">Outubro</button></a>					
				@elseif ($i == 11)
					<a href="{{ route('verbas.novembro') }}" target="_blank"><button class="btn btn btn-primary">Novembro</button></a>
				@elseif ($i == 12)
					<a href="{{ route('verbas.dezembro') }}" target="_blank"><button class="btn btn btn-primary">Dezembro</button></a>
				@endif
			@endfor
		</div>		
	</div>	
@stop