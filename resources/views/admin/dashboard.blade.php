@extends('admin/layouts/default')

@section('titulo')
Painel Administrativo	
@stop


@section('css')
<style>
	.list-group{
		margin-bottom: 0;
	}
</style>
@stop


@section('conteudo')
<div class="col-md-8">
	
	<div class="panel panel-primary ">
		<div class="panel-heading">
			<h4 class="panel-title text-center">Historico de Saida de EPI do Ultimo Mês</h4>
			<div class="pull-right">
				<i class="fa fa-bar-chart"></i>
			</div>
		</div>
		<div class="painel-body">
			<canvas id="myChart" width="400" height="200"></canvas>
		</div>
	</div>

</div>
<div class="col-md-4">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					<h4 class="panel-title">Ultimas saidas</h4>
					<div class="pull-right">
						<i class="fa fa-sign-out"></i>
					</div>
				</div>
				<div class="painel-body">
					<ul class="list-group">
						@if(isset($lastsaidas))
							@foreach($lastsaidas as $saida)
								<span class="list-group-item">{{ $saida->qntd }} Und - {{ $saida->produto->nome }} {{ $saida->produto->medida }} - {{ $saida->funcionario->nome }}</span>
							@endforeach
						@endif

					</ul>
				</div>
			</div>

		</div>
		<div class="col-md-12">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					<h4 class="panel-title">Ultimas Entradas</h4>
					<div class="pull-right">
						<i class="fa fa-sign-in"></i>
					</div>
				</div>
				<div class="painel-body">
					<ul class="list-group">
						@if(isset($lastentradas))
							@foreach($lastentradas as $entrada)
								<span class="list-group-item">{{ $entrada->qntd }} Und - {{ $entrada->produto->nome }}
								{{ $entrada->produto->medida }}</span>
							@endforeach
						@endif
					</ul>
				</div>
			</div>

		</div>
		<div class="col-md-12">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					<h4 class="panel-title">Lembretes</h4>
					<div class="pull-right">
						<i class="fa fa-bell-o"></i>
					</div>
				</div>
				<div class="painel-body">
					<ul class="list-group">
						@if(isset($lembretes))
							@foreach($lembretes as $lembrete)
								<span class="list-group-item">Disponivel {{ $lembrete->produto->qntd }} {{ $lembrete->produto->medida}} Und - {{ $lembrete->produto->nome }}</span>
							@endforeach
						@endif
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.js"></script>
<script>
var data = {
    labels: {!! json_encode($produtos->lists('nome')) !!},
    datasets: [
        {
            label: "Saidas de EPIs no ultimo mês",
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            data: {!! json_encode($produtos->lists('qntd_periodo')) !!},
        }
    ]
};

var ctx = $("#myChart");
	var myBarChart = new Chart(ctx, {
	    type: 'bar',
	    data: data,
	    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
	});
</script>
@stop

