@extends('admin/layouts/default')

@section('titulo')
Editar Exame
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('exames.update',$exame->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" value="{{$exame->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$exame->nome}}"  />
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Sigla : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="sigla" value="{{$exame->sigla}}"  />
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Duração : </label>
    <div class="col-sm-6">
      <input type="number" class="form-control" name="duracao" value="{{$exame->duracao}}"  />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('exames.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop