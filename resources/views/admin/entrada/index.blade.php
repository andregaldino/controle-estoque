@extends('admin/layouts/default')

@section('titulo')
Histórico de Entradas
@stop


@section('css')

@stop


@section('conteudo')
<div id="msg"></div>
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title"> 
          Histórico de Entradas
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
			<th>Data de entrada</th>
			<th>Qntd</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($entradas) && count($entradas) > 0 )
		@foreach($entradas as $entrada)
		<tr>
			<td>{{ $entrada->id }}</td>
			<td>{{ $entrada->produto->nome }}</td>
			<td>{{ $entrada->data }}</td>
			<td>{{ $entrada->qntd }}</td>
			<td>
				<input type="hidden" name="urlcadastro" class="urlcadastro" value="{{ route('entradas.store') }}">
				<a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-info">
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

