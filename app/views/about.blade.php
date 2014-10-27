@extends('layouts.default')
@section('content')

<div class="space60"></div>

<div class="container">
  <div class="row">    
    <div class="col-md-8">  
      <!--Acordion-->	
		  <div class="accordion" id="accordion2">
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">
              <h6>{{ Lang::get('messages.about_us') }}</h6>
            </a>
          </div>
          <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner" align="justify">
              <p>{{ Lang::get('messages.about_us_text1') }}</p>
              <p>{{ Lang::get('messages.about_us_text2') }}</p>
            </div>
          </div>
        </div>

        <a name="Mision"></a>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">   
				      <h6>{{ Lang::get('messages.mision') }}</h6>
            </a>
          </div>
          <div id="collapseTwo" class="accordion-body collapse in">
            <div class="accordion-inner" align="justify">
              <p>{{ Lang::get('messages.mision_text') }}</p>				
            </div>
          </div>
        </div>

        <a name="Vision"></a>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">
              <h6>{{ Lang::get('messages.vision') }}</h6>
            </a>
          </div>
          <div id="collapseThree" class="accordion-body collapse in">
            <div class="accordion-inner" align="justify">
              <p>{{ Lang::get('messages.vision_text') }}</p>
            </div>
          </div>
        </div>
      </div>
    	<!--Acordion End-->	
      <div class="space40"></div>  
    </div>  
      
    <div class="col-md-4">
      <img src="../app/images/quienes somos.png" alt="Smiley face" width="100%" height="100%">
      <br>
      <div class="client-says">
        <div class="client-text">   
          <p>{{ Lang::get('messages.ceo_words') }}<p>
        </div>  
        <div class="client-name">
          <i class="fa fa-quote-right"></i>{{ Lang::get('messages.tj_med') }}
        </div>  
      </div>
      <div class="space40"></div>  
    </div>
         
  </div>
</div>

<div class="space60"></div>
<!-- Content End -->

<script>
$('#acerca').addClass('selected');
</script>
@stop