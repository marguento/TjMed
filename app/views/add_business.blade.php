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
    {{ Form::label('name', 'Nombre (*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('name', '', array('class' => 'session form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_name') }}</span>
    </div>

    {{ Form::label('address', 'Dirección (*)', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('address', '', array('class' => 'session form-control')) }}
      <span class="error_msg">{{ $errors->first('b_address') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('email', 'Correo Electrónico (*)', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', '', array('class' => 'session form-control')) }}
      <span class="error_msg">{{ $errors->first('b_email') }}</span>
    </div>

    {{ Form::label('telephone', 'Teléfono (*)', array('class' => 'col-md-2 control-label')) }}
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
<p> Agrega una especialidad representativa del negocio médico ó doctor </p>

<div class="row">
  <div class="form-group">
{{ Form::label('specialty', 'Especialidad', array('class' => 'col-md-2 control-label')) }}
<div class="col-md-3">
      <select name="specialty" class="form-control" id="specialty" style="color:black; font-size:14px">
        @if ($specialties->count())
          @foreach ($specialties as $spe)
            <option value="{{ $spe->S_ID }}">{{ $spe->S_name }}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>
</div>
    <br>

<p> Agrega una introducción breve de 150 caracteres de lo más representativo del negocio</p>

<div class="row">
  <div class="form-group">
    {{ Form::label('introduction', 'Introducción (*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('introduction', '', ['class' => 'session form-control', 'size' => '1x2', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('b_introduction') }}</span>
    </div>
  </div>
</div>

<br>
<p> Agrega una descripción más detallada sobre el negocio</p>
<div class="row">
  <div class="form-group">
    {{ Form::label('description', 'Descripción (*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('description', '', ['class' => 'session form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_description') }}</span>
    </div>
  </div>
</div>

<br>
<p> Agrega una imagen representativa del negocio, esto ayudará a verificar más facilmente la autenticidad del negocio</p>
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


  </div>
</div>

<br>
<p> Redes sociales (opcionales)</p>

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