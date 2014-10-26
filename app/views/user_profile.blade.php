@extends('layouts.default')
@section('content')

<div class="container">
  <div class="row">
  
  <div class="space40"></div>     
  <!-- Tabs -->
  <div class="col-md-12">
    <div class="tabbable">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-user"></i>Mi Cuenta</a></li>
        <li class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-star"></i>Mis Reseñas</a></li>
        <li class=""><a href="#tab1-3" data-toggle="tab"><i class="fa fa-comments"></i>Mi Negocios</a></li>
        <li class=""><a href="#tab1-4" data-toggle="tab"><i class="fa fa-building"></i>Mis Fotos</a></li>
      </ul>
          
      <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
          <div class="row">
            <div class="col-md-4">
              <!-- Thumbnails -->
              <div class="thumbnail">
                <img alt="" src="images/profile_pic.PNG">
              </div><!-- /Thumbnails -->    
            </div>
            <div class="col-md-8">

              <!-- EMPIEZA CODIGO COPYPASTE -->
              <h2 class="sub-header">Informacion Personal</h2>
              <div class="space20"></div>

              {{ Form::open() }}

              <div class="row">
                <div class="form-group">
                  {{ Form::label('name', 'Nombre', array('class' => 'col-md-2 control-label')) }}
                  <div class="col-md-4">
                    {{ Form::text('name', '', array('class' => 'form-control focus')) }}
                  </div>

                  {{ Form::label('address', 'Dirección', array('class' => 'col-sm-2 control-label')) }}
                  <div class="col-md-4">
                    {{ Form::text('address', '', array('class' => 'form-control')) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  {{ Form::label('email', 'Correo Electrónico', array('class' => 'col-sm-2 control-label')) }}
                  <div class="col-md-4">
                    {{ Form::text('email', '', array('class' => 'form-control')) }}
                  </div>

                  {{ Form::label('telephone', 'Teléfono', array('class' => 'col-md-2 control-label')) }}
                  <div class="col-md-4" class="error">
                    {{ Form::text('telephone', '', array('class' => 'form-control focus')) }}
                  </div>

                  
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  {{ Form::label('cellphone', 'Celular', array('class' => 'col-sm-2 control-label')) }}
                  <div class="col-md-4">
                    {{ Form::text('cellphone', '', array('class' => 'form-control')) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  {{ Form::label('introduction', 'Introducción', array('class' => 'col-md-2 control-label')) }}
                  <div class="col-md-10">
                    {{ Form::textarea('introduction', '', ['class' => 'form-control', 'size' => '1x5']) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  {{ Form::label('description', 'Descripción', array('class' => 'col-md-2 control-label')) }}
                  <div class="col-md-10">
                    {{ Form::textarea('description', '', ['class' => 'form-control', 'size' => '1x5']) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                    <div class="fileinput fileinput-exists" data-provides="fileinput">
                      <div class="fileinput-exists thumbnail" style="width: 200px; height: 200px;">
                        <img id="input_image" src="">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                      <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona imagen principal</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                    </div>
                  </div>

                  {{ Form::label('priority', 'Prioridad', array('class' => 'col-sm-2 control-label')) }}
                  <div class="col-md-4">
                    {{ Form::select('priority', ['0', '1'], '', ['class' => 'form-control', 'id' => 'priority']) }}
                  </div>


                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook</label>
                  <div class="col-md-4">
                    {{ Form::text('facebook', '', array('class' => 'form-control')) }}
                  </div>
                  <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter</label>
                  <div class="col-md-4">
                    {{ Form::text('twitter', '', array('class' => 'form-control')) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin</label>
                  <div class="col-md-4">
                    {{ Form::text('linkedin', '', array('class' => 'form-control')) }}
                  </div>

                  <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube</label>
                  <div class="col-md-4">
                    {{ Form::text('youtube', '', array('class' => 'form-control')) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  <label for="google-plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="google-plus" value="">
                  </div>
                  <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     Sitio Web Personal</label>
                  <div class="col-md-4">
                    {{ Form::text('website', '', array('class' => 'form-control')) }}
                  </div>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="form-group">
                  <div class="col-md-5"></div>
                  <div class="col-md-2">
                    <input type="submit" class="form-control btn btn-primary" name="submit" id="submit" value="Guardar">
                  </div>
                </div>
              </div>
              <div class="col-md-4"></div>
              {{ Form::close() }}
            </div>
          </div>
        </div>

        <!--EMPIEZA TAB2 -->
        <div class="tab-pane" id="tab1-2">
          <div class="row">
            <div class="col-md-4">
              <!-- Thumbnails -->
              <div class="thumbnail">
                <img alt="" src="images/profile_pic.PNG">
              </div><!-- /Thumbnails -->    
            </div>
                
            <div class="col-md-8">
              <h3>Reseñas</h3>
              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user_image.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                      <hr>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
                    </p>                
                    <div class="space20"></div> 
                  </div> 
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user2.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                    <h3 style="margin-bottom: 0px;">Doctora Takataka</h3>
                      <a href="#">Calle cacho</a> en <a href="#">Tijuana</a> / (664) 631-25-83 / <a href="#"><strong>33 reviews</strong></a>
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
                    </p>                
                    <div class="space20"></div> 
                  </div> 
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user3.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                      <h3 style="margin-bottom: 0px;">Doctor Celta</h3>
                      <a href="#">Calle Morita</a> en <a href="#">Tijuana</a> / (664) 624-29-97 / <a href="#"><strong>3 reviews</strong></a>
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
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
            </div>
          </div>
        </div>

        <!--EMPIEZA TAB3 -->        
        <div class="tab-pane" id="tab1-3">
          <div class="row">
            <div class="col-md-4">
              <!-- Thumbnails -->
              <div class="thumbnail">
                <img alt="" src="images/profile_pic.PNG">
              </div><!-- /Thumbnails -->    
            </div>
                
            <div class="col-md-8">
              <h3>Reseñas</h3>
              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user_image.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                      <h3 style="margin-bottom: 0px;">Doctora Gordita</h3>
                      <a href="#">Calle coahuila</a> en <a href="#">Tijuana</a> / (664) 634-24-93 / <a href="#"><strong>13 reviews</strong></a>
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
                    </p>                
                    <div class="space20"></div> 
                  </div> 
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user2.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                    <h3 style="margin-bottom: 0px;">Doctora Takataka</h3>
                      <a href="#">Calle cacho</a> en <a href="#">Tijuana</a> / (664) 631-25-83 / <a href="#"><strong>33 reviews</strong></a>
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
                    </p>                
                    <div class="space20"></div> 
                  </div> 
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-2">         
                    <img src="app/images/user3.jpg" alt="Doctor default picture">
                    <div class="space40"></div>
                  </div>  
                  <div class="col-md-6">
                    <!--<a href="index.php?opcion=perfil&id=">-->
                      <h3 style="margin-bottom: 0px;">Doctor Celta</h3>
                      <a href="#">Calle Morita</a> en <a href="#">Tijuana</a> / (664) 624-29-97 / <a href="#"><strong>3 reviews</strong></a>
                    <div class="rating" style="margin-bottom: 15px;">
                      <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px;">

                      </h6>
                    <h6 style="margin-bottom: 0px;">Descripción</h6>
                    <p align="justify">
                      asd asd sadasd asd asd asd as das das das d asd asd as das d asd asd as d asd as dsa da sd
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
            </div>
          </div>
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

@stop