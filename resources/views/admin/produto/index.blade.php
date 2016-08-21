@extends('admin/layouts/default')

@section('titulo')
Lista de EPI
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
			<th>Tamanho</th>
			<th>CA</th>
			<th>Categoria</th>
			<th>Qntd Disponivel</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($produtos) && count($produtos) > 0 )
		@foreach($produtos as $produto)
		<tr>
			<td>{{ $produto->id }}</td>
			<td>{{ $produto->nome }}</td>
			<td>{{ $produto->medida }}</td>
			<td>{{ $produto->ca }}</td>
			<td>{{ $produto->categoria->nome or "Nenhuma categoria alocada" }}</td>
			<td>{{ $produto->qntd }}</td>
			<td>
				<form method="POST" action="{{ route('epis.destroy',$produto->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('epis.store') }}">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				&nbsp
				<a href="{{ route('epis.edit', $produto->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
				<a href="{{ route('epis.storeEntrada', $produto->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">Entrada</i>
				</a>
				<a href="{{ route('epis.storeSaida', $produto->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">Saida</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="8" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target=".modalcadastro">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/produto/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

