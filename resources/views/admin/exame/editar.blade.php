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
      <input type="text" class="form-control" name="id" value="{{$exame->id}}"  readonly  />

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
      <select class="form-control" name="duracao">
              <option value="30" @if($exame->duracao == 30) selected @endif >
              1 Mês
              </option>
              <option value="90" @if($exame->duracao == 90) selected @endif >
              3 Meses</option>
              <option value="180" @if($exame->duracao == 180) selected @endif >
              6 Meses
              </option>
              <option value="365" @if($exame->duracao == 365) selected @endif >
              12 Meses / 1 ano
              </option>
              <option value="540" @if($exame->duracao == 540) selected @endif >
              18 Meses
              </option>
              <option value="730" @if($exame->duracao == 730) selected @endif >
              24 Meses / 2 anos
              </option>
              <option value="1095" @if($exame->duracao == 1095) selected @endif >
              36 Meses / 3 anos
              </option>
              <option value="1460" @if($exame->duracao == 1460) selected @endif >
              48 Meses / 4 anos
              </option>
              <option value="1825" @if($exame->duracao == 1865) selected @endif >
              56 Meses / 5 anos
              </option>
            </select>
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