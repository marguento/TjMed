@extends('layouts.default')
@section('content')


    <img src="images/contacto_img.png">


    <div class="space40"></div>

<div class="container">
  @if (Session::has('var'))
      {{ Session::get('var') }}
    @endif
    <div class="row"> 
      <div class="col-md-12">
        <h1>{{ Lang::get('messages.contactexc_c') }}</h1>
      </div>
    </div>    
  </div>

    <div class="container">

    <div class="row"> 
      <div class="col-md-6">  
      
        <div class="row contact-data">
 
          <div class="col-md-6">
            <h4>{{ Lang::get('messages.write_c') }}</h4>  
            <i class="fa fa-check-square-o"></i> {{ Lang::get('messages.doubs_c') }}<br>
            <i class="fa fa-check-square-o"></i> {{ Lang::get('messages.sugerencies_c') }}<br>
            <i class="fa fa-check-square-o"></i> {{ Lang::get('messages.works_c') }}<br>
            <i class="fa fa-check-square-o"></i> {{ Lang::get('messages.initialpage_c') }}<br>
            <i class="fa fa-check-square-o"></i> {{ Lang::get('messages.questions_c') }}<br>            
            <div class="space40"></div>
          </div>  
 
          <div class="col-md-6 social-4">
            <h4>{{ Lang::get('messages.social_c') }}</h4>           
            <a href="http://Facebook.com/tjmed.mx"><i class="fa fa-facebook"></i></a>
            <a href="http://Twitter.com/TJMedmx"><i class="fa fa-twitter"></i></a>
            <a href="mailto:contacto@tjmed.mx"><i class="fa fa-envelope"></i></a>
            <a href="https://plus.google.com/u/0/103801568625839532131/posts"><i class="fa fa-google-plus"></i></a>
            <a href="#https://vimeo.com/user34429078"><i class="fa fa-vimeo-square"></i></a>
          </div>  
          <div class="space40"></div>
        </div>
      
      </div> 
      <div class="col-md-6">  
        
        <h4>{{ Lang::get('messages.contact') }}</h4>    
        <!-- Form -->
       {{ Form::open(array('url' => 'mail', 'id' => 'ajax-form')) }}
          <div class="row">            
            <div class="form-group col-sm-6">
              <label for="name2">{{ Lang::get('messages.contact_name') }}</label>
              <input class="form-control session" id="name" name="name" type="text" placeholder="{{ Lang::get('messages.contact_name') }}">
              <div class="error" id="err-name">{{ Lang::get('messages.name_v') }}</div>
            </div>
            <div class="form-group col-sm-6">
              <label for="email2">{{ Lang::get('messages.contact_email') }}</label>
              <input class="form-control session" id="email" name="email" type="text" placeholder="{{ Lang::get('messages.contact_email') }}">
              <div class="error" id="err-emailvld">{{ Lang::get('messages.email_v') }}</div> 
            </div>
          </div>                
          <div class="row">            
            <div class="form-group col-md-12">
              <label for="message">{{ Lang::get('messages.contact_message') }}</label>
              <textarea class="form-control session" id="message" name="msg" placeholder="{{ Lang::get('messages.contact_message') }}"></textarea>
              <div class="error" id="err-message">{{ Lang::get('messages.message_v') }}</div>     
            </div>
          </div> 
          <div class="row spacer30"></div>
          <div class="row">            
            <div class="col-md-12 text-center">
              <div id="ajaxsuccess">{{ Lang::get('messages.emailsuccess_v') }}</div>
              <div class="error" id="err-form">{{ Lang::get('messages.problemval_v') }}</div>
              <div class="error" id="err-timedout">{{ Lang::get('messages.connection_v') }}</div>
              <div class="error" id="err-state"></div>                 
              <button type="submit" class="btn btn-primary" id="send">{{ Lang::get('messages.contact_send') }}</button>
            </div>
          </div>
         {{ Form::close() }}  
        <!-- Form End -->
          
      </div>    

    </div> 
  </div>

    <div class="space60"></div>
    <!-- Content End -->
<script>
$('#contacto').addClass('selected');
</script>

@stop