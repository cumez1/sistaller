<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">OPCIONES</li>

            <li class="treeview">
              <a href="#">
                <i class='fa fa-shopping-cart'></i> <span>Ordenes de Trabajo</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('orden.create') }}"><i class="fa fa-circle-o"></i> Nueva Orden</a></li>
                <li><a href="{{ route('orden.index') }}"><i class='fa fa-shopping-cart'></i> <span>Ordenes de Trabajo</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class='fa fa-cog'></i> <span>Administración</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ route('usuario.index') }}"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>

                <li class="active"><a href="{{ route('cliente.index') }}"><i class='fa fa-users'></i> <span>Clientes</span></a></li>

                <li class="active"><a href="{{ route('categoria.index') }}"><i class='fa fa-sitemap'></i> <span>Categoria Productos</span></a></li>

                <li class="active"><a href="{{ route('producto.index') }}"><i class='fa fa fa-barcode'></i> <span>Productos</span></a></li>

                <li class="active"><a href="{{ route('tiposervicio.index') }}"><i class='fa fa-cog'></i> <span>Categoria Serivicios</span></a></li>

                <li class="active"><a href="{{ route('servicio.index') }}"><i class='fa fa-cogs'></i> <span>Servicios</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class='fa fa-file-pdf-o'></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ route('reporte.v_ganancias') }}"><i class='fa fa-money'></i> <span>Ganancias</span></a></li>
                <li class="active"><a href="{{ route('reporte.v_ordenes')  }}"><i class='fa fa-cart-arrow-down'></i> <span>Ordenes de Trabajo</span></a></li>
                
                <li class="active"><a href="{{ route('reporte.v_clientes')  }}"><i class='fa fa-users'></i> <span>Clientes</span></a></li>
                <li class="active"><a href="{{ route('reporte.v_productos')  }}"><i class='fa fa-tag'></i> <span>Productos</span></a></li>
              </ul>
            </li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ route('home.dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
            
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
