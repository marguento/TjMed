@extends('layouts.default')
@section('content')

<div class="container">
	<div class="space40"></div>
	@if (Session::has('var'))
	  {{ Session::get('var') }}
	@endif

	<ol class="breadcrumb">
	  <li>{{ link_to('/', Lang::get('messages.back_ab')) }}</li>
	  <li class="active" style="color:#083D5C">{{ Lang::get('messages.recoverypass_rp') }}</li>
	</ol>

	<h2 class="sub-header">{{ Lang::get('messages.addemail_rp') }}</h2>
	{{ Form::open(array('url' => 'forgotpassword')) }}
	<div class="row">
	  <div class="form-group" style="padding: 15px;">
	  	{{ Form::label('U_email', Lang::get('messages.contact_email')) }}
		{{ Form::text('U_email', '', array('class' => 'session form-control')) }}
		<span class="error_msg">{{ $errors->first('U_email') }}</span>
	  </div>
	</div>

	{{ Form::submit(Lang::get('messages.recoverypass_rp'), array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>
<div class="space60"></div>

@stop