@extends('admin/layouts/default')

@section('titulo')
Editar Equipamento de Proteção Individual
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('epis.update',$produto->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id" value="{{$produto->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$produto->nome}}"  />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2" for="medida">Tamanho :</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="medida" id="medida" value="{{ $produto->medida }}">
    </div>          
  </div>
  <div class="form-group">
    <label class="control-label col-md-2" for="ca">CA :</label>
    <div class="col-md-6">
      <input type="number" class="form-control" name="ca" id="ca" value="{{ $produto->ca }}">
    </div>          
  </div>
  
  <div class="form-group">
    <label class="control-label col-md-2" for="categoria">Categoria :</label>
    <div class="col-sm-6">
      <select class="form-control" name="categoria" id="categoria">
        @if(count($categorias)>0)
        @foreach($categorias as $categoria)
        @if($produto->categoria->id == $categoria->id)
        <option value="{{ $categoria->id }}" selected>{{ $categoria->nome }}</option>
        @else
        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endif

        @endforeach
        @else
        <option value="0">Selecione</option>
        @endif
      </select>
    </div>          
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('epis.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop