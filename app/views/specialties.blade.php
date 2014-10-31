@extends('layouts.default')
@section('content')

<div class="space60"></div>

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
					                    	<p align="justify">{{ $c->S_introduction }}<strong><br><i>Leer Más</i></strong></p></a>
							                <?php
							                    switch($j) {
							                        case 0: echo '<span class="fa fa-stethoscope"></span>'; break;
							                        case 1: echo '<span class="fa fa-user-md"></span>'; break;
							                        case 2: echo '<span class="fa fa-plus-square"></span>'; break;
							                        case 3: echo '<span class="fa fa-flask"></span>'; break;
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
		<a href="{{ url('categoria/' . $cat->C_ID) }}"><center><input type="button" class="btn btn-default" value="Ver más"></center></a>
    	<div class="space60"></div>
        <?php $j++; ?>   
    @endforeach
@endif
				   	

<div class="space60"></div>
<script>
	$('#categorias').addClass('selected');
</script>

@stop