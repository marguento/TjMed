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
				            <div class="item-icon">
				              <i class="fa fa-facebook"></i>
				              {{ HTML::link('http://Facebook.com/tjmed.mx', 'Facebook')}}
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-twitter"></i>
				              {{ HTML::link('http://Twitter.com/TJMedmx', 'Twitter')}}
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-envelope"></i>
				              <a href="mailto:contacto@tjmed.mx">{{ Lang::get('messages.contact_email') }}</a>
				            </div>
				            <div class="item-icon">
				              <i class="fa fa-google-plus"></i>
				              <a href="https://plus.google.com/u/0/103801568625839532131/posts">Google+</a>
				            </div>				            
				            <div class="item-icon">
				              <i class="fa fa-vimeo-square"></i>
				              <a href="https://vimeo.com/user34429078">Vimeo</a>
				            </div>				            
				            <div class="space20"></div>
						</div>


<div class="col-md-6 col-sm-6">
            <h6>{{ Lang::get('messages.contact_us_t') }}</h6>
            <div class="space5"></div>
            
            <!-- Form -->
            {{ Form::open(array('url' => 'mail', 'id' => 'ajax-form2')) }}
              <div class="row">            
                <div class="form-group col-sm-6">
                  <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_name') }}'" onfocus="if(this.value == '{{ Lang::get('messages.contact_name') }}') this.value=''" type="text" value="{{ Lang::get('messages.contact_name') }}">
                  <div class="error" id="err-name2">{{ Lang::get('messages.name_v') }}</div>
                </div>
                <div class="form-group col-sm-6">
                  <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == '{{ Lang::get('messages.contact_email') }}') this.value='';" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_email') }}';" value="{{ Lang::get('messages.contact_email') }}">
                  <div class="error" id="err-emailvld2">{{ Lang::get('messages.email_v') }}</div> 
                </div>
              </div>                
              <div class="row">            
                <div class="form-group col-md-12">
                  <textarea class="form-control" id="message2" name="msg" onblur="if(this.value == '') this.value='{{ Lang::get('messages.contact_message') }}'" onfocus="if(this.value == '{{ Lang::get('messages.contact_message') }}') this.value=''">{{ Lang::get('messages.contact_message') }}</textarea>
                  <div class="error" id="err-message2">{{ Lang::get('messages.message_v') }}</div>     
                </div>
              </div> 
              <div class="row spacer30"></div>
              <div class="row">            
                <div class="col-md-12 text-center">
                  <div id="ajaxsuccess2" style="display:none;">{{ Lang::get('messages.emailsuccess_v') }}</div>
                  <div class="error" id="err-form2">{{ Lang::get('messages.problemval_v') }}</div>
                  <div class="error" id="err-timedout2">{{ Lang::get('messages.connection_v') }}</div>
                  <div class="error" id="err-state2"></div>                 
                  <button type="submit" class="btn btn-sm" id="send2">{{ Lang::get('messages.contact_send') }}</button>
                </div>
              </div>
            {{ Form::close() }}  
            <!-- Form End -->
            
            <div class="space20"></div>
          </div>						

		<div class="col-md-3">
		<a class="twitter-timeline" href="https://twitter.com/tjmedmx" data-widget-id="533172065142964225" data-chrome="transparent">Tweets by @tjmedmx</a>
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
							  {{ Lang::get('messages.copyright') }} <?php echo date("Y"); ?> {{ Lang::get('messages.copyright_2') }}
						</div>
					</div>  
				</div> 
			  </div>				
			</div>
		</footer>       
		<!-- Footer End --> 

		
	  
	  <a href="#" class="back-to-top" style="display: none;"><span></span></a>