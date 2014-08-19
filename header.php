<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>TjMed</title>
			<meta name="description" content="TJMed Template">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
			<?php include "style_links.php"; ?>

		</head>

		<body style="background: #ffffff;">

		<!-- Header -->
		<header> 

 				<div class="row" style="margin-right: 0px; margin-left: 0px;">
					<div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
						<div class="top-container" style="margin-top: 0px; margin-bottom: 0px;height: 132px;">
							
							<!--Enmientras menu -->
							<div class="imagenFondo">
								<div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 40px;">
									<nav class="navbar" role="navigation">
										<div class="navbar-inner">
											<div class="container" style="margin-left:200px">    
												<ul class="nav navbar-nav l_tinynav1" id="nav"><br><br>
													<li id="inicio" style="margin-left:100px;"><a href="index.php" title="">Inicio</a></li>
													<li id="acerca" style="margin-left:178px; width: 200px;"><a href="index.php?opcion=acerca" title="">¿Quiénes somos?</a></li>	                				
													<li id="negocios" style="margin-left:339px;"><a href="index.php?opcion=negocios" title="">Doctores</a></li>		     					
													<li id="categorias" style="margin-left:441px;width: 200px;"><a href="index.php?opcion=categorias" title="">Especialidades Médicas</a></li>
					           						<li id="articulos" style="margin-left:638px;width: 200px;"><a href="index.php?opcion=articulos" title="">Vida Saludable</a></li>
					            					<li id="servicios" style="margin-left:778px;width: 200px;"><a href="index.php?opcion=servicios" title="">Servicios</a></li> 
					            					<li id="contacto" style="margin-left:880px;"><a href="index.php?opcion=contacto" title="">Contacto</a></li> 
												</ul>
											</div>
										</div>
									</nav>
								</div>
							</div>
							<!--Enmientras menu END-->

							<!-- Logo -->                       
							<!--<a href="index.php" class="logo" title="Home">-->
								<img src="images/menu solo.png" style="width: 1265px; height:132px; vertical-align:text-bottom" alt="">   
								<!--<h5 style="margin-top:-40px; margin-left:90px;">La manera correcta de encontrar tu solución médica</h5>-->
							<!--</a>-->
	 
							<!-- 
							<ul class="top-items">
								<li><i class="fa fa-lightbulb-o"></i>
								<li><a href="#"> Regístrate</a> - <a href="#" data-toggle="modal" data-target="#myModal"> Inicia sesión</a></li>
							</ul>
							<!-- Top Items End --> 
							</div>
						</div>
					</div> 
				</div> 	

			<!--
			<div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 40px;">
				<nav class="navbar" role="navigation">
					<div class="navbar-inner">
						<div class="container">    
							<ul class="nav navbar-nav l_tinynav1" id="nav">
                				<li id="inicio"><a href="index.php" title="">Inicio</a></li>
								<li id="acerca"><a href="index.php?opcion=acerca" title="">¿Quiénes somos?</a> 
									<ul>
										<li><a href="index.php?opcion=acerca#Mision" title="">Misión</a></li>
										<li><a href="index.php?opcion=acerca#Vision" title="">Visión</a></li>
									</ul>	
								</li>	                				
								<li id="negocios"><a href="index.php?opcion=negocios" title="">Doctores</a></li>		     					
								<li id="categorias"><a href="index.php?opcion=categorias" title="">Especialidades Médicas</a>			
									<ul>
										<li><a href="index.php?opcion=categorias#Especialidad1" title="">Especialidades Clínicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad2" title="">Especialidades Quirúrgicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad3" title="">Especialidades Médico Quirúrgicas</a></li>
										<li><a href="index.php?opcion=categorias#Especialidad4" title="">Especialidades de Laboratorio</a></li>																				
									</ul>	
								</li>
           						<li id="articulos"><a href="index.php?opcion=articulos" title="">Vida Saludable</a></li>
            					<li id="servicios"><a href="index.php?opcion=servicios" title="">Servicios</a></li> 
            					<li id="contacto"><a href="index.php?opcion=contacto" title="">Contacto</a></li> 
         					</ul>

							<!-- Search bar -->
							<!--
							<div style="float:right;width:250px;height:40px;margin-left:0px;margin-right:0px;">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Estoy buscando ... ">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret" style="margin-right:11px;"></span></button>
										<ul class="dropdown-menu dropdown-menu-right" role="menu">
											<li><a href="#"><img src="images/dental.png" style="width:20px; margin-right:5px;">Dental</a></li>
											<li><a href="#"><img src="images/cirugia.png" style="width:20px; margin-right:5px;">Cirujía</a></li>
											<li><a href="#"><img src="images/emergencia.png" style="width:20px; margin-right:5px;">Emergencia</a></li>
											<li><a href="#"><img src="images/analisis.png" style="width:20px; margin-right:5px;">Analisis</a></li>
										</ul>
									</div>
								</div>
							</div>
						-->
						</div> 
					</div>  
				</nav>
			</div>
			<!-- Nav End -->	
		</header>
		<!-- Header End -->

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Inicia Sesión</h4>
			  </div>
			  <div class="modal-body">
				<center><form role="form">
				  <div class="form-group">
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
				  </div>
				  <div class="form-group">
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
				  </div>
				  <button type="submit" class="btn btn-primary">Iniciar sesión con correo</button><br><br>
				  <button type="submit" class="btn btn-primary"><img src="images/facebook.png" style="width:20px; margin-right:5px;">Iniciar sesión con Facebook</button>
				</form>
				</center>
			  </div>
			</div>
		  </div>
		</div>