@extends('admin/layouts/default')

@section('titulo')
Lista de Empresas
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
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
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target=".modalcadastro">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/empresa/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop
