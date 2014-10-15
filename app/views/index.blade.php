@extends('layouts.default')
@section('content')



<!-- Slider -->
  <div class="bxslider">
    <img src="app/images/1bb.png"/>
    <img src="app/images/2bb.png"/>
  </div>
  <div class="space30"></div>
<!--PRIMER RENGLON -->
<div>
  <div class="container">
    <div class="row"> 
      <div class="col-md-12">
        <center>
              <h3>
                Te explicamos como funciona:
              </h3>
              <div style="font-size: 20px; line-height:150% ">
                Con TjMed, puedes buscar en la barra de busqueda, cualquier negocio medico o doctor de tu interes,
                existe una seccion de Categorias, donde estan todas las descripciones de las especialidades que te
                ayudaran a buscar un doctor si no sabes lo que buscas.
                Tjmed, te da opciones, ratings, reviews y comentarios del negocio o doctores que estes buscando, es 
                simplemente sencillo.
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

        <div class="row">
          <div class="col-md-9">  
            <h3>Especialidades Médicas</h3>   
        
        <div class="row popup-gallery">        

          <article class="col-md-3 col-sm-3 boxed-project">
            <div class="img-container">
              <a href="app/images/esp_clin.png" title="Photo Title">
                <img src="app/images/esp_clin.png" alt="" width="263" height="263">
                <i class="fa fa-arrows-alt"></i>
              </a>        
            </div>
            <div class="title">
              <a href="index.php?opcion=categorias">
                <h4>Especialidades <br> Clínicas</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-3 col-sm-3 boxed-project">
            <div class="img-container">
              <a href="app/images/esp_quir.png" title="Photo Title">
                <img src="app/images/esp_quir.png" alt="" width="263" height="263">
                <i class="fa fa-arrows-alt"></i>
              </a>         
            </div>
            <div class="title">
              <a href="index.php?opcion=categorias">          
                <h4>Especialidades <br> Quirúrgicas</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-3 col-sm-3 boxed-project">
            <div class="img-container">
              <a href="app/images/esp_med.png" title="Photo Title">
                <img src="app/images/esp_med.png" alt="" width="263" height="263">
                <i class="fa fa-arrows-alt"></i>
              </a>         
            </div>
            <div class="title">
              <a href="index.php?opcion=categorias">          
                <h4>Especialidades Médico Quirúrgicas</h4>
                <br>
              </a>
            </div>
          </article> 

          <article class="col-md-3 col-sm-3 boxed-project">
            <div class="img-container">
              <a href="app/images/esp_lab.png" title="Photo Title">
                <img src="app/images/esp_lab.png" alt="" width="263" height="263"> 
                <i class="fa fa-arrows-alt"></i>
              </a>       
            </div>
            <div class="title">
              <a href="index.php?opcion=categorias">
                <h4>Especialidades de Laboratorio</h4>
                <br>
              </a>
            </div>
          </article> 
           </div>  
        </div>       
      
      <div class="col-md-3">
          <div class="col-md-12">  
            <h3>Odontología</h3>
          <article class="col-md-12 col-sm-12 boxed-project">
            <div class="img-container">
              <a href="app/images/esp_den.png" title="Photo Title">
                <img src="app/images/esp_den.png" alt="" width="263" height="263"> 
                <i class="fa fa-arrows-alt"></i>
              </a>       
            </div>
            <div class="title">
              <a href="index.php?opcion=categorias">
                <h4>Especialidad de <br>Odontología</h4>
                <br>
              </a>
            </div>
          </article> 
        </div> 
</div>    

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
            <h3>Vida Saludable</h3>
          </div>  
        </div> 

        <div class="row popup-gallery">   
          @if ($articles->count())
            @foreach ($articles as $article)
          <div class="col-md-4 col-sm-6">    
            <div class="item-box">
              <div class="media-container">
                <img src="app/images/{{ $article->A_image }}" alt="Article image">
                <a href="#" class="icon-left"><i class="fa fa-chain"></i></a>
                <a href="app/images/{{ $article->A_image }}" class="icon-right"><i class="fa fa-arrows-alt"></i></a>
              </div>
              <div class="info-container">
                <h3>{{ $article->A_title}}</h3>
                <h4>{{ $article->A_created_at }} | Comments</h4>
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
            <h3>Mi Perfil</h3>
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

            <a href="index.php?opcion=usuario"><button type="button" class="btn btn-primary">Ir a mi perfil</button></a>
        </blockquote>
        <div class="space40"></div>
      </div>

      @else
      
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">  
            <h3>Mi Perfil</h3>
          </div>  
        </div>
                    

        <div class="oslotron">
          <h2>Hello, World!</h2>
          <p>
            Labore et dolore magnam aliquam quaerat volupiam, quis nostrud exercitation ullamco labori 
          </p>
          <button class="btn btn-primary color-2 rounded">Follow Me on Gowalla</button>
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
            Agrega tu negocio ya! ¿No sabes cómo? Aquí te ayudamos. <br><strong><span class="author">TjMed</span></strong>
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
        <h3>Recientes Negocios</h3>
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
                <img src="app/images/{{ $bus->b_image }}" alt="" width="360" height="360">
                <a href="#" class="icon-left"><i class="fa fa-chain"></i></a>
                <a href="#" class="icon-right"><i class="fa fa-arrows-alt"></i></a>
              </div>
              <div class="info-container">
                <h3>{{ $bus->b_name }}</h3>
                <h4>Founder</h4> <!--Categorias -->
                <p> {{ $bus->b_introduction }} </p>
                <div class="social-container">
                  <div class="social-2">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
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
            <h3>Spot TjMed</h3>
          </div>  
        </div>
        <iframe width="250" height="200" src="//www.youtube.com/embed/tYraOn7zHR8" frameborder="0" allowfullscreen></iframe>  
      </div>
        
      <div class="col-md-9"> 
        <div class="row">
          <div class="row">
            <div class="col-md-12">  
              <h3>Recientes Reseñas</h3>
            </div>
          </div>

          @if ($comments->count())
            @foreach ($comments as $comment)
              <div class="col-md-4 promo-text">
                <div class="blog-comment">
                  <div class="user-image"><img src="app/images/{{ $comment->U_profile_image}}"></div> 
                  <div class="comment-data">
                    <h4>{{ $comment->U_firstname . ' ' . $comment->U_lastname }}</h4>
                    en <h5> {{ $comment->b_name }}</h5>
                    <p>{{ $comment->C_datetime_created }}<a href="#" class="reply-link">Responder</a></p>
                    <p>{{ $comment->C_content }}</p>
                    <div class="divider"></div>           
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
        <h3>Nuestros Clientes</h3>
      </div>  
    </div>

    <div class="row">
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
    </div>
  </div>
  <div class="space40"></div>  
</div>
@stop
