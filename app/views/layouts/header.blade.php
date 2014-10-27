<!-- Header -->
<header> 
	<div class="container" style="background-color: #0ab2db; width: 100%;padding-left: 0px;padding-right: 0px;">
		<div class="container">
		    <div class="row">
		        <div class="col-md-1">                    
			      	<a href={{ url('/') }} title="Home">
			      		{{ HTML::image('../app/images/Logo_Tj.png', 'logo tjmed', array('id' => 'logo_img')) }}
			      	</a>
				</div>
				
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div align="right">	
						<ul>
							<li id="username-li">
								@if ( ! Auth::check())
									<a href="registrar"> {{ Lang::get('messages.register') }} -</a>  
									<a href="#" data-toggle="modal" data-target="#myModal"> {{ Lang::get('messages.log_out') }}</a>
								@else
									<a href="#"> {{ Auth::user()->U_firstname }} {{ Auth::user()->U_lastname }}</a> |
									{{ link_to('logout', 'Cerrar sesión') }}
								@endif
								
								&nbsp;<a href="{{ url('es') }}"> {{ HTML::image('../app/images/Icon_es.png', 'español', array('class' => 'lang_img')) }}</a>
								&nbsp;<a href="{{ url('en') }}"> {{ HTML::image('../app/images/icon_en.png', 'ingles', array('class' => 'lang_img')) }}</a>
							</li>
						</ul>
					</div>

<TABLE style="width: 100%;">
<TR>
<TD style="width: 70%;">
					<div id="undefined-sticky-wrapper" class="sticky-wrapper">	
						<nav class="navbar" role="navigation">								
							<ul class="nav">
								<li id="inicio"> {{ link_to("/", Lang::get('messages.home'), array('id'=>'menu_first')) }} </li>               				
								<li id="negocios">{{ link_to("doctores", Lang::get('messages.doctors'), array('id'=>'menu_first')) }}</li>		     					
								<li id="categorias">{{ link_to("especialidades", Lang::get('messages.tittle_1'), array('id'=>'menu_first')) }}		
									<ul>
										<li><a href="{{ url('categoria/1') }}" title="" style="font-size: 15px">{{ Lang::get('messages.category_1') }}</a></li>
										<li><a href="{{ url('categoria/2') }}" title="" style="font-size: 15px">{{ Lang::get('messages.category_2') }}</a></li>
										<li><a href="{{ url('categoria/3') }}" title="" style="font-size: 15px">{{ Lang::get('messages.category_3') }}</a></li>
										<li><a href="{{ url('categoria/4') }}" title="" style="font-size: 15px">{{ Lang::get('messages.category_4') }}</a></li>																				
									</ul>	
								</li>
							    <li id="articulos">{{ link_to("articulos", Lang::get('messages.articles'), array('id'=>'menu_first')) }}</li>
								<li id="acerca">{{ link_to("acerca", Lang::get('messages.about_us'), array('id'=>'menu_first')) }}</li>           						
							    <li id="contacto">{{ link_to("contacto", Lang::get('messages.contact'), array('id'=>'menu_first')) }}</li>
							</ul>
</TD>
<TD style="width: 30%;">							
								<div id="bar" style="font-size: 17px;"> 
								  	<div class="input-group">
								  		{{ Form::open(array('url' => 'doctores', 'id' => 'search_form')) }}
								  			<input id="search" name="search" type="text" class="form-control" placeholder="{{ Lang::get('messages.search_text') }}" style="width: 85%;"> 
								  			
								  			<a href="#" onclick="document.getElementById('search_form').submit();" style="width: 15%;">
								  				<!--<input id="search" name="search" type="button" lass="fa fa-search fa-2x" id="search_button" style="width: 20%;">-->
								  				&nbsp;&nbsp;<span class="fa fa-search fa-2x" id="search_button"></span>
								  			</a>
								  		{{ Form::close() }}
									</div>													
								   </div>
						        </nav>
					        </div>	
</TD>
</tr>								
</TABLE>															
						</div>
					</div> 
				</div>         
			</div> 
		</header>

		<!-- Header End -->

		<div class="modal fade" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Inicia Sesión</h4>
		      </div>
			      {{ Form::open(['route' => 'sessions.store']) }}
			      <div class="modal-body">
			      	<p>Llena los campos para iniciar sesión normal</p>
					  <div class="form-group">
					  	{{ Form::label('U_username', 'Nombre de usuario: ') }}
						{{ Form::text('U_username', '', array('class' => 'form-control session', 'placeholder' => 'Ingrese nombre de usuario')) }}
					</div>
					  <div class="form-group">
					  	{{ Form::label('U_password', 'Contraseña: ') }}
					  	<br>
						{{ Form::password('U_password', array('class' => 'form-control session', 'placeholder' => 'Ingrese contraseña')) }}
					   </div>
			      </div>
			      <div class="modal-footer">
			      	
			      	<center>{{ Form::submit('Iniciar sesión', array('class' => 'btn btn-primary')) }}</center>
			      {{ Form::close() }}

			  	</div>
			  	
			  	<center>
			      <p> Ó inicia sesión con Facebook </p>
			      <a href="{{ url('login/fb') }}" ><button class="btn btn-default btn-sm"><span class="fa fa-facebook"></span> Iniciar Sesión con Facebook</button></a>
			      </center>
			      <br>
			  	
		    </div>
		  </div>
		</div>
