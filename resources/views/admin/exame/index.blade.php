@extends('admin/layouts/default')

@section('titulo')
Lista de Exames
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Lista de Exames
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
			<th>Sigla</th>
			<th>Duração</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($exames) && count($exames) > 0 )
		@foreach($exames as $exame)
		<tr>
			<td>{{ $exame->id }}</td>
			<td>{{ $exame->nome }}</td>
			<td>{{ $exame->sigla }}</td>
			<td>{{ $exame->duracao }}</td>
			<td>
				<form method="POST" action="{{ route('exames.destroy',$exame->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('empresas.store') }}">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-info">
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

@include('admin/exame/criar')


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

