@extends('admin.index')
@section('content_admin')

<ol class="breadcrumb">
  <li>{{ link_to('admin/doctores', 'Volver a Administración de Doctores') }}</li>
</ol>

 @if (Session::has('var'))
   {{ Session::get('var') }}
  @endif

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
    {{ Form::label('alternative_phone', 'Teléfono opcional:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('alternative_phone', '', array('class' => 'form-control')) }}
    </div>
</div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('aimed', 'Atención a:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    {{ Form::select('aimed', $aimed, '', ['class' => 'form-control', 'id' => 'aimed']) }}
  </div>
  {{ Form::label('user_owner', 'Usuario Propietario:', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
    {{ Form::select('user_owner', $user_owner, 'none', ['class' => 'form-control', 'id' => 'user_owner']) }}
  </div>
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
            {{ HTML::image('images/default.jpg') }}
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
      {{ Form::select('priority', ['0', '1'], '', ['class' => 'form-control', 'id' => 'priority']) }}
    </div>


  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="business_hours" class="col-md-2 control-label">Horas de atención</label>
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
                  <td>{{ Form::text('open_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
              @endfor
            </tr>
            <tr>
              <td>1ero Cerrado</td>
              @for ($i = 1; $i < 8; $i++)
                  <td>{{ Form::text('close_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
              @endfor
            </tr>
            <tr>
              <td>2do Abierto</td>
              @for ($i = 1; $i < 8; $i++)
                  <td>{{ Form::text('open_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
              @endfor
            </tr>
            <tr>
              <td>2do Cerrado</td>
              @for ($i = 1; $i < 8; $i++)
                  <td>{{ Form::text('close_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
              @endfor
            </tr>
          </tbody>
        </table>
    </div>
</div>
<br>
<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_facebook') }}</span>
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_twitter') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_linkedin') }}</span>
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_youtube') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google_plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
    <div class="col-md-4">
      {{ Form::text('google_plus', '', array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('b_google_plus') }}</span>
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', '', array('class' => 'form-control')) }}
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

<script>

$(document).ready(function() {
  $('#doctor').addClass('active');

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