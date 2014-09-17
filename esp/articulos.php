<div class="container">  
  <div class="blog-container"> 
    <div class="row"> 
      <div class="col-md-8">
        <div class="breadcrumb-container">
          <div class="container">  
            <div class="row">  
              <div class="col-md-12">
                <h1>Artículos</h1>
              </div>  
            </div> 
          </div> 
        </div>
        <div class="">
        <?php
          $data_article = getArticles($dbc);
          while($row = mysqli_fetch_array($data_article)) {
          ?>
          <!-- Blog Post -->
            <div class="space30"></div>
            <h2><a href="#"><?=$row['title']?></a></h2>
            <img src="<?=$row['image']?>" alt="" width="1140" height="456">
            <div class="space25"></div>
            <a href="#"> Categoría </a>
            <div class="space10"></div>
            
            <div class="post-info-container">
              <div class="row">
                <div class="col-md-7">
                  <div class="post-info">
                    <span class="post-data">
                      <i class="fa fa fa-user"></i> <a href="#"><?=$row['firstname'] . ' ' . $row['lastname']?></a>
                    </span>
                    <span class="post-data">
                      23 Agosto 2014
                    </span>
                   
                  </div>
                </div>
                <div class="col-md-5">
                   <div class="post-info">
                    <span class="post-data">  
                      <i class="fa fa-tag"></i> <span class="tags"><a href="#">Etiqueta 1</a> | <a href="#">Etiqueda 2</a></span>
                    </span>
                     <span class="post-data">  
                      <i class="fa fa-comment"></i> 0 Comentario(s)
                    </span> 
                  </div>  
                </div>
              </div>
            </div>
    
            <div class="space30"></div>
            <p style="text-align: justify;
                      text-justify: inter-word;">
              <?=substr($row['content'],0,600) . '...'?>
            </p>
            <div class="space15"></div>
            <a href="#" class="btn"><i class="fa fa-book"></i>Seguir Leyendo</a>
            <div class="space40"></div>
            <!-- Blog Post End -->
          <?php
          }
        ?>
           
          </div>  
        </div>
  
<div class="col-md-4">
<div class="breadcrumb-container">
    <div class="container">  
      <div class="row">  
        <div class="col-md-12">
          <h1>Seguir Leyendo:</h1>
        </div>  
      </div> 
    </div> 
  </div>  

        <!-- List -->
        <ul class="list-3">

        <p> 
        <h6>Especialidades clínicas</h6>
          <li>
             <a href="#"><i class="fa fa-caret-right"></i> Cardiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neumología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Pediatría</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades Quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Plástica</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Cardiovascular</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Torácica</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Cirugia Neurocirugía</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades médico quirúrgicas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Estomatología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Oftalmología</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Otorrinolaringología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Urología</a>
          </li>
    </p>

        <p> 
    <h6>Especialidades de laboratorio o diagnósticas</h6>
          <li>  
             <a href="#"><i class="fa fa-caret-right"></i> Inmunología</a>
          </li><li>
             <a href="#"><i class="fa fa-caret-right"></i> Patológica</a>
          </li><li>    
             <a href="#"><i class="fa fa-caret-right"></i> Microbiología</a>
          </li><li>  
             <a href="#"><i class="fa fa-caret-right"></i> Neurofisiología</a>
          </li>
    </p>        

        </ul>
        <!-- List End -->
        <div class="space20"></div>
        <div class="divider"></div>
        <div class="space40"></div>
        
      </div>

      </div> 
    </div>  
  </div>

		<div class="space60"></div>
		<!-- Content End -->