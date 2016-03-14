<!-- Header -->
<header> 
	<div id="container_header">
		<div class="container">
		    <div class="row">
			        <a href={{ url('/') }} title="Home" id="logo_img" >
			        	<img src="{{url('images/Logo_Tj.png')}}"
			        		onmouseover="this.src='{{url('images/Logo_Tjmed_azulfuerte.png')}}'" 
			        		onmouseout="this.src='{{url('images/Logo_Tj.png')}}'" 
			        		border="0" 
			        		alt="" 
			        		/>
				    </a>
				    <div align="right" id="top_right">
					<ul>
							<li id="username-li">
								@if ( ! Auth::check())
									<a href="{{url('registrar')}}"> {{ Lang::get('messages.register') }} -</a>  
									<a href="{{url('iniciarsesion')}}"> {{ Lang::get('messages.log_in') }}</a>
								@else
									@if(Auth::user()->U_level == 1)
										<a href="{{url('admin')}}"><span class="fa fa-cog"></span> Admin site - </a>
									@endif
									<a href="{{url('perfil')}}"><span class="fa fa-user"></span> {{ Auth::user()->U_firstname }} {{ Auth::user()->U_lastname }} - </a>
									<a href="{{url('logout')}}"><span class="fa fa-sign-out"></span> {{ Lang::get('messages.log_out') }} </a>
								@endif
								
								&nbsp;<a href="{{ url('es') }}">		        	
											<img src="{{url('images/Icon_es.png')}}"
								        		onmouseover="this.src='{{url('images/Es_Fuerte.png')}}'" 
								        		onmouseout="this.src='{{url('images/Icon_es.png')}}'" 
								        		border="0" 
								        		alt="spanish" 
								        		class="lang_img"
								        		/>
												</a>

								&nbsp;<a href="{{ url('en') }}">		        	
											<img src="{{url('images/En_Blanco.png')}}"
								        		onmouseover="this.src='{{url('images/en_AZUL.png')}}'" 
								        		onmouseout="this.src='{{url('images/En_Blanco.png')}}'" 
								        		border="0" 
								        		alt="english" 
								        		class="lang_img"
								        		/>
												</a>
							</li>
						</ul>
							<nav class="navbar">					
										<ul class="nav" style="width:auto; float:left">
											<li id="inicio"> {{ link_to("/", Lang::get('messages.home'), array('id'=>'menu_first')) }} </li>               				
											<li id="negocios">{{ link_to("doctores", Lang::get('messages.doctors'), array('id'=>'menu_first')) }}</li>		     					
											<li id="categorias">{{ link_to("especialidades", Lang::get('messages.tittle_1'), array('id'=>'menu_first')) }}		
												<ul>
													<li><a href="{{ url('categoria/1') }}" title="" style="font-size: 15px">{{ Lang::get('messages.sub_menu1') }}</a></li>
													<li><a href="{{ url('categoria/2') }}" title="" style="font-size: 15px">{{ Lang::get('messages.sub_menu2') }}</a></li>
													<li><a href="{{ url('categoria/3') }}" title="" style="font-size: 15px">{{ Lang::get('messages.sub_menu3') }}</a></li>
													<li><a href="{{ url('categoria/4') }}" title="" style="font-size: 15px">{{ Lang::get('messages.sub_menu4') }}</a></li>																				
												</ul>	
											</li>
										    <li id="articulos">{{ link_to("articulos", Lang::get('messages.articles'), array('id'=>'menu_first')) }}</li>
											<li id="acerca">{{ link_to("acerca", Lang::get('messages.about_us'), array('id'=>'menu_first')) }}</li>           						
										    <li id="contacto">{{ link_to("contacto", Lang::get('messages.contact'), array('id'=>'menu_first')) }}</li>
										    </ul>
										    <div style="width:300px">
										{{ Form::open(array('url' => 'doctores')) }}
										  	<div class="input-group">
										  		
										  			<input id="search" name="search" type="text" class="form-control" placeholder="{{ Lang::get('messages.search_text') }}" style="width:85%"> 
										  			
										  			<a href="#" onclick="document.getElementById('search_form').submit();" style="width:15%">
										  				&nbsp;&nbsp;<span class="fa fa-search fa-2x" id="search_button" ></span>
										  			</a>
										  		
											</div>	
      									{{ Form::close() }}	
      									</div>	
      										
										
						</nav>
						</div>
										
			</div> 
		</div> 
	</div> 
</header>

