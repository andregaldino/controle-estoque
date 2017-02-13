<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title>
		@yield('titulo')
     </title>
	<meta charset="UTF8"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
	
	
	@yield('css')
</head>
<body>
<div class="container">
	@yield('conteudo')
</div>

	@include('layouts/rodape')

	<script src="{{ asset('vendor/bootstrap/js/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
	@yield('script')


</body>
</html>