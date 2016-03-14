@extends('admin.index')
@section('content_admin')

@if (Session::has('var'))
  {{ Session::get('var') }}
@endif

<h2 class="sub-header">Administración banner</h2>

<center>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_banner">Agregar banner</button>
</center>

<div class="space20"></div>

<div class="table-responsive">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="banner_table" style="font-size:15px">
        <thead style="background:#0b7297">
            <tr>
                <th></th>
                <th>Imagen español</th>
                <th>Imagen inglés</th>
                <th>Activar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @if ($banners->count())
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->ID }}</td>
                        <td id="{{ $banner->image_esp }}" rowid="{{ $banner->ID }}" column="image_esp" class="show_image">{{ HTML::image('images_server/' . $banner->image_esp, 'Banner español', array( 'width' => 300)) }}</td>
                        <td id="{{ $banner->image_eng }}" rowid="{{ $banner->ID }}" column="image_eng" class="show_image">{{ HTML::image('images_server/' . $banner->image_eng, 'Banner inglés', array( 'width' => 300)) }}</td>
                        <td>
                            @if ($banner->active)
                                {{ Form::checkbox('active', $banner->active, true); }}
                            @else 
                                {{ Form::checkbox('active', $banner->active, false); }}
                            @endif
                        </td>
                        <td id="{{ $banner->ID }}" class="del_banner"><center><i class="fa fa-times"></i></center></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="space20"></div>

<div class="modal fade" id="add_banner">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span></button>
                <h4 class="modal-title">Agregar banner</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array('url' => 'banner/store', 'files' =>true)) }}
                <div class="row">
                    <div class="col-md-12">
                        @if (Session::has('error_msg'))
                            {{ Form::hidden('error', 1, array('id' => 'error_msg')) }}
                            <p><span class="error_msg">{{ Session::get('error_msg') }}</span></p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li> El formato de la imagen tiene que ser png, jpg ó jpeg. </li>
                            <li> El tamaño de la imagen tiene que ser de 1950 x 450, 
                            para que se ajuste bien. </li>
                            <li> Tener cuidado en que la imagen no pese mas de 2MB </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <h5> Imagen en español </h5>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 130px;">
                                    {{ HTML::image('images/default.jpg') }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image_esp">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            
                            <br>
                
                            <span class="error_msg">{{ $errors->first('image_esp') }}</span>
                        </div>

                        <div class="col-md-6">
                            <h5> Imagen en inglés </h5>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 130px;">
                                    {{ HTML::image('images/default.jpg') }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image_eng">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>

                            <br>

                            <span class="error_msg">{{ $errors->first('image_eng') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <center>{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}</center>    
            </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="del_banner_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
        <h4 class="modal-title">Eliminar banner</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro de realizar la siguiente acción?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-danger" id="del_banner_verified">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="show_banner_modal">
  <div class="modal-dialog" style="width:1200px">
    <div class="modal-content" style="width:1200px">
    <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
    </div>
    <div class="modal-body">
        {{ Form::open(array('url' => 'banner/update', 'files' =>true)) }}
        <div class="image_attr"></div>
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail image-placement"></div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
                <span class="btn btn-default btn-file btn-change-image">
                    <span class="fileinput-new">Cambiar imagen</span>
                    <span class="fileinput-exists">Cambiar imagen</span>
                    <input type="file" name="image_edit">
                </span>
                <button type="submit" class="btn btn-primary" id="change_banner" disabled>Actualizar</button>
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $(document).ready(function() 
    {
        $('#banner').addClass('active');

        if ($('#error_msg').val() == 1) 
        {
            $('#add_banner').modal('show');
        }

        $(".del_banner").click(function() {
            var id = $(this).attr('id');
            $('#del_banner_modal').modal('show');

            $("#del_banner_verified").click(function() {
                window.location.href = 'banner/delete/' + id;
            });
        });

        $(".show_image").click(function() {
            var img = $(this).attr('id');
            var rowid = $(this).attr('rowid');
            var column = $(this).attr('column');
            var img_str = "<img src='../images_server/" + img + "'/>";
            var img_attr = "<input name='rowid' type='hidden' value='" + rowid + "'>" +
                            "<input name='column' type='hidden' value='" + column + "'>";
            $(".image_attr").html(img_attr);
            $(".image-placement").html(img_str);
            $("#change_banner").prop('disabled', true);
            $(".fileinput").removeClass('fileinput-exists');
            $(".fileinput").addClass('fileinput-new');
            $('#show_banner_modal').modal('show');
        });

        $("input:file").change(function () {
            $("#change_banner").removeAttr('disabled');
        });
    });
</script>

@stop