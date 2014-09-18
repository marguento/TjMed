<div class="container">


    <div class="row">
     <div class="space40"></div>
        <!-- Tabs -->

      <div class="col-md-12">
      
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i>Mi cuenta</a></li>
            <li class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-star"></i>Mis favoritos</a></li>
            <li class=""><a href="#tab1-3" data-toggle="tab"><i class="fa fa-comments"></i>Mi actividad</a></li>
            <li class=""><a href="#tab1-4" data-toggle="tab"><i class="fa fa-building"></i>Mis negocios</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1-1">
			         <div class="row">
                <div class="col-md-4">
                  <!-- Thumbnails -->
                  <div class="thumbnail">
                    <img alt="" src="images/<?=$_SESSION['profile_image']?>">
                    <ul class="list-group">
                      <li class="list-group-item"><span class="glyphicon glyphicon-edit profile"></span><span class="badge">0</span>Reseñas</li>
                      <li class="list-group-item"><span class="glyphicon glyphicon-picture profile"></span><span class="badge">0</span>Fotos</li>
                      <li class="list-group-item"><span class="glyphicon glyphicon-star profile"></span><span class="badge">0</span>Favoritos</li>
                      <li class="list-group-item"><span class="glyphicon glyphicon-open profile"></span>Cambiar foto</li>
                    </ul>
                  </div><!-- /Thumbnails -->    
                </div>
                <div class="col-md-8">
                  <h4><?=$username?></h4>
                  </p>
                   <button type="button" class="btn btn-primary right">Editar perfil</button>
                </div>
              </div>


           </div>


            <div class="tab-pane" id="tab1-2">
              <h3>Mis favoritos</h3>
              <p></p>
			</div>
            <div class="tab-pane" id="tab1-3">
              <h3>Mi actividad</h3>
			   <p></p>
              </div>
            <div class="tab-pane" id="tab1-4">
              <h3>Mis negocios</h3>
			   <p></p>
              </div> 
          </div>
          
        </div>
        <div class="space40"></div>   
      </div>
        <!-- Tabs End -->

    </div>
  </div>

		<div class="space20"></div>