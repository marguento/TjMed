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
          <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-star"></i>Reseñas</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab1-1">
            <div class="row">
              <div class="col-md-4">
                <div class="user-wrapper wrapper">
                  @if($user->U_profile_image != "")
                  @if(substr($user->U_profile_image,0,5) == 'https')
                  <img src="{{$user->U_profile_image}}" style="max-width: 200px; max-height:270px;">
                  @else
                  <img src="{{url('images_server/' . $user->U_profile_image)}}" style="max-width: 200px; max-height:270px;">
                  @endif
                  @else
                  <img src="{{url('images/default_picture.png')}}" style="max-width: 200px; max-height:270px;">
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <h3>{{$user->U_firstname . ' ' . $user->U_lastname}}</h3>
                <p>{{ $location }} <a id="review-count" href="#" style="margin-left:10px;"><span class="fa fa-pencil-square-o"></span>  {{ $reviews->count() }} reseña(s)</a></p>

                @if($user->U_description)
                <h5>Acerca de mí</h5>
                <p>{{$user->U_description}}</p>
                @endif
                <div class="social-container">
                  <div class="social-2">
                    @if($user->U_facebook != '')
                    <a href="{{ url($user->U_facebook) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if($user->U_twitter != '')
                    <a href="{{ url($user->U_twitter) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if($user->U_youtube != '')
                    <a href="{{ url($user->U_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if($user->U_linkedin != '')
                    <a href="{{ url($user->U_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    @endif
                    @if($user->U_website != '')
                    <a href="{{ url($user->U_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                  </div>  
                </div> 
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
      </div>  
    </div> 
  </div>
</div>
</div>
<div class="space20"></div>

<script>
  $(document).ready(function(){
    $("#review-count").click(function() {
      $('.nav-tabs a[href="#tab1-2"]').tab('show');
    });
  });
</script>

@stop