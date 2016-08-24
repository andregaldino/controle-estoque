@extends('admin/layouts/default')

@section('titulo')
Editar funcionario
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('funcionarios.update',$funcionario->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id" value="{{$funcionario->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Nome : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nome" value="{{$funcionario->nome}}"  />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2" for="email">CPF :</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="cpf" id="cpf" value="{{$funcionario->cpf}}"  >
    </div>          
  </div>
  <div class="form-group">
    <label class="control-label col-md-2" for="email">Empresa :</label>
    <div class="col-sm-6">
      <select class="form-control" name="empresa">
        @if(count($empresas)>0)
          @foreach($empresas as $empresa)
            @if($funcionario->empresa->id == $empresa->id)
              <option value="{{ $empresa->id }}" selected>{{ $empresa->nome }}</option>
            @else
              <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
            @endif
            
          @endforeach
        @else
          <option value="0">Selecione</option>
        @endif
      </select>
    </div>          
  </div>
  <div class="form-group">
    <label class="control-label col-md-2" for="email">Cargo :</label>
    <div class="col-sm-6">
      <select class="form-control" name="cargo">
        @if(count($cargos)>0)
          @foreach($cargos as $cargo)
            @if($funcionario->cargo[0]->id == $cargo->id)
              <option value="{{ $cargo->id }}" selected>{{ $cargo->nome }}</option>
            @else
              <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
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
      <a class="btn btn-danger" href="{{route('funcionarios.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop