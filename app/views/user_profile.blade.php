@extends('layouts.default')
@section('content')

<div class="container">
  <div class="space10"></div> 
  @if (Session::has('var'))
    {{ Session::get('var') }}
  @endif
  <div class="row">
  
  <div class="space40"></div>     
  <!-- Tabs -->
  <div class="col-md-12">
    <div class="tabbable">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i>Mi cuenta</a></li>
        <li class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-star"></i>Mis reseñas</a></li>
        <li class=""><a href="#tab1-3" data-toggle="tab"><i class="fa fa-user"></i>Vista previa perfil</a></li>
        <!-- <li class=""><a href="#tab1-4" data-toggle="tab"><i class="fa fa-building"></i>Mis Fotos</a></li> -->
      </ul>
          
      <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
            {{ Form::open(array('url' => 'edit_user', 'files'=> true)) }}
          <div class="row">
            <div class="col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="max-width: 300px; max-height:270px;">
                    @if(Auth::user()->U_oauth_provider == '1')
                      <img src="{{Auth::user()->U_profile_image}}">
                    @else
                      @if(Auth::user()->U_profile_image != "")
                        <img src="../app/images_server/{{Auth::user()->U_profile_image}}">
                      @else
                        <img src="../app/images/default_picture.png">
                      @endif
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
            <div class="col-md-8">

              <!-- EMPIEZA CODIGO COPYPASTE -->
              <h2 class="sub-header">Informacion Personal</h2>
              <div class="space20"></div>

            

