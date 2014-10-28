<div class="space20"></div>
 
	<!-- Footer -->  
	<footer class="footer">
		<!-- Parallax --> 
		<div id="parallax-one" class="parallax" style="background-image: url({{ URL::asset('../app/images/foto_nueva_abajo.jpg'); }}); background-position: 50%">
			<div class="footer-promo">
				<div class="container">
            		<div class="row">
                		<div class="col-md-12">
				 			<h4>"{{ Lang::get('messages.footer_photo') }}"</h4>
						</div>
			   		</div>
			  	</div>
			</div>
		</div> 
		
		<!-- Parallax End --> 
		<div class="footer-info">
			<div class="container">
				<div class="row">

						<div class="col-md-3 col-sm-6">
							<h6>INFORMACION DE CONTACTO</h6>
							Calle Lorum<br>
							Tijuana Baja California<br>
							México<br>
							<br>
				            <div class="item-icon">
				              <i class="fa fa-phone"></i>
				              (613) 9999-0000-123<br>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-phone"></i>
				              (412) 7733-1111-456<br>
				            </div>
				            <br>
				            <div class="item-icon">
				              <i class="fa fa-envelope"></i>
				              <a href="#">info@tjmed.com</a><br>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-support"></i>
				              <a href="#">support@tjmed.com</a><br>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-comment"></i>
				              <a href="#">chat@tjmed.com</a><br>
				            </div>
				            <div class="space20"></div>
						</div>


<div class="col-md-6 col-sm-6">
            <h6>Contactanos</h6>
            <div class="space5"></div>
            
            <!-- Form -->
            <form role="form" name="ajax-form" id="ajax-form" action="php/mail-it.php" method="post" class="contact-form">
              <div class="row">            
                <div class="form-group col-sm-6">
                  <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Nombre">
                  <div class="error" id="err-name">Please enter name</div>
                </div>
                <div class="form-group col-sm-6">
                  <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                  <div class="error" id="err-emailvld">E-mail is not a valid format</div> 
                </div>
              </div>                
              <div class="row">            
                <div class="form-group col-md-12">
                  <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Mensaje'" onfocus="if(this.value == 'Message') this.value=''">Message</textarea>
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
                  <button type="submit" class="btn btn-sm" id="send">Mandar Mensaje</button>
                </div>
              </div>
            </form>   
            <!-- Form End -->
            
            <div class="space20"></div>
          </div>						

		<div class="col-md-3">
			<a class="twitter-timeline" href="https://twitter.com/TJMed_2014" data-widget-id="505521170477621248" data-chrome="transparent">Tweets por @TJMed_2014</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                                          
            <div class="space20"></div>                   
          </div>
		</div>

				</div>
			</div>

			<div class="copyright" style="padding-top: 15px; padding-bottom: 15px;"> 
			  <div class="container">  
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<div class="copyright-info">
							  {{ Lang::get('messages.copyright') }}
						</div>
					</div>  
				</div> 
			  </div>				
			</div>
		</footer>       
		<!-- Footer End --> 

		
	  
	  <a href="#" class="back-to-top" style="display: none;"><span></span></a> 
	  
	</body>
</html>