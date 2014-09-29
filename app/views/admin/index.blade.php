@include('admin.header')

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#F5F5F5">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">TjMed Administración</a>
        </div>
        <div class="nav navbar-nav navbar-right" style="margin-right: 0px;width: 500px;">
          <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
          <a href="#" style="margin:20px"><i class="fa fa-envelope-o" style="font-size:30px;margin-top:20px;margin-right:-23px;z-index:9;"></i>
            <span class="badge" style="float:right; margin-top:10px;z-index:10">42</span>
          </a>
        </div>
         <div class="col-sm-3">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
              <span class="fa fa-user dash"></span>USER
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mi perfil</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cerrar sesión</a></li>
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
            <li id="especialidades"><a href="{{ url('admin/especialidades') }}"><span class="fa fa-stethoscope dash"></span>ESPECIALIDADES</a></li>
            <li id="articulo"><a href="{{ url('admin/articulos') }}"><span class="fa fa-file-text-o dash"></span>ARTICULOS</a></li>
            <li id="comentarios"><a href="{{ url('admin/comentarios') }}"><span class="fa fa-comments dash"></span>COMENTARIOS</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content_admin')
        </div>
      </div>
    </div>
   
  </body>
</html>