<?php
  if(isset($_POST['speciality']) && $_POST['speciality'] != 'all') {
    $doctor_data = getBusinessByCat($dbc, $_POST['speciality']);
  } else {
    $doctor_data = getDoctors($dbc);
  }

  $cant = mysqli_num_rows($doctor_data);
?>

<div class="breadcrumb-container">
  <div class="container">  
    <div class="row">  
      <div class="col-md-12">
        <h1>Negocios Registrados (<?=$cant?>)</h1>
      </div>  
    </div> 
  </div> 
</div>

<div class="container">  
  <form method="post" action="index.php?opcion=negocios">
  <div class="row">  
    <div class="col-md-3">
      <select name="category" class="form-control" id="category" style="color:black; font-size:14px">
        <option value="all">Todas</option>
        <?php
          $categories = getCategories($dbc);
          while($cat_row = mysqli_fetch_array($categories)) {
          ?>
            <option value="<?=$cat_row['id_category']?>"><?=$cat_row['name']?></option>
         <?php
          }
          ?>
      </select>
    </div>
    <div class="col-md-3">
      <select name="speciality" class="form-control" id="speciality" style="color:black; font-size:14px">
       <option selected="selected"></option>
      </select>
    </div>
    <div class="col-md-3">
      <button class="btn btn-default btn-sm" type="submit" style="font-size:16px; padding:5px 20px 5px 20px;">Buscar por especialidad</button>
    </div>
  </div>
</form>
</div>
<div class="space20"></div> 

<?php
    $j = 0;
    if(mysqli_num_rows($doctor_data)== 0) {
      ?>
      <div class="container">
        <p> No hay doctores registrados en esta especialidad</p>
      </div>
  <?php
    } else {


    while($doctor_row = mysqli_fetch_array($doctor_data)) {
?>

<div class="container">
  <div class="row">
    <div class="col-md-2">         
      <img src="<?=$doctor_row['image']?>" alt="Doctor default picture">
      <div class="space40"></div>
    </div>  
    <div class="col-md-6">
      <a href="index.php?opcion=perfil&id=<?=$doctor_row['id_business']?>"><h3 style="margin-bottom: 0px;"><?=$doctor_row['name']?></h3></a>
      <div class="rating" style="margin-bottom: 15px;">
			  <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
		  </div>
      <h6 style="color:#0AB2DB; margin-bottom: 0px;"><?=getSpecialtyById($dbc, $doctor_row['id_specialty'])?></h6>
      <h6 style="margin-bottom: 0px;">Descripción</h6>
      <p align="justify">
        <?=$doctor_row['description']?>
      </p>                
      <div class="space20"></div> 
    </div> 
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="divider"></div> 
      <div class="space20"></div> 
    </div>
  </div>
</div>  
<?php
  }
}
?>

<div class="container">
    <div class="row">
      <div class="col-md-12" align="right">
        <ul class="pagination">
          <li><a href="#">«</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="promo-box" style="
    padding-top: 35px;
    padding-bottom: 35px;
">
    <div class="container">  
      <div class="row">
        <div class="col-md-8 promo-text">
          <h4>¿No encuentras lo que estás buscando? Si el negocio que está buscando no está aquí, por favor agregue! <span class="author">TjMed</span></h4>
        </div>
        <div class="col-md-4 right">
          <button class="btn btn-white">Añadir un negocio</button>
        </div>
      </div>    
    </div>   
  </div>

		<div class="space60"></div>
		<!-- Content End -->