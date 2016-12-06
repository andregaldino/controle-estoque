@extends('admin/layouts/default')

@section('titulo')
Lista de Tipos de Acidentes
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
       <h4 class="panel-title">Lista de Tipos de Acidentes</h4>
		<div class="pull-right">
			<span data-toggle="tooltip" title="Adicionar Cargo" data-container="body">
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
			<th>Nome</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($tipos) && count($tipos) > 0 )
		@foreach($tipos as $tipo)
		<tr>
			<td>{{ $tipo->id }}</td>
			<td>{{ $tipo->nome }}</td>
			<td>{{ $tipo->descricao }}</td>
			<td>
				<form method="POST" action="{{ route('tiposacidentes.destroy',$tipo->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('tiposacidentes.store') }}">
					<span data-toggle="tooltip" title="Excluir Cargo" data-container="body">
					<button type="submit" class="btn btn-mini pull-left"><i class="fa fa-trash"></i></button>
					</span>
				</form>
				<span data-toggle="tooltip" title="Editar Cargo" data-container="body">
					<a href="{{ route('tiposacidentes.edit', $tipo->id) }}" class="btn btn-mini">
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

@include('admin/tipoacidente/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop

