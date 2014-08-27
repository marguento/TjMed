<?php   
    //include_once('conexion.php');
    //include_once('mysql_class.php');
    //$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($dbc));
   /// $dbc->set_charset('utf8');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TjMed Administration</title>
    <link rel="stylesheet" href="../styles/admin.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/jasny-bootstrap.min.css">
    <link href="../styles/style.css" rel="stylesheet">
    <link href="../styles/admin_style.css" rel="stylesheet">
    <link href=" http://www.entiri.com/riley-1.3/css/font-awesome.min.css" rel="stylesheet">
   
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#F5F5F5">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">TjMed Administración</a>
        </div>
        <div class="nav navbar-nav navbar-right" style="margin-right: 0px;width: 500px;">
          <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
          <a href="#" style="margin:20px"><i class="fa fa-envelope-o" style="font-size:30px;margin-top:20px;margin-right:-23px;z-index:9;"></i>
            <span class="badge" style="float:right; margin-top:10px;z-index:10">42</span>
          </a>
        </div>
         <div class="col-sm-3">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
              <span class="fa fa-user dash"></span>USER
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mi perfil</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="dashboard"><a href="index.php"><span class="fa fa-home dash"></span>DASHBOARD</a></li>
            <li id="usuario"><a href="index.php?opcion=usuarios"><span class="fa fa-users dash"></span>USUARIOS</a></li>
            <li id="doctor"><a href="index.php?opcion=doctores"><span class="fa fa-user-md dash"></span>DOCTORES</a></li>
            <li><a href="index.php?opcion=especialidades"><span class="fa fa-stethoscope dash"></span>ESPECIALIDADES</a></li>
            <li id="articulo"><a href="index.php?opcion=articulos"><span class="fa fa-file-text-o dash"></span>ARTICULOS</a></li>
            <li><a href="index.php?opcion=comentarios"><span class="fa fa-comments dash"></span>COMENTARIOS</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            $option = "";

            if(isset($_GET['opcion'])) {
              $option = $_GET['opcion'];

              switch($option) {
                case 'doctores': include 'admin_doctor.php'; break;
                case 'doctor_profile': include 'admin_doctor_profile.php'; break;
                case 'usuarios': include 'admin_users.php'; break;
                case 'articulos': include 'admin_art.php'; break;
                case 'new_entry': include 'admin_add_entry.php'; break;
              }

            } else {
               include 'dashboard.php';
            }
          ?>
        </div>
      </div>
    </div>

   
  </body>
</html>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
     <script type="text/javascript" src="../js/admin.bootstrap.js"></script>
     <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

     <script src="../js/tinymce.min.js"></script>
     <script>
     $(document).ready(function(){

     var option = "<?php echo $option; ?>";

      switch(option) {
        case 'doctores': $('#doctor').addClass('active'); break;
        case 'usuarios': $('#usuario').addClass('active'); break;
        case 'articulos': $('#articulo').addClass('active'); break;
        case 'new_entry': $('#articulo').addClass('active'); break;
        default: $('#dashboard').addClass('active'); break;
      }
    });
    </script>