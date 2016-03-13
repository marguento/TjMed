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
        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i>{{ Lang::get('messages.my_acount_up') }}</a></li>
        <li class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-star"></i>{{ Lang::get('messages.my_reviews_up') }}</a></li>
        <li class=""><a href="#tab1-3" data-toggle="tab"><i class="fa fa-user"></i>{{ Lang::get('messages.preview_up') }}</a></li>
        <!-- <li class=""><a href="#tab1-4" data-toggle="tab"><i class="fa fa-building"></i>Mis Fotos</a></li> -->
      </ul>
          
      <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
            {{ Form::open(array('url' => 'edit_user', 'files'=> true)) }}
          <div class="row">
            <div class="col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="max-width: 300px; max-height:270px;">
                    @if(Auth::user()->U_profile_image != "")
                      @if(substr(Auth::user()->U_profile_image,0,5) == 'https')
                        <img src="{{Auth::user()->U_profile_image}}">
                      @else
                        <img src="images_server/{{Auth::user()->U_profile_image}}">
                      @endif
                    @else
                      <img src="images/default_picture.png">
                    @endif
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">{{ Lang::get('messages.selec_img_up') }}</span><span class="fileinput-exists">{{ Lang::get('messages.change_up') }}</span>
                    <input type="file" name="image"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ Lang::get('messages.remove_up') }}</a>
                  </div>
                </div>
                <br>
                <span class="error_msg">{{ $errors->first('U_profile_image') }}</span> 
            </div>
            <div class="col-md-8">

              <!-- EMPIEZA CODIGO COPYPASTE -->
              <h2 class="sub-header">{{ Lang::get('messages.info_personal_up') }}</h2>
              <div class="space20"></div>

            

