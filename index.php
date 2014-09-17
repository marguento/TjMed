<?php   
    session_start();
    include_once('conexion.php');
    include_once('mysql_class.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($dbc));
    $dbc->set_charset('utf8');
    
      
    $option = "";
    $url = "";

    if(isset($_GET['opcion'])) {
        $option = $_GET['opcion'];
        $url = 'opcion=' . $option . '&';
    }

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
            default: include $ruta . 'content.php';
    	}
	
	include $ruta . 'footer.php';
?>
