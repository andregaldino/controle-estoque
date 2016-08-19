@extends('admin/layouts/default')

@section('titulo')
Lista de Cargos
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
			<th>descricao</th>
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
			<td>
				<form method="POST" action="{{ route('cargos.destroy',$cargo->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#maddCargo">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/cargo/criar')


@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : "{{ route('cargos.store') }}", 
        	data: $('#faddCargo').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('#faddCargo')[0].reset();
        			$('#maddCargo').modal('hide');
        		}
           },error: function(msg){
                    console.log(msg);
            }
       });

        event.preventDefault();
    });


    

});


</script>
@stop

