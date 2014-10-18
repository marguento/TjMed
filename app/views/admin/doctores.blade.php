@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<h2 class="sub-header">Administración doctores</h2>

<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1-1" data-toggle="tab">Lista</a></li>
    <li class=""><a href="#tab1-2" data-toggle="tab">Verificar <span class="badge">{{ $non_doctors->count() }}</span></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1-1">

          <center> <a href="doctores/0"><button type="button" class="btn btn-primary">Agregar doctor</button></a> </center>
          <div class="space20"></div>

          <div class="table-responsive">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="doctor_table" style="font-size:15px">
              <thead style="background:#0b7297">
                <tr>
                  <th id="user_head"></th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                </tr>
              </thead>
              <tbody>
                @if ($doctores->count())
                @foreach ($doctores as $doctor)
                <tr>
                  <td><img class="user_img" src="../../app/images/{{ $doctor->b_image }}"></td>

                  <td><a href="doctores/{{$doctor->B_ID}}">{{ $doctor->b_name }}</a></td>
                 <td>{{ $doctor->b_introduction }} </td>
                 <td>
                  <h6 style="color:#0AB2DB; margin-bottom: 0px; font-size:12px">
                  <?php $i = 0; ?>
                  @foreach ($b_cat as $c)
                    @if ($doctor->B_ID == $c->B_ID)
                        @if ($i > 0)
                          ,
                        @endif
                       {{ $c->S_name}}
                       
                       <?php $i++; ?>
                    @endif
                  @endforeach
                  </h6>
                 </td>

                </tr>
                @endforeach
              @endif
              </tbody>
            </table>
            
          </div>
        </div>


        <div class="tab-pane" id="tab1-2">

          <div class="space20"></div>

          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="doctorv_table" style="font-size:15px">
              <thead style="background:#0b7297">
                <tr>
                  <th> Nombre</th>
                  <th> Creado por </th>
                  <th> Fecha de registro </th>
                  <th> Categoría</th>
                  <th> Seleccionar</th>
                </tr>
              </thead>
              <tbody>
                @if ($non_doctors->count())
                  @foreach ($non_doctors as $doctor)
                <tr>
                  <td><a href="#" data-toggle="modal" data-target="#verified_doc">{{ $doctor->b_name}} <!-- <span class="label label-success">Nuevo</span> --></a></td>
                  <td><a href="#">{{ $doctor->b_created_user }}</a></td>
                  <td>{{ $doctor->b_joined_date }}</td>
                  <td>
                    <h6 style="color:#0AB2DB; margin-bottom: 0px; font-size:12px">
                        <?php $i = 0; ?>
                        @foreach ($b_cat as $c)
                          @if ($doctor->B_ID == $c->B_ID)
                              @if ($i > 0)
                                ,
                              @endif
                             {{ $c->S_name}}
                             
                             <?php $i++; ?>
                          @endif
                        @endforeach
                  </h6>
                  </td>
                  <td>
                      <a href="#" class="check_doctor" id="edit_{{ $doctor->B_ID }}"><span class="fa fa-check-square-o uicon uedit"></span></a>
                      <a href="#" class="del_doctor" id="del_{{ $doctor->B_ID }}"><span class="fa fa-times uicon udel"></span></a>
                  </td>
                </tr>
                @endforeach
              @endif
               
              </tbody>
            </table>
            
          </div>

        </div>
      </div>

      <div class="space20"></div>





<div class="modal fade" id="delModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar doctor</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro de realizar la siguiente acción?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="del_doctor">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>

$(document).ready(function() {
  $('#doctor').addClass('active');
  $('#doctor_table').dataTable();
  $('#doctorv_table').dataTable();

  var id = "";
  $('.check_doctor').on('click',function () {
      id =  $(this).attr('id').substring(5);
      window.location.href = 'verified/'+id;
  });

  $('.del_doctor').on('click', function() {
    id = $(this).attr('id').substring(4);
    $('#delModal').modal('show');
  });

  $('#del_doctor').on('click',function () {
      window.location.href = 'disable/'+id;
  });

});
</script>

@stop