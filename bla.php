<?php
session_start();
//include_once('conexion.php');
    
    //include_once('mysql_class.php');
    //$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($dbc));
    //$dbc->set_charset('utf8');
if(isset($_SESSION['username'])) {
	echo $_SESSION['username'];
}
?>
<form role="form" method="post" action="login.php">
		      <div class="modal-body">
		      	
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" style="color:black;">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="color:black;">
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
		      </div>
		  </form>