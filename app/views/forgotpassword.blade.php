@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	<ol class="breadcrumb">
	  <li>{{ link_to('/', 'Volver a inicio') }}</li>
	  <li class="active" style="color:#083D5C">Recuperar contraseña</li>
	</ol>

	<h2 class="sub-header">Por favor introduce tu correo electrónico</h2>
	{{ Form::open(array('url' => 'forgotpassword')) }}
	<div class="row">
	  <div class="form-group">
	  	{{ Form::label('U_email', 'Correo Electrónico') }}
		{{ Form::text('U_email', '', array('class' => 'session form-control')) }}
		<span class="error_msg">{{ $errors->first('U_email') }}</span>
	  </div>
	</div>

	{{ Form::submit('Recuperar contraseña', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>
<div class="space60"></div>

@stop