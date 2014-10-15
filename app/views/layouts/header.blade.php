<!-- Header -->
<header> 
	<div class="container" style="background-color: #0ab2db; width: 100%;padding-left: 0px;padding-right: 0px;">
		<div class="container">
		    <div class="row">
		        <div class="col-md-1">                    
			      	<a href="index.php" title="Home">
		      			<img src="app/images/Logo_Tj.png" style="vertical-align:text-bottom; padding:10px 8px 10px 0px;" alt="">
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
								
								&nbsp;<a href="index.php?lang=es"><img alt="Us" src="app/images/icon_es.png" style="width: 3%;"></a>
								&nbsp;<a href="index.php?lang=en"><img alt="Mx" src="app/images/icon_in.jpg" style="width: 3%;"></a>
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
										<li><a href="index.php?opcion=categorias#Especialidad1" title="" style="font-size: 15px">Especialidades Clínicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad2" title="" style="font-size: 15px">Especialidades Quirúrgicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad3" title="" style="font-size: 15px">Especialidades Médico Quirúrgicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad4" title="" style="font-size: 15px">Especialidades de Laboratorio</a></li>																				
									</ul>	
								</li>
							    <li id="articulos">{{ link_to("articulos", 'Artículos', array('id'=>'menu_first')) }}</li>
								<li id="acerca">{{ link_to("acerca", '¿Quiénes somos?', array('id'=>'menu_first')) }}
									<ul>
										<li><a href="index.php?opcion=acerca#Mision" title="" style="font-size: 15px">Misión</a></li>
										<li><a href="index.php?opcion=acerca#Vision" title="" style="font-size: 15px">Visión</a></li>
									</ul>	
								</li>           						
							    <li id="contacto">{{ link_to("contacto", 'Contacto', array('id'=>'menu_first')) }}</li>
								<li id="bar" style="font-size: 17px; padding-left: 10px;padding-right: 10px;"> 
								  	<div class="input-group">
								  		<input id="search" type="text" class="form-control" placeholder="Estoy buscando ... " style="width: 164%;">
													<!--
													<button id="search_button" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="padding-left: 0px; padding-right: 0px;">
														<span id="search_caret" class="caret" style="margin-right:11px;"></span>
													</button>												
													<ul class="dropdown-menu dropdown-menu-right" role="menu">
														<li><a href="#"><img src="images/icono_.especialidades quirurgicas.png" style="width:20px; margin-right:5px;">Dental</a></li>
														<li><a href="#"><img src="images/icono_especialidades clinicas.png" style="width:20px; margin-right:5px;">Cirujía</a></li>
														<li><a href="#"><img src="images/icono_especialidades medico quirur.png" style="width:20px; margin-right:5px;">Emergencia</a></li>
														<li><a href="#"><img src="images/icono-especialidades de laboratorio.png" style="width:20px; margin-right:5px;">Analisis</a></li>
													</ul>
												-->
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
			      	
			      	<span style="float:left">{{ Form::submit('Iniciar sesión', array('class' => 'btn btn-primary')) }}</span>
			      {{ Form::close() }}
			      <a href="{{ url('login/fb') }}" ><button class="btn btn-default btn-sm"><span class="fa fa-facebook"></span> Iniciar Sesión con Facebook</butt></a>
			      </div>
			  	
		    </div>
		  </div>
		</div>
