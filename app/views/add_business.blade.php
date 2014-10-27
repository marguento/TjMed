@extends('layouts.default')
@section('content')


<div class="container">
  <ol class="breadcrumb">
    <li>{{ link_to('/', 'Volver a inicio') }}</li>
    <li class="active" style="color:#083D5C">Registrar negocio</li>
  </ol>
<h2 class="sub-header">Agregar doctor o negocio médico</h2>
<div class="space20"></div>

{{ Form::open(array('url' => 'doctores/store', 'files'=> true)) }}
{{ Form::hidden('add_user', 0) }}

<div class="row">
  <div class="form-group">
    {{ Form::label('name', 'Nombre', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('name', '', array('class' => 'session form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_name') }}</span>
    </div>

    {{ Form::label('address', 'Dirección', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('address', '', array('class' => 'session form-control')) }}
      <span class="error_msg">{{ $errors->first('b_address') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', '', array('class' => 'session form-control')) }}
      <span class="error_msg">{{ $errors->first('b_email') }}</span>
    </div>

    {{ Form::label('telephone', 'Teléfono', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('telephone', '', array('class' => 'session form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_telephone') }}</span>
    </div>

    
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('cellphone', 'Celular', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('cellphone', '', array('class' => 'session form-control')) }}
    </div>
  </div>
    {{ Form::label('user_owner', '¿Usted es dueño de este negocio?', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::select('user_owner', ['No', 'Si'], '', ['class' => 'session form-control', 'id' => 'user_owner']) }}
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('introduction', 'Introducción', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('introduction', '', ['class' => 'session form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_introduction') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('description', 'Descripción', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('description', '', ['class' => 'session form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_description') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
     {{ Form::label('image', 'Imagen', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::file('image') }}
      <span class="error_msg">{{ $errors->first('b_image') }}</span>
     <!--  <input type="file" name="image_business"> -->
      <!-- <div class="fileinput fileinput-exists" data-provides="fileinput">
        <div class="fileinput-exists thumbnail" style="width: 200px; height: 200px;">
          <img id="input_image" src="">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
        <div>
          <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona imagen principal</span><span class="fileinput-exists">Change</span>
          </span>
          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
      </div> -->
    </div>


  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', '', array('class' => 'session form-control')) }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', '', array('class' => 'session form-control')) }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google-plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
    <div class="col-md-4">
      <input type="text" class="session form-control" id="google-plus" value="">
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
    </div>
  </div>
</div>
<div class="col-md-4"></div>
{{ Form::close() }}
</div>
<script>

$(document).ready(function() {
  $('#negocios').addClass('active');
});
</script>

@stop