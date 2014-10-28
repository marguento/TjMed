@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<h2 class="sub-header">Administración categorías médicas</h2>


          <center> <a href="categoria/0"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva categoría</button></a> </center>
          <div class="space20"></div>

          <div class="table-responsive">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="category_table">
              <thead style="background:#0b7297">
                <tr>
                  <th>Categoría</th>
                  <th>Introducción</th>
                  <th># Especialidades</th>
                  <th>Título inglés</th>
                  <th>Introducción en inglés</th>
                </tr>
              </thead>
              <tbody>
                @if ($categories->count())
                @foreach ($categories as $category)
                <tr>
                  <td><a href="categoria/{{$category->C_ID}}">{{ $category->C_name }}</a></td>
                  <td>{{ $category->C_introduction }}</td>
                  <td><center>{{ $category->s_count }}</center></td>
                  <td>{{ $category->C_name_en }}</td>
                  <td>{{ $category->C_introduction_en }}</td>
                </tr>
                @endforeach
              @endif
              </tbody>
            </table>
            
          </div>
        </div>


       





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
  $('#especialidades').addClass('active');
});
</script>

@stop