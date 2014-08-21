<?php
	header('Content-type: text/html; charset=UTF-8');
	
	function getCategories($dbc) {
		$query = "SELECT * FROM categories";
        $data = mysqli_query($dbc,$query);
        return $data;
	}

	function getSpecialties($dbc, $id) {
		$query = "SELECT * FROM specialty WHERE id_category = $id";
        $data = mysqli_query($dbc,$query);
        return $data;
	}
?>