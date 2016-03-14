@include('admin.header')

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#F5F5F5">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{url('admin')}}"><h5>TjMed Administración</h5></a>
        </div>
        <div class="nav navbar-nav navbar-right" style="margin-right: 0px;width: 500px;">
          <div class="row">
            <div class="col-sm-6"></div>
           <!--  <div class="col-sm-1">
          <a href="#" style="margin:20px"><i class="fa fa-envelope-o" style="font-size:30px;margin-top:20px;margin-right:-23px;z-index:9;"></i>
            <span class="badge" style="float:right; margin-top:10px;z-index:10">42</span>
          </a>
        </div> --><div class="col-sm-2"></div>
         <div class="col-sm-3">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
              <span class="fa fa-user dash"></span>{{ Auth::user()->U_firstname }}
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="fa fa-list"></span> Mi perfil</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('logout')}}"><span class="fa fa-sign-out"></span> Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="dashboard"><a href="{{ url('admin') }}" ><span class="fa fa-home dash"></span>DASHBOARD</a></li>
            <li id="usuario"><a href="{{ url('admin/usuarios') }}" ><span class="fa fa-users dash"></span>USUARIOS </a></li>
            <li id="doctor"><a href="{{ url('admin/doctores') }}"><span class="fa fa-user-md dash"></span>DOCTORES</a></li>
            <li id="especialidades"><a href="{{ url('admin/especialidades') }}"><span class="fa fa-stethoscope dash"></span>CATEGORIAS</a></li>
            <li id="articulo"><a href="{{ url('admin/articulos') }}" id="article_link"><span class="fa fa-file-text-o dash"></span>ARTICULOS</a></li>
            <li id="banner"><a href="{{ url('admin/banner') }}"><span class="fa fa-image dash"></span>BANNER</a></li>
            <li id="tjmed"><a href="{{ url('/') }}" id="tjmed_link"><span class="fa fa-sign-out dash"></span>IR A TJMED</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content_admin')
        </div>
      </div>
    </div>
   
  </body>
</html>

<script>
$(document).ready(function() {
});
</script>