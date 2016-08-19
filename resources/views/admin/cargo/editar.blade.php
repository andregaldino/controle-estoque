@extends('admin/layouts/default')

@section('titulo')
Editar Cargo
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('cargos.update',$cargo->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" value="{{$cargo->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$cargo->nome}}"  />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-2" for="email">Descrição :</label>
    <div class="col-md-10">
    <textarea name="descricao" id="descricao" >{{ $cargo->descricao }}</textarea>
    </div>          
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('cargos.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop