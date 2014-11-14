<div class="space20"></div>
 
	<!-- Footer -->  
	<footer class="footer">
		<!-- Parallax --> 
		<div id="parallax-one" class="parallax" style="background-image: url({{ URL::asset('images/foto_nueva_abajo.jpg'); }}); background-position: 50%">
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
							<h6>{{ Lang::get('messages.contact_info_t') }}</h6>
							Tijuana, Baja California<br>
							México<br>
							<br>
							<!--
				            <div class="item-icon">
				              <i class="fa fa-phone"></i>
				              (613) 9999-0000-123<br>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-phone"></i>
				              (412) 7733-1111-456<br>
				            </div>
				        -->
				            <div class="item-icon">
				              <i class="fa fa-facebook"></i>
				              {{ HTML::link('http://Facebook.com/tjmed.mx', 'Facebook')}}
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-twitter"></i>
				              {{ HTML::link('http://Twitter.com/TJMed_2014', 'Twitter')}}
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-envelope"></i>
				              <a href="mailto:TjMed.mx@gmail.com">Gmail</a>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-google-plus"></i>
				              <a href="#">Google+</a>
				            </div>				            
				            <div class="item-icon">
				              <i class="fa fa-youtube"></i>
				              <a href="">Youtube</a>
				            </div>				            
				            <div class="space20"></div>
						</div>


<div class="col-md-6 col-sm-6">
            <h6>{{ Lang::get('messages.contact_us_t') }}</h6>
            <div class="space5"></div>
            
            <!-- Form -->
            <form role="form" name="ajax-form" id="ajax-form" action="php/mail-it.php" method="post" class="contact-form">
              <div class="row">            
                <div class="form-group col-sm-6">
                  <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_name') }}'" onfocus="if(this.value == '{{ Lang::get('messages.contact_name') }}') this.value=''" type="text" value="{{ Lang::get('messages.contact_name') }}">
                  <div class="error" id="err-name">Please enter name</div>
                </div>
                <div class="form-group col-sm-6">
                  <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == '{{ Lang::get('messages.contact_email') }}') this.value='';" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_email') }}';" value="{{ Lang::get('messages.contact_email') }}">
                  <div class="error" id="err-emailvld">E-mail is not a valid format</div> 
                </div>
              </div>                
              <div class="row">            
                <div class="form-group col-md-12">
                  <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_message') }}'" onfocus="if(this.value == '{{ Lang::get('messages.contact_message') }}') this.value=''">{{ Lang::get('messages.contact_message') }}</textarea>
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
                  <button type="submit" class="btn btn-sm" id="send">{{ Lang::get('messages.contact_send') }}</button>
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