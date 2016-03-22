@extends('layouts.default')
@section('content')

<!-- PRIMER RENGLON -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @if ($banners->count())
    <?php $i = 0; ?>
    @foreach ($banners as $banner)
      @if ($i == 0)
        <?php $class = "active"; ?>
      @else
        <?php $class = ""; ?>
      @endif
      <div class="item {{ $class }}">
        <img src="images_server/{{ $banner->image }}" alt="...">
        <div class="carousel-caption"></div>
      </div>
      <?php $i++; ?>
    @endforeach
  @endif
  </div>
</div>
<div class="space60"></div>

<!-- SEGUNDO RENGLON -->
<div>
  <div class="container">
    <div class="row"> 
      <div class="col-md-12">
        <center>
              <h3>
                {{ Lang::get('messages.welcome_title') }}
              </h3>
              <div style="font-size: 20px; line-height:150% ">
               {{ Lang::get('messages.welcome_content') }}
              </div>
            </center>
      </div>     
    </div>
  </div>
</div>   
<div class="space60"></div>

<!-- TERCERO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <h3>{{ link_to("especialidades", Lang::get('messages.tittle_1')) }}</h3>   
        
        <div class="row popup-gallery">        
          <a href="{{ url('categoria/1') }}">
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/E_Clinicas.png" alt="" width="263" height="263">      
            </div>
            <div class="title" style="margin-bottom: 0px;">
                <h4>{{ Lang::get('messages.category_1') }}</h4>
                <br>
            </div>
          </article> 
          </a>

          <a href="{{ url('categoria/2') }}">   
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/E_quiru.png" alt="" width="263" height="263">        
            </div>
            <div class="title" style="margin-bottom: 0px;">   
                <h4>{{ Lang::get('messages.category_2') }}</h4>
                <br>
            </div>
          </article>
          </a> 

          <a href="{{ url('categoria/3') }}">
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/E_medicoquiru.png" alt="" width="263" height="263">         
            </div>
            <div class="title" style="margin-bottom: 0px;">
                        
                <h4>{{ Lang::get('messages.category_3') }}</h4>
                <br>
              
            </div>
          </article> 
          </a>

          <a href="{{ url('categoria/4') }}">
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/E_Laboratorio.png" alt="" width="263" height="263">        
            </div>
            <div class="title" style="margin-bottom: 0px;">
              
                <h4>{{ Lang::get('messages.category_4') }}</h4>
                <br>
              
            </div>
          </article> 
          </a>

          <a href="{{ url('especialidad/28') }}">
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/E_Odonto.png" alt="" width="263" height="263">   
            </div>
            <div class="title" style="margin-bottom: 0px;">
              
                <h4>{{ Lang::get('messages.especiality_1') }}</h4>
                <br>
              
            </div>
          </article> 
          </a>

          <a href="{{ url('especialidad/28') }}">
          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="images/e_Cir plastica.png" alt="" width="263" height="263">   
            </div>
            <div class="title" style="margin-bottom: 0px;">
              
                <h4>{{ Lang::get('messages.especiality_2') }}</h4>
                <br>
              
            </div>
          </article> 
          </a>

      </div>

    </div>
  </div>
</div>
<div class="space60"></div>

