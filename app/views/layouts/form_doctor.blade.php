    {{ Form::open(array('url' => 'doctores/store', 'files'=> true)) }}
    {{ Form::hidden('add_user', 0) }}


    <div class="row">
        <div class="form-group">
            {{ Form::label('name', Lang::get('messages.contact_name') .' (*)', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
              {{ Form::text('name', '', array('class' => 'session form-control focus')) }}
              <span class="error_msg">{{ $errors->first('b_name') }}</span>
          </div>

          {{ Form::label('address', Lang::get('messages.address_title') .' (*)', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-md-4">
              {{ Form::text('address', '', array('class' => 'session form-control', 'id' => 'address')) }}
              <span class="error_msg">{{ $errors->first('b_address') }}</span>
          </div>
      </div>
  </div>

  <br>
  <div id="map-canvas" style="width:100%; height:250px"></div>
  <br>
  <div class="row">
    {{ Lang::get('messages.dir_ab') }} <a href="#" data-toggle="modal" data-target="#help_map">{{ Lang::get('messages.needhelp_ab') }}</a>
</div>

<br>
<b>{{ Lang::get('messages.dirmark_ab') }}</b><br><br>
<div class="row">
    <div class="form-group">
        {{ Form::label('map_c', Lang::get('messages.address_title') , array('class' => 'col-sm-1 control-label')) }}
        <div class="col-md-1">
          {{ Form::radio('map_c', '0', true) }}
      </div>

      {{ Form::label('map_c', Lang::get('messages.mark_ab'), array('class' => 'col-md-1 control-label')) }}
      <div class="col-md-1" class="error">
          {{ Form::radio('map_c', '1') }}
      </div>
  </div>
</div>



<br>

<div class="row">
    <div class="form-group">
        {{ Form::label('email', Lang::get('messages.contact_email') .' (*)', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-md-4">
          {{ Form::text('email', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_email') }}</span>
      </div>

      {{ Form::label('telephone', Lang::get('messages.tel_ab') .' (*)', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4" class="error">
          {{ Form::text('telephone', '', array('class' => 'session form-control focus')) }}
          <span class="error_msg">{{ $errors->first('b_telephone') }}</span>
      </div>


  </div>
</div>

<br>

<div class="row">
    <div class="form-group">
        {{ Form::label('cellphone', Lang::get('messages.cel_ab'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-md-4">
          {{ Form::text('cellphone', '', array('class' => 'session form-control')) }}
      </div>
      {{ Form::label('alternative_phone', 'Teléfono opcional:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
          {{ Form::text('alternative_phone', '', array('class' => 'form-control')) }}
      </div>
  </div>
</div>

<br>

<div class="row">
    <div class="form-group">
      {{ Form::label('alternative_phone2', 'Teléfono opcional 2:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
          {{ Form::text('alternative_phone2', '', array('class' => 'form-control')) }}
      </div>
  </div>
</div>

<br>

<div class="row">
    <div>
        {{ Form::label('user_owner', Lang::get('messages.owner_ab'), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
          {{ Form::select('user_owner', ['No', 'Si'], '', ['class' => 'form-control', 'id' => 'user_owner', 'style' => 'color:black; font-size:14px;']) }}
      </div>
  </div>
</div>

<br>

<p>{{ Lang::get('messages.addesp_ab') }}</p>

<div class="row">
    <div class="form-group">
        {{ Form::label('specialty', Lang::get('messages.special_ab'), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
          <select name="specialty" class="form-control" id="specialty" style="color:black; font-size:14px">
            @if ($specialties->count())
            @foreach ($specialties as $spe)
            <option value="{{ $spe->S_ID }}">{{ $spe->S_name }}</option>
            @endforeach
            @endif
        </select>
    </div>
    {{ Form::label('other', Lang::get('messages.otherspe_ab'), array('class' => 'col-sm-2 control-label')) }}
    <div class="col-md-4">
        {{ Form::text('other', '', array('class' => 'session form-control')) }}
    </div>
</div>
</div>
<br>

<div class="row">
    <div class="form-group">
        {{ Form::label('aimed', 'Atención a:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::select('aimed', $aimed, '', ['class' => 'form-control', 'id' => 'aimed', 'style' => 'color:black; font-size:14px;']) }}
        </div>
    </div>
</div>

<br>

<p>{{ Lang::get('messages.addintro_ab') }}</p>

<div class="row">
    <div class="form-group">
        {{ Form::label('introduction', Lang::get('messages.intro_ab') .' (*)', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::textarea('introduction', '', ['class' => 'session form-control', 'size' => '1x2', 'maxlength' => '150']) }}
          <span class="error_msg">{{ $errors->first('b_introduction') }}</span>
      </div>
  </div>
</div>

<br>
<p>{{ Lang::get('messages.addespdetail_ab') }}</p>
<div class="row">
    <div class="form-group">
        {{ Form::label('description', Lang::get('messages.des_ab') .' (*)', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::textarea('description', '', ['class' => 'session form-control', 'size' => '1x5']) }}
          <span class="error_msg">{{ $errors->first('b_description') }}</span>
      </div>
  </div>
</div>

<br>
<p>{{ Lang::get('messages.addimg_ab') }}</p>
<h5>{{ Lang::get('messages.belowtwo_ab') }}</h5>
<div class="row">
    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 130px;">
                {{ HTML::image('images/default.jpg') }}
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 270px;"></div>
            <div>
              <span class="btn btn-default btn-file"><span class="fileinput-new">{{ Lang::get('messages.select_apa') }}</span><span class="fileinput-exists">{{ Lang::get('messages.change_apa') }}</span>
              <input type="file" name="image"></span>
              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ Lang::get('messages.remove_apa') }}</a>
          </div>
      </div><br>
      <span class="error_msg">{{ $errors->first('b_image') }}</span>
  </div>


</div>
</div>

<br>

<div class="row">
    <div class="form-group">
        <label for="business_hours" class="col-md-1 control-label">Horas de atención</label>
        <div class="col-md-1">
          <button type="button" 
          class="btn btn-default btn-xs" 
          id="hour_help" 
          data-container="body" 
          data-toggle="popover" 
          data-placement="right">?</button>
      </div>
      <div class="col-md-10">
        <table class="table table-bordered" id="business_hours">
          <thead>
            <tr>
              <th></th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miércoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Sábado</th>
              <th>Domingo</th>
          </tr>
      </thead>
      <tbody>
        <tr>
          <td>1ero Abierto</td>
          @for ($i = 1; $i < 8; $i++)
          <td>{{ Form::text('open_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
          @endfor
      </tr>
      <tr>
          <td>1ero Cerrado</td>
          @for ($i = 1; $i < 8; $i++)
          <td>{{ Form::text('close_1[' . $i .']', '', array('class' => 'form-control')) }}</td>
          @endfor
      </tr>
      <tr>
          <td>2do Abierto</td>
          @for ($i = 1; $i < 8; $i++)
          <td>{{ Form::text('open_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
          @endfor
      </tr>
      <tr>
          <td>2do Cerrado</td>
          @for ($i = 1; $i < 8; $i++)
          <td>{{ Form::text('close_2[' . $i .']', '', array('class' => 'form-control')) }}</td>
          @endfor
      </tr>
  </tbody>
</table>
</div>
</div>
</div>
<br>

<p>{{ Lang::get('messages.socialopcion_ab') }}</p>

<div class="row">
    <div class="form-group">
        <label for="facebook" class="col-md-2 control-label"><span class="fa fa-facebook"></span>     Facebook <br>{{ Lang::get('messages.face_ej_up') }}</label>
        <div class="col-md-4">
          {{ Form::text('facebook', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_facebook') }}</span>
      </div>
      <label for="twitter" class="col-md-2 control-label"><span class="fa fa-twitter"></span>     Twitter <br>{{ Lang::get('messages.twitter_ej_up') }}</label>
      <div class="col-md-4">
          {{ Form::text('twitter', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_twitter') }}</span>
      </div>
  </div>
</div>

<br>

<div class="row">
    <div class="form-group">
        <label for="linkedin" class="col-md-2 control-label"><span class="fa fa-linkedin"></span>     Linkedin <br>{{ Lang::get('messages.linke_ej_up') }}</label>
        <div class="col-md-4">
          {{ Form::text('linkedin', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_linkedin') }}</span>
      </div>

      <label for="youtube" class="col-md-2 control-label"><span class="fa fa-youtube"></span>     Youtube <br>{{ Lang::get('messages.youtube_ej_up') }}</label>
      <div class="col-md-4">
          {{ Form::text('youtube', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_youtube') }}</span>
      </div>
  </div>
</div>

<br>

<div class="row">
    <div class="form-group">
        <label for="google_plus" class="col-md-2 control-label"><span class="fa fa-google-plus"></span>     Google+ <br>{{ Lang::get('messages.google_ej_up') }}</label>
        <div class="col-md-4">
          {{ Form::text('google_plus', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_google_plus') }}</span>
      </div>
      <label for="website" class="col-md-2 control-label"><span class="fa fa-globe"></span>     {{ Lang::get('messages.website_up') }}<br>{{ Lang::get('messages.website_ej_up') }}</label>
      <div class="col-md-4">
          {{ Form::text('website', '', array('class' => 'session form-control')) }}
          <span class="error_msg">{{ $errors->first('b_website') }}</span>
      </div>
  </div>
</div>

<br>

<p>{{ Lang::get('messages.othertel_ab') }}</p>

<br>

<div class="row">
    <div class="form-group">
        <label for="contact-phone" class="col-md-2 control-label">{{ Lang::get('messages.conctacttel_ab') }}</label>
        <div class="col-md-4">
          {{ Form::text('contact-phone', '', array('class' => 'session form-control')) }}
      </div>
  </div>
</div>

<br>

<div class="row">
    <div class="form-group">
        <div class="col-md-5"></div>
        <div class="col-md-2">
          {{ Form::submit(Lang::get('messages.save_apa'), array('class' => 'btn btn-primary')) }}
      </div>
  </div>
</div>
<div class="col-md-4"></div>

<div class="modal fade" id="help_map">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
              <span class="sr-only">{{ Lang::get('messages.close_abm') }}</span></button>
              <h4 class="modal-title">{{ Lang::get('messages.register_abm') }}</h4>
          </div>
          <div class="modal-body">
            <p>{{ Lang::get('messages.coor_abm') }} <a href="//maps.google.com" target="_blank">{{ Lang::get('messages.signin_abm') }}</a></p>
            <div class="row">
              <div class="form-group">
                {{ Form::label('latitude', Lang::get('messages.lat_abm'), array('class' => 'col-sm-2 control-label')) }}
                <div class="col-md-4">
                  {{ Form::text('latitude', '', array('class' => 'session form-control', 'id' => 'latitude')) }}
              </div>

              {{ Form::label('longitude', Lang::get('messages.lon_abm'), array('class' => 'col-md-2 control-label')) }}
              <div class="col-md-4">
                  {{ Form::text('longitude', '', array('class' => 'session form-control focus', 'id' => 'longitude')) }}
              </div>
          </div>
      </div>
      <br>
      <img src="{{url('images/map.png')}}">
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('messages.close_abm') }}</button>
    <button type="button" class="btn btn-danger" id="accept_btn">{{ Lang::get('messages.accepted_abm') }}</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{ Form::close() }}