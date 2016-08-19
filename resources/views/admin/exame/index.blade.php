@extends('admin/layouts/default')

@section('titulo')
Lista de Exames
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
	<tfoot>
		<tr>
			<td colspan="4" class="text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#maddExame">Cadastrar</button>
			</td>
		</tr>
	</tfoot>
</table>

@include('admin/exame/criar')


@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : "{{ route('exames.store') }}", 
        	data: $('#faddExame').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('#faddExame')[0].reset();
        			$('#maddExame').modal('hide');
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

