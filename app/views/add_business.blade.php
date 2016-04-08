    @extends('layouts.default')
    @section('content')


    <div class="container">

        <ol class="breadcrumb">
            <li>{{ link_to('/', Lang::get('messages.back_ab')) }}</li>
            <li class="active" style="color:#083D5C">{{ Lang::get('messages.reg_ab') }}</li>
        </ol>

        @if (Session::has('var'))
            {{ Session::get('var') }}
        @endif

        @if(Auth::check() && Auth::user()->U_level == 1)
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Lang::get('messages.admin_ab') }}
            </div>
        @endif

        <h2 class="sub-header">{{ Lang::get('messages.add_ab') }}</h2>
        <div class="space20"></div>

        @include('layouts.form_doctor')

    </div>

    <script>

        $(document).ready(function() {
          $('#negocios').addClass('active');

          var popoverTemplate = ['<div class="popover">',
          '<div class="arrow"></div>',
          '<h3 class="popover-title"></h3>',
          '<div class="popover-content">',
          '</div>',
          '</div>'].join('');

          var title = "Horario reglas";

          var content = ['<ul><li style="line-height:24px;"> Introducir el horario en el siguiente formato: "18:00"</li>',
          '<li style="line-height:24px;"> 00:00 a 00:00 en el primer set significa 24 horas </li>',
          '<li style="line-height:24px;"> Si se dejan todos los campos vacíos de un día, se tomará como Cerrado </li></ul>' ].join('');

          $('#hour_help').popover({template:popoverTemplate,content:content, title:title, html:true});

          var geocoder = new google.maps.Geocoder();
          var mapOptions = {
            zoom: 15
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            draggable:true
        });

        var $radios = $('input:radio[name=map_c]');
        var map_c = $('#map_c').val();

        if(map_c == 1)
        {
            $radios.filter('[value=1]').prop('checked', true);
        } else {
            $radios.filter('[value=0]').prop('checked', true);
        }


        initialize();

        $("#address").keyup(function () {
          maps();
      });

        function initialize() {
          if(map_c == 1)
          {
            var lat = $('#latitude').val();
            var lng = $('#longitude').val();
            var myLatlng = new google.maps.LatLng(lat, lng);
            map.setCenter(myLatlng);
            marker.setPosition(map.getCenter());
        } else {
            var address = $('#address').val();
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  map.setCenter(results[0].geometry.location);
                  marker.setPosition(map.getCenter());
              } else {
                  var myLatlng = new google.maps.LatLng(32.4981863, -116.9626808);
                  map.setCenter(myLatlng);
                  marker.setPosition( map.getCenter());
              }
          });
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            var $radios = $('input:radio[name=map_c]');
            $radios.filter('[value=1]').prop('checked', true);
            c = marker.getPosition();
            $('#latitude').val(c.lat());
            $('#longitude').val(c.lng());
        });

        $("#accept_btn").click(function () {
            var $radios = $('input:radio[name=map_c]');
            $radios.filter('[value=1]').prop('checked', true);
            var myLatlng = new google.maps.LatLng($('#latitude').val(), $('#longitude').val());
            map.setCenter(myLatlng);
            c = map.getCenter();
            marker.setPosition(c);
        });
    }

    function maps() 
    {
        var address = document.getElementById('address').value;
        if(address == "")
        {
          address = "Tijuana";
      }

      var c;

      geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            c = map.getCenter();
            marker.setPosition(c);
            $('#latitude').val(c.lat());
            $('#longitude').val(c.lng());
        } else {
            var myLatlng = new google.maps.LatLng(32.4981863, -116.9626808);
            map.setCenter(myLatlng);
            c = map.getCenter();
            marker.setPosition(c);
            $('#latitude').val(c.lat());
            $('#longitude').val(c.lng());
        }
    }); 
  }

});


</script>

@stop