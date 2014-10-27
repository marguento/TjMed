@extends('layouts.default')
@section('content')

  <div class="container">
    <ol class="breadcrumb">
      <li>{{ link_to('especialidades', 'Regresar a especialidades') }}</li>
      <li class="active" style="color:#083D5C">Perfil especialidad</li>
    </ol>
    <div class="row">
      <div class="col-md-8" align="justify">
          <div class="service"> 
            <h2>{{ $speciality->S_name }}</h2>
              <?php
                switch($speciality->C_ID) 
                {
                  case 1: echo '<span class="fa fa-stethoscope"></span> '; break;
                  case 2: echo '<span class="fa fa-user-md"></span> '; break;
                  case 3: echo '<span class="fa fa-plus-square"></span> '; break;
                  case 4: echo '<span class="fa fa-flask"></span> '; break;
               }
             ?>
             <a href="{{ url('categoria/' . $speciality->C_ID) }}">
              <h5>{{ $speciality->C_name }} </h5>
            </a>
          </div>
        {{ $speciality->S_description }}
      </div> 

      <div class="col-md-4">
      <h4>Seguir Leyendo:</h4>
        <!-- List -->
        <ul class="list-3">

        <p>	
        <h6>Especialidades clínicas</h6>
          <li>
             <a href="#"><i class="fa fa-caret-right"></i> Cardiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neumología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Pediatría</a>
          </li>
		</p>

        <p>	
		<h6>Especialidades Quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Plástica</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Cardiovascular</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Torácica</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Neurocirugía</a>
          </li>
		</p>

        <p>	
		<h6>Especialidades médico quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Estomatología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Oftalmología</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Otorrinolaringología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Urología</a>
          </li>
		</p>

        <p>	
		<h6>Especialidades de laboratorio o diagnósticas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Inmunología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Patológica</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Microbiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurofisiología</a>
          </li>
		</p>				

        </ul>
        <!-- List End -->
        <div class="space20"></div>
        <div class="divider"></div>
        <div class="space40"></div>
        
      </div>


     </div>  
    </div> 
		<div class="space60"></div>
		<!-- Content End -->
    <script>
    $('#categorias').addClass('selected');
    </script>
    @stop