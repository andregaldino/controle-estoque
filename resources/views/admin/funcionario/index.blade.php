@extends('admin/layouts/default')

@section('titulo')
Lista de Funcionarios
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
				<form method="POST" action="{{ route('funcionarios.destroy',$funcionario->id) }}">
					<input name="_method" type="hidden" value="DELETE">
					<button type="submit" class="btn btn-danger pull-left">delete</button>		
				</form>
				&nbsp
				<a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">edit</i>
				</a>
				<a href="{{ route('funcionarios.getExames', $funcionario->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">Exame</i>
				</a>

				<a href="{{ route('funcionarios.exames', $funcionario->id) }}" class="btn btn-info">
					<i class="fa fa-pencil-square-o">Detalhes</i>
				</a>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#maddFuncionario">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/funcionario/criar')


@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : "{{ route('funcionarios.store') }}", 
        	data: $('#faddFuncionario').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('#faddFuncionario')[0].reset();
        			$('#maddFuncionario').modal('hide');
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

