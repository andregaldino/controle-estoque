@extends('admin/layouts/default')

@section('titulo')
Lista de Funcionarios
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">Lista de Funcionarios</h4>
		<div class="pull-right">
			<span data-toggle="tooltip" title="Adicionar Funcionario" data-container="body">
				<a href="#" data-toggle="modal" data-target=".modalcadastro"><i class="fa fa-plus-circle branco" aria-hidden="true"></i></a>
			</span>
		</div>
      </div>
      <br />
      <div class="panel-body">
      	<div class="btn-group" role="group" aria-label="...">
          <a class="btn btn-default btn-sm" href="{{ route('funcionarios.index') }}" role="button">Funcionarios Ativos</a>
          <a class="btn btn-success btn-sm" href="{{ route('funcionarios.todos')}}" role="button">Funcionarios Ativos e Deminitdos</a>
          <a class="btn btn-danger btn-sm" href="{{ route('funcionarios.excluidos')}}">Funcionarios Demitidos</a>
        </div>
	<table class="table table-striped " id="table">
	<thead class="filters">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>CPF</th>
			<th>Cargo</th>
			<th>Empresa</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($funcionarios) && count($funcionarios) > 0 )
		@foreach($funcionarios as $funcionario)
		<tr>
			<td>{{ $funcionario->id }}</td>
			<td>{{ $funcionario->nome }}</td>
			<td>{{ $funcionario->cpf }}</td>
			<td>{{ $funcionario->cargo[0]->nome or "Nenhuma funcao alocada" }}</td>
			<td>{{ $funcionario->empresa->nome or "Nenhuma empresa alocada" }}</td>
			<td>
				@if($funcionario->trashed())
					<div class="alert alert-danger" role="alert">
					  Deletado
					</div>
				@else
				<form method="POST" action="{{ route('funcionarios.destroy',$funcionario->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('funcionarios.store') }}">
					<button type="submit" class="btn btn-mini pull-left"><i class="fa fa-trash"></i></button>
				</form>
				&nbsp
				<a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-mini">
					<i class="fa fa-pencil-square-o"></i>
				</a>
				<a href="{{ route('funcionarios.getExames', $funcionario->id) }}" class="btn btn-mini">
					<i class="fa fa-plus-square-o"></i>
				</a>

				<a href="{{ route('funcionarios.exames', $funcionario->id) }}" class="btn btn-mini">
					<i class="fa fa-list-alt"></i>
				</a>
				<a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-mini">
					<i class="fa fa-eye"></i>
				</a>
				@endif
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
</div>
</div>

@include('admin/funcionario/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
@stop

