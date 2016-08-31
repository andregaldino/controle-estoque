<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title>
		@yield('titulo')
     </title>
	<meta charset="UTF8"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
	
	@yield('css')
</head>
<body>
	@include('admin/layouts/menu')

<div class="container">
	@include('admin/layouts/notificacoes')
	@yield('conteudo')
</div>

	@include('layouts/rodape')
	<script src="{{ asset('vendor/bootstrap/js/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>

	@yield('script')


</body>
</html>