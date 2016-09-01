@extends('admin/layouts/default')

@section('titulo')
Lista de Empresas
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">Lista de Empresas</h4>
		<div class="pull-right">
			<span data-toggle="tooltip" title="Adicionar Empresa" data-container="body">
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
			<th>Razão Social</th>
			<th>CNPJ</th>
			<th>Qntd Funcionarios</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($empresas) && count($empresas) > 0 )
		@foreach($empresas as $empresa)
		<tr>
			<td>{{ $empresa->id }}</td>
			<td>{{ $empresa->nome }}</td>
			<td>{{ $empresa->razao }}</td>
			<td>{{ $empresa->cnpj }}</td>
			<td>{{ $empresa->funcionarios->count()}}</td>
			<td>
				<form method="POST" action="{{ route('empresas.destroy',$empresa->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('empresas.store') }}">
					<span data-toggle="tooltip" title="Excluir Empresa" data-container="body">
					<button type="submit" class="btn btn-mini pull-left"><i class="fa fa-trash"></i></button>
					</span>
				</form>
				<span data-toggle="tooltip" title="Editar Empresa" data-container="body">
				<a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-mini">
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

@include('admin/empresa/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop

