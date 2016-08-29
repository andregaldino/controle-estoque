@extends('admin/layouts/default')

@section('titulo')
Detalhes do Funcionario
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
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

  <label for="slug" class="control-label">Historico de EPI :</label>
  
  <div class="well">
    <table class="table table-striped">
      <thead>
        <th>EPI</th>
        <th>Data</th>
        <th>Quantidade</th>
      </thead>
      <tbody>
        @if(count($funcionario->saidas) > 0)
        @foreach($funcionario->saidas as $saida)
        <tr>
          <td>{{$saida->produto->nome}}</td>
          <td>{{$saida->data}}</td>
          <td>{{$saida->qntd}}</td>
        </tr>
        @endforeach
        @else
          <tr>
            <td colspan="3" class="text-center">Esse funcionario ainda não pegou nenhum EPI</td>
          </tr>
        @endif
        
      </tbody>
    </table>
    <br>
  </div>
  

  <label for="slug" class="control-label">Exames :</label>
  
  <div class="well">
    <table class="table table-striped">
      <thead>
        <th>Exame</th>
        <th>Datas</th>
      </thead>
      <tbody>
        @if(count($funcionario->exames) > 0)
        @foreach($funcionario->exames as $exame)
        <tr>
          <td>{{$exame->nome}}</td>
          <td>{{$exame->pivot->data}}</td>
        </tr>
        @endforeach
        @else
          <tr>
            <td colspan="2" class="text-center">Esse funcionario ainda não fez nenhum Exame</td>
          </tr>
        @endif
        
      </tbody>
    </table>
    <br>
  </div>

@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
@stop
