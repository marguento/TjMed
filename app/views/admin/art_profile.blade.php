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


<div class="row">
  <div class="form-group">
    {{ Form::label('title_es', 'Título en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('title_es', $article->A_title, array('class' => 'form-control focus', 'maxlength' => 50)) }}
      <span class="error_msg">{{ $errors->first('A_title') }}</span>
    </div>
  </div>
</div>
<br>
<p> Agrega una imagen representativa del artículo (imagen menor de 2 MB)</p>
<div class="row">
  <div class="form-group">
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="max-width: 300px; max-height:270px;">
          @if($article->A_image !="")
            {{ HTML::image('../app/images_server/' . $article->A_image) }}
          @else
            {{ HTML::image('../app/images/default.jpg') }}
          @endif
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
        <div>
          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
          <input type="file" name="image"></span>
          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>
<h5> Llenar una descripción introductoria del artículo en 150 caracteres máximo </h5>
<div class="row">
  <div class="form-group">
    {{ Form::label('introduction_es', 'Introducción en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10" class="error">
      {{ Form::textarea('introduction_es', $article->A_introduction, ['class' => 'form-control', 'size' => '1x5', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('A_introduction') }}</span>
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

<br><br>

<div class="row">
  <div class="form-group">
    {{ Form::label('author', 'Autor', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::select('author', $authors, Auth::user()->U_username, ['class' => 'form-control', 'id' => 'author']) }}
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