@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<?php 
  $pre = "";
  $name = "";
?>

@if( $article->A_ID == 0)
  <?php
    $name = "Nueva entrada";
    ?>
@else
  <?php
    $name = $article->A_title;
    $pre = "Editar artículo: ";
  ?>
@endif

<ol class="breadcrumb">
  <li>{{ link_to('admin/articulos', 'Volver a artículos') }}</li>
  <li class="active" style="color:#083D5C">{{ $name }}</li>
</ol>

<h2 class="sub-header">{{$pre . $name }}</h2>

{{ Form::open(array('url' => 'article/update', 'files' => true)) }}
{{ Form::hidden('curr_art', $article->A_ID) }}

<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>¡Importante!</strong> Llenar todos los datos, tanto en inglés como en español para el cambio
  de idioma.
</div>
<div class="row">
  <div class="form-group">
    <div class="col-md-6">
      <h3> En español </h3>
    </div>
    <div class="col-md-6">
      <h3> En inglés </h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="form-group">
    {{ Form::label('title_es', 'Título en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('title_es', $article->A_title, array('class' => 'form-control focus', 'maxlength' => 50)) }}
      <span class="error_msg">{{ $errors->first('A_title') }}</span>
    </div>
    {{ Form::label('title_en', 'Título en inglés', array('class' => 'col-md-2 control-label', 'maxlength' => 50)) }}
    <div class="col-md-4">
      {{ Form::text('title_en', $article->A_title_en, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('A_title_en') }}</span>
    </div>
  </div>
</div>
<br>
<p> Agrega una imagen representativa del artículo</p>
<div class="row">
  <div class="form-group">
     {{ Form::label('image', 'Imagen (*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::file('image') }}
      <span class="error_msg">{{ $errors->first('A_image') }}</span>
    </div>
  </div>
</div>

<br><br>
<h5> Llenar una descripción introductoria del artículo en 150 caracteres máximo </h5>
<div class="row">
  <div class="form-group">
    {{ Form::label('introduction_es', 'Introducción en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::textarea('introduction_es', $article->A_introduction, ['class' => 'form-control', 'size' => '1x5', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('A_introduction') }}</span>
    </div>
    {{ Form::label('introduction_en', 'Introducción en inglés', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::textarea('introduction_en', $article->A_introduction_en, ['class' => 'form-control', 'size' => '1x5', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('A_introduction_en') }}</span>
    </div>
  </div>
</div>

<br><br>

<h5> Llenar el contenido del artículo</h5>
<div class="row">
  <div class="form-group">
    {{ Form::label('content_es', 'Contenido en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10" class="error">
      {{ Form::textarea('content_es', $article->A_content, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('A_content') }}</span>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
    {{ Form::label('content_en', 'Contenido en inglés', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('content_en', $article->A_content_en, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('A_content_en') }}</span>
    </div>
  </div>
</div>

<br><br>

<h5>Categorías</h5>
<h5>Etiquetas</h5>

<div class="space30"></div>

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
  $('#articulo').addClass('active');
</script>
@stop