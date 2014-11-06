@extends('layouts.default')
@section('content')
<div class="space20"></div>

<div class="container">
  <ol class="breadcrumb" style="padding-right: 0px;">
    <li>{{ link_to('doctores', 'Volver a búsqueda') }}</li>
     <li class="active" style="color:#083D5C">Perfil doctor</li>
  </ol>
   @if (Session::has('var'))
      {{ Session::get('var') }}
    @endif
  </div>
</div>

  <div class="container">  
    <div class="blog-container"> 
      <div class="row"> 
        <div class="col-md-8 blog-content">
          <!-- Blog Post -->

<div class="space20"></div>
      <h1 style="margin-bottom:0px; line-height:1em"> {{$doctor->b_name}}
      <span style="font-size:18px">
      <?php $r = $rate = round($rating); ?>
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
      @if (is_float($rating))
        ({{ number_format((float)$rating, 1, '.', '') }})
      @else 
         ({{ $rating }})
      @endif
      </span>
      </h1>
      <a href="#"><!--Especialidades--></a><br>
          {{ HTML::image('../app/images_server/' . $doctor->b_image) }}
          
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
                <div class="social-2">
                  <a style="cursor: pointer;"><i class="fa fa-envelope-o"></i></a>
                  <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $doctor->b_telephone }}">
                    <i class="fa fa-phone"></i>
                  </a>
                  @if($doctor->b_cellphone!= '')
                    <a style="cursor: pointer;" class="popup" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $doctor->b_cellphone }}">
                    <i class="fa fa-mobile"></i>
                  </a>
                  @endif
                  @if($doctor->b_facebook != '')
                    <a href="//facebook.com/{{$doctor->b_facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                  @endif
                  @if($doctor->b_twitter != '')
                    <a href="{{ url('//twitter.com/' . $doctor->b_twitter) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                  @endif
                  @if($doctor->b_youtube != '')
                    <a href="{{ url('//www.youtube.com/user/' . $doctor->b_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                  @endif
                  @if($doctor->b_linkedin != '')
                    <a href="{{ url('//www.linkedin.com/in/' . $doctor->b_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                  @endif
                  @if($doctor->b_website != '')
                    <a href="{{ url('//' . $doctor->b_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
                  @endif
                </div>  
              </div>
            </div>
          </div>
  
          <div class="space30"></div>
          <p>{{ $doctor->b_introduction }}</p>
          <p>{{ $doctor->b_description }}
          <div class="space20"></div>
                                    
          <div class="space35"></div>
          <div class="space40"></div>
          <!-- Blog Post End -->

        </div>
        
        <div class="col-md-4 blog-right-sidebar">
        
          <div class="">
            <div class="space25"></div>
            <h4>Ubicación</h4>
            <h5>Dirección: {{ $doctor->b_address }}</h5>
            <!--<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&amp;zoom=13&amp;size=600x300&amp;maptype=roadmap&amp;markers=color:blue%7Clabel:S%7C40.702147,-74.015794&amp;markers=color:green%7Clabel:G%7C40.711614,-74.012318&amp;markers=color:red%7Clabel:C%7C40.718217,-73.998284" alt="Points of Interest in Lower Manhattan">
            -->
            <input id="address" type="hidden" value="{{ $doctor->b_address }}">
            <div id="map-canvas"></div>

            <div class="space40"></div>
            <h4>Especialidades Médicas</4>
            <h6 style="color:#0AB2DB; margin-bottom: 0px;">
            <?php $i = 0; ?>
            @foreach ($b_cat as $c)
              @if ($doctor->B_ID == $c->B_ID)
                  @if ($i > 0)
                    ,
                  @endif
                 <a href="{{ url('especialidad/'.$c->S_ID) }}" >{{ $c->S_name}}</a>
                 
                 <?php $i++; ?>
              @endif
            @endforeach
            </h6>
            <br><br>
            <h4>Etiquetas</4>
            <h6 style="color:#0AB2DB; margin-bottom: 0px;">
            <?php $i = 0; ?>
            @foreach ($tags as $t)
              @if ($doctor->B_ID == $t->B_ID)
                @if ($i > 0)
                  ,
                @endif
                {{ $t->T_name}}
                 
                 <?php $i++; ?>
              @endif
            @endforeach
            </h6>
            <div class="space40"></div>
            @if ($doctor->b_user_owner == 'none')
              <div class="alert_main">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h5> Este negocio médico o doctor no cuenta con propietario o dueño, ¿Es usted el dueño? </h5>
                <center><a href="{{ url('owner/' . $doctor->B_ID) }}"><button class="btn btn-default btn-sm">Soy el propietario</button></a></center>
              </div>
            @endif


            
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
      <?php $ban = 0; ?>
