@extends('admin/layouts/default')

@section('titulo')
Editar Acidente
@stop


@section('css')

@stop

@section('conteudo')
<form class="form-horizontal" role="form" method="post" action="{{ route('acidentes.update',$acidente->id) }}">
  <input type="hidden" name="_method" value="PUT" />

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id" value="{{$acidente->id}}"  readonly  />

    </div>
  </div>
  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Descrição : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="descricao" value="{{$acidente->descricao}}"  />
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Procedimento Realizado : </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="procedimento" value="{{$acidente->procedimento}}"  />
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Tipos de acidentes : </label>
    <div class="col-sm-6">
      <select class="form-control" name="tipo_id">
          @forelse($tipos as $tipo)
            <option value="{{$tipo->id}}" @if($acidente->tipo->id == $tipo->id) selected @endif >
              {{$tipo->nome}}
            </option>
          @empty
            <option value="0">
             Selecione um tipo
            </option>
          @endforelse
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="slug" class="col-sm-2 control-label">Funcionarios envolvidos: </label>
    <div class="col-sm-6">
      <select class="form-control" multiple name="funcionario_id[]">
          @forelse($funcionarios as $funcionario)
            @if(!$acidente->funcionarios->isEmpty())
              @foreach($acidente->funcionarios as $value)
                <option value="{{$funcionario->id}}" @if($value->id == $funcionario->id) selected @endif >
                  {{$funcionario->nome}}
                </option>
              @endforeach
            @endif
          @empty
            <option value="0">
             Selecione um Funcionario
            </option>
          @endforelse
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <a class="btn btn-danger" href="{{route('acidentes.index')}}">
        Cancelar
      </a>
      <button type="submit" class="btn btn-success">
        Alterar
      </button>
    </div>
  </div>
</form>
@stop