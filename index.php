<?php   
    include_once('conexion.php');
    include_once('mysql_class.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($dbc));
    $dbc->set_charset('utf8');

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
