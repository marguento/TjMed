@extends('layouts.default')
@section('content')

<div class="container">  
  <div class="blog-container"> 
    <div class="row"> 
      <div class="col-md-8">
        <div class="breadcrumb-container">
          <div class="container">  
            <div class="row">  
              <div class="col-md-12">
                <h1>{{ Lang::get('messages.articles') }}</h1>
              </div>  
            </div> 
          </div> 
        </div>
        <div class="">
        	@if ($articles->count())
        		@foreach ($articles as $article)
          <!-- Blog Post -->
            <div class="space30"></div>
            <h2><a href="{{ url('articulo/' . $article->A_ID) }}">{{ $article->A_title}}</a>
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
              </span></h2>
              <div class="image-wrapper">
                <img src="{{url('images_server/' .$article->A_image)}}" alt="">
              </div>

            <div class="space25"></div>
            <!-- <a href="#"> Categoría </a> -->
            <div class="space10"></div>
            
            <div class="post-info-container">
              <div class="row">
                <div class="col-md-6">
                  <div class="post-info">
                    <span class="post-data">
                      <i class="fa fa fa-user"></i> <a href="#">{{ $article->author_name }}</a>
                    </span>
                    <span class="post-data">
                      {{ $article->A_created_at }}
                    </span>
                   
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="post-info">
                    <span class="post-data">  
                      <!-- <i class="fa fa-tag"></i> <span class="tags"><a href="#">Etiqueta 1</a> | <a href="#">Etiqueda 2</a></span> -->
                    </span>
                     <span class="post-data">  
                      <a href="{{ url('articulo/'.$article->A_ID) }}#comments"><i class="fa fa-comment"></i> {{ $article->article_count}} {{ Lang::get('messages.comments') }}</a>
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
            <div class="space15"></div>
            <a href="{{ url('articulo/' . $article->A_ID) }}" class="btn"><i class="fa fa-book"></i>{{ Lang::get('messages.keep_reading') }}</a>
            <div class="space40"></div>
            <!-- Blog Post End -->
        @endforeach
	@endif

  <div class="container">
    <div class="row">
      <div class="col-md-12" align="right">
        <?php echo $articles->links(); ?>
      </div>
    </div>
  </div>
          </div> 

        </div>
  
<div class="col-md-4">
<div class="breadcrumb-container">
    <div class="container">  
      <div class="row">  
        <div class="col-md-12">
          <h3>{{ Lang::get('messages.top_article') }}</h3>
        </div>  
      </div> 
    </div> 
  </div>  
  @if ($top->count())
    @foreach ($top as $t)
      <a href="{{ url('articulo/' . $t->A_ID) }}">
        <div class="container">
          <div class="row">
            <div class="col-md-1"> 
              <img src="images_server/{{ $t->A_image }}">
                <div class="space40"></div>
            </div>  
            <div class="col-md-3">
              <h6>{{ $t->A_title}}</h6>
              <div style="margin-bottom: 12px;">
                <span style="font-size:15px">
                  <?php 
                    $rating = $t->rating;
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
                    | <a href="{{ url('articulo/'.$t->A_ID) }}#comments">{{ $t->article_count }} {{ Lang::get('messages.comments') }}</a>
                </span>
              </div>
              <p align="justify">
                {{ $t->A_introduction }}
              </p>           
              <div class="space20"></div> 
            </div>
          </div>
        </div>
      </a>
            
        @endforeach
  @endif

        
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