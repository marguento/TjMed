@extends('layouts.default')
@section('content')

<div class="space20"></div>
<div class="container">
<ol class="breadcrumb" style="padding-right: 0px;">
      
    <li></li>
    <li class="active" style="color:#083D5C">{{ Lang::get('messages.tittle_1') }}</li>  
  </ol>

  <div class="blog-container">      
  <div class="space20"></div>   
@if ($categories->count())
<?php $j = 0; ?>
    @foreach ($categories as $cat)
    	<a name="{{ $cat->C_ID }}"></a>
		    <div class="container">
		        <div class="row">
		    		<div class="col-md-12">
		    			<a href="{{ url('categoria/' . $cat->C_ID) }}">
		            		<h1 id="name_{{ $cat->C_ID }}">{{ $cat->C_name }}</h1>
		            	</a>
		          	</div>
		        </div>
		   	</div>
		   	<div class="container">
        		<div class="row">
        			@if($cs->count())
        				<?php $i = 4; ?>
        				@foreach($cs as $c)
        					@if($i>0)
        						@if ($c->C_ID == $cat->C_ID)
									<div class="col-md-3">
					                	<div class="service">  
					                    	<a href="{{ url('especialidad/' . $c->S_ID) }}"><h4>{{ $c->S_name}}</h4>
					                    	<p align="justify">{{ $c->S_introduction }}<strong><br><i>{{ Lang::get('messages.read_more') }}</i></strong></p></a>
							                <?php
							                    switch($j) {
							                        case 0: echo '<span class="fa"><img src="' . url('images/icono_especialidades clinicas.png') . '"></span>'; break;
							                        case 1: echo '<span class="fa"><img src="' . url('images/icono_.especialidades quirurgicas.png') . '"></span>'; break;
							                        case 2: echo '<span class="fa"><img src="' . url('images/icono_especialidades medico quirur.png') . '"></span>'; break;
							                        case 3: echo '<span class="fa"><img src="' . url('images/icono-especialidades de laboratorio.png') . '"></span>'; break;
							                    }
							               	?>
					                	</div>
					                	<div class="space20"></div>    
					            	</div>
					            	<?php $i--; ?> 		
					          	@endif
					        @endif
        				@endforeach
        			@endif
        		</div> 
			</div>
		<a href="{{ url('categoria/' . $cat->C_ID) }}"><center><input type="button" class="btn btn-default" value="{{ Lang::get('messages.view_more') }}"></center></a>
    	<div class="space60"></div>
        <?php $j++; ?>   
    @endforeach
@endif
</div>
</div>				   	

<div class="space60"></div>
<script>
	$('#categorias').addClass('selected');
</script>

@stop