<div class="row">
  <div class="form-group">
    {{ Form::label('firstname', Lang::get('messages.name_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4" class="error">
      {{ Form::text('firstname', Auth::user()->U_firstname, array('class' => 'form-control profile')) }}
      <span class="error_msg">{{ $errors->first('U_firstname') }}</span>
    </div>

    {{ Form::label('lastname', Lang::get('messages.first_name_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('lastname', Auth::user()->U_lastname, array('class' => 'form-control profile')) }}
      <span class="error_msg">{{ $errors->first('U_lastname') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('username', Lang::get('messages.username_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('username', Auth::user()->U_username, array('class' => 'form-control profile')) }}
    <span class="error_msg">{{ $errors->first('U_username') }}</span>
    </div>
    {{ Form::label('email', Lang::get('messages.email_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::text('email', Auth::user()->U_email, array('class' => 'form-control profile')) }}
    <span class="error_msg">{{ $errors->first('U_email') }}</span>
    </div>
  </div>
</div>

<br>

<div class="row">

    {{ Form::label('birthdate', Lang::get('messages.born_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-4">
      {{ Form::input('date', 'birthdate', Auth::user()->U_birthdate, ['class' => 'form-control profile', 'placeholder' => 'Date']) }}

    </div>
  </div>

<br>

<div class="row">
  <div class="form-group">
    {{ Form::label('about', Lang::get('messages.about_up'), array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-10">
      {{ Form::textarea('about', Auth::user()->U_description, ['class' => 'form-control profile', 'size' => '1x5']) }}
      
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     {{ Lang::get('messages.facebook_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('facebook', Auth::user()->U_facebook, array('class' => 'form-control profile')) . 
      Lang::get('messages.face_ej_up') }}
    </div>
    <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     {{ Lang::get('messages.twitter_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('twitter', Auth::user()->U_twitter, array('class' => 'form-control profile')) . Lang::get('messages.twitter_ej_up') }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     {{ Lang::get('messages.linkedin_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('linkedin', Auth::user()->U_linkedin, array('class' => 'form-control profile')) . Lang::get('messages.linke_ej_up') }}
    </div>

    <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     {{ Lang::get('messages.youtube_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('youtube', Auth::user()->U_youtube, array('class' => 'form-control profile')) . Lang::get('messages.youtube_ej_up') }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="google-plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     {{ Lang::get('messages.google_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('google_plus', Auth::user()->U_google_plus, array('class' => 'form-control profile')) . Lang::get('messages.google_ej_up') }}
    </div>
    <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     {{ Lang::get('messages.website_up') }}</label>
    <div class="col-md-4">
      {{ Form::text('website', Auth::user()->U_website, array('class' => 'form-control profile')) . Lang::get('messages.website_ej_up') }}
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="form-group">
    <label for="country" class="col-md-2 control-label">{{ Lang::get('messages.country_up') }}</label>
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
      <label for="state" class="col-md-2 control-label">{{ Lang::get('messages.estate_up') }}</label>
      <div class="col-md-4">
        <select name="state" class="form-control" id="state" style="color:black; font-size:14px">
          <option selected="selected"></option>
        </select>
      </div>
    </div>
    <div id="hometown_section">
      <label for="hometown" class="col-md-2 control-label">{{ Lang::get('messages.locality_up') }}</label>
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
      <label for="city" class="col-md-2 control-label">{{ Lang::get('messages.city_up') }}</label>
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
      <input type="submit" class="form-control btn btn-primary profile" name="submit" id="submit" value="{{ Lang::get('messages.save_apa') }}">
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
              <h3>{{ Lang::get('messages.reviews_up') }}</h3>
              @if($reviews->count())
                @foreach($reviews as $review)
                  <div class="row">
                    <div class="col-md-2">  
                    <div class="space20"></div>       
                      <img src="{{url('images_server/' . $review->b_image)}}" alt="Doctor default picture">
                      
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
                    <a href="{{ url('doctor/'.$review->B_ID) }}#comments"><strong>{{' ' .$review->comments_count}} {{ Lang::get('messages.total_reviews_up') }}</strong></a>
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
              @else
              <h5>{{ Lang::get('messages.no_reviews_up') }}</h5>
              @endif

                               

              
            </div>
          </div>
        </div>

        <!--EMPIEZA TAB3 -->        
        <div class="tab-pane" id="tab1-3">
          <div class="row">
            <div class="col-md-4">
              <div class="user-wrapper wrapper">
              @if(Auth::user()->U_profile_image != "")
                @if(substr(Auth::user()->U_profile_image,0,5) == 'https')
                  <img src="{{Auth::user()->U_profile_image}}">
                @else
                  <img src="images_server/{{Auth::user()->U_profile_image}}">
                @endif
              @else
                <img src="images/default_picture.png">
              @endif
            </div>
            </div>
            <div class="col-md-4">
              <h3>{{Auth::user()->U_firstname . ' ' . Auth::user()->U_lastname}}</h3>
              <p>Tijuana, Baja California, México <a href="#" style="margin-left:10px;"><span class="fa fa-pencil-square-o"></span> {{$reviews->count()}} {{ Lang::get('messages.total_reviews_up') }}</a></p>
              
              @if(Auth::user()->U_description)
              <h5>Acerca de mí</h5>
                <p>{{Auth::user()->U_description}}</p>
              @endif
                <div class="social-container">
                  <div class="social-2">
                    @if(Auth::user()->U_facebook != '')
                      <a href="{{ url('//' . Auth::user()->U_facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if(Auth::user()->U_twitter != '')
                      <a href="{{ url('//' . Auth::user()->U_twitter) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if(Auth::user()->U_google_plus != '')
                      <a href="{{ url('//' . Auth::user()->U_google_plus) }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                    @endif
                    @if(Auth::user()->U_youtube != '')
                      <a href="{{ url('//' . Auth::user()->U_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if(Auth::user()->U_linkedin != '')
                      <a href="{{ url('//' . Auth::user()->U_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    @endif
                    @if(Auth::user()->U_website != '')
                      <a href="{{ url('//' . Auth::user()->U_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                  </div>  
                </div> 
            </div>
          </div>
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