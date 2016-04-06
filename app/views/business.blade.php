@extends('layouts.default')
@section('content')

<div class="space20"></div>
<div class="container">
<ol class="breadcrumb" style="padding-right: 0px;">
    <li></li>    
    <li class="active" style="color:#083D5C">{{ Lang::get('messages.search') }}</li>
  </ol>

  <div class="blog-container">
  <br>
  @if (Session::has('var'))
    {{ Session::get('var') }}
  @endif 
  <div class="space20"></div> 
  <div class="row">
    <div class="col-md-12">
      <a href="{{url('doctores')}}">
        <h1>{{ Lang::get('messages.reg_bussines') }} ({{ $business->getTotal() }})</h1>  
      </a>
    </div>
  </div>

<div class="container">  
  {{ Form::open(array('url' => 'doctores')) }}
  <div class="row">  
    <div class="col-md-3" style="padding-left: 0px;">
      <select name="category" class="form-control" id="category" style="color:black; font-size:14px">
        <option value="all">{{ Lang::get('messages.all') }}</option>
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
      <button class="btn btn-default btn-sm" type="submit" style="font-size:16px; padding:5px 20px 5px 20px;">{{ Lang::get('messages.search_by_spec') }}</button>
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
            {{ HTML::image('images_server/' . $bus->b_image, 'Doctor default picture') }} 
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
                  | <a href="{{ url('doctor/'.$bus->B_ID) }}#comments">{{ $bus->comments_count }} {{ Lang::get('messages.reviews') }}</a>
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
          <div class="social-container">
            <div class="social-2">
                <a style="cursor: pointer;">
                  <i class="fa fa-envelope-o" id="some-div"><span id="some-element">{{ $bus->b_email }}</span></i>
                </a>
                <a style="cursor: pointer;">
                  <i class="fa fa-phone" id="some-div"><span id="some-element">{{ $bus->b_telephone }}</span></i>
                </a>
                <a style="cursor: pointer;">
                  <i class="fa fa-map-marker" id="some-div"><span id="some-element">{{ $bus->b_address }}</span></i>
                </a>
                @if($bus->b_facebook != '')
                  <a href="{{ url($bus->b_facebook) }}"><i class="fa fa-facebook"></i></a>
                @endif
                @if($bus->b_twitter != '')
                  <a href="{{ url($bus->b_twitter) }}"><i class="fa fa-twitter"></i></a>
                @endif
                @if($bus->b_youtube != '')
                  <a href="{{ url($bus->b_youtube) }}" target="_blank"><i class="fa fa-youtube"></i></a>
                @endif
                @if($bus->b_linkedin != '')
                  <a href="{{ url($bus->b_linkedin) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                @endif
                @if($bus->b_website != '')
                  <a href="{{ url($bus->b_website) }}" target="_blank"><i class="fa fa-globe"></i></a>
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
	<div class="container"><p> {{ Lang::get('messages.no_bussines') }}</p></div>
@endif


  <div class="container">  
    <div class="row">
      <div class="col-md-12">      
        <div class="alert_main">
          
          <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Lang::get('messages.add_bussines_tag1') }}
            <a href="{{ url('agregar') }}">
              <button class="btn btn-default btn-sm" align="right" style="font-size:16px; margin-left:20px;">{{ Lang::get('messages.add_bussines_but1') }}</button>
            </a>
        </div>
      </div>    
    </div> 
  </div>  

<div class="container">
    <div class="row">
      <div class="col-md-12" align="right">
        <?php echo $business->links(); ?>
      </div>
    </div>
  </div>
</div>
</div>
  <div class="space40"></div> 

    <script>
    $('#negocios').addClass('selected');
    </script>

@stop