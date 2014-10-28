@extends('layouts.default')
@section('content')

<div class="space20"></div>
<div class="container">  
  <ol class="breadcrumb">
    <li>{{ link_to('articulos', 'Volver a artículos') }}</li>
    <li class="active" style="color:#083D5C">Entrada artículo</li>
  </ol>
  <div class="blog-container"> 
    <div class="row"> 
      <div class="col-md-8">
        <div class="">
          <!-- Blog Post -->
            <div class="space30"></div>
            <h2>{{ $article->A_title}}
            <span style="font-size:18px">
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
              </span>
            </h2>
            <img src="../../app/images/{{ $article->A_image }}" alt="" width="1140" height="456">
            <div class="space25"></div> 
              Categorías: <?php $i = 0; ?>
              @foreach ($categories as $c)
                @if ($i > 0)
                  ,
                @endif
                <a href="#">{{ $c->AC_name}}</a>
                   
                <?php $i++; ?>
              @endforeach 
            <div class="space10"></div>
            
            <div class="post-info-container">
              <div class="row">
                <div class="col-md-5">
                  <div class="post-info">
                    <span class="post-data">
                      <i class="fa fa fa-user"></i> <a href="#">{{ $article->author_name }}</a>
                    </span>
                    <span class="post-data">{{ $article->A_created_at }}</span>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-info" style="float:right">
                    <span class="post-data">  
                      <i class="fa fa-tag"></i> 
                      <span class="tags">
                        <?php $i = 0; ?>
                          @foreach ($tags as $t)
                            @if ($i > 0)
                              |
                            @endif
                            <a href="#">{{ $t->T_name}}</a>
                               
                            <?php $i++; ?>
                          @endforeach 
                      </span>
                    </span>
                    <span class="post-data">  
                      <i class="fa fa-comment"></i> {{ $comments->count() }} Comentario(s)
                    </span> 
                  </div>  
                </div>
              </div>
            </div>
    
            <div class="space30"></div>
            <p style="text-align: justify;
                      text-justify: inter-word;">
              {{ $article->A_introduction }}</p>
            <p align="justify">
              {{ $article->A_content }}</p>
            <div class="space40"></div>
          </div>  
        </div>
  
        <div class="col-md-4">
          <div class="breadcrumb-container">
            <div class="container">  
              <div class="row">  
                <div class="col-md-12"><h1>Seguir Leyendo:</h1></div>  
              </div> 
            </div> 
          </div>  

          <!-- List -->
          <ul class="list-3">
            <p> 
              <h6>Especialidades clínicas</h6>
              <li><a href="#"><i class="fa fa-caret-right"></i> Cardiología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Neumología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Neurología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Pediatría</a></li>
            </p>

            <p>
              <h6>Especialidades Quirúrgicas</h6>
              <li><a href="#"><i class="fa fa-caret-right"></i> Cirugia Plástica</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Cirugia Cardiovascular</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Cirugia Torácica</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Cirugia Neurocirugía</a></li>
            </p>
            <p> 
              <h6>Especialidades médico quirúrgicas</h6>
              <li><a href="#"><i class="fa fa-caret-right"></i> Estomatología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Oftalmología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Otorrinolaringología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Urología</a></li>
            </p>
            <p> 
              <h6>Especialidades de laboratorio o diagnósticas</h6>
              <li><a href="#"><i class="fa fa-caret-right"></i> Inmunología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Patológica</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Microbiología</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Neurofisiología</a></li>
            </p>        
          </ul>
          <!-- List End -->
          <div class="space20"></div>
          <div class="divider"></div>
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
                     @if($comment->U_oauth_provider == '1')
                      <img src="{{$comment->U_profile_image}}">
                    @else
                      @if($comment->U_profile_image != "")
                        <img src="{{url('../app/images_server/' . $comment->U_profile_image)}}">
                      @else
                        <img src="{{url('../app/images/default_picture.png')}}">
                      @endif
                    @endif
                  </div> 
                  <div class="comment-data">
                    <h4>{{ $comment->U_firstname . ' ' . $comment->U_lastname }}
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
                      </span>
                    </h4>
                    
                    <p>{{ $comment->C_datetime_created }}<a href="#" class="reply-link"><i class="fa fa-thumbs-o-up"></i></a>
                      <a href="#" class="reply-link"><i class="fa fa-thumbs-o-down"></i></a>
                    </p>
                    <p>{{ $comment->C_content }}</p>
                    @if (Auth::check() && Auth::user()->U_username == $comment->C_user)
                      <a style="cursor: pointer; color:red">Eliminar comentario</a>
                      <?php 
                        $ban = 1; 
                        $ra = $comment->C_rating
                      ?>
                    @endif
                    <div class="divider"></div>           
                  </div> 
                </div>
                <div class="space30"></div> 
              @endforeach
            @else
              <h5> Aún no hay comentaios para este artículo, tú puedes ser el primero, 
                no dudes en compartir tu opinión</h5>
            @endif
            
            @if(Auth::check())
              @if ($ban == 0)
                 <p>Calificación:
                  <span id="rate_section" style="cursor: pointer;">
                    <a><span id="1" class="rating"><i class="fa fa-star-o"></i> </span></a><a><span id="2" class="rating"><i class="fa fa-star-o"></i> </span></a><a>
                    <span id="3" class="rating"><i class="fa fa-star-o"></i> </span></a><a><span id="4" class="rating"><i class="fa fa-star-o"></i> </span></a><a>
                    <span id="5" class="rating"><i class="fa fa-star-o"></i></span></a>
                  </span>
              @else
                <p>Edita tu calificación registrada: 
                <span id="rate_section" style="cursor: pointer;">
                <?php  $r = $rating = $ra;
                    $i = 1; ?>
                @while($rating)
                  <a><span id="{{$i}}" class="rating"><i class="fa fa-star"></i></span></a>
                  <?php $rating--; $i++; ?>
                @endwhile
                        
                @while($r < 5)
                  <a><span id="{{$i}}" class="rating"><i class="fa fa-star-o"></i></span></a>
                  <?php $r++; $i++; ?>
                @endwhile
              </span>
              @endif
              </p>
                <p>Deja tu opinión</p>
                {{ Form::open(array('url' => 'article/review')) }}
                {{ Form::hidden('curr_article', $article->A_ID) }}
                {{ Form::hidden('rating', 0, array('id'=> 'rate_value')) }}

                <textarea class="form-control" name="content" rows="3" style="color:black;"></textarea>
                <div class="space10"></div>
                  <center>
                    <button class="btn btn-default btn-sm" type="submit">Agregar comentario</button>
                  </center>
                {{ Form::close() }}
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
  $('#articulos').addClass('selected');
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