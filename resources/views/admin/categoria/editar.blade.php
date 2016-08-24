@extends('admin/layouts/default')

@section('titulo')
Editar Categoria
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('categorias.update',$categoria->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id" id="id" value="{{$categoria->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" id="nome" value="{{$categoria->nome}}"  />

    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('categorias.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop