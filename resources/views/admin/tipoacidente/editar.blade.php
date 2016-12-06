@extends('admin/layouts/default')

@section('titulo')
Editar Tipo de Acidente
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('tiposacidentes.update',$tipo->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id" value="{{$tipo->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$tipo->nome}}"  />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-2" for="email">Descrição :</label>
    <div class="col-md-6">
    <textarea name="descricao" id="descricao" class="form-control" >{{ $tipo->descricao }}</textarea>
    </div>          
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('tiposacidentes.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop