@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	<ol class="breadcrumb">
	  <li>{{ link_to('/', 'Volver a inicio') }}</li>
	  <li class="active" style="color:#083D5C">Iniciar sesión</li>
	</ol>

	<h2 class="sub-header">Inicia sesión</h2>

		    {{ Form::open(['route' => 'sessions.store']) }}
		    <div class="modal-body">
		    	@if (Session::has('v'))
			    	{{ Form::hidden('error', 1, array('id' => 'error_msg')) }}
				    <p><span class="error_msg">Alguno de los datos es incorrecto. Por favor, trata de nuevo.</span></p>
				@endif
		    	<p>Llena los campos para iniciar sesión normal</p>
				<div class="form-group">
				 	{{ Form::label('U_username', 'Nombre de usuario: ') }}
					{{ Form::text('U_username', '', array('class' => 'form-control session', 'placeholder' => 'Ingrese nombre de usuario')) }}
					
				</div>
				<div class="form-group">
				  	{{ Form::label('U_password', 'Contraseña: ') }}
				  	<br>
					{{ Form::password('U_password', array('class' => 'form-control session', 'placeholder' => 'Ingrese contraseña')) }}

					
				</div>
		    </div>
		    
		    <div class="modal-footer">
		      	<center>{{ Form::submit('Iniciar sesión', array('class' => 'btn btn-primary')) }}</center>   	
		  	</div>
		  	{{ Form::close() }}
		  	<center>
		      <a href="{{ url('forgotpassword') }}">¿Olvidaste contraseña?</a>
		    </center><br>

		  	<center>
		      <p> Ó inicia sesión con Facebook</p>
		      <a href="{{ url('login/fb') }}"><button class="btn btn-default btn-sm"><span class="fa fa-facebook"></span> Iniciar Sesión con Facebook</button></a>
		    </center><br>
</div>
<div class="space60"></div>

@stop