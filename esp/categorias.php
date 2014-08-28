<div class="space60"></div>
<?php
	header('Content-type: text/html; charset=UTF-8');
    $cat_data = getCategories($dbc);
    $j=0;
    while($cat_row = mysqli_fetch_array($cat_data)) {
?>
    <a name="<?=$cat_row['id_category']?>"></a>
    <div class="container">
        <div class="row">
    		<div class="col-md-12">
            	<h1 id="name_<?=$cat_row['id_category']?>"><?=$cat_row['name']?></h1>
          	</div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
                $spc_data = getSpecialties($dbc, $cat_row['id_category']);
                $i = 0;
                while($spc_row = mysqli_fetch_array($spc_data)) {
                    if($i>=4 && ($i%4) == 0) {
                        echo '</div>';
                        if($i == 4)
                             echo '<div class="more_spc" id=cat_' . $cat_row['id_category'] . '>';
                        echo '<div class="row">';
                    }
                        
                $description = substr($spc_row['description'],0,100);
            ?>
                <div class="col-md-3">
                    <div class="service">  
                        <a href="index.php?opcion=negocios"><h4><?=$spc_row['name']?></h4></a>
                        <p><?=$description?>... 
                            <a href="index.php?opcion=especialidad&esp=<?=$spc_row['id_specialty']?>">
                                <strong><i>Leer Más</i></strong></p></a>
                        <?php
                            switch($j) {
                                case 0: echo '<span class="fa fa-stethoscope"></span>'; break;
                                case 1: echo '<span class="fa fa-user-md"></span>'; break;
                                case 2: echo '<span class="fa fa-plus-square"></span>'; break;
                                case 3: echo '<span class="fa fa-flask"></span>'; break;
                            }
                        ?>
                    </div>
                    <div class="space20"></div>    
                </div> 
            <?php 
                $i++;
                } ?>
            </div>
        </div>
    </div>
    <center><input type="button" class="btn btn-default more" id="spc_<?=$cat_row['id_category']?>" value="Ver más"></center>
    <div class="space60"></div>
   <?php 
        $j++;
        } ?>   
    
    <div class="space60"></div>
	<!-- Content End -->
