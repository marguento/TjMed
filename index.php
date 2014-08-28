<?php   

    $lang = "";

    if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
    }

    if($lang == 'en') {
        $ruta = 'ing/';
    } else {
        $ruta = 'esp/';
    }
    include $ruta . 'header.php';

    $option = "";

    if(isset($_GET['opcion'])) {
    	$option = $_GET['opcion'];

    	switch($option) {
    		case 'negocios': include $ruta . 'negocios.php'; break;
    		case 'articulos': include $ruta . 'articulos.php'; break;
    		case 'categorias': include $ruta . 'categorias.php'; break;
    		case 'contacto': include $ruta . 'contacto.php'; break;
    		case 'especialidad': include $ruta . 'especialidad.php'; break;
    		case 'perfil': include $ruta . 'perfil.php'; break;
    		case 'acerca': include $ruta . 'quienes_somos.php'; break;
    		case 'servicios': include $ruta . 'servicios.php'; break;
            case 'usuario': include $ruta . 'user_profile.php'; break;
    	}

    } else {
    	 include $ruta . 'content.php';
    }
	
	include $ruta . 'footer.php';
?>
