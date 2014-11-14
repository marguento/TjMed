@extends('layouts.default')
@section('content')

<div class="container">
  <div class="space10"></div> 
  <div class="row">
  
  <div class="space40"></div>     
  <!-- Tabs -->
  <div class="col-md-12">
    <div class="tabbable">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i>Perfil</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
    <div class="row">
      <div class="col-md-4">
        @if($user->U_oauth_provider == '1')
          <img src="{{$user->U_profile_image}}" style="max-width: 200px; max-height:270px;">
        @else
          @if($user->U_profile_image != "")
            <img src="{{url('images_server/' . $user->U_profile_image)}}" style="max-width: 200px; max-height:270px;">
          @else
            <img src="{{url('images/default_picture.png')}}" style="max-width: 200px; max-height:270px;">
          @endif
        @endif
      </div>
      <div class="col-md-4">
        <h3>{{$user->U_firstname . ' ' . $user->U_lastname}}</h3>
        <p>Tijuana, Baja California, México <a href="#" style="margin-left:10px;"><span class="fa fa-pencil-square-o"></span>  reseña(s)</a></p>
              
              @if($user->U_description)
              <h5>Acerca de mí</h5>
                <p>{{$user->U_description}}</p>
              @endif
                <div class="social-container">
                  <div class="social-2">
                    @if($user->U_facebook != '')
                      <a href="{{ url('//www.facebook.com/' . $user->U_facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if($user->U_twitter != '')
                      <a href="{{ url('//www.twitter.com/' . $user->U_twitter) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if($user->U_youtube != '')
                      <a href="{{ url('//www.youtube.com/user/' . $user->U_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if($user->U_linkedin != '')
                      <a href="{{ url('//www.linkedin.com/in/' . $user->U_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    @endif
                    @if($user->U_website != '')
                      <a href="{{ url('//' . $user->U_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                  </div>  
                </div> 
      </div>
    </div>
</div>
</div>  
                </div> 
      </div>
    </div>
</div>
<div class="space20"></div>

@stop