<div class="row">
  <div class="form-group">
    {{ Form::label('firstname', 'Nombre(s)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('firstname', Auth::user()->U_firstname, array('class' => 'form-control profile')) }}
      <span class="error_msg">{{ $errors->first('U_firstname') }}</span>
    </div>

    {{ Form::label('lastname', 'Apellido(s)', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('lastname', Auth::user()->U_lastname, array('class' => 'form-control profile')) }}
      <span class="error_msg">{{ $errors->first('U_lastname') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('username', 'Nombre de Usuario', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('username', Auth::user()->U_username, array('class' => 'form-control profile')) }}
    <span class="error_msg">{{ $errors->first('U_username') }}</span>
    </div>
    {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', Auth::user()->U_email, array('class' => 'form-control profile')) }}
    <span class="error_msg">{{ $errors->first('U_email') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">

    {{ Form::label('birthdate', 'Fecha de Nacimiento', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::input('date', 'birthdate', Auth::user()->U_birthdate, ['class' => 'form-control profile', 'placeholder' => 'Date']) }}

    </div>
  </div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('about', 'Acerca de', array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('about', Auth::user()->U_description, ['class' => 'form-control profile', 'size' => '1x5']) }}
      
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
    <div class="col-md-4">
      {{ Form::text('facebook', Auth::user()->U_facebook, array('class' => 'form-control profile')) }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
    <div class="col-md-4">
      {{ Form::text('twitter', Auth::user()->U_twitter, array('class' => 'form-control profile')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', Auth::user()->U_linkedin, array('class' => 'form-control profile')) }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
    <div class="col-md-4">
      {{ Form::text('youtube', Auth::user()->U_youtube, array('class' => 'form-control profile')) }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google-plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
    <div class="col-md-4">
      <input type="text" class="form-control profile" id="google-plus" value="">
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
    <div class="col-md-4">
      {{ Form::text('website', Auth::user()->U_website, array('class' => 'form-control profile')) }}
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
    <input type="hidden" id="user_state" value="{{ Auth::user()->U_state}}">
    <input type="hidden" id="user_city" value="{{ Auth::user()->U_city}}">

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
        {{ Form::text('hometown', Auth::user()->U_hometown, array('class' => 'form-control profile')) }}
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
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      <input type="submit" class="form-control btn btn-primary profile" name="submit" id="submit" value="Guardar">
    </div>
  </div>
</div>
<div class="col-md-4"></div>
{{ Form::close() }}
            </div>
          </div>
        </div>

        <!--EMPIEZA TAB2 -->
        <div class="tab-pane" id="tab1-2">
          <div class="row">
                
            <div class="col-md-8">
              <h3>Reseñas</h3>
              @if($reviews->count())
                @foreach($reviews as $review)
                  <div class="row">
                    <div class="col-md-2">  
                    <div class="space20"></div>       
                      <img src="{{url('../app/images_server/' . $review->b_image)}}" alt="Doctor default picture">
                      
                    </div>  
                    
                    <div class="col-md-6">
                      <a href="{{ url('doctor/'.$review->B_ID) }}"><h3 style="margin-bottom: 0px;">{{$review->b_name}}</h3></a>
                      <span class="social-container">
                  <span class="social-2">
                      <a href="#"><a style="cursor: pointer;"><i class="fa fa-envelope-o"></i></a>

                    <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $review->b_telephone }}">
                      <i class="fa fa-phone"></i>
                    </a> 
                    <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $review->b_address }}">
                      <i class="fa fa-map-marker"></i>
                    </a>
                    <a href="{{ url('doctor/'.$review->B_ID) }}#comments"><strong>{{' ' .$review->comments_count}} reseña(s) en total</strong></a>
                  </span>
                </span>
                      <br><span style="font-size:15px">
                      <?php  $r = $rating = $review->C_rating ?>
                        @while($rating)
                          <i class="fa fa-star"></i>
                          <?php $rating--; ?>
                        @endwhile
                        @while($r < 5)
                          <i class="fa fa-star-o"></i>
                          <?php $r++; ?>
                        @endwhile
                      </span>
                      <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                        </h6>
                      <p align="justify">
                        {{$review->C_content}}
                      </p>                
                      <div class="space20"></div> 
                    </div> 
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="divider"></div> 
                        <div class="space20"></div> 
                      </div>
                    </div>
                  </div> 
                @endforeach
              @endif

                               

              
            </div>
          </div>
        </div>

        <!--EMPIEZA TAB3 -->        
        <div class="tab-pane" id="tab1-3">
          <div class="row">
            <div class="col-md-4">
            @if(Auth::user()->U_oauth_provider == '1')
              <img src="{{Auth::user()->U_profile_image}}" style="max-width: 200px; max-height:270px;">
            @else
              @if(Auth::user()->U_profile_image != "")
                <img src="../app/images_server/{{Auth::user()->U_profile_image}}" style="max-width: 200px; max-height:270px;">
              @else
                <img src="../app/images/default_picture.png" style="max-width: 200px; max-height:270px;">
              @endif
             @endif
            </div>
            <div class="col-md-4">
              <h3>{{Auth::user()->U_firstname . ' ' . Auth::user()->U_lastname}}</h3>
              <p>Tijuana, Baja California, México <a href="#" style="margin-left:10px;"><span class="fa fa-pencil-square-o"></span> {{$reviews->count()}} reseña(s)</a></p>
              
              <h5>Acerca de mí</h5>
                <p>{{Auth::user()->U_description}}</p>
                <h5>Encuentrame en</h5>
                <div class="social-container">
                  <div class="social-2">
                    @if(Auth::user()->U_facebook != '')
                      <a href="{{ url('//www.facebook.com/' . Auth::user()->U_facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if(Auth::user()->U_twitter != '')
                      <a href="{{ url('//www.twitter.com/' . Auth::user()->U_twitter) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if(Auth::user()->U_youtube != '')
                      <a href="{{ url('//www.youtube.com/user/' . Auth::user()->U_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if(Auth::user()->U_linkedin != '')
                      <a href="{{ url('//www.linkedin.com/in/' . Auth::user()->U_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    @endif
                    @if(Auth::user()->U_website != '')
                      <a href="{{ url('//' . Auth::user()->U_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                  </div>  
                </div> 
            </div>
          </div>
        </div>

            <div class="tab-pane" id="tab1-4">
              <h3>Mis Fotos</h3>
         <section id="portfolio-items" style="position: relative; overflow: hidden; height: 426px;" class="isotope">            
      <ul class="row portfolio popup-gallery">   

        <li> 
          <!-- Gallery Item -->
          <article class="col-md-2 col-sm-4 col-xs-6 project html bootstrap isotope-item" data-tags="bootstrap,html" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
            <div class="container-image">
              <!-- Image -->
              <img src="img/gallery/01@2x.jpg" alt="" width="213" height="213">
              <!-- Item Link -->  
              <a href="img/gallery/01.jpg" title="">
                <!-- Icon -->  
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
          <!-- Gallery Item End -->
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project html wordpress photography isotope-item" data-tags="photography,wordpress,html" style="position: absolute; left: 0px; top: 0px; transform: translate3d(212px, 0px, 0px);">
            <div class="container-image">
              <img src="http://www.entiri.com/riley-1.3/img/gallery/01.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/02.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project photography isotope-item" data-tags="photography" style="position: absolute; left: 0px; top: 0px; transform: translate3d(424px, 0px, 0px);">
            <div class="container-image">
              <img src="img/gallery/03@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/03.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project bootstrap html isotope-item" data-tags="html,bootstrap" style="position: absolute; left: 0px; top: 0px; transform: translate3d(636px, 0px, 0px);">
            <div class="container-image">
              <img src="img/gallery/04@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/04.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project bootstrap webdesign isotope-item" data-tags="webdesign,bootstrap" style="position: absolute; left: 0px; top: 0px; transform: translate3d(848px, 0px, 0px);">
            <div class="container-image">
              <img src="img/gallery/05@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/05.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project html wordpress isotope-item" data-tags="wordpress,html" style="position: absolute; left: 0px; top: 0px; transform: translate3d(1060px, 0px, 0px);">
            <div class="container-image">
              <img src="img/gallery/06@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/06.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project bootstrap webdesign isotope-item" data-tags="webdesign,bootstrap" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 213px, 0px);">
            <div class="container-image">
              <img src="img/gallery/07@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/07.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project bootstrap html photography isotope-item" data-tags="photography,html,bootstrap" style="position: absolute; left: 0px; top: 0px; transform: translate3d(212px, 213px, 0px);">
            <div class="container-image">
              <img src="img/gallery/08@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/08.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project webdesign html isotope-item" data-tags="html,webdesign" style="position: absolute; left: 0px; top: 0px; transform: translate3d(424px, 213px, 0px);">
            <div class="container-image">
              <img src="img/gallery/09@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/09.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
        <li> 
          <article class="col-md-2 col-sm-4 col-xs-6 project bootstrap photography isotope-item" data-tags="photography,bootstrap" style="position: absolute; left: 0px; top: 0px; transform: translate3d(636px, 213px, 0px);">
            <div class="container-image">
              <img src="img/gallery/10@2x.jpg" alt="" width="213" height="213">  
              <a href="img/gallery/10.jpg" title="">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </article>
        </li> 
          
 
    
      </ul>              
    </section>
              </div> 
          </div>
          
        </div>
        <div class="space40"></div>   
      </div>
        <!-- Tabs End -->

    </div>
  </div>

    <div class="space20"></div>

    <script>
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
      url: "{{url('getStates')}}",
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
      url: "{{url('getCities')}}",
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
        url: "{{url('getCities')}}",
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