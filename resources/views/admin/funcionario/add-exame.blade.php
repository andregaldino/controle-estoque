@extends('admin/layouts/default')

@section('titulo')
Adicionar Exame ao Funcionario
@stop


@section('css')

@stop

@section('conteudo')
<form  role="form" method="POST" action="{{ route('funcionarios.storeExames',$funcionario->id) }}">


  <div class="text-center">
    <h2>{{ $funcionario->nome }}</h2>
    <p>
      <strong>CPF :</strong> {{ $funcionario->cpf }}<br>
      <strong>Cargo:</strong> {{ $funcionario->cargo[0]->nome }}<br>
      <strong>Empresa:</strong> {{ $funcionario->empresa->nome }}<br>
    </p>
  </div>

  <div class="form-group">
    <label for="slug" class="control-label">Exames :</label>
  </div>
  <div class="well">
    <div class="checkbox">
      @if(count($exames) > 0)
      @foreach($exames as $exame)
      <label class="checkbox-inline col-sm-3">
        <input type="checkbox" name="exames[]" value="{{$exame->id}}">{{ $exame->nome }} - {{ $exame->sigla }}
      </label>
      @endforeach
      @endif
    </div>

    <br>
  </div>
  <div class="form-group">
    <label class="control-label" for="email">Data do exame :</label>
    <input type="date" class="form-control" name="nome" id="nome">
  </div>
  <a class="btn btn-danger" href="{{route('funcionarios.index')}}">
    Cancelar
  </a>
  <button type="submit" class="btn btn-success">
    Adicionar
  </button>  

</form>
@stop