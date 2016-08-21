@extends('admin/layouts/default')

@section('titulo')
Editar Empresa
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('empresas.update',$empresa->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" value="{{$empresa->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$empresa->nome}}"  />
    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Razão Social : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="razao" value="{{$empresa->razao}}"  />
    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">CNPJ : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="cnpj" value="{{$empresa->cnpj}}"  />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('empresas.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop