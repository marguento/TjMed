@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

@if (Session::has('ver'))
  <input type="hidden" id="verified" value="1">
@else
  <input type="hidden" id="verified" value="0">
@endif

<ol class="breadcrumb">
  <li>{{ link_to('admin/doctores', 'Volver a Administración de Doctores') }}</li>
</ol>

<div class="row">
  <div class="col-md-6">
    <h2 class="sub-header">Editar doctor: {{ $doctor->b_name}} </h2>
  </div>
  <div class="col-md-6">
    <button class="btn color-4 btn-sm del_modal" style="float:right;"> Eliminar doctor </button>
  </div>
</div>

<div class="tabbable">

<ul class="nav nav-tabs">
  <li class="active"><a href="#principal" data-toggle="tab">Datos Principales</a></li>
  <li><a href="#extra" data-toggle="tab">Categorías y Etiquetas</a></li>
  <li><a href="#review" data-toggle="tab">Reseñas</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane fade in active" id="principal">

{{ Form::open(array('url' => 'doctores/update', 'files' => true)) }}
{{ Form::hidden('curr_doctor', $doctor->B_ID, array('id' => $doctor->B_ID, 'class' => 'curr_doctor')) }}

<div class="row">
  <div class="form-group">
    {{ Form::label('created', 'Creado:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    <span> {{ $doctor->b_joined_date }} </span>
    </div>

    {{ Form::label('created_user', 'Creado por:', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      <span> <a href="{{url('admin/editar/'.$doctor->b_created_user)}}">{{ $doctor->create_user }}</a> </span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('user_owner', 'Usuario Propietario:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    {{ Form::select('user_owner', $user_owner, $doctor->b_user_owner, ['class' => 'form-control', 'id' => 'user_owner']) }}
  </div>
  </div>
</div>

<br>

<div class="col-md-12">
  <div class="space20"></div>
  <div class="divider"></div>
  <div class="space20"></div>
</div>


<div class="row">
  <div class="form-group">
    {{ Form::label('name', 'Nombre(*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('name', $doctor->b_name, array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_name') }}</span>
    </div>

    {{ Form::label('address', 'Dirección', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('address', $doctor->b_address, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_address') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('name_eng', 'Nombre en inglés (*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('name_eng', $doctor->b_name_eng, array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_name_eng') }}</span>
    </div>
  </div>
</div>

<br>

<input id="map_c" type="hidden" value="{{ $doctor->b_map }}">
<div id="map-canvas" style="width:100%; height:250px"></div>
<br>
<div class="row">
¿No encuentras la dirección? Mueve el marcador manualmente y colocalo en la ubicación deseada <a href="#"  data-toggle="modal" data-target="#help_map">¿Necesitas ayuda?</a>
</div>

<br>
<b>¿Tomar en cuenta la ubicación de la dirección o el marcador?</b><br><br>
<div class="row">
  <div class="form-group">
    {{ Form::label('map_c', 'Dirección', array('class' => 'col-sm-1 control-label')) }}
    <div class="col-md-1">
      {{ Form::radio('map_c', '0', true) }}
    </div>

    {{ Form::label('map_c', 'Marcador (coordenadas)', array('class' => 'col-md-1 control-label')) }}
    <div class="col-md-1" class="error">
      {{ Form::radio('map_c', '1') }}
    </div>
  </div>
</div>



<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', $doctor->b_email, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_email') }}</span>
    </div>

    {{ Form::label('telephone', 'Teléfono', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('telephone', $doctor->b_telephone, array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('b_telephone') }}</span>
    </div>

    
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('cellphone', 'Celular', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('cellphone', $doctor->b_cellphone, array('class' => 'form-control')) }}
    </div>
    {{ Form::label('alternative_phone', 'Teléfono opcional:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('alternative_phone', $doctor->b_alternative_phone, array('class' => 'form-control')) }}
  </div>
</div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('aimed', 'Atención a:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    {{ Form::select('aimed', $aimed, $doctor->b_aimed, ['class' => 'form-control', 'id' => 'aimed']) }}
  </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('introduction', 'Introducción(*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('introduction', $doctor->b_introduction, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_introduction') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('introduction_eng', 'Introducción en inglés(*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('introduction_eng', $doctor->b_introduction_eng, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_introduction_eng') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('description', 'Descripción(*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('description', $doctor->b_description, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_description') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('description_eng', 'Descripción en inglés(*)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('description_eng', $doctor->b_description_eng, ['class' => 'form-control', 'size' => '1x5']) }}
      <span class="error_msg">{{ $errors->first('b_description_eng') }}</span>
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
        <div class="fileinput-new thumbnail" style="max-width: 300px; max-height:270px;">
          @if($doctor->b_image !="")
            {{ HTML::image('images_server/' . $doctor->b_image) }}
          @else
            {{ HTML::image('images/default.jpg') }}
          @endif
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
        <div>
          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
          <input type="file" name="image"></span>
          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
      </div>
      <br>
    <span class="error_msg">{{ $errors->first('b_image') }}</span>
    </div>


    {{ Form::label('priority', 'Prioridad', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::select('priority', ['Negocio Básico', 'Negocio Premium'], $doctor->b_priority, ['class' => 'form-control', 'id' => 'priority']) }}
    </div>


  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="business_hours" class="col-md-1 control-label">Horas de atención</label>
    <div class="col-md-1">
      <button type="button" 
        class="btn btn-default btn-xs" 
        id="hour_help" 
        data-container="body" 
        data-toggle="popover" 
        data-placement="right">?</button>
    </div>
    <div class="col-md-10">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miércoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Sábado</th>
              <th>Domingo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1ero Abierto</td>
              @for ($i = 1; $i < 8; $i++)
                @if($hours->count())
                  <td>{{ Form::text('open_1[' . $i .']', $hours[$i-1]->open_hour_1, array('class' => 'form-control')) }}</td>
                @else
                  <td>{{ Form::text('open_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
                @endif
              @endfor
            </tr>
            <tr>
              <td>1ero Cerrado</td>
              @for ($i = 1; $i < 8; $i++)
                @if($hours->count())
                  <td>{{ Form::text('close_1[' . $i .']', $hours[$i-1]->close_hour_1, array('class' => 'form-control')) }}</td>
                @else
                  <td>{{ Form::text('close_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
                @endif
              @endfor
            </tr>
            <tr>
              <td>2do Abierto</td>
              @for ($i = 1; $i < 8; $i++)
                @if($hours->count())
                  <td>{{ Form::text('open_2[' . $i .']', $hours[$i-1]->open_hour_2, array('class' => 'form-control')) }}</td>
                @else
                  <td>{{ Form::text('open_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
                @endif
              @endfor
            </tr>
            <tr>
              <td>2do Cerrado</td>
              @for ($i = 1; $i < 8; $i++)
                @if($hours->count())
                  <td>{{ Form::text('close_2[' . $i .']', $hours[$i-1]->close_hour_2, array('class' => 'form-control')) }}</td>
                @else
                  <td>{{ Form::text('close_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
                @endif
              @endfor
            </tr>
          </tbody>
        </table>
    </div>
</div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', $doctor->b_facebook, array('class' => 'form-control')) . 
      'Ej: facebook.com/ejemplo'}}
      <span class="error_msg">{{ $errors->first('b_facebook') }}</span>
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', $doctor->b_twitter, array('class' => 'form-control')) . 'Ej: twitter.com/ejemplo'}}
      <span class="error_msg">{{ $errors->first('b_twitter') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', $doctor->b_linkedin, array('class' => 'form-control')) . 'Ej: linkedin.com/in/ejemplo'}}
      <span class="error_msg">{{ $errors->first('b_linkedin') }}</span>
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', $doctor->b_youtube, array('class' => 'form-control')) . 'Ej: youtube.com/user/ejemplo'}}
      <span class="error_msg">{{ $errors->first('b_youtube') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google_plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
    <div class="col-md-4">
      {{ Form::text('google_plus', $doctor->b_google_plus, array('class' => 'form-control')) . 'Ej: plus.google.com/ejemplo'}}
      <span class="error_msg">{{ $errors->first('b_google_plus') }}</span>
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', $doctor->b_website, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_website') }}</span>
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

<div class="modal fade" id="help_map">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Registrar dirección del negocio</h4>
      </div>
      <div class="modal-body">
        <p>Puedes ingresar las coordenadas de tu direccion directamente. <a href="//maps.google.com" target="_blank">Ingresa aquí</a></p>
        <div class="row">
          <div class="form-group">
            {{ Form::label('latitude', 'Latitud', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-md-4">
              {{ Form::text('latitude', $doctor->b_latitude, array('class' => 'session form-control', 'id' => 'latitude')) }}
            </div>

            {{ Form::label('longitude', 'Longitud', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
              {{ Form::text('longitude', $doctor->b_longitude, array('class' => 'session form-control focus', 'id' => 'longitude')) }}
            </div>
          </div>
        </div>
        <br>
        <img src="{{url('images/map.png')}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="accept_btn">Aceptar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}
</div>


<div class="tab-pane" id="extra">
  <h4>Categorías</h4>

<div class="row">
  {{ Form::open(array('url' => 'doctores/add_cat')) }}
  {{ Form::hidden('curr_doctor', $doctor->B_ID) }}
      <div class="col-md-3">
        <select name="category" class="form-control" id="category" style="color:black; font-size:14px">
              @if ($categories->count())
                @foreach ($categories as $cat)
                  <option value="{{ $cat->C_ID }}">{{ $cat->C_name }}</option>
                @endforeach
              @endif
        </select>
      </div>
      <div class="col-md-3">
        <select name="speciality" class="form-control" id="speciality" style="color:black; font-size:14px">
          <option selected="selected"></option>
        </select>
      </div>
      <div class="col-md-3">
        <button class="btn btn-default btn-sm" type="submit" id="save_cat" style="font-size:16px; padding:5px 20px 5px 20px;">Guardar</button>
      </div>
  {{ Form::close() }}
</div> 

  <div class="space20"></div>
  <table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead style="background:#0b7297">
      <tr>
        <th>#</th>
        <th>Especialidad</th>
        <th>Categoría</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if ($cat_v->count())
      <?php $i = 1; ?>
        @foreach ($cat_v as $cv)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $cv->S_name }}</td>
            <td>{{ $cv->C_name }}</td>
            <td><a href="#" class="del_cat" id="del_{{ $cv->S_ID }}"><span class="fa fa-times uicon udel" style="font-size:14px"></span></a></td>
          </tr>
          <?php $i++; ?>
        @endforeach
      @else 
        <h5> No hay especialidades registradas para este negocio o doctor </h5>
      @endif
    </tbody>
  </table> 

  <div class="col-md-12">
    <div class="space20"></div>
    <div class="divider"></div>
    <div class="space20"></div>
  </div>

  <h4>Etiquetas</h4>
    <div class="row">
      {{ Form::open(array('url' => 'doctores/add_tag')) }}
      {{ Form::hidden('curr_doctor', $doctor->B_ID) }}
    <div class="form-group">
      <div class="col-md-4">
        {{ Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Registrar etiqueta')) }}
      </div>
      <div class="col-md-3">
        <button class="btn btn-default btn-sm" type="submit" style="font-size:16px; padding:5px 20px 5px 20px;">Guardar</button>
      </div>
    </div>
  </div>


  {{ Form::close() }}

  <div class="space20"></div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead style="background:#0b7297">
    <tr>
      <th>#</th>
      <th>Etiqueta</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
     @if ($tag_v->count())
      <?php $i = 1; ?>
        @foreach ($tag_v as $tv)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $tv->T_name }}</td>
            <td><a href="#" class="del_tag" id="del_{{ $tv->T_ID }}"><span class="fa fa-times uicon udel" style="font-size:14px"></span></a></td>
          </tr>
          <?php $i++; ?>
        @endforeach
      @else 
        <h5> No hay etiquetas registradas para este negocio o doctor </h5>
      @endif
    </tbody>
  </table> 

</div>

    <div class="tab-pane" id="review">
      
      <h3>Reseñas ({{ $comments->count() }})</h3>
      <div class="space10"></div>
      @if ($comments->count())
        @foreach($comments as $comment)
          <div class="blog-comment">
            <div class="user-image">
              @if($comment->U_profile_image != "")
                @if(substr($comment->U_profile_image,0,5) == 'https')
                  <img src="{{$comment->U_profile_image}}">
                @else
                  <img src="../../images_server/{{$comment->U_profile_image}}">
                @endif
              @else
                <img src="../../images/default_picture.png">
              @endif
            <!--<i class="fa fa-user"></i>--></div> 
              <div class="comment-data">
                <h4><a href="{{url('admin/editar/'.$comment->C_user)}}">{{ $comment->U_firstname . ' ' . $comment->U_lastname }}</a>
                  <span style="font-size:20px">
                    <?php  $r = $rating = $comment->C_rating ?>
                    @while($rating)
                      <span><i class="fa fa-star"></i></span>
                      <?php $rating--; ?>
                    @endwhile
                    @while($r < 5)
                      <span><i class="fa fa-star-o"></i></span>
                      <?php $r++; ?>
                    @endwhile
                </span></h4>
                <p>{{ $comment->C_datetime_created }}<a href="#" class="reply-link"><i class="fa fa-thumbs-o-up"></i></a>
                  <a href="#" class="reply-link"><i class="fa fa-thumbs-o-down"></i></a></p>
                <p>{{ $comment->C_content }}</p>
                <a href="{{url('admin/del_rev/'.$comment->C_ID .'/' . $doctor->B_ID)}}" style="color:red">Eliminar reseña </a>
                <div class="divider"></div>           
              </div> 
            </div>
        <div class="space30"></div> 
        @endforeach
      @else
        <h5> Aún no hay reseñas para este doctor o negocio médico</h5>
      @endif
    </div>

  </div>
</div>

<div class="modal fade" id="del_doc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar doctor o negocio</h4>
      </div>
      <div class="modal-body">
        Al eliminar este doctor también se borrará todo registro que lo contenga. 
        ¿Está seguro de realizar esta acción?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="del_doctor">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>

$(document).ready(function() {
  $('#doctor').addClass('active');
  $('#doctor_table').dataTable();
  $('#doctorv_table').dataTable();

  var popoverTemplate = ['<div class="popover">',
        '<div class="arrow"></div>',
        '<h3 class="popover-title"></h3>',
        '<div class="popover-content">',
        '</div>',
        '</div>'].join('');

  var title = "Horario reglas";

    var content = ['<ul><li style="line-height:24px;"> Introducir el horario en el siguiente formato: "18:00"</li>',
            '<li style="line-height:24px;"> 00:00 a 00:00 en el primer set significa 24 horas </li>',
            '<li style="line-height:24px;"> Si se dejan todos los campos vacíos de un día, se tomará como Cerrado </li></ul>' ].join('');

  $('#hour_help').popover({template:popoverTemplate,content:content, title:title, html:true});

  var geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 15
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    draggable:true
  });

  var $radios = $('input:radio[name=map_c]');
  var map_c = $('#map_c').val();

  if(map_c == 1)
  {
    $radios.filter('[value=1]').prop('checked', true);
  } else {
    $radios.filter('[value=0]').prop('checked', true);
  }
    

  initialize();

  $("#address").keyup(function () {
      maps();
   });

  $('.del_modal').on('click', function() {
    $('#del_doc').modal('show');
  });

  $('#del_doctor').on('click', function() {
    var b_id = $('.curr_doctor').attr('id');
    window.location.href = '../disable/' + b_id;
  });

   if($('#verified').val() == 1) 
  {
     $('.nav-tabs a[href="#extra"]').tab('show');
  } 

  $('.del_cat').on('click',function () {
    var cat = $(this).attr('id').substring(4);
    var b_id = $('.curr_doctor').attr('id');
    window.location.href = 'del_cat/' + cat + '/' + b_id;
  });

  $('.del_tag').on('click',function () {
    var tag = $(this).attr('id').substring(4);
    var b_id = $('.curr_doctor').attr('id');
    window.location.href = 'del_tag/' + tag + '/' + b_id;
  });

  var id = $('#category').val();
  var dataString = 'id='+ id;

  $.ajax
  ({
    type: "POST",
    url: "get_specialties",
    data: dataString,
    cache: false,
    success: function(html)
    {
      $("#speciality").html(html);
      } 
  });

  $("#category").change(function()
  {
    var id = $(this).val();
    var dataString = 'id='+ id;

    $.ajax
    ({
      type: "POST",
      url: "get_specialties",
      data: dataString,
      cache: false,
      success: function(html)
      {
        $("#speciality").html(html);
      } 
    });
 });

  function initialize() {
      if(map_c == 1)
      {
        var lat = $('#latitude').val();
        var lng = $('#longitude').val();
        var myLatlng = new google.maps.LatLng(lat, lng);
        map.setCenter(myLatlng);
        marker.setPosition(map.getCenter());
      } else {
        var address = $('#address').val();
        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          marker.setPosition(map.getCenter());
        } else {
          var myLatlng = new google.maps.LatLng(32.4981863, -116.9626808);
          map.setCenter(myLatlng);
          marker.setPosition( map.getCenter());
        }
       });
      }

      google.maps.event.addListener(marker, 'dragend', function() {
        var $radios = $('input:radio[name=map_c]');
        $radios.filter('[value=1]').prop('checked', true);
        c = marker.getPosition();
        $('#latitude').val(c.lat());
        $('#longitude').val(c.lng());
      });

       $("#accept_btn").click(function () {
        var $radios = $('input:radio[name=map_c]');
        $radios.filter('[value=1]').prop('checked', true);
        var myLatlng = new google.maps.LatLng($('#latitude').val(), $('#longitude').val());
          map.setCenter(myLatlng);
          c = map.getCenter();
          marker.setPosition(c);
      });
    }

    function maps() 
  {
    var address = document.getElementById('address').value;
    if(address == "")
    {
      address = "Tijuana";
    }

    var c;

    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        c = map.getCenter();
        marker.setPosition(c);
        $('#latitude').val(c.lat());
        $('#longitude').val(c.lng());
      } else {
        var myLatlng = new google.maps.LatLng(32.4981863, -116.9626808);
        map.setCenter(myLatlng);
        c = map.getCenter();
        marker.setPosition(c);
        $('#latitude').val(c.lat());
        $('#longitude').val(c.lng());
      }
    }); 
  }

});



</script>

@stop