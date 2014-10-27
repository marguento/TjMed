@extends('layouts.default')
@section('content')
<!-- Slider -->
  <div class="bxslider">
    <img src="../app/images/{{ Lang::get('messages.banner1') }}"/>
    <img src="../app/images/{{ Lang::get('messages.banner2') }}"/>
  </div>
  <div class="space30"></div>
<!--PRIMER RENGLON -->
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
  <div class="space70"></div>
</div> 

<!-- SEGUNDO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <h3>{{ link_to("especialidades", Lang::get('messages.tittle_1')) }}</h3>   
        
        <div class="row popup-gallery">        

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_clin.png" alt="" width="263" height="263">       
            </div>
            <div class="title">
              <a href="{{ url('categoria/1') }}">
                <h4>{{ Lang::get('messages.category_1') }}</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_quir.png" alt="" width="263" height="263">         
            </div>
            <div class="title">
              <a href="{{ url('categoria/2') }}">          
                <h4>{{ Lang::get('messages.category_2') }}</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_med.png" alt="" width="263" height="263">         
            </div>
            <div class="title">
              <a href="{{ url('categoria/3') }}">          
                <h4>{{ Lang::get('messages.category_3') }}</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_lab.png" alt="" width="263" height="263">        
            </div>
            <div class="title">
              <a href="{{ url('categoria/4') }}">
                <h4>{{ Lang::get('messages.category_4') }}</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_den.png" alt="" width="263" height="263">   
            </div>
            <div class="title">
              <a href="{{ url('especialidad/28') }}">
                <h4>{{ Lang::get('messages.especiality_1') }}</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-2 col-sm-2 boxed-project">
            <div class="img-container">
                <img src="../app/images/esp_den.png" alt="" width="263" height="263">   
            </div>
            <div class="title">
              <a href="{{ url('especialidad/28') }}">
                <h4>{{ Lang::get('messages.especiality_2') }}</h4>
                <br>
              </a>
            </div>
          </article> 

      </div>

    </div>
  </div>
  <div class="space40"></div>
</div>

<!-- TERCER RENGLON -->
<div>      
  <div class="container">
    <div class="row">
      <div class="col-md-9"> 
        
        <div class="row">
          <div class="col-md-12">  
            <h3>{{ Lang::get('messages.tittle_2') }}</h3>
          </div>  
        </div> 

        <div class="row popup-gallery">   
          @if ($articles->count())
            @foreach ($articles as $article)
          <div class="col-md-4 col-sm-6">    
            <div class="item-box">
              <div class="media-container">
                <img src="../app/images/{{ $article->A_image }}" alt="Article image">
                <!-- <a href="#" class="icon-left"><i class="fa fa-chain"></i></a>
                <a href="../app/images/{{ $article->A_image }}" class="icon-right"><i class="fa fa-arrows-alt"></i></a> -->
              </div>
              <div class="info-container">
                <a href="{{ url('articulo/' . $article->A_ID) }}"><h3>{{ $article->A_title}}</h3></a>
                <h4>{{ $article->A_created_at }} | {{ $article->article_count }} Comentario(s)</h4>
                <p> {{ $article->A_introduction }} </p>
              </div>
            </div>         
          </div>
          @endforeach
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

        <blockquote> 
          <h4></h4>
            <!--<img src="" style="width: 60px;"> -->
            <p>
              <strong> 0 </strong> Favoritos <br>
              <strong> 0 </strong> Reviews <br>
              <strong> 0 </strong> Pictures <br>
            </p>

            <a href=""><button type="button" class="btn btn-primary">Ir a mi perfil</button></a>
        </blockquote>
        <div class="space40"></div>
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
  <div class="space40"></div> 
</div>

<!-- CUARTO RENGLON -->
<div>
  <div class="container">  
    <div class="row">
      <div class="col-md-12">      
        <div class="alert_main">
          
          <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Lang::get('messages.add_bussines_tag1') }}
            <a href="{{ url('agregar') }}"><button class="btn btn-default btn-sm" style="font-size:16px; margin-left:20px;">{{ Lang::get('messages.add_bussines_but1') }}</button></a>
            <div class="space10"></div>
        </div>
      </div>    
    </div> 
  </div>  
  <div class="space40"></div>
</div>  

<!-- QUINTO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">  
        <h3>{{ Lang::get('messages.tittle_4') }}</h3>
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
                <img src="../app/images/{{ $bus->b_image }}" alt="" width="360" height="360">
                <!-- 
                <a href="#" class="icon-left"><i class="fa fa-chain"></i></a>
                <a href="#" class="icon-right"><i class="fa fa-arrows-alt"></i></a> -->
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
                       {{ $c->S_name}}
                       
                       <?php $i++; ?>
                    @endif
                  @endforeach
                </h4> <!--Categorias -->
                <p> {{ $bus->b_introduction }} </p>
                <span> {{ $bus->b_email }} </span><br>
                <span> {{ $bus->b_telephone }} </span><br>
                <span> {{ $bus->b_address }} </span>
                <div class="social-container">
                  <div class="social-2">
                    @if($bus->b_facebook != '')
                      <a href="{{ url('www.facebook.com/' . $bus->b_facebook) }}"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if($bus->b_twitter != '')
                      <a href="{{ url('www.twitter.com/' . $bus->b_twitter) }}"><i class="fa fa-twitter"></i></a>
                    @endif
                  </div>  
                </div> 
              </div>
            </div>
          </div>
        @endforeach
      @endif

         
    </div>   
  </div>
  <div class="space40"></div>
</div>  

<!-- SEXTO RENGLON -->
<div>
  <div class="container">
    <div class="row">  
      
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">  
            <h3>{{ Lang::get('messages.tittle_5') }}</h3>
          </div>  
        </div>
        <iframe width="250" height="200" src="//www.youtube.com/embed/tYraOn7zHR8" frameborder="0" allowfullscreen></iframe>  
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
                  <div class="user-image"><img src="../app/images/{{ $comment->U_profile_image}}"></div> 
                  <div class="comment-data">
                    <h4>{{ $comment->U_firstname . ' ' . $comment->U_lastname }}</h4>
                    en  <a href="{{ url('doctor/' . $comment->B_ID) }}">{{ $comment->b_name }}</a>
                    <p style="font-size:12px;">{{ $comment->C_datetime_created }}</p>
                    <p>{{ $comment->C_content }}</p>     
                  </div> 
                </div>
              </div> 
            @endforeach
          @endif
        </div>             
      </div>   
    </div>
  </div>
  <div class="space40"></div> 
</div> 

<!-- SEPTIMO RENGLON -->
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">  
        <h3>{{ Lang::get('messages.tittle_7') }}</h3>
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
