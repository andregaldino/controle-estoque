@extends('admin/layouts/default')

@section('titulo')
Lista de Categorias
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
				2
			</td>
			<td>
				<form method="POST" action="{{ route('treinamentos.destroy',$treinamento->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				<a href="{{ route('treinamentos.edit', $treinamento->id) }}" class="btn btn-info">
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
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#maddtreinamento">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/treinamento/criar')


@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : "{{ route('treinamentos.store') }}", 
        	data: $('#faddTreinamento').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('#faddTreinamento')[0].reset();
        			$('#maddtreinamento').modal('hide');
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

