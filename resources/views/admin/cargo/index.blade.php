@extends('admin/layouts/default')

@section('titulo')
Lista de Cargos
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Lista de Cargos
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
			<th>Descrição</th>
			<th>Qntd Funcionarios</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($cargos) && count($cargos) > 0 )
		@foreach($cargos as $cargo)
		<tr>
			<td>{{ $cargo->id }}</td>
			<td>{{ $cargo->nome }}</td>
			<td>{{ $cargo->descricao }}</td>
			<td>{{ $cargo->funcionarios->count() }}</td>
			<td>
				<form method="POST" action="{{ route('cargos.destroy',$cargo->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('cargos.store') }}">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
			</td>
		</tr>
		@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">Não existe nenhum registro</td>
			</tr>
		@endif
	</tbody>
</table>
</div>
</div>

@include('admin/cargo/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

