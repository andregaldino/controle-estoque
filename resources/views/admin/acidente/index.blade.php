@extends('admin/layouts/default')

@section('titulo')
Lista de Acidentes
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">Lista de Acidentes</h4>
		<div class="pull-right">
			<span data-toggle="tooltip" title="Adicionar Exame" data-container="body">
				<a href="#" data-toggle="modal" data-target=".modalcadastro"><i class="fa fa-plus-circle branco" aria-hidden="true"></i></a>
			</span>
		</div>
      </div>
      <br />
      <div class="panel-body">
<table class="table table-striped " id="table">
	<thead>
		<tr class="filters">
			<th>ID</th>
			<th>Acidente</th>
			<th>Data</th>
			<th>Envolvidos</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($acidentes) && count($acidentes) > 0 )
		@foreach($acidentes as $acidente)
		<tr>
			<td>{{ $acidente->id }}</td>
			<td>{{ $acidente->tipo->nome }}</td>
			<td>{{ $acidente->created_at }}</td>
			<td>{{ $acidente->funcionarios->count() }}</td>
			<td>
				<form method="POST" action="{{ route('acidentes.destroy',$acidente->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('acidentes.store') }}">
					<span data-toggle="tooltip" title="Excluir Exame" data-container="body">
					<button type="submit" class="btn btn-mini pull-left"><i class="fa fa-trash"></i></button>
					</span>	
				</form>
				<span data-toggle="tooltip" title="Editar Exame" data-container="body">
				<a href="{{ route('acidentes.edit', $acidente->id) }}" class="btn btn-mini">
					<i class="fa fa-pencil-square-o"></i>
				</a>
				</span>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
</div>
</div>

@include('admin/acidente/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop

