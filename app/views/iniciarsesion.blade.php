@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	<ol class="breadcrumb">
	  <li>{{ link_to('/', Lang::get('messages.back_ab')) }}</li>
	  <li class="active" style="color:#083D5C">{{ Lang::get('messages.login_lg') }}</li>
	</ol>

	<h2 class="sub-header">{{ Lang::get('messages.login_lg') }}</h2>

		    {{ Form::open(['route' => 'sessions.store']) }}
		    <div class="modal-body">
		    	@if (Session::has('v'))
			    	{{ Form::hidden('error', 1, array('id' => 'error_msg')) }}
				    <p><span class="error_msg">{{ Lang::get('messages.incorrectpass_lg') }}</span></p>
				@endif
		    	<p>{{ Lang::get('messages.fill_lg') }}</p>
				<div class="form-group">
				 	{{ Form::label('U_username', Lang::get('messages.username_up')) }}
					{{ Form::text('U_username', '', array('class' => 'form-control session', 'placeholder' => Lang::get('messages.user_lg'))) }}
					
				</div>
				<div class="form-group">
				  	{{ Form::label('U_password', Lang::get('messages.password_au')) }}
				  	<br>
					{{ Form::password('U_password', array('class' => 'form-control session', 'placeholder' => Lang::get('messages.password_lg'))) }}

					
				</div>
		    </div>
		    
		    <div class="modal-footer">
		      	<center>{{ Form::submit(Lang::get('messages.log_in'), array('class' => 'btn btn-primary')) }}</center>   	
		  	</div>
		  	{{ Form::close() }}
		  	<center>
		      <a href="{{ url('forgotpassword') }}">{{ Lang::get('messages.forgetpass_lg') }}</a>
		    </center><br>

		  	<center>
		      <p>{{ Lang::get('messages.ologinfb_lg') }}</p>
		      <a href="{{ url('login/fb') }}"><button class="btn btn-default btn-sm"><span class="fa fa-facebook"></span> {{ Lang::get('messages.facebook_au') }}</button></a>
		    </center><br>
</div>
<div class="space60"></div>

@stop