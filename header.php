<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>TjMed</title>
			<meta name="description" content="TJMed Template">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
			<?php include "style_links.php"; ?>

		</head>

		<!-- Header -->
		<header> 
			<div class="container" style="background-color: #0ab2db;margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px;width: 100%;">
			    <div class="row" style="margin-left: 0px; margin-right: 0px; width: 1265px;">
			        <!-- Bloque A --> 
			        <div class="col-md-2">
			        <!-- Logo --> 			        	
				        <center>                      
				      		<a href="index.php" title="Home"><img src="images/Logo_Tj.png" style="width: 45%; height:45%; vertical-align:text-bottom; padding:10px 10px 10px 10px;" alt=""></a>
				        </center>
			        </div>

			        <!-- Bloque B -->
			        <div class="col-md-10">
				    	<!-- Menu -->
				    	<div class="col-md-9" style="padding-left: 0px; padding-right: 0px;">
				    		<br>
				    		<br>
				 		   	<div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 40px;padding-top: 15px;">	
					 		   	<nav class="navbar" role="navigation" style="width: 100%;">
					   	 		 	<div class="navbar-inner">
						       			<strong>
							        		<ul class="nav navbar-nav l_tinynav1" id="nav" style="width: 100%;">
							               		<li id="inicio"><a href="index.php" title="" style="font-size: 18px; padding-left: 10px;padding-right: 10px;">Inicio</a></li>	                				
												<li id="negocios"><a href="index.php?opcion=negocios" title="" style="font-size: 18px; padding-left: 10px;padding-right: 10px;">Doctores</a></li>		     					
												<li id="categorias"><a href="index.php?opcion=categorias" title="" style="font-size: 18px">Especialidades Médicas</a>			
													<ul>
														<li><a href="index.php?opcion=categorias#Especialidad1" title="" style="font-size: 15px">Especialidades Clínicas</a></li>
														<li><a href="index.php?opcion=categorias#Especialidad2" title="" style="font-size: 15px">Especialidades Quirúrgicas</a></li>
														<li><a href="index.php?opcion=categorias#Especialidad3" title="" style="font-size: 15px">Especialidades Médico Quirúrgicas</a></li>
														<li><a href="index.php?opcion=categorias#Especialidad4" title="" style="font-size: 15px">Especialidades de Laboratorio</a></li>																				
													</ul>	
												</li>
							           			<li id="articulos"><a href="index.php?opcion=articulos" title="" style="font-size: 18px; padding-left: 10px;padding-right: 10px;">Vida Saludable</a></li>
												<li id="acerca"><a href="index.php?opcion=acerca" title="" style="font-size: 18px; padding-left: 10px;padding-right: 10px;">¿Quiénes somos?</a> 
													<ul>
														<li><a href="index.php?opcion=acerca#Mision" title="" style="font-size: 15px">Misión</a></li>
														<li><a href="index.php?opcion=acerca#Vision" title="" style="font-size: 15px">Visión</a></li>
													</ul>	
												</li>           						
							            		<li id="contacto"><a href="index.php?opcion=contacto" title="" style="font-size: 18px; padding-left: 10px;padding-right: 10px;">Contacto</a></li>
							            	</ul>	
						            	</strong> 
					           		</div>
					           	</nav>
				            </div>
						</div>
				       	<!-- Search bar -->
				        <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;">
					        <ul class="top-items" style="width: 100%; padding-left: 35px;">
								<li style="padding: 5px 0 10px 0;">
									<a href="#"> Regístrate -</a>  
									<a href="#" data-toggle="modal" data-target="#myModal"> Inicia sesión</a>
								</li>
								<li style="padding: 5px 0 10px 0; width: 30%;padding-right:">
									&nbsp;<a href="#"><img alt="Us" src="images/icon_es.png" style="width: 40%;"></a>
									&nbsp;<a href="#"><img alt="Mx" src="images/icon_in.jpg" style="width: 40%;"></a>
								</li>
							</ul>
							<br>
							<br>
							<i>
							<div class="input-group" style="width: 100%;">
								<input id="search" type="text" class="form-control" placeholder="Estoy buscando ... " style="height: 41px;">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height: 41px;">
										<span class="caret" style="margin-right:11px;"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right" role="menu">
										<li><a href="#"><img src="images/icono_.especialidades quirurgicas.png" style="width:20px; margin-right:5px;">Dental</a></li>
										<li><a href="#"><img src="images/icono_especialidades clinicas.png" style="width:20px; margin-right:5px;">Cirujía</a></li>
										<li><a href="#"><img src="images/icono_especialidades medico quirur.png" style="width:20px; margin-right:5px;">Emergencia</a></li>
										<li><a href="#"><img src="images/icono-especialidades de laboratorio.png" style="width:20px; margin-right:5px;">Analisis</a></li>
									</ul>
								</div>
							</div>
							</i>
				       	</div>  
				    </div>         
			    </div> 
			</div>
		</header>
		<!-- Header End -->
