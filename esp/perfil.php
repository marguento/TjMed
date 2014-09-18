<div class="space60"></div>
<?php
  header('Content-type: text/html; charset=UTF-8');
  $id_doctor = "";
  if(isset($_GET['id'])) {
    $id_doctor = $_GET['id'];
  }

  $doctor = getDoctorById($dbc, $id_doctor);
  $comment = getBusinessComments($dbc, $id_doctor);

  $num_com = mysqli_num_rows($comment);

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
       <h1 style="margin-bottom:0px; line-height:1em"><?=$doctor['name']?>
          <span style="font-size:18px">
            <?php
                $rating = getBusinessRating($dbc, $id_doctor);
                $r = $rate = round($rating);
                while($rate > 1) {
                  echo '<i class="fa fa-star"></i>';
                  $rate--;
                }
                if($r != $rating) {
                  echo '<i class="fa fa-star-half"></i>';
                  $r++;
                }
                while($r < 5) {
                  echo '<i class="fa fa-star-o"></i>';
                  $r++;
                }
              ?>
               (<?=$rating?>)</span>
        </h1>
        <a href="#"><?=getSpecialtyById($dbc, $doctor['id_specialty'])?></a><br>
    </div>
  </div>
</div>

<div class="space20"></div>
 <div class="container">  
    <div class="blog-container"> 
      <div class="row"> 
      
        <div class="col-md-8 blog-content">
          
          <!-- Blog Post -->
          <div class="space20"></div>
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width: 80%; margin: 0 auto">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <?php 
                $i = 1;
                $images = getBusinessImages($dbc, $id_doctor);
                $img_count = mysqli_num_rows($images);
                while($i <= $img_count) {
              ?>
                  <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>"></li>
              <?php
               $i++;
               }
              ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <center><img src="<?=$doctor['image']?>" class="img_prof" alt="Profile default image">
                <div class="carousel-caption">
                </div>
              </center>
              </div>
              <?php 
                $images = getBusinessImages($dbc, $id_doctor);
                while($img_row = mysqli_fetch_array($images)) {
              ?>
                <div class="item">
                <center>
                <img src="<?=$img_row['image_url']?>" alt="Business image">
                <div class="carousel-caption">
                  <b><?=$img_row['firstname'] . ' ' . $img_row['lastname'] . '<br>' . ' ' . $img_row['datetime_added']?></b>
                </div>
              </center>
              </div>
              <?php
                }
              ?>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
          <div class="space10"></div>
          <center><button class="btn btn-default btn-sm">Agregar imagen</button></center>
          
          <div class="space10"></div>
          <div class="post-info-container">
            <div class="row">
              <div class="col-md-8">
                <div class="post-info">
                  
                  <span class="post-data">  
                    Registrado <?=substr($doctor['joined_date'],0,-9)?>
                    <i class="fa fa-comment"></i>
                    <?php 
                      if($num_com > 0) {
                        echo $num_com . ' comentario(s)';
                      } else {
                        echo 'No hay comentarios';
                      }
                    ?>
                  </span> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="social-2 f-right">
                  <a href="#"><i class="fa fa-youtube"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="www.facebook.com/"<?=$doctor['facebook']?>><i class="fa fa-facebook"></i></a>
                  <a href="www.twitter.com/"<?=$doctor['twitter']?>><i class="fa fa-twitter"></i></a>
                </div>  
              </div>
            </div>
          </div>
  
          <div class="space30"></div>
          <p><?=$doctor['description']?></p>
          <div class="space20"></div>
          
          <!--<blockquote>       
          Mummy abhorreant id vel, an munere eruditi praesent qui. Usu noster legendos cu. Mei omnium graecis an. Te nam graeci nostrud dissentiet. Usu quem appellantur id, ut debet accommodare his. Vel te dicit putant facilis, ius ad torquatos moderatius.
          Lantur cum, ut reque leit invenire. Zril petentium an est, amet putant eum eu, usu iudico possim voluptatum ad. An sea vidisse alienum.
          </blockquote>-->
                                    
          <div class="space35"></div>
          <!--<a href="negocios.html" class="btn"><i class="fa fa-book"></i>Más Negocios</a>-->
          <div class="space40"></div>
          <!-- Blog Post End -->

        </div>
        
        <div class="col-md-4 blog-right-sidebar">
        
          <div class="">
            <div class="space25"></div>
            <h4>Ubicación</h4>
            <p>Dirección: <?=$doctor['address']?></p>
            <!--<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&amp;zoom=13&amp;size=600x300&amp;maptype=roadmap&amp;markers=color:blue%7Clabel:S%7C40.702147,-74.015794&amp;markers=color:green%7Clabel:G%7C40.711614,-74.012318&amp;markers=color:red%7Clabel:C%7C40.718217,-73.998284" alt="Points of Interest in Lower Manhattan">
            -->
            <input id="address" type="hidden" value="<?=$doctor['address']?>">
            <div id="map-canvas"></div>

            <div class="space40"></div>
            
            <!--<h4>Cliente Satisfecho</h4>
            <div class="client-says">
              <div class="client-text">   
                “Clariteniam, quis nostrud exercitation ullamco laboris. Aute irure dolor in repreh wypas candy canes toffee. Co adipisicing elit, sed do eiusmod tempor incididunt ut laboenderit in voluptate velit esse cillum dudium lectorum. Mirum est notare quam liquam at erat in purus aliquet mollis. Fusce ele velit nibeh.”
              </div>  
              <div class="client-name">
                <i class="fa fa-quote-right"></i><strong>Manuel Soto</strong>, Apple.
              </div>  
            </div> -->
            
            <div class="space40"></div>
           
          </div>  
          
        </div>
        
      </div> 

<div class="col-md-12">
  <div class="space40"></div>
        <h3>Comentarios (<?=$num_com?>)</h3>
        <div class="space10"></div>
        <?php
           while($crow = mysqli_fetch_array($comment)) {
        ?>

          <div class="blog-comment">
          <div class="user-image"><!--<i class="fa fa-user"></i>--><img src="images/<?=$crow['profile_image']?>"></div> 
          <div class="comment-data">
            <h4><?=$crow['firstname'] . ' ' . $crow['lastname']?>
            <span style="font-size:20px">
              <?php
                $r = $rating = $crow['rating'];
                while($rating) {
                  echo '<span>★</span>';
                  $rating--;
                }
                while($r < 5) {
                  echo '<span>☆</span>';
                  $r++;
                }
              ?>
            </span></h4>
            <p><?=$crow['date'] . ', ' . $crow['time']?><a href="#" class="reply-link"><i class="fa fa-thumbs-o-up"></i></a>
            <a href="#" class="reply-link"><i class="fa fa-thumbs-o-down"></i></a></p>
            <p>
              <?=$crow['content']?>
             </p>
            <div class="divider"></div>           
          </div> 
        </div>
        <div class="space30"></div> 

        <?php
          }
        ?>

        <!-- MANEJARLO CON JAVASCRIPT -->
        <center>
          <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </center>

        <p>Calificación:
          <span id="1" class="rating">☆</span><span id="2" class="rating">☆</span><span id="3" class="rating">☆</span>
          <span id="4" class="rating">☆</span><span id="5" class="rating">☆</span>
        </p>
        <p>Deja tu reseña</p>
        <textarea class="form-control" rows="3" style="color:black;"></textarea>
        <div class="space10"></div>
        <center><button class="btn btn-default btn-sm">Agregar comentario</button></center>
      </div>

    </div>  
  </div>

</div>
</div>  
    <div class="space60"></div>
    <!-- Content End -->