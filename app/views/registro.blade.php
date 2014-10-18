@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	<ol class="breadcrumb">
	  <li>{{ link_to('/', 'Volver a Inicio') }}</li>
	</ol>

	<h2 class="sub-header">Registro</h2>
	{{ Form::open(['route' => 'users.store']) }}
	{{ Form::hidden('curr_user', '0') }}
	<div class="row">
	  <div class="form-group">
	  	{{ Form::label('U_firstname', 'Nombre(s) ', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4" class="error">
		    {{ Form::text('U_firstname', '', array('class' => 'session form-control focus')) }}
		    <span class="error_msg">{{ $errors->first('U_firstname') }}</span>
	    </div>

	    {{ Form::label('U_lastname', 'Apellido(s)', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4">
	      {{ Form::text('U_lastname', '', array('class' => 'session form-control')) }}
	      <span class="error_msg">{{ $errors->first('U_lastname') }}</span>
	    </div>
	  </div>
	</div>

	<br>

	<div class="row">
	  <div class="form-group">
	  	{{ Form::label('U_email', 'Correo Electrónico', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4" class="error">
		    {{ Form::text('U_email', '', array('class' => 'session form-control')) }}
		    <span class="error_msg">{{ $errors->first('U_email') }}</span>
	    </div>

	    {{ Form::label('U_username', 'Nombre de Usuario', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4">
	      {{ Form::text('U_username', '', array('class' => 'session form-control')) }}
	      <span class="error_msg">{{ $errors->first('U_username') }}</span>
	    </div>
	  </div>
	</div>

	<br>

	<div class="row">
	  <div class="form-group">
	  	{{ Form::label('U_password', 'Contraseña', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4" class="error">
		    {{ Form::password('U_password', array('class' => 'session form-control')) }}
		    <span class="error_msg">{{ $errors->first('U_password') }}</span>
	    </div>

	    {{ Form::label('password_confirmation', 'Repita contraseña', array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4">
	      {{ Form::password('password_confirmation', array('class' => 'session form-control')) }}
	      <span class="error_msg">{{ $errors->first('password_confirmation') }}</span>
	    </div>
	  </div>
	</div>

	<br>
	{{ Form::submit('Regístrate', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
	<a href="{{ url('login/fb') }}" ><button class="btn btn-default btn-sm" style="float:right; font-size:16px;">
		<span class="fa fa-facebook"></span> Registrarme con Facebook</button></a>
</div>
<div class="space60"></div>

@stop