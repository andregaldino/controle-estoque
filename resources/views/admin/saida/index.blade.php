@extends('admin/layouts/default')

@section('titulo')
Histórico de Saidas
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Histórico de Saida
        </h4>
      </div>
      <br />
      <div class="panel-body">
<table class="table table-striped " id="table">
	<thead>
		<tr class="filters">
			<th>ID</th>
			<th>EPI</th>
			<th>Data de saida</th>
			<th>Qntd</th>
			<th>Funcionario</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($saidas) && count($saidas) > 0 )
		@foreach($saidas as $saida)
		<tr>
			<td>{{ $saida->id }}</td>
			<td>{{ $saida->produto->nome }}</td>
			<td>{{ $saida->data }}</td>
			<td>{{ $saida->qntd }}</td>
			<td>{{ $saida->funcionario->nome }}</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
</div>
</div>


@stop
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop


