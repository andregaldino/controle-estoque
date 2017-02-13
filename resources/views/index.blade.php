@extends('layouts/default')

@section('css')
	
@stop


@section('conteudo')
@include('admin/layouts/notificacoes')
<form class="form-signin" role="form" method="POST" action="{{ route('singin') }}">
	  <div class="col-lg-4 text-center">
	  </div>
	<div class="col-lg-4 text-center">
		<h2 class="form-signin-heading" contenteditable="false">Por favor, forneça:</h2>
		<input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" contenteditable="false">
		<p></p>
		<input type="password" class="form-control" name="password" placeholder="Password" required="" contenteditable="false">
		<label class="checkbox">
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogar">Acessar</button>
	</div>
	 <div class="col-lg-4 text-center">
	 </div>
</form>
@stop

@section('script')
<script src="{{ asset('vendor/bootstrap/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
@stop

