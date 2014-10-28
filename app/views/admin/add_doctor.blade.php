@extends('admin.index')
@section('content_admin')

<ol class="breadcrumb">
  <li>{{ link_to('admin/doctores', 'Volver a Administración de Doctores') }}</li>
</ol>

<h2 class="sub-header">Agregar doctor</h2>
<div class="space20"></div>

{{ Form::open(array('url' => 'doctores/store', 'files' =>true)) }}
{{ Form::hidden('add_user', 1) }}

<div class="row">
  <div class="form-group">
    {{ Form::label('name', 'Nombre', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('name', '', array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_name') }}</span>
    </div>

    {{ Form::label('address', 'Dirección', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('address', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_address') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_email') }}</span>
    </div>

    {{ Form::label('telephone', 'Teléfono', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('telephone', '', array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_telephone') }}</span>
    </div>

    
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('cellphone', 'Celular', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('cellphone', '', array('class' => 'form-control')) }}
    </div>
  </div>
    {{ Form::label('user_owner', 'Usuario Propietario:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    {{ Form::select('user_owner', $user_owner, 'none', ['class' => 'form-control', 'id' => 'user_owner']) }}
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('introduction', 'Introducción', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('introduction', '', ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_introduction') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('description', 'Descripción', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('description', '', ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_description') }}</span>
    </div>
  </div>
</div>

<br>

<h5> Imagenes menores de 2MB </h5>
<div class="row">
  <div class="form-group">
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 130px;">
            {{ HTML::image('../app/images/default.jpg') }}
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
        <div>
          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
          <input type="file" name="image"></span>
          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
      </div>
      <span class="error_msg">{{ $errors->first('b_image') }}</span>
    </div>

    {{ Form::label('priority', 'Prioridad', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::select('priority', ['0', '1'], '', ['class' => 'form-control', 'id' => 'priority']) }}
    </div>


  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', '', array('class' => 'form-control')) }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', '', array('class' => 'form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', '', array('class' => 'form-control')) }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', '', array('class' => 'form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google-plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="google-plus" value="">
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', '', array('class' => 'form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      <input type="submit" class="form-control btn btn-primary" name="submit" id="submit" value="Guardar">
    </div>
  </div>
</div>
<div class="col-md-4"></div>
{{ Form::close() }}

<script>

$(document).ready(function() {
  $('#doctor').addClass('active');
});
</script>

@stop