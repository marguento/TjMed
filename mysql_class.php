<?php
	header('Content-type: text/html; charset=UTF-8');
	
	/** Funciones de Categorias y especialidades medicas **/
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

	function getSpecialtyById($dbc, $id) {
		$query = "SELECT name FROM specialty WHERE id_specialty = $id";
        $data = mysqli_query($dbc,$query);
        $row = mysqli_fetch_array($data);
        return $row['name'];
	}

	/** Funciones de Doctores **/
	function getDoctors($dbc) {
		$query = "SELECT * FROM business";
        $data = mysqli_query($dbc,$query);
        return $data;
	}

	function getDoctorById($dbc,$id) {
		$query = "SELECT * FROM business WHERE id_business = $id";
        $data = mysqli_query($dbc,$query);
        $row = mysqli_fetch_array($data);
        return $row;
	}

	function getBusinessComments($dbc, $id) {
		$query = "SELECT C.content, C.date, C.time,
					C.rating, U.firstname, U.lastname,
					U.profile_image FROM business_has_comments B
					INNER JOIN comments C
					ON B.id_comment = C.id_comment 
					INNER JOIN user U
					ON U.id_user = C.id_user 
					where B.id_business = $id";
		$data = mysqli_query($dbc,$query);
        return $data;
	}

	function getBusinessRating($dbc, $id) {
		$query = "SELECT C.rating FROM business_has_comments B
					INNER JOIN comments C
					ON B.id_comment = C.id_comment 
					where B.id_business = $id";
		$data = mysqli_query($dbc,$query);
		$num = mysqli_num_rows($data);
		$total = 0;
		while($row = mysqli_fetch_array($data)) {
			$total += $row['rating'];
		}
		$total = $total/$num;
		$total = round($total,2);
        return $total;
	}

	function getBusinessImages($dbc, $id) {
		$query = "SELECT I.image_url, I.datetime_added, U.firstname, U.lastname 
					FROM business_has_images B 
					INNER JOIN images I 
					ON B.image_url = I.image_url 
					INNER JOIN user U 
					ON I.id_user = U.id_user 
					WHERE B.id_business = $id";
		$data = mysqli_query($dbc,$query);
		return $data;
	}

	function getBusinessByCat($dbc, $cat) {
		$query = "SELECT * FROM business WHERE id_specialty = $cat";
		$data = mysqli_query($dbc,$query);
		return $data;
	}

	function getArticles($dbc) {
		$query = "SELECT A.*, U.firstname, U.lastname 
					FROM article A 
					INNER JOIN user U 
					ON A.author = U.id_user";
		$data = mysqli_query($dbc,$query);
		return $data;
	}

	function getUserLogin($dbc,$data) {
		if(isset($data['username']) && isset($data['password'])) {
			$username = $data['username'];
			$password = $data['password'];
			$query = "SELECT * 
						FROM user 
						WHERE username = '$username'
						AND password = '$password'";
			$result = mysqli_query($dbc, $query);
			if(mysqli_num_rows($result)> 0) {
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
?>