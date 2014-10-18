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
        				<?php $i = 0; ?>
        				@foreach($cs as $c)
        					@if ($c->C_ID == $cat->C_ID)
	        					@if( $i>=4 && ($i%4) == 0 )
					   				</div>
						   			@if( $i == 4)
						   				<div class="more_spc" id="cat_{{ $cat->C_ID }}">
						   			@endif
						   			<div class="row">
					   			@endif
								<div class="col-md-3">
					                <div class="service">  
					                    <a href="{{ url('especialidad/' . $c->S_ID) }}"><h4>{{ $c->S_name}}</h4>
					                    <p>{{ $c->S_description }}<strong><i>Leer Más</i></strong></p></a>
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
					            <?php $i++; ?> 		
					           @endif
        				@endforeach
        			@endif
        		</div> 
			</div>
		</div>
		<center><input type="button" class="btn btn-default more" id="spc_{{ $cat->C_ID }}" value="Ver más"></center>
    	<div class="space60"></div>
        <?php $j++; ?>   
    @endforeach
@endif
				   	

<div class="space60"></div>
<script>
	$('#categorias').addClass('selected');
</script>

@stop