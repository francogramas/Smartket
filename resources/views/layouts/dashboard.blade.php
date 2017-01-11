@extends('layouts.plane')
@section('body')
 <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Mostrar/Ocultar Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">GuiasSoft V3.1</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ url('/logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                <i class="fa fa-sign-out fa-fw"></i> Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                           </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Panel de Trabajo</a>
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Estadísticas</a>
                            <!-- /.nav-second-level -->
                        </li>

                        <!--li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                            <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li-->
                        <li >
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i>Facturas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/facturas/venta') }}">Venta</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/facturas/compra' ) }}">Compra</a>
                                </li>
                                 <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/facturas/cotizacion') }}">Cotización</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/facturas/pedido' ) }}">Pedido</a>

                                </li>
                                <!-- li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/facturas/devolucion' ) }}">Devolución</a>
                                </li-->
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-money fa-fw"></i>Cartera<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/cartera') }}">Deudores</a>
                                </li>
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/carteraAcreedores') }}">Acreedores</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/carteraInforme' ) }}">Consultar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-tasks"></i> Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/inventario/disponible') }}">Disponible</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/inventario/consolidado' ) }}">Consolidado</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/inventario/ajuste' ) }}">Ajuste</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/inventario/agotados' ) }}">Agotados</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/inventario/inicial' ) }}">Inicial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i>Poductos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/categorias ') }}">Categorías</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/productos' ) }}">Productos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*clientes') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/terceros') }}"><i class="fa fa-users fa-fw"></i>Terceros</a>
                        </li>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
                @include('partials.message')
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop