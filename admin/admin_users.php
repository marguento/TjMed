<h2 class="sub-header">Administración de usuarios</h2>
      <form class="form-inline" role="form">
        <div class="form-group">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
              <span class="fa fa-users dash"></span>
              Todos  
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="fa fa-gears dash"></span>Administradores</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="fa fa-user-md dash"></span>Dueños</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="fa fa-user dash"></span>Usuarios</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="fa fa-star-o dash"></span>Nuevos</a></li>
            </ul>
          </div>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary">Filtrar</button>
        </div>
      </form>
      <div class="space20"></div>
        <div class="row">
          <div class="col-sm-9"></div>
          <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </div>
        <div class="space20"></div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th id="user_head">Usuario</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Fecha registro</th>
                <th>Login con FB</th>
                <th>Nivel</th>
                <th>Seleccionar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img class="user_img" src="../images/user2.jpg"></td>
                <td><a href="../index.php?opcion=perfil" target="_blank">Jane Austen</a></td>
                <td>jane.austen@gmail.com</td>
                <td>29 Julio 2014</td>
                <td>Sí</td>
                <td><span class="label label-warning">Admin</span></td>
                <td><a href="#" data-toggle="modal" data-target="#editModal"><span class="fa fa-edit uicon uedit"></span></a>
                  <a href="#" data-toggle="modal" data-target="#delModal"><span class="fa fa-times uicon udel"></span></a></td>
              </tr>
              <tr>
                  <td><img class="user_img" src="../images/user1.png"></td>
                  <td><a href="../index.php?opcion=perfil" target="_blank">Haruki Murakami</a></td>
                  <td>haruki.murakami@gmail.com</td>
                  <td>14 Agosto 2014</td>
                  <td>No</td>
                  <td><span class="label label-info">Dueño</span></td>
                  <td><a href="#" data-toggle="modal" data-target="#editModal"><span class="fa fa-edit uicon uedit"></span></a>
                    <a href="#" data-toggle="modal" data-target="#delModal"><span class="fa fa-times uicon udel"></span></a></td>
                </tr>
                <tr>
                  <td><img class="user_img" src="../images/user3.jpg"></td>
                  <td><a href="../index.php?opcion=perfil" target="_blank">Julio Cortázar <span class="label label-success">Nuevo</span></a></td>
                  <td>julio.cortazar@hotmail.com</td>
                  <td>11 Abril 2014</td>
                  <td>No</td>
                  <td><span class="label label-primary">Usuario</span></td>
                  <td><a href="#" data-toggle="modal" data-target="#editModal"><span class="fa fa-edit uicon uedit"></span></a>
                    <a href="#" data-toggle="modal" data-target="#delModal"><span class="fa fa-times uicon udel"></span></a></td>
                </tr>
                <tr>
                  <td><img class="user_img" src="../images/profile_pic.PNG"></td>
                  <td><a href="../index.php?opcion=perfil" target="_blank">Mark Twain</a></td>
                  <td>mark.twain@gmail.com</td>
                  <td>27 Agosto 2014</td>
                  <td>Sí</td>
                  <td><span class="label label-warning">Admin</span></td>
                  <td><a href="#" data-toggle="modal" data-target="#editModal"><span class="fa fa-edit uicon uedit"></span></a>
                    <a href="#" data-toggle="modal" data-target="#delModal"><span class="fa fa-times uicon udel"></span></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
              <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>


<div class="modal fade" id="delModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
        Al eliminar este usuario también se borrará todo registro que lo contenga. 
        ¿Está seguro de realizar esta acción?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Editar Usuario</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control focus" id="inputEmail3" value="Nombre usuario dummy">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Correo Electrónico</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" value="Vis ad timeam vivendo necessitatibus, viris nonumy abhorreant id vel #34566">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
    <div class="fileinput fileinput-exists" data-provides="fileinput">
    <div class="fileinput-exists thumbnail" style="width: 200px; height: 150px;">
      <img src="../images/macias.jpeg">
    </div>
    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
    <div>
      <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona imagen principal</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
  </div>
</div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Ciudad</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" value="Tijuana">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Acerca de</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3">Ut simul appellantur cum, ut reque legimus ocurreret ius. Nec ne aliquam scriptorem, mundi primis recteque id sed, pri laudem meliore te. Eam nihil officiis conceptam ei, pro ex eros velit invenire. Zril petentium an est, amet putant eum eu, usu iudico possim voluptatum ad. An sea vidisse alienum. Nam modo agam eius ea, duo paulo propriae ei. Te case illud his, duo invenire vituperata liberavisse ex. Vix vero persius ut. Te invenire instructior mea, vis inani primis facilisis at, minimum molestie complectitur sit ea. Idque corpora pertinacia usu cu, vel eu possim detraxit gloriatur.</textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" value="www.facebook.com">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" value="www.twitter.com">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
      <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
        Tipo de Usuario
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Administrador</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Dueño</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Usuario</a></li>
      </ul>
    </div>
  </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->