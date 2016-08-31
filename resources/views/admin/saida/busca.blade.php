@extends('admin/layouts/default')

@section('titulo')
Relatorio de Entrada e Saida por periodo
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop


@section('conteudo')
<div id="msg"></div>
<div id="accordion" class="panel-group">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="">Busca</a>
			</h4>
		</div>
		<div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
			<div class="panel-body">

				<form action="{{ route('saidas.search') }}" method="POST" class="form-inline">
					<fieldset>
						<div class="form-group">
							<input type="text" name="datainicio" placeholder="dd/mm/YYYY" class="form-control data-picker">
						</div>
						<div class="form-group">
							<input type="text" name="datafinal" placeholder="dd/mm/YYYY" class="form-control data-picker">
						</div>
						<div class="form-group">
							<select class="form-control" name="tipo">
								<option value="0">Detalhado</option>
								<option value="1">Resumido</option>
							</select>
						</div>
						<div class="form-group">
							<button name="btnPesq" class="btn btn-primary" type="submit">
								<i class="glyphicon glyphicon-search"> Pesquisar </i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
@if(count($saidas) > 0 && count($produtos) > 0)
<div class="panel panel-primary ">
	<div class="panel-heading">
		<h4 class="panel-title"> 
			Controle de Estoque por Periodo :
			@if(isset($periodo))
				{{ $periodo['inicio']}} até {{ $periodo['final'] }}
			@endif
		</h4>
	</div>
	<br />
	<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-striped " id="table">
			
			<thead>
				<tr class="filters">
					<th>Funcionario</th>
					@foreach($produtos as $produto)
						<th>{{ $produto->nome }} : {{ $produto->medida }}</th>	
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($saidas as $saida)
				<tr>
					<td>{{$saida['funcionario']}}</td>
					@foreach($produtos as $produto)
						@if(count($saida['saidas'])>0)
							@foreach($saida['saidas'] as $valor)
								@if($valor->id == $produto->id)
									<td>{{ $valor->qntd_periodo }}</td>
								@else
									<td>0</td>
								@endif
							@endforeach
						@else
							<td>0</td>
						@endif
					@endforeach
				</tr>
			@endforeach	
			</tbody>
		</table>
		</div>
	</div>
</div>
@endif


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
@stop

