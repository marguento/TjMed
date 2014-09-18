<?php
	include_once('conexion.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$dbc->set_charset('utf8');

	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		if($id == 'all') {
			$query = "SELECT * FROM specialty";
		} else {
			$query = "SELECT * FROM specialty WHERE id_category = $id";
		}
		
		$sql = mysqli_query($dbc, $query) or die (mysqli_error());
		echo '<option value="all">Todas</option>';
		while ($row = mysqli_fetch_array($sql)) {
			$id = $row['id_specialty'];
			echo '<option value="'.$id.'">'.$row['name'].'</option>';
		}
	}
?>