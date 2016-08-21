@extends('admin/layouts/default')

@section('titulo')
Adicionar Entrada ao EPI
@stop


@section('css')

@stop

@section('conteudo')
<form  class="form-horizontal" role="form" method="POST" action="{{ route('epis.storeEntrada',$produto->id) }}">


  <div class="text-center">
    <h2>{{ $produto->nome }}</h2>
    <p>
      <strong>Tamhno :</strong> {{ $produto->medida }}<br>
      <strong>CA :</strong> {{ $produto->ca }}<br>
      <strong>Categoria :</strong> {{ $produto->categoria->nome }}<br>
    </p>
  </div>

  
  <div class="form-group">
    <label class="control-label col-md-2" for="qntd">Quantidade :</label>
    <div class="col-md-6">
    <input type="number" class="form-control" name="qntd" id="qntd">
    </div>          
  </div>

  <div class="form-group">
    <label class="control-label col-md-2" for="data">Data de Entrada :</label>
    <div class="col-md-6">
    <input type="date" class="form-control" name="data" id="data">
    </div>          
  </div>
  <a class="btn btn-danger" href="{{route('epis.index')}}">
    Cancelar
  </a>
  <button type="submit" class="btn btn-success">
    Adicionar
  </button>  

</form>
@stop