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
        <h1>¡Contáctanos!</h1>
      </div>
    </div>    
  </div>

    <div class="container">

    <div class="row"> 
      <div class="col-md-6">  
      
        <div class="row contact-data">
 
          <div class="col-md-6">
            <h4>Escríbenos también en los siguientes temas</h4>  
            <i class="fa fa-check-square-o"></i> ¿Tienes dudas del uso de la página?<br>
            <i class="fa fa-check-square-o"></i> ¿Te gustaría darnos sugerencias?<br>
            <i class="fa fa-check-square-o"></i> ¿Algo no funciona bien?<br>
            <i class="fa fa-check-square-o"></i> ¿Quieres aparecer en la página inicial?<br>
            <i class="fa fa-check-square-o"></i> Pregúntanos por paquetes especiales.<br>            
            <div class="space40"></div>
          </div>  
 
          <div class="col-md-6 social-4">
            <h4>Redes sociales</h4>           
            <a href="http://Facebook.com/tjmed.mx"><i class="fa fa-facebook"></i></a>
            <a href="http://Twitter.com/TJMedmx"><i class="fa fa-twitter"></i></a>
            <a href="mailto:TjMed.mx@gmail.com"><i class="fa fa-envelope"></i></a>
            <a href="https://plus.google.com/u/0/103801568625839532131/posts"><i class="fa fa-google-plus"></i></a>
            <a href="#https://vimeo.com/user34429078"><i class="fa fa-vimeo-square"></i></a>
          </div>  
          <div class="space40"></div>
        </div>
      
      </div> 
      <div class="col-md-6">  
        
        <h4>Contacto</h4>    
        <!-- Form -->
       {{ Form::open(array('url' => 'mail')) }}
          <div class="row">            
            <div class="form-group col-sm-6">
              <label for="name2">Nombre</label>
              <input class="form-control session" id="name" name="name" type="text" placeholder="Nombre">
              <div class="error" id="err-name">Please enter name</div>
            </div>
            <div class="form-group col-sm-6">
              <label for="email2">E-mail</label>
              <input class="form-control session" id="email" name="email" type="text" placeholder="E-mail">
              <div class="error" id="err-emailvld">E-mail is not a valid format</div> 
            </div>
          </div>                
          <div class="row">            
            <div class="form-group col-md-12">
              <label for="message">Mensaje</label>
              <textarea class="form-control session" id="message2" name="msg" placeholder="Mensaje"></textarea>
              <div class="error" id="err-message">Please enter message</div>     
            </div>
          </div> 
          <div class="row spacer30"></div>
          <div class="row">            
            <div class="col-md-12 text-center">
              <div id="ajaxsuccess">E-mail was successfully sent.</div>
              <div class="error" id="err-form">There was a problem validating the form please check!</div>
              <div class="error" id="err-timedout">The connection to the server timed out!</div>
              <div class="error" id="err-state"></div>                 
              <button type="submit" class="btn btn-primary" id="send">Enviar</button>
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