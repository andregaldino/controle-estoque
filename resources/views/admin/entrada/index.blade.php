@extends('admin/layouts/default')

@section('titulo')
Histórico de Entradas
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop



@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Histórico de Entradas
        </h4>
      </div>
      <br />
      <div class="panel-body">
      <table class="table table-striped " id="table">
	<thead>
		<tr class="filters">
			<th>ID</th>
			<th>EPI</th>
			<th>Data de entrada</th>
			<th>Qntd</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($entradas) && count($entradas) > 0 )
		@foreach($entradas as $entrada)
		<tr>
			<td>{{ $entrada->id }}</td>
			<td>{{ $entrada->produto->nome }}</td>
			<td>{{ $entrada->data }}</td>
			<td>{{ $entrada->qntd }}</td>
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
