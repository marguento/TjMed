@extends('layouts.default')
@section('content')


    <iframe id="map" src="https://maps.google.sk/maps/ms?msa=0&amp;msid=210946297010027755543.0004c74af772bb9276d33&amp;ie=UTF8&amp;ll=48.576981,19.13117&amp;spn=0,0&amp;t=m&amp;output=embed"></iframe>


    <div class="space40"></div>

<div class="container">
    <div class="row"> 
      <div class="col-md-12">
        <h1>Contactanos!</h1>
      </div>
    </div>    
  </div>

    <div class="container">
    <div class="row"> 
      <div class="col-md-6">  
      
        <div class="row contact-data">
          <div class="col-md-6">
            <h4>Direccion</h4>
            190 Tehun Street<br>
            Los Angeles, CA 913 20<br>
            United States
            <div class="space40"></div>
          </div>  
          <div class="col-md-6">
            <h4>Horas de Oficina</h4>  
            <strong>Lunes - Viernes:</strong> 09:00 - 17:00<br>
            <strong>Sabados:</strong> 09:00 - 13:00<br>
            <strong>Domingos:</strong> Closed<br>
            <div class="space40"></div>
          </div>  
          <div class="col-md-6">
            <h4>Informacion de Contacto</h4>  
            <i class="fa fa-phone"></i> +48 880 440 110<br>
            <i class="fa fa-envelope"></i> <a href="mailto:support@example.com">support@example.com</a><br>
            <i class="fa fa-globe"></i> <a href="www.example.com" rel="external" target="_blank">www.example.com</a><br>
            <div class="space40"></div>
          </div>  
          <div class="col-md-6 social-4">
            <h4>Media Socials</h4>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-dropbox"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-flickr"></i></a>
            <a href="#"><i class="fa fa-foursquare"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </div>  
          <div class="space40"></div>
        </div>
      
      </div> 
      <div class="col-md-6">  
        
        <h4>Forma de Contacto</h4>    
        <!-- Form -->
        <form role="form" name="ajax-form" id="ajax-form" action="php/esp/mail-it.php" method="post" class="contact-form">
          <div class="row">            
            <div class="form-group col-sm-6">
              <label for="name2">Nombre</label>
              <input class="form-control" id="name" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Nombre">
              <div class="error" id="err-name">Please enter name</div>
            </div>
            <div class="form-group col-sm-6">
              <label for="email2">E-mail</label>
              <input class="form-control" id="email" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
              <div class="error" id="err-emailvld">E-mail is not a valid format</div> 
            </div>
          </div>                
          <div class="row">            
            <div class="form-group col-md-12">
              <label for="message">Mensaje</label>
              <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Mensaje</textarea>
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
        </form>   
        <!-- Form End -->
          
      </div>    

    </div> 
  </div>

    <div class="space60"></div>
    <!-- Content End -->

@stop