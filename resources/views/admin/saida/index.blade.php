@extends('admin/layouts/default')

@section('titulo')
Histórico de Saidas
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Histórico de Saida
        </h4>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modalcadastro">Cadastrar</button>
      </div>
      <br />
      <div class="panel-body">
<table class="table table-striped " id="table">
	<thead>
		<tr class="filters">
			<th>ID</th>
			<th>EPI</th>
			<th>Data de saida</th>
			<th>Qntd</th>
			<th>Funcionario</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($saidas) && count($saidas) > 0 )
		@foreach($saidas as $saida)
		<tr>
			<td>{{ $saida->id }}</td>
			<td>{{ $saida->produto->nome }}</td>
			<td>{{ $saida->data }}</td>
			<td>{{ $saida->qntd }}</td>
			<td>{{ $saida->funcionario->nome }}</td>
			<td>
				<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('saidas.store') }}">
				<a href="{{ route('saidas.edit', $saida->id) }}" class="btn btn-info">
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


@stop

@section('script')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@stop

