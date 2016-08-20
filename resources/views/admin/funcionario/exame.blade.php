@extends('admin/layouts/default')

@section('titulo')
Exames do funcionario
@stop


@section('css')

@stop

@section('conteudo')

  <div class="text-center">
    <h2>{{ $funcionario->nome }}</h2>
    <p>
      <strong>CPF :</strong> {{ $funcionario->cpf }}<br>
      <strong>Cargo:</strong> {{ $funcionario->cargo[0]->nome }}<br>
      <strong>Empresa:</strong> {{ $funcionario->empresa->nome }}<br>
    </p>
  </div>
<table class="table table-striped " id="table">
  <thead>
    <tr class="filters">
      <th>Exame</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
      @if(count($funcionario->exames) > 0)
        @foreach($funcionario->exames as $exame)
        <tr>
          <td> {{ $exame->nome }} </td>
          <td> {{ $exame->pivot->data }} </td>
        </tr>
        </label>
        @endforeach
      @endif
  </tbody>
</table>
      
@stop