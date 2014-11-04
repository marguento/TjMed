@extends('admin.index')
@section('content_admin')

<h2 class="sub-header">Administración de usuarios</h2>
      <!-- <form class="form-inline" role="form">
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
      </form> -->
        <div class="space20"></div>
        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered compact" cellspacing="0" width="100%" style="font-size:14px">
            <thead style="background:#0b7297">
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
              @if ($users->count())
                @foreach ($users as $user)
                  <tr>
                    @if ($user->U_profile_image == "")
                      <td><img class="user_img" src="../../app/images/default_picture.png"></td>
                    @else
                     @if($user->U_oauth_provider == '0')
                        <td><img class="user_img" src="../../app/images_server/{{ $user->U_profile_image }}"></td>
                      @else
                        <td><img class="user_img" src="{{ $user->U_profile_image }}"></td>
                      @endif
                    @endif
                    <td><a href="editar/{{ $user->U_username }}">{{ $user->U_firstname . ' ' . $user->U_lastname }}</a></td>
                    <td>{{ $user->U_email }}</td>
                    <td>{{ $user->U_created_at }}</td>
                    @if($user->U_facebook=="")
                      <td>No</td>
                    @else
                      <td>Sí</td>
                    @endif
                    <td>
                      @if ($user->U_level == 0)
                          <span class="label label-primary">Usuario Regular</span>
                      @elseif ($user->U_level == 1)
                          <span class="label label-warning">Administrador</span>
                      @else
                          <span class="label label-info">Propietario</span>
                      @endif
                      
                    </td>
                    <td>
                      <a href="#" class="edit_user" id="edit_{{ $user->U_username }}"><span class="fa fa-edit uicon uedit"></span></a>
                      <a href="#" class="del_user" id="del_{{ $user->U_username }}"><span class="fa fa-times uicon udel"></span></a>
                    </td>
                  </tr>
                @endforeach
              @endif
              </tbody>
            </table>

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
        <button type="button" class="btn btn-danger" id="del_user">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$('#usuario').addClass('active');
$(document).ready(function() {
  $('#example').dataTable();
  var id = "";
  $('.edit_user').on('click',function () {
      id =  $(this).attr('id').substring(5);
      window.location.href = 'editar/'+id;
  });

  $('.del_user').on('click', function() {
    id = $(this).attr('id').substring(4);
    $('#delModal').modal('show');
  });

  $('#del_user').on('click', function() {
    window.location.href = 'delete/' + id;
  });

});
</script>

@stop