@extends('admin.index')
@section('content_admin')
<h2> Bienvenido, {{ Auth::user()->U_firstname . ' ' . Auth::user()->U_lastname }} </h2>
<div class="row">
      <div class="col-md-4">
        <div class="service-2">  
          <a href="{{ url('admin/usuarios') }}" >
          <i class="fa fa-users"></i>

          <h4>Usuarios</h4>
          </a>
          <p>Administración de la sección de usuarios, aquí se podrán editar y deshabilitar usuarios administradores, propietarios y regulares.</p>
        
        </div>  
        <div class="space40"></div>
      </div> 
      
      <div class="col-md-4">
        <div class="service-2">  
          <a href="{{ url('admin/doctores') }}">
          <i class="fa fa-user-md"></i>
          <h4>Doctores</h4>
        </a>
          <p>Administración de la sección de negocios, hospitales y doctores, se podrán agregar, editar y desactivar. Se administran también
              categorías, etiquetas, comentarios, etc.</p>
        </div>  
        <div class="space40"></div>
      </div> 
  
      <div class="col-md-4">
        <div class="service-2">  
          <i class="fa fa-stethoscope"></i>
          <h4>Categorías</h4>
          <p>Administración de categorías y especialidades clínicas, aquí se pueden editar, agregar y eliminar especialidades.</p>
        </div>    
        <div class="space40"></div>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="service-2">  
          <i class="fa fa-file-text-o"></i>
          <h4>Artículos</h4>
          <p>En esta sección se pueden escribir nuevos artículos, administrar, editar o eliminar los existentes y sus propiedades.</p>
        </div>  
        <div class="space40"></div>
      </div> 
    </div>


    
<script>
$('#dashboard').addClass('active');
</script>
@stop