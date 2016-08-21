@extends('admin/layouts/default')

@section('titulo')
Lista de Treinamentos
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
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($treinamentos) && count($treinamentos) > 0 )
		@foreach($treinamentos as $treinamento)
		<tr>
			<td>{{ $treinamento->id }}</td>
			<td>{{ $treinamento->nome }}</td>
			<td>
				{{ $treinamento->descricao }}
			</td>
			<td>
				<form method="POST" action="{{ route('treinamentos.destroy',$treinamento->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('treinamentos.store') }}">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('treinamentos.edit', $treinamento->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
				<a href="{{ route('treinamentos.addFuncionarios', $treinamento->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">add presença</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target=".modalcadastro">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/treinamento/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

