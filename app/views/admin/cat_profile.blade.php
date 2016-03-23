@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<ol class="breadcrumb">
  <li>{{ link_to('admin/especialidades', 'Volver a Administración de Categorías') }}</li>
</ol>

<h2 class="sub-header">Editar Categoría:  {{ $category->C_name }}</h2>

{{ Form::open(array('url' => 'category/update')) }}
{{ Form::hidden('curr_cat', $category->C_ID) }}

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
    {{ Form::label('title_es', 'Nombre en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('title_es', $category->C_name, array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('C_name') }}</span>
    </div>
    {{ Form::label('title_en', 'Nombre en inglés', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('title_en', $category->C_name_en, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('C_name_en') }}</span>
    </div>
  </div>
</div>

<br>
<h5> Llenar una descripción introductoria de la especialidad en 150 caracteres máximo </h5>
<div class="row">
  <div class="form-group">
    {{ Form::label('introduction_es', 'Introducción en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::textarea('introduction_es', $category->C_introduction, ['class' => 'form-control', 'size' => '1x5', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('C_introduction') }}</span>
    </div>
    {{ Form::label('introduction_en', 'Introducción en inglés', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::textarea('introduction_en', $category->C_introduction_en, ['class' => 'form-control', 'size' => '1x5', 'maxlength' => '150']) }}
      <span class="error_msg">{{ $errors->first('C_introduction_en') }}</span>
    </div>
  </div>
</div>

<br>

<h5> Llenar una descripción detallada y extensa de esta categoría</h5>
<div class="row">
  <div class="form-group">
    {{ Form::label('description_es', 'Descripción en español', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::textarea('description_es', $category->C_description, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('C_description') }}</span>
    </div>
    {{ Form::label('description_en', 'Descripción en inglés', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::textarea('description_en', $category->C_description_en, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('C_description_en') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div class="col-md-4"></div>
    <div class="col-md-2">
      <input type="submit" class="form-control btn btn-primary" name="submit" id="submit" value="Guardar">
    </div>
    
    <div class="col-md-2">
      <button type="button" class="form-control btn btn-danger del_category" id="{{ $category->C_ID }}" style="color: #fff; background-color: #d9534f">Eliminar categoria</button>
    </div>
  </div>
</div>
{{ Form::close() }}
<div class="col-md-4"></div>
<div class="space40"></div>
<h3 class="sub-header">Especialidades de esta categoría ({{ $category->s_count }})</h3>


          <center> <a href="../especialidad/0/{{$category->C_ID}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva especialidad</button></a> </center>
          <div class="space20"></div>

          <div class="table-responsive">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="category_table">
              <thead style="background:#0b7297">
                <tr>
                  <th>Especialidad</th>
                  <th>Introducción</th>
                  <th>Título inglés</th>
                  <th>Introducción en inglés</th>
                </tr>
              </thead>
              <tbody>
                @if ($specialties->count())
                @foreach ($specialties as $specialty)
                <tr>
                  <td><a href="../especialidad/{{$specialty->S_ID}}/{{$category->C_ID}}">{{ $specialty->S_name }}</a></td>
                  <td>{{ $specialty->S_introduction }}</td>
                  <td>{{ $specialty->S_name_en }}</td>
                  <td>{{ $specialty->S_introduction_en }}</td>
                </tr>
                @endforeach
              @endif
              </tbody>
            </table>
            
          </div>
        </div>

<div class="modal fade" id="del_category_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar categoría</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro de realizar la siguiente acción? <br> 
        <b><u>Al eliminar esta categoría se eliminarán todas las especialidades relacionadas a ella.</b></u>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-danger" id="del_category_verified">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$('#especialidades').addClass('active');

$(".del_category").click(function() {
    var id = $(this).attr('id');
    $('#del_category_modal').modal('show');

    $("#del_category_verified").click(function() {
      window.location.href = 'delete/' + id;
    });
  });
 
</script>
@stop