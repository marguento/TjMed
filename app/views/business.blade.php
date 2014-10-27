@extends('layouts.default')
@section('content')



<div class="breadcrumb-container">
  <div class="container">  
    @if (Session::has('var'))
      {{ Session::get('var') }}
    @endif
    <div class="row">  
      <div class="col-md-12">
        <h1>Negocios Registrados ({{ $business->count() }})</h1>
      </div>  
    </div> 
  </div> 
</div>

<div class="container">  
  {{ Form::open(array('url' => 'doctores')) }}
  <div class="row">  
    <div class="col-md-3">
      <select name="category" class="form-control" id="category" style="color:black; font-size:14px">
        <option value="all">Todas</option>
        @if ($categories->count())
          @foreach ($categories as $cat)
            <option value="{{ $cat->C_ID }}">{{ $cat->C_name }}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="col-md-3">
      <select name="speciality" class="form-control" id="speciality" style="color:black; font-size:14px">
        <option selected="selected"></option>
      </select>
    </div>
    <div class="col-md-3">
      <button class="btn btn-default btn-sm" type="submit" style="font-size:16px; padding:5px 20px 5px 20px;">Buscar por especialidad</button>
    </div>
  </div>
{{ Form::close() }}
</div>
<div class="space20"></div> 

@if ($business->count())
	@foreach ($business as $bus)
		<div class="container">
		  <div class="row">
		    <div class="col-md-2"> 
            {{ HTML::image('../app/images/' . $bus->b_image, 'Doctor default picture') }} 
		      <div class="space40"></div>
		    </div>  
		    <div class="col-md-6">
		      <a href="{{ url('doctor/' . $bus->B_ID) }}">
		      	<h3 style="margin-bottom: 0px;">{{ $bus->b_name}}</h3> </a>
		      <div style="margin-bottom: 15px;">
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
                  | <a href="{{ url('doctor/'.$bus->B_ID) }}#comments">{{ $bus->comments_count }} reseña(s)</a>
                </span>
				  </div>
          <h6 style="color:#0AB2DB; margin-bottom: 0px;">
            <?php $i = 0; ?>
            @foreach ($b_cat as $c)
              @if ($bus->B_ID == $c->B_ID)
                  @if ($i > 0)
                    ,
                  @endif
                 <a href="{{ url('especialidad/'.$c->S_ID) }}" >{{ $c->S_name}}</a>
                 
                 <?php $i++; ?>
              @endif
            @endforeach
            </h6>
		      <p align="justify">
		        {{ $bus->b_introduction }}
		      </p>
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
		      <div class="space20"></div> 
		    </div> 
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
	<div class="container"><p> No hay doctores registrados</p></div>
@endif


<div class="container">
    <div class="row">
      <div class="col-md-12" align="right">
        <ul class="pagination">
          <li><a href="#">«</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div>
    </div>
  </div>

<div>
  <div class="container">  
    <div class="row">
      <div class="col-md-12">      
        <div class="alert_main">
          
          <button type="button" class="close" data-dismiss="alert">×</button>
            ¿No encuentras lo que buscas? ¡Agrégalo aquí!
            <a href="{{ url('agregar') }}"><button class="btn btn-default btn-sm" style="font-size:16px; margin-left:20px;">Agregar negocio</button></a>
            <div class="space10"></div>
        </div>
      </div>    
    </div> 
  </div>  
  <div class="space40"></div>
</div> 

		<div class="space60"></div>
		<!-- Content End -->

    <script>
    $('#negocios').addClass('selected');
    </script>

@stop