<div id="comments">
  <div class="col-md-12">
    <div class="space40"></div>
      <h3>Comentarios ({{ $comments->count() }})</h3>
      <div class="space10"></div>
      @if ($comments->count())
      @foreach($comments as $comment)
        <div class="blog-comment">
          <div class="user-image">
            <a href="{{ url('usuario/' . $comment->C_user) }}">
              @if($comment->U_profile_image != "")
                @if(substr($comment->U_profile_image,0,5) == 'https')
                  <img src="{{$comment->U_profile_image}}">
                @else
                  <img src="../../app/images_server/{{$comment->U_profile_image}}">
                @endif
              @else
                <img src="../../app/images/default_picture.png">
              @endif
            </a>
          </div> 
            <div class="comment-data">
              <h4><a href="{{ url('usuario/' . $comment->C_user) }}">{{ $comment->U_firstname . ' ' . $comment->U_lastname }}</a>
              <span style="font-size:20px">
                <?php  $r = $rating = $comment->C_rating ?>
                  @while($rating)
                    <span><i class="fa fa-star"></i></span>
                    <?php $rating--; ?>
                  @endwhile
                  @while($r < 5)
                    <span><i class="fa fa-star-o"></i></span>
                    <?php $r++; ?>
                  @endwhile
              </span></h4>
              <p>{{ $comment->C_datetime_created }}<!-- <a href="#" class="reply-link"><i class="fa fa-thumbs-o-up"></i></a>
              <a href="#" class="reply-link"><i class="fa fa-thumbs-o-down"></i></a> --></p>
              <p>
                {{ $comment->C_content }}
              </p>
              @if (Auth::check() && Auth::user()->U_username == $comment->C_user)
                <a  id="edi_{{$doctor->B_ID}}"  class="edit_review" style="cursor: pointer;">Editar reseña</a> | <a id="del_review" style="cursor: pointer; color:red">Eliminar comentario</a>
                <?php $ban = 1; ?>
              @endif
            <div class="divider"></div>           
          </div> 
        </div>
        <div class="space30"></div> 
        <div class="container">
          <div class="row">
            <div class="col-md-12" align="right">
              <?php echo $comments->links(); ?>
            </div>
          </div>
        </div>
      @endforeach
      @else
      <h5> Aún no hay reseñas para este doctor o negocio médico, tú puedes ser el primero, 
        no dudes en compartir tu  opinión</h5>
      @endif
      @if(Auth::check())
        @if ($ban == 0)
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
                <button class="btn btn-default btn-sm" type="submit">Agregar reseña</button>
              </center>
          {{ Form::close() }}
        @else
        <div id="edit_comment">
        <span><h5>Edita tu reseña</h5></span>
        <span id="rate_section" style="cursor: pointer;"></span><br>
          
            {{ Form::open(array('url' => 'edit_review')) }}
            {{ Form::hidden('curr_doctor', $doctor->B_ID) }}
            {{ Form::hidden('rating', 0, array('id'=> 'rate_value')) }}

              <textarea class="form-control" name="content" rows="3" style="color:black;" id="content_review"></textarea>
              <div class="space10"></div>
                <center>
                  <button class="btn btn-default btn-sm" type="submit">Editar reseña</button>
                  <button class="btn btn-default btn-sm"> Cancelar</button>
                </center>
            {{ Form::close() }}
            </div>
            <div id="edit_button">
              <button class="btn btn-primary color-2 rounded edit_review" style="float:right;" id="edd_{{$doctor->B_ID}}">Editar reseña</button>
            </div>
        @endif
      @else
        <a href="{{ url('registrar') }}" >
          <button class="btn btn-primary color-2 rounded" style="float:right;">Inicia sesión o regístrate</button>
        </a>
      @endif
        </div>
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
    $('#edit_comment').hide();

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
     $('.edit_review').on('click', function () {
        var id =$(this).attr('id').substring(4);
        var dataString = 'id='+ id;
        var rate = '';
        $.ajax
        ({
          type: "POST",
          url: "{{url('getReview')}}",
          data: dataString,
          cache: false,
          success: function(html)
          {
            $('#content_review').val(html.C_content);
            var r = 0;
            var ra = 0;
            var rating = html.C_rating;
            rate = r = ra = rating;
            var i = 1;
            var string = "";
            while(rating)
            {
              string += '<a><span id="' + i + '" class="rating"><i class="fa fa-star"></i></span></a>';
              rating--; i++;
            }

            while(r < 5)
            {
              string += '<a><span id="' + i + '" class="rating"><i class="fa fa-star-o"></i></span></a>';
              r++; i++;
            }
            $("#rate_section").html(string);
            $('#rate_value').val(rate);
            rateFunction();
          } 
        });
        $('#edit_comment').show();
        $('#edit_button').hide();        
     });

     $('#del_review').on('click', function () {
        location.href = "{{ url('del_review/' . $doctor->B_ID) }}";
     });
</script>
@stop