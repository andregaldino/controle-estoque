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
			<td>
				2
			</td>
			<td>
				<a href="{{ route('categorias.destroy',$categoria->id) }}">
					<i class="fa fa-trash-o">delete</i>
				</a>
				<a href="#">
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
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#categoriacadastro">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/categoria/criar')

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {

    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : "{{ route('categorias.store') }}", 
        	data: $('#criarCategoria').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('#criarCategoria')[0].reset();
        			$('#categoriacadastro').modal('hide');
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

