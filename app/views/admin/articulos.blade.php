@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

  <h2 class="sub-header">{{ Lang::get('messages.amdmin_aa') }} ({{$articles->count()}})</h2>
  <center> <a href="{{url('admin/articulo/0')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>{{ Lang::get('messages.new_entry_aa') }}</button></a> </center>
  <div class="space20"></div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="article_table" style="font-size:15px">
      <thead style="background:#0b7297">
        <tr>
          <th>{{ Lang::get('messages.titule_aa') }}</th>
          <th>{{ Lang::get('messages.sinops_aa') }}</th>
          <th>{{ Lang::get('messages.autor_aa') }}</th>
          <th>{{ Lang::get('messages.creation_date_aa') }}</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      @if ($articles->count())
        @foreach ($articles as $article)
          <tr>
            <td><a href="{{url('admin/articulo/' . $article->A_ID)}}">{{ $article->A_title }}</a></td>
            <td>{{ $article->A_introduction }}</td>
            <td><a href="{{url('admin/editar/' . $article->A_author)}}" target="_blank">{{ $article->author_name }}</a></td>
            <td>{{ $article->A_created_at}}</td>
            <td id="{{ $article->A_ID }}" class="del_article"><center><i class="fa fa-times"></i></center></td>
           </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
<div class="space20"></div>

<div class="modal fade" id="del_article_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar artículo</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro de realizar la siguiente acción? Al eliminar este artículo se eliminará toda la información relacionada a él, 
        imágenes, comentarios, etiquetas, categorías, etc.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-danger" id="del_article_verified">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$(document).ready(function() {
  $('#articulo').addClass('active');
  $('#article_table').dataTable();

  $(".del_article").click(function() {
    var id = $(this).attr('id');
    $('#del_article_modal').modal('show');

    $("#del_article_verified").click(function() {
      window.location.href = 'article/delete/' + id;
    });
  });
});
</script>

@stop