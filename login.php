<?php
session_start();
	$error_msg = "";
	 include_once('conexion.php');
    include_once('mysql_class.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($dbc));
    $dbc->set_charset('utf8');
	
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$data['username'] = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$data['password'] = mysqli_real_escape_string($dbc, trim($_POST['password']));
   
    $result = getUserLogin($dbc, $data);
    
		if($result == false) {
      $error_msg = "Datos incorrectos";
    } else {
      $row = mysqli_fetch_array($result);

      $_SESSION['username'] = $row['username'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['profile_image'] = $row['profile_image'];

     $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
     header('Location: ' . $home_url);
    }
  }
?>