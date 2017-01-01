@extends('layouts.dashboard')
@section('page_heading','Panel de Trabajo')
@section('section')


<div class="row">
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-6">
				@section ('panel3_panel_title', 'Facturas')
				@section ('panel3_panel_body')
					<div class="btn-group">
		                <button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown">
		                	<i class="fa fa-shopping-cart"></i>  <span class="caret"></span>
		                </button>
		                <ul class="dropdown-menu" role="menu">
		                 	<li><a href="/facturas/venta">Venta</a></li>
		                    <li><a href="/facturas/compra">Compra</a></li>		                    
		                    <li><a href="/facturas/cotizacion">Cotizaciones</a></li>		                    
		                    <li><a href="/facturas/devolucion">Devoluciones</a></li>		                    
		                    <li><a href="/facturas/pedido">Pedidos</a></li>		                    
		                    <li><a href="#">Administrar</a></li>		                    
		                </ul>
		             </div>	
					Ingrese y administre las facturas.
				@endsection		
				@include('widgets.panel', array('class'=>'success', 'header'=>true, 'as'=>'panel3'))		
		    </div>
			<div class="col-sm-6">
				@section ('panel33_panel_title', 'Inventario')
				@section ('panel33_panel_body')
				<div class="row">
					<div class="col-sm-3">
						<div class="btn-group">
				                <button type="button" class="btn btn-danger btn-lg dropdown-toggle" data-toggle="dropdown">
				                	<i class="fa fa-money"></i>  <span class="caret"></span>
				                </button>
				                <ul class="dropdown-menu" role="menu">
				                 	<li><a href="#">Disponible</a></li>
				                    <li><a href="#">Kardex de un producto</a></li>
				                    <li><a href="#">Consolidado historico de ventas</a></li>				                    
				                    <li><a href="#">Ajustes de inventario</a></li>				                    
				                </ul>
				             </div>	
				        </div>
				       	<div class="col-sm-9">
				       		Administre su inventario.
				       	</div>
				    </div>							
				@endsection		
				@include('widgets.panel', array('class'=>'danger', 'header'=>true, 'as'=>'panel33'))		
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				@section ('panel23_panel_title', 'Clientes')
				@section ('panel23_panel_body')			
				<div class="btn-group">
		                <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown">
		                	<i class="fa fa-users"></i>  <span class="caret"></span>
		                </button>
		                <ul class="dropdown-menu" role="menu">
		                 	<li><a href="{{ url ('/terceros') }}" >Adiministrar</a></li>
		                    <li><a href="{{ url ('/terceros/create') }}" >Listado Completo</a></li>		                    
		                </ul>
		             </div>
				Administre sus Terceros
				@endsection		
				@include('widgets.panel', array('class'=>'warning', 'header'=>true, 'as'=>'panel23'))		
		    </div>
			<div class="col-sm-6">
				@section ('panel22_panel_title', 'Estadísticas')
				@section ('panel22_panel_body')		
				<div class="btn-group">
		                <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown">
		                	<i class="fa fa-bar-chart-o"></i>  <span class="caret"></span>
		                </button>
		                <ul class="dropdown-menu" role="menu">
		                 	<li><a href="#">Facturas Ingresadas</a></li>
		                    <li><a href="#">Facturas Canceladas</a></li>
		                    <li><a href="#">Puntos redimidos</a></li>
		                    <li><a href="#">Clientes regitrados</a></li>
		                </ul>
		             </div>
		          	Supervise las estadísticas
				@endsection
				@include('widgets.panel', array('class'=>'success', 'header'=>true, 'as'=>'panel22'))
			</div>
		</div>	
	</div>

	<div class="col-sm-4">
		@section ('cchart11_panel_title','Ventas Anuales')
        @section ('cchart11_panel_body')
        @include('widgets.charts.clinechart',['a',10,'b',11])
        @endsection
        @include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'cchart11'))

	</div>
</div>
@stop