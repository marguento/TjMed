@extends('layouts.default')
@section('content')
<div class="space60"></div>

<div class="container">
  <ol class="breadcrumb">
    <li>{{ link_to('doctores', 'Volver a Búsqueda') }}</li>
  </ol>
  <div class="row">
    <div class="col-md-12">
      <h1 style="margin-bottom:0px; line-height:1em"> {{$doctor->b_name}} </h1>
      <span style="font-size:18px">
      <?php $r = $rate = round($rating); ?>
      @while($rate > 1)
        <i class="fa fa-star"></i>
        <?php $rate--; ?>
      @endwhile
                
      @if($r != $rating)
        <i class="fa fa-star-half"></i>
        <?php $r++; ?>
      @endif
      
      @while($r < 5)
        <i class="fa fa-star-o"></i>
        <?php $r++; ?>
      @endwhile
      ({{ $rating }})</span>
      <a href="#"><!--Especialidades--></a><br>
    </div>
  </div>
</div>

<div class="space20"></div>
  <div class="container">  
    <div class="blog-container"> 
      <div class="row"> 
        <div class="col-md-8 blog-content">
          <!-- Blog Post -->
          <div class="space20"></div>
          {{ HTML::image('../app/images/' . $doctor->b_image) }}
         <!--  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width: 80%; margin: 0 auto">

            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              
                  <li data-target="#carousel-example-generic" data-slide-to=""></li>
              
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <center><img src="" class="img_prof" alt="Profile default image">
                <div class="carousel-caption">
                </div>
              </center>
              </div>
              
                <div class="item">
                <center>
                <img src="" alt="Business image">
                <div class="carousel-caption">
                  <b></b>
                </div>
              </center>
              </div>
            </div>

            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div> -->
          <div class="space10"></div>
          <center><button class="btn btn-default btn-sm">Agregar imagen</button></center>
          
          <div class="space10"></div>
          <div class="post-info-container">
            <div class="row">
              <div class="col-md-8">
                <div class="post-info">
                  
                  <span class="post-data">  
                    Registrado {{ substr($doctor->b_joined_date,0,-9) }}
                    <i class="fa fa-comment"></i>
                    @if($comments->count() > 0) 
                      {{ $comments->count() . ' comentario(s)'}}
                    @else
                      <span>No hay comentarios</span>
                    @endif
                  </span> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="social-2 f-right">
                  <a href="#"><i class="fa fa-youtube"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="www.facebook.com/{{ $doctor->b_facebook }}"><i class="fa fa-facebook"></i></a>
                  <a href="www.twitter.com/{{ $doctor->b_twitter }}"><i class="fa fa-twitter"></i></a>
                </div>  
              </div>
            </div>
          </div>
  
          <div class="space30"></div>
          <p>{{ $doctor->b_introduction }}</p>
          <p>{{ $doctor->b_description }}
          <div class="space20"></div>
          
          <!--<blockquote>       
          Mummy abhorreant id vel, an munere eruditi praesent qui. Usu noster legendos cu. Mei omnium graecis an. Te nam graeci nostrud dissentiet. Usu quem appellantur id, ut debet accommodare his. Vel te dicit putant facilis, ius ad torquatos moderatius.
          Lantur cum, ut reque leit invenire. Zril petentium an est, amet putant eum eu, usu iudico possim voluptatum ad. An sea vidisse alienum.
          </blockquote>-->
                                    
          <div class="space35"></div>
          <!--<a href="negocios.html" class="btn"><i class="fa fa-book"></i>Más Negocios</a>-->
          <div class="space40"></div>
          <!-- Blog Post End -->

        </div>
        
        <div class="col-md-4 blog-right-sidebar">
        
          <div class="">
            <div class="space25"></div>
            <h4>Ubicación</h4>
            <p>Dirección: {{ $doctor->b_address }}</p>
            <!--<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&amp;zoom=13&amp;size=600x300&amp;maptype=roadmap&amp;markers=color:blue%7Clabel:S%7C40.702147,-74.015794&amp;markers=color:green%7Clabel:G%7C40.711614,-74.012318&amp;markers=color:red%7Clabel:C%7C40.718217,-73.998284" alt="Points of Interest in Lower Manhattan">
            -->
            <input id="address" type="hidden" value="{{ $doctor->b_address }}">
            <div id="map-canvas"></div>

            <div class="space40"></div>
            
            <!--<h4>Cliente Satisfecho</h4>
            <div class="client-says">
              <div class="client-text">   
                “Clariteniam, quis nostrud exercitation ullamco laboris. Aute irure dolor in repreh wypas candy canes toffee. Co adipisicing elit, sed do eiusmod tempor incididunt ut laboenderit in voluptate velit esse cillum dudium lectorum. Mirum est notare quam liquam at erat in purus aliquet mollis. Fusce ele velit nibeh.”
              </div>  
              <div class="client-name">
                <i class="fa fa-quote-right"></i><strong>Manuel Soto</strong>, Apple.
              </div>  
            </div> -->
            
            <div class="space40"></div>
           
          </div>  
          
        </div>
        
      </div> 

  <div class="col-md-12">
    <div class="space40"></div>
      <h3>Comentarios ({{ $comments->count() }})</h3>
      <div class="space10"></div>
      @if ($comments->count())
      @foreach($comments as $comment)
        <div class="blog-comment">
          <div class="user-image">{{ HTML::image('../app/images/' . $comment->U_profile_image, 'usuario imagen comentario') }}
            <!--<i class="fa fa-user"></i>--></div> 
            <div class="comment-data">
              <h4>{{ $comment->U_firstname . ' ' . $comment->U_lastname }}
              <span style="font-size:20px">
                <?php  $r = $rating = $comment->C_rating ?>
                  @while($rating)
                    <span>★</span>
                    <?php $rating--; ?>
                  @endwhile
                  @while($r < 5)
                    <span>☆</span>
                    <?php $r++; ?>
                  @endwhile
              </span></h4>
              <p>{{ $comment->C_datetime_created }}<a href="#" class="reply-link"><i class="fa fa-thumbs-o-up"></i></a>
              <a href="#" class="reply-link"><i class="fa fa-thumbs-o-down"></i></a></p>
              <p>
                {{ $comment->C_content }}
              </p>
            <div class="divider"></div>           
          </div> 
        </div>
        <div class="space30"></div> 
      @endforeach

      <!-- MANEJARLO CON JAVASCRIPT -->
      <center>
        <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </center>
      @else
      <h5> Aún no hay reseñas para este doctor o negocio médico, tú puedes ser el primero, 
        no dudes en compartir tu  opinión</h5>
      @endif
      @if(Auth::check())
      <p>Calificación:
      <span id="rate_section" style="cursor: pointer;">
        <a><span id="1" class="rating"><i class="fa fa-star-o"></i> </span></a><a><span id="2" class="rating"><i class="fa fa-star-o"></i> </span></a><a>
        <span id="3" class="rating"><i class="fa fa-star-o"></i> </span></a><a><span id="4" class="rating"><i class="fa fa-star-o"></i> </span></a><a>
        <span id="5" class="rating"><i class="fa fa-star-o"></i></span></a>
      </span>

      </p>
      <p>Deja tu reseña</p>
      {{ Form::open(array('url' => 'doctor/review')) }}
      {{ Form::hidden('curr_doctor', $doctor->B_ID) }}
      {{ Form::hidden('rating', 0, array('id'=> 'rate_value')) }}

        <textarea class="form-control" name="content" rows="3" style="color:black;"></textarea>
        <div class="space10"></div>
          <center>
            <button class="btn btn-default btn-sm" type="submit">Agregar comentario</button>
          </center>
      {{ Form::close() }}
      @else
        <a href="{{ url('registrar') }}" >
          <button class="btn btn-primary color-2 rounded">Inicia sesión o regístrate<button>
        </a>
      @endif
        </div>
      </div>  
    </div>
  </div>
</div>  
<div class="space60"></div>
<!-- Content End -->
<script>
  $('#negocios').addClass('selected');
  $(document).ready(function() {
    var rate = '';
    rateFunction();

  });

  function rateFunction() {
    $('.rating').on('click',function () {
      rate = $(this).attr('id');
      $('#rate_value').val(rate);
      var string = "";
      var r = 1;
      while(rate > 0) 
      {
        string += '<a><span id="' + r + '" class="rating"><i class="fa fa-star"></i> </span></a>';
        rate--;
        r++;
      }

      while (r < 6) {
        string += '<a><span id="' + r + '" class="rating"><i class="fa fa-star-o"></i> </span></a>';
        r++;
      }
       $("#rate_section").html('');
       $("#rate_section").html(string);

       rateFunction();
    });
  }
</script>
@stop