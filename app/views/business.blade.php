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
		      <div class="rating" style="margin-bottom: 15px;">
					  <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
				  </div>
          <h6 style="color:#0AB2DB; margin-bottom: 0px;">
            <?php $i = 0; ?>
            @foreach ($b_cat as $c)
              @if ($bus->B_ID == $c->B_ID)
                  @if ($i > 0)
                    ,
                  @endif
                 {{ $c->S_name}}
                 
                 <?php $i++; ?>
              @endif
            @endforeach
            </h6>
		      <h6 style="margin-bottom: 0px;">Descripción</h6>
		      <p align="justify">
		        {{ $bus->b_description }}
		      </p>                
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

  <div class="promo-box" style="
    padding-top: 35px;
    padding-bottom: 35px;
">
    <div class="container">  
      <div class="row">
        <div class="col-md-8 promo-text">
          <h4>¿No encuentras lo que estás buscando? Si el negocio que está buscando no está aquí, por favor agregue! <span class="author">TjMed</span></h4>
        </div>
        <div class="col-md-4 right">
         <a href="{{ url('agregar') }}"><button class="btn btn-white">Añadir un negocio</button></a>
        </div>
      </div>    
    </div>   
  </div>

		<div class="space60"></div>
		<!-- Content End -->

    <script>
    $('#negocios').addClass('selected');
    </script>

@stop