<!-- CUARTO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">  
        <a href="{{ url('doctores') }}"><h3>{{ Lang::get('messages.tittle_4') }}</h3></a>
      </div>  
    </div>
  </div>

  <div class="container">  
    <div class="row">
      @if ($business->count())
        @foreach ($business as $bus)
          <div class="col-md-4">    
            <div class="item-box-2">
              <div class="media-container">

                <a href="{{ url('doctor/'.$bus->B_ID) }}" >
                  <div class="img-wrapper wrapper"><img src="{{url('images_server/'.$bus->b_image)}}" alt=""></div></a>
              </div>
              <div class="info-container">
                <a href="{{ url('doctor/'.$bus->B_ID) }}" >
                <h3>{{ $bus->b_name }}</h3>
              </a>
                <h4>
                  <?php $i = 0; ?>
                    @foreach ($cats as $c)
                      @if ($bus->B_ID == $c->B_ID)
                          @if ($i > 0)
                            ,
                          @endif
                          <a href="{{ url('especialidad/'.$c->S_ID) }}" >{{ $c->S_name}}</a>
                         
                         <?php $i++; ?>
                      @endif
                    @endforeach
                    @if($i == 0)
                    @endif
                </h4>
                <span style="font-size:18px">
                  <?php 
                  $rating = $bus->rating;
                  $r = $rate = round($rating); ?>
                  @while($rate > 1)
                    <i class="fa fa-star"></i>
                    <?php $rate--; ?>
                  @endwhile
                            
                  @if($r != $rating)
                    <i class="fa fa-star-half"></i>
                  @else
                    @if($r != 0)
                      <i class="fa fa-star"></i>
                    @endif
                  @endif
                  
                  @while($r < 5)
                    <i class="fa fa-star-o"></i>
                    <?php $r++; ?>
                  @endwhile
                  | <a href="{{ url('doctor/'.$bus->B_ID) }}#comments">{{ $bus->comments_count }} {{ Lang::get('messages.reviews') }}</a>
                </span>
                <br><br>
                <p style="height:100px" align="justify"> {{ $bus->b_introduction }} </p>
                <div class="social-container">
                  <div class="social-2">
                    <!-- <span> {{ $bus->b_email }} </span><br>
                    <span>  </span><br> -->
                    <a style="cursor: pointer;"><i class="fa fa-envelope-o"></i></a>

                    <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $bus->b_telephone }}">
                      <i class="fa fa-phone"></i>
                    </a>
                    <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $bus->b_address }}">
                      <i class="fa fa-map-marker"></i>
                    </a>
                    @if($bus->b_facebook != '')
                      <a href="{{ url('//www.facebook.com/' . $bus->b_facebook) }}"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if($bus->b_twitter != '')
                      <a href="{{ url('//www.twitter.com/' . $bus->b_twitter) }}"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if($bus->b_youtube != '')
                      <a href="{{ url('//www.youtube.com/user/' . $bus->b_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if($bus->b_linkedin != '')
                      <a href="{{ url('//www.linkedin.com/in/' . $bus->b_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    @endif
                    @if($bus->b_website != '')
                      <a href="{{ url('//' . $bus->b_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                  </div>  
                </div> 
              </div>
            </div>
          </div>
        @endforeach
      @else
        <h4> Aún no hay doctores registrados </h4>
      @endif
  
    </div>   
  </div>
  <div class="space60"></div>
</div>  


<!-- QUINTO RENGLON -->
<div>
  <div class="container">
    <div class="row">  
      
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">  
            <h3>{{ Lang::get('messages.tittle_5') }}</h3>
          </div>  
        </div>
        <iframe src="//player.vimeo.com/video/111864448" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
      </div>
        
      <div class="col-md-9"> 
        <div class="row">
          <div class="row">
            <div class="col-md-12">  
              <h3>{{ Lang::get('messages.tittle_6') }}</h3>
            </div>
          </div>

          @if ($comments->count())
            @foreach ($comments as $comment)
              <div class="col-md-4 promo-text">
                <div class="blog-comment">
                  <div class="usr-wrapper wrapper">
                    <a href="{{ url('usuario/' . $comment->C_user) }}">
                      @if($comment->U_profile_image != "")
                        @if(substr($comment->U_profile_image,0,5) == 'https')
                          <img src="{{$comment->U_profile_image}}">
                        @else
                          <img src="images_server/{{$comment->U_profile_image}}">
                        @endif
                      @else
                        <img src="images/default_picture.png">
                      @endif
                    </a>
                  </div> 
                  <div class="comment-data">
                    <a href="{{ url('usuario/' . $comment->C_user) }}"><h4>{{ $comment->U_firstname . ' ' . $comment->U_lastname }}</h4></a>
                    {{ Lang::get('messages.word1') }} <a href="{{ url('doctor/' . $comment->B_ID) }}">{{ $comment->b_name }}</a><br>

                    <span style="font-size:15px">
                      <?php  $r = $rating = $comment->C_rating ?>
                        @while($rating)
                          <i class="fa fa-star"></i>
                          <?php $rating--; ?>
                        @endwhile
                        @while($r < 5)
                          <i class="fa fa-star-o"></i>
                          <?php $r++; ?>
                        @endwhile
                    </span>

                    <p>{{ substr($comment->C_content, 0, 50) . Lang::get('messages.3p')  }}<br> <a href="{{ url('doctor/'.$comment->B_ID) }}#comments">{{ Lang::get('messages.more_title') }}</a></p>     
                  </div> 
                </div>
              </div> 
            @endforeach
          @else
            <h4> Aún no hay reseñas registradas </h4>
          @endif
        </div>             
      </div>   
    </div>
  </div>
  <div class="space60"></div> 
</div> 

<!-- SEXTO RENGLON -->
<div>
  <div class="container">  
    <div class="row">
      <div class="col-md-12">      
        <div class="alert_main">
          
          <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Lang::get('messages.add_bussines_tag1') }}
            <a href="{{ url('agregar') }}">
              <button class="btn btn-default btn-sm" align="right" style="font-size:16px; margin-left:20px;">{{ Lang::get('messages.add_bussines_but1') }}</button>
            </a>
        </div>
      </div>    
    </div> 
  </div>  
  <div class="space60"></div>
</div>  

