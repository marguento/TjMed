@extends('layouts.default')
@section('content')

<div class="container">  
  <ol class="breadcrumb">
    <li>{{ link_to('articulos', 'Volver a Artículos') }}</li>
  </ol>
  <div class="blog-container"> 
    <div class="row"> 
      <div class="col-md-8">
        <div class="">
          <!-- Blog Post -->
            <div class="space30"></div>
            <h2><a href="#">{{ $article->A_title}}</a></h2>
            <img src="../../app/images/{{ $article->A_image }}" alt="" width="1140" height="456">
            <div class="space25"></div>
            <a href="#"> Categoría </a>
            <div class="space10"></div>
            
            <div class="post-info-container">
              <div class="row">
                <div class="col-md-7">
                  <div class="post-info">
                    <span class="post-data">
                      <i class="fa fa fa-user"></i> <a href="#">{{ $article->A_author }}</a>
                    </span>
                    <span class="post-data">
                      23 Agosto 2014
                    </span>
                   
                  </div>
                </div>
                <div class="col-md-5">
                   <div class="post-info">
                    <span class="post-data">  
                      <i class="fa fa-tag"></i> <span class="tags"><a href="#">Etiqueta 1</a> | <a href="#">Etiqueda 2</a></span>
                    </span>
                     <span class="post-data">  
                      <i class="fa fa-comment"></i> 0 Comentario(s)
                    </span> 
                  </div>  
                </div>
              </div>
            </div>
    
            <div class="space30"></div>
            <p style="text-align: justify;
                      text-justify: inter-word;">
              {{ $article->A_introduction }}
            </p>
            <p>
              {{ $article->A_content }}
            </p>
            <div class="space40"></div>
          </div>  
        </div>
  
<div class="col-md-4">
<div class="breadcrumb-container">
    <div class="container">  
      <div class="row">  
        <div class="col-md-12">
          <h1>Seguir Leyendo:</h1>
        </div>  
      </div> 
    </div> 
  </div>  

        <!-- List -->
        <ul class="list-3">

        <p> 
        <h6>Especialidades clínicas</h6>
          <li>
             <a href="#"><i class="fa fa-caret-right"></i> Cardiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neumología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Pediatría</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades Quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Plástica</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Cardiovascular</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Torácica</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Neurocirugía</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades médico quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Estomatología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Oftalmología</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Otorrinolaringología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Urología</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades de laboratorio o diagnósticas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Inmunología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Patológica</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Microbiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurofisiología</a>
          </li>
    </p>        

        </ul>
        <!-- List End -->
        <div class="space20"></div>
        <div class="divider"></div>
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
      <p>Calificación:
        <span id="1" class="rating">☆</span><span id="2" class="rating">☆</span><span id="3" class="rating">☆</span>
          <span id="4" class="rating">☆</span><span id="5" class="rating">☆</span>
      </p>
      <p>Deja tu reseña</p>
        <textarea class="form-control" rows="3" style="color:black;"></textarea>
        <div class="space10"></div>
          <center><button class="btn btn-default btn-sm">Agregar comentario</button></center>
        </div>
      </div>  
    </div>
  </div>  
  </div>

		<div class="space60"></div>
		<!-- Content End -->

<script>
$('#articulos').addClass('selected');
</script>

@stop