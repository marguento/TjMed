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
									<a href="registrar"> Regístrate -</a>  
									<a href="#" data-toggle="modal" data-target="#myModal"> Inicia sesión</a>
								@else
									<a href="#"> {{ Auth::user()->U_firstname }} {{ Auth::user()->U_lastname }}</a> |
									{{ link_to('logout', 'Cerrar sesión') }}
								@endif
								
								&nbsp;<a href="{{ url('es') }}"> {{ HTML::image('../app/images/Icon_es.png', 'español', array('class' => 'lang_img')) }}</a>
								&nbsp;<a href="{{ url('en') }}"> {{ HTML::image('../app/images/icon_en.png', 'ingles', array('class' => 'lang_img')) }}</a>
							</li>
						</ul>
					</div>

					<div id="undefined-sticky-wrapper" class="sticky-wrapper" style="padding-top: 15px;">	
						<nav class="navbar" role="navigation">
							<ul class="nav">
								<li id="inicio"> {{ link_to("/", 'Inicio', array('id'=>'menu_first')) }} </li>               				
								<li id="negocios">{{ link_to("doctores", 'Doctores', array('id'=>'menu_first')) }}</li>		     					
								<li id="categorias">{{ link_to("especialidades", 'Especialidades Médicas', array('id'=>'menu_first')) }}		
									<ul>
										<li><a href="{{ url('categoria/1') }}" title="" style="font-size: 15px">Especialidades Clínicas</a></li>
										<li><a href="{{ url('categoria/2') }}" title="" style="font-size: 15px">Especialidades Quirúrgicas</a></li>
										<li><a href="{{ url('categoria/3') }}" title="" style="font-size: 15px">Especialidades Médico Quirúrgicas</a></li>
										<li><a href="{{ url('categoria/4') }}" title="" style="font-size: 15px">Especialidades de Laboratorio</a></li>																				
									</ul>	
								</li>
							    <li id="articulos">{{ link_to("articulos", 'Artículos', array('id'=>'menu_first')) }}</li>
								<li id="acerca">{{ link_to("acerca", '¿Quiénes somos?', array('id'=>'menu_first')) }}</li>           						
							    <li id="contacto">{{ link_to("contacto", 'Contacto', array('id'=>'menu_first')) }}</li>
								<li id="bar" style="font-size: 17px; padding-left: 10px;padding-right: 10px;"> 
								  	<div class="input-group">
								  		{{ Form::open(array('url' => 'doctores', 'id' => 'search_form')) }}
								  			<input id="search" name="search" type="text" class="form-control" placeholder="Estoy buscando ... " style="width: 160%;"> 
								  			<a href="#" onclick="document.getElementById('search_form').submit();">
								  				<span class="fa fa-search fa-2x" id="search_button"></span>
								  			</a>
								  		{{ Form::close() }}
									</div>													
								   </li>
								</ul>	

						        </nav>
					        </div>							
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
