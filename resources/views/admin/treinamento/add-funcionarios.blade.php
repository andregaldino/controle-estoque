@extends('admin/layouts/default')

@section('titulo')
Adicionar Treinamento aos Funcionarios
@stop


@section('css')

@stop

@section('conteudo')
<form  role="form" method="POST" action="{{ route('treinamentos.storeFuncionarios',$treinamento->id) }}">


  <div class="text-center">
    <h2>{{ $treinamento->nome }}</h2>
    <p>
      {{ $treinamento->descricao }}<br>
    </p>
  </div>

  <div class="form-group">
    <label for="slug" class="control-label">Funcionarios :</label>
  </div>
  <div class="well">
    <div class="checkbox">
      @if(count($funcionarios) > 0)
      @foreach($funcionarios as $funcionario)
      <label class="checkbox-inline col-sm-3">
        <input type="checkbox" name="funcionarios[]" value="{{$funcionario->id}}">{{ $funcionario->nome }} - {{ $funcionario->cpf }}
      </label>
      @endforeach
      @endif
    </div>

    <br>
  </div>
  <div class="form-group">
    <label class="control-label" for="email">Data do Treinamento :</label>
    <input type="date" class="form-control" name="data" id="data">
  </div>
  <a class="btn btn-danger" href="{{route('treinamentos.index')}}">
    Cancelar
  </a>
  <button type="submit" class="btn btn-success">
    Adicionar
  </button>  

</form>
@stop