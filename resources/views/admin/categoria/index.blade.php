@extends('admin/layouts/default')

@section('titulo')
Lista de Categorias
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
      	<h4 class="panel-title">Lista de Categorias</h4>
		<div class="pull-right">
			<span data-toggle="tooltip" title="Adicionar Categoria" data-container="body">
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
			<th>No. de EPIs</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($categorias) && count($categorias) > 0 )
		@foreach($categorias as $categoria)
		<tr>
			<td>{{ $categoria->id }}</td>
			<td>{{ $categoria->nome }}</td>
			<td>{{ $categoria->produtos->count() }}</td>
			<td>
				<form method="POST" action="{{ route('categorias.destroy',$categoria->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('categorias.store') }}">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
</div>
</div>

@include('admin/categoria/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop

