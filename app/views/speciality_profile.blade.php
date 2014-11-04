@extends('layouts.default')
@section('content')

<div class="space20"></div>
  <div class="container">
    <ol class="breadcrumb">
      <li>{{ link_to('especialidades', 'Regresar a especialidades') }}</li>
      <li class="active" style="color:#083D5C">Perfil especialidad</li>
    </ol>
    <div class="row">
      <div class="col-md-8" align="justify">
          <div class="service"> 
            <h2>{{ $speciality->S_name }}</h2>
              <?php
                switch($speciality->C_ID) 
                {
                  case 1: echo '<span class="fa fa-stethoscope"></span> '; break;
                  case 2: echo '<span class="fa fa-user-md"></span> '; break;
                  case 3: echo '<span class="fa fa-plus-square"></span> '; break;
                  case 4: echo '<span class="fa fa-flask"></span> '; break;
               }
             ?>
             <a href="{{ url('categoria/' . $speciality->C_ID) }}">
              <h5>{{ $speciality->C_name }} </h5>
            </a>
          </div>
          <p align="justify"> {{ $speciality->S_introduction }} </p>
          <p align="justify">{{ $speciality->S_description }} </p>
      </div> 

      <div class="col-md-4">
      <h3>TOP DOCTORES EN {{ $speciality->S_name }} </h3>
       @if ($business->count())
        @foreach ($business as $bus)
        <a href="{{ url('doctor/' . $bus->B_ID) }}">
          <div class="container">
            <div class="row">
              <div class="col-md-1"> 
                  {{ HTML::image('../app/images_server/' . $bus->b_image, 'Doctor default picture') }} 
                <div class="space40"></div>
              </div>  
              <div class="col-md-3">
                  <h6 style="margin-bottom: 0px;">{{ $bus->b_name}}</h6>
                <div style="margin-bottom: 12px;">
                 <span style="font-size:15px">
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
                <p align="justify">
                  {{ $bus->b_introduction }}
                </p>           
                <div class="space20"></div> 
              </div> 
            </div>
          </div>
        </a>
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="divider"></div> 
                <div class="space20"></div> 
              </div>
            </div>
          </div> 
        @endforeach
      @else
        <div class="container"><p> No hay doctores registrados</p></div>
      @endif
      </div>
      
     </div>  
    </div> 
		<div class="space60"></div>
		<!-- Content End -->
    <script>
    $('#categorias').addClass('selected');
    </script>
    @stop