@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	@if ($user != null)

	<ol class="breadcrumb">
	  <li>{{ link_to('/', Lang::get('messages.back_ab')) }}</li>
	  <li class="active" style="color:#083D5C">{{ Lang::get('messages.uppass_lg2') }}</li>
	</ol>

	<h2 class="sub-header">{{ Lang::get('messages.uppass_lg') }}</h2>
	{{ Form::open(array('url' => 'updatepassword')) }}
	{{ Form::hidden('reset_code', $user->reset_code) }}
	<div class="row">
	  <div class="form-group">
	  	{{ Form::label('password', Lang::get('messages.newpass_lg'), array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4" class="error">
		    {{ Form::password('password', array('class' => 'session form-control')) }}
		    <span class="error_msg">{{ $errors->first('password') }}</span>
	    </div>

	    {{ Form::label('password_confirmation', Lang::get('messages.repitpass_lg'), array('class' => 'col-md-2 control-label')) }}
	    <div class="col-md-4">
	      {{ Form::password('password_confirmation', array('class' => 'session form-control')) }}
	      <span class="error_msg">{{ $errors->first('password_confirmation') }}</span>
	    </div>
	  </div>
	</div>

	{{ Form::submit(Lang::get('messages.back_ab'), array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}


@else
	<ol class="breadcrumb">
	  <li>{{ link_to('/', Lang::get('messages.back_ab')) }}</li>
	</ol>

	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>{{ Lang::get('messages.error_lg') }}</strong> {{ Lang::get('messages.notfound_lg') }}
	</div>
@endif

</div>
<div class="space60"></div>

@stop