@extends('admin/layouts/default')

@section('titulo')
Editar treinamento
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('treinamentos.update',$treinamento->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" value="{{$treinamento->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$treinamento->nome}}"  />
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Descrição : </label>
    <div class="col-sm-6">
      <textarea name="descricao" id="descricao" >
        {{$treinamento->descricao}}
      </textarea>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('treinamentos.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop