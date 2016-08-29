@extends('admin/layouts/default')

@section('titulo')
Lista de Categorias
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Lista de Categorias
        </h4>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modalcadastro">Cadastrar</button>
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
		@else
			<tr>
				<td colspan="4" class="text-center">Não existe nenhum registro</td>
			</tr>
		@endif
	</tbody>
</table>
</div>
</div>

@include('admin/categoria/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