<!-- TERCER RENGLON -->
<div>      
  <div class="container">
    <div class="row">
      <div class="col-md-9"> 
        
        <div class="row">
          <div class="col-md-12">  
            <a href="{{ url('articulos') }}"><h3>{{ Lang::get('messages.tittle_2') }}</h3></a>
          </div>  
        </div> 

        <div class="row popup-gallery">   
          @if ($articles->count())
            @foreach ($articles as $article)
          <div class="col-md-4 col-sm-6">    
            <div class="item-box" style="padding-bottom: 0px;">
              <div class="media-container">
                <div class="art-wrapper wrapper">
                  {{ HTML::image('images_server/' . $article->A_image) }}
                </div>
              </div>
              <div class="info-container">
                <a href="{{ url('articulo/' . $article->A_ID) }}"><h3>{{ $article->A_title}}</h3></a>
                <h4>
                  <?php $r = $rate = round($article->rating); ?>
                  @while($rate > 1)
                    <i class="fa fa-star"></i>
                    <?php $rate--; ?>
                  @endwhile
                            
                  @if($r != $article->rating)
                    <i class="fa fa-star-half"></i>
                  @else
                    @if($r != 0)
                      <i class="fa fa-star"></i>
                    @endif
                  @endif
                  
                  @while($r < 5)
                    <i class="fa fa-star-o"></i>
                    <?php $r++; ?>
                  @endwhile
                  @if (is_float($article->rating))
                    ({{ number_format((float)$article->rating, 1, '.', '') }})
                  @else 
                     ({{ $article->rating }})
                  @endif
                   | <a href="{{ url('articulo/' . $article->A_ID) }}#comments">{{ $article->article_count }} {{ Lang::get('messages.comments') }}</a></h4>
                <p style="height:100px;margin-bottom: 0px;" align="justify"> {{ substr($article->A_introduction,0,150) }} </p>
              </div>
            </div>         
          </div>
          @endforeach
        @else
          <h4> Aún no hay artículos registrados </h4>
        @endif

        </div>

      </div>

     @if (Auth::check())       
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">  
            <h3>{{ Lang::get('messages.tittle_3') }}</h3>
          </div>  
        </div>
        <div class="oslotron">
          <center>          
          <h4>{{Auth::user()->U_firstname . ' ' . Auth::user()->U_lastname}}</h4>
            @if(Auth::user()->U_profile_image != "")
              @if(substr(Auth::user()->U_profile_image,0,5) == 'https')
                <img src="{{Auth::user()->U_profile_image}}" style="width: 60px;">
              @else
                <img src="images_server/{{Auth::user()->U_profile_image}}" style="width: 60px;">
              @endif
            @else
              <img src="images/default_picture.png" style="width: 60px;">
            @endif
            <br><br>
            <p>
              <strong> 0 </strong> {{ Lang::get('messages.favorites') }} <br>
              <strong> 0 </strong> {{ Lang::get('messages.reviews') }} <br>
              <strong> 0 </strong> {{ Lang::get('messages.pictures') }} <br>
            </p> 
            <a href="{{url('perfil')}}"><button type="button" class="btn btn-primary">{{ Lang::get('messages.profile') }}</button></a>
        </center>
        </div>         
        <div class="space60"></div>
      </div>

      @else
      
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">  
            <h3>{{ Lang::get('messages.tittle_3') }}</h3>
          </div>  
        </div>
        <div class="oslotron">
          <center>
          <h2>{{ Lang::get('messages.profile_tittle') }}</h2>
          <p>
            {{ Lang::get('messages.profile_text') }}
          </p>
          <a href="{{ url('registrar') }}" >
          <button class="btn btn-primary color-2 rounded">{{ Lang::get('messages.register') }}</button>
        </a>
        </center>
        </div>      
        <div class="space20"></div>
      </div>

       @endif

    </div>
  </div>
  <div class="space60"></div> 
</div>

<!-- SEPTIMO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">  
       <!--  <h3>{{ Lang::get('messages.tittle_7') }}</h3> -->
      </div>  
    </div>

    <!-- <div class="row">
      <div class="col-md-12">
        <ul class="partners-6">  
          <li> 
            <img src="images/01.png" alt="">
          </li> 
          <li> 
            <img src="images/02.png" alt="">
          </li> 
          <li> 
            <img src="images/03.png" alt="">
          </li> 
          <li> 
            <img src="images/04.png" alt="">
          </li> 
          <li> 
            <img src="images/05.png" alt="">
          </li> 
          <li> 
            <img src="images/06.png" alt="">
          </li> 
        </ul>
      </div>
    </div> -->
  </div>
  <div class="space40"></div>  
</div>

<script>
  $('#inicio').addClass('selected');
    
</script>
@stop
