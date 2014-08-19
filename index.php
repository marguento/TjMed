<?php   
    include 'header.php';

    $option = "";

    if(isset($_GET['opcion'])) {
    	$option = $_GET['opcion'];

    	switch($option) {
    		case 'negocios': include 'negocios.php'; break;
    		case 'articulos': include 'articulos.php'; break;
    		case 'categorias': include 'categorias.php'; break;
    		case 'contacto': include 'contacto.php'; break;
    		case 'especialidad': include 'especialidad.php'; break;
    		case 'perfil': include 'perfil.php'; break;
    		case 'acerca': include 'quienes_somos.php'; break;
    		case 'servicios': include 'servicios.php'; break;
            case 'usuario': include 'user_profile.php'; break;
    	}

    } else {
    	 include 'content.php';
    }
	
	include 'footer.php';
?>
