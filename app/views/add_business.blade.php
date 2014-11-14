@extends('layouts.default')
@section('content')


<div class="container">

  <ol class="breadcrumb">
    <li>{{ link_to('/', 'Volver a inicio') }}</li>
    <li class="active" style="color:#083D5C">Registrar negocio</li>
  </ol>

  @if (Session::has('var'))
   {{ Session::get('var') }}
  @endif

  @if(Auth::check() && Auth::user()->U_level == 1)
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        Como administrador, el registro se reflejará inmediatamente sin verificación previa.
    </div>
  @endif

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
      {{ Form::text('address', '', array('class' => 'session form-control', 'id' => 'address')) }}
      <span class="error_msg">{{ $errors->first('b_address') }}</span>
    </div>
  </div>
</div>

<br>
<div id="map-canvas" style="width:100%; height:250px"></div>
<br>
<div class="row">
¿No encuentras la dirección? Mueve el marcador manualmente y colocalo en la ubicación deseada <a href="#" data-toggle="modal" data-target="#help_map">¿Necesitas ayuda?</a>
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
<div class="col-md-4">
      <select name="specialty" class="form-control" id="specialty" style="color:black; font-size:14px">
        @if ($specialties->count())
          @foreach ($specialties as $spe)
            <option value="{{ $spe->S_ID }}">{{ $spe->S_name }}</option>
          @endforeach
        @endif
      </select>
    </div>
    {{ Form::label('other', 'Otra especialidad', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('other', '', array('class' => 'session form-control')) }}
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
            {{ HTML::image('images/default.jpg') }}
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
        <div>
          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
          <input type="file" name="image"></span>
          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
      </div><br>
      <span class="error_msg">{{ $errors->first('b_image') }}</span>
    </div>


  </div>
</div>

<br>
<p> Redes sociales (opcionales)</p>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook <br>Ej: facebook.com/ejemplo</label>
    <div class="col-md-4">
      {{ Form::text('facebook', '', array('class' => 'session form-control')) }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter <br>Ej: twitter.com/ejemplo</label>
    <div class="col-md-4">
      {{ Form::text('twitter', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin <br>Ej: linkedin.com/in/ejemplo</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', '', array('class' => 'session form-control')) }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube <br>Ej: youtube.com/user/ejemplo</label>
    <div class="col-md-4">
      {{ Form::text('youtube', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
     <label for="google_plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+ <br>Ej: plus.google.com/ejemplo</label>
    <div class="col-md-4">
      {{ Form::text('google_plus', '', array('class' => 'session form-control')) }}
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', '', array('class' => 'session form-control')) }}
    </div>
  </div>
</div>

<br>

<p> Puedes dejar otro teléfono de contacto para que los administradores puedan corroborar los datos más facilmente </p>

<br>

<div class="row">
  <div class="form-group">
    <label for="contact-phone" class="col-md-2 control-label">Teléfono de Contacto</label>
    <div class="col-md-4">
      {{ Form::text('contact-phone', '', array('class' => 'session form-control')) }}
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
              {{ Form::text('latitude', '', array('class' => 'session form-control', 'id' => 'latitude')) }}
            </div>

            {{ Form::label('longitude', 'Longitud', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
              {{ Form::text('longitude', '', array('class' => 'session form-control focus', 'id' => 'longitude')) }}
            </div>
          </div>
        </div>
        <br>
        <img src="{{url('images/map.png')}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="accept_btn">Aceptar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{ Form::close() }}
</div>

<script>

$(document).ready(function() {
  $('#negocios').addClass('active');

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