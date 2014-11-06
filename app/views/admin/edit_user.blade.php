@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<ol class="breadcrumb">
  <li>{{ link_to('admin/usuarios', 'Volver a Administración de Usuarios') }}</li>
</ol>

<h2 class="sub-header">Editar Usuario:  {{ $user->U_firstname . ' ' . $user->U_lastname }}</h2>

 {{ Form::model($user, array('route' => array('users.update', $user->U_username), 'method' => 'PUT', 'files'=>true)) }}
 {{ Form::hidden('curr_user', $user->U_username) }}

<div class="row">
  <div class="form-group">
    {{ Form::label('firstname', 'Nombre(s)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('firstname', $user->U_firstname, array('class' => 'form-control focus')) }}
      <span class="error_msg">{{ $errors->first('U_firstname') }}</span>
    </div>

    {{ Form::label('lastname', 'Apellido(s)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('lastname', $user->U_lastname, array('class' => 'form-control')) }}
      <span class="error_msg">{{ $errors->first('U_lastname') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('username', 'Nombre de Usuario', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('username', $user->U_username, array('class' => 'form-control')) }}
    <span class="error_msg">{{ $errors->first('U_username') }}</span>
    </div>
    {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', $user->U_email, array('class' => 'form-control')) }}
    <span class="error_msg">{{ $errors->first('U_email') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="max-width: 300px; max-height:270px;">
          @if($user->U_profile_image != "")
            @if(substr($user->U_profile_image,0,5) == 'https')
              <img class="user_img" src="{{$user->U_profile_image}}">
            @else
              <img class="user_img" src="../../../app/images_server/{{$user->U_profile_image}}">
            @endif
          @else
            <img class="user_img" src="../../../app/images/default_picture.png">
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

    {{ Form::label('birthdate', 'Fecha de Nacimiento', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::input('date', 'birthdate', $user->U_birthdate, ['class' => 'form-control', 'placeholder' => 'Date']) }}

    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('about', 'Acerca de', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('about', $user->U_description, ['class' => 'form-control', 'size' => '1x5']) }}
      
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', $user->U_facebook, array('class' => 'form-control')) }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', $user->U_twitter, array('class' => 'form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', $user->U_linkedin, array('class' => 'form-control')) }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', $user->U_youtube, array('class' => 'form-control')) }}
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
      {{ Form::text('website', $user->U_website, array('class' => 'form-control')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="country" class="col-md-2 control-label">País</label>
    <div class="col-md-4">
      <select name="country" class="form-control" id="country" style="color:black; font-size:14px">
        @if ($countries->count())
          @foreach ($countries as $country)
            @if ($user_c == $country->idCountry)
              <option value="{{ $country->idCountry }}" selected="selected">{{ $country->countryName }}</option>
            @else
              <option value="{{ $country->idCountry }}">{{ $country->countryName }}</option>
            @endif
          @endforeach
        @endif
      </select>
    </div>
    <input type="hidden" id="user_state" value="{{ $user->U_state}}">
    <input type="hidden" id="user_city" value="{{ $user->U_city}}">

    <div id="state_section">
      <label for="state" class="col-md-2 control-label">Estado</label>
      <div class="col-md-4">
        <select name="state" class="form-control" id="state" style="color:black; font-size:14px">
          <option selected="selected"></option>
        </select>
      </div>
    </div>
    <div id="hometown_section">
      <label for="hometown" class="col-md-2 control-label">Localidad</label>
      <div class="col-md-4">
        {{ Form::text('hometown', $user->U_hometown, array('class' => 'form-control')) }}
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div id="city_section">
      <label for="city" class="col-md-2 control-label">Ciudad</label>
      <div class="col-md-4">
        <select name="city" class="form-control" id="city" style="color:black; font-size:14px">
          <option selected="selected"></option>
        </select>
      </div>
    </div>

    <label for="type" class="col-md-2 control-label">Tipo de usuario</label>
    <div class="col-md-4">
      {{ Form::select('type', ['Usuario Regular', 'Administrador', 'Propietario'], $user->U_level, ['class' => 'form-control', 'id' => 'type']) }}
      <!-- <select name="type" class="form-control" id="type" style="color:black; font-size:14px">
          <option value="1" name="1" selected="selected">Administrador</option>
          <option value="2" name="2">Propietario</option>
          <option value="3" name="3">Usuario Regular</option>
      </select> -->
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
<br>
<script>
$('#usuario').addClass('active');

$(document).ready(function(){

    var id = $('#country').val();
       if(id!=157) {
          $('#state_section').hide();
          $('#city_section').hide();
          $('#hometown_section').show();
       } else {
          $('#state_section').show();
          $('#city_section').show();
          $('#hometown_section').hide();
       }

    var city = $('#user_city').val();
    var state = $('#user_state').val();
    $.ajax
    ({
      type: "POST",
      url: "../../getStates",
      data: {state:state},
      cache: false,
      success: function(html)
      {
        $("#state").html(html);
      } 
    });

    $.ajax
    ({
      type: "POST",
      url: "../../getCities",
      data: {state:state, city:city},
      cache: false,
      success: function(html)
      {
        $("#city").html(html);
      } 
    });

    $("#country").change(function()
    {
       var id = $(this).val();
       if(id!=157) {
          $('#state_section').hide();
          $('#city_section').hide();
          $('#hometown_section').show();
       } else {
          $('#state_section').show();
          $('#city_section').show();
          $('#hometown_section').hide();
       }
    });

    $("#state").change(function()
    {
      var state = $(this).val();

      $.ajax
      ({
        type: "POST",
        url: "../../getCities",
        data: {state:state, city:''},
        cache: false,
        success: function(html)
        {
          $("#city").html(html);
        }
    });
  });

});  
</script>
@stop