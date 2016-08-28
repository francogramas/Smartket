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
		                 	<li><a href="#">Venta</a></li>
		                    <li><a href="#">Compra</a></li>
		                    <li><a href="#">Cotización</a></li>
		                    <li><a href="#">Devolución</a></li>
		                </ul>
		             </div>	
					Todas las facturas van acá
				@endsection		
				@include('widgets.panel', array('class'=>'success', 'header'=>true, 'as'=>'panel3'))		
		    </div>
			<div class="col-sm-6">
				@section ('panel2_panel_title', 'Herramientas de inventario')
				@section ('panel2_panel_body')
				<div class="btn-group">
		                <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
		                	<i class="fa fa-barcode"></i>  <span class="caret"></span>
		                </button>
		                <ul class="dropdown-menu" role="menu">
		                 	<li><a href="#">Consolidado</a></li>
		                    <li><a href="#">Disponible</a></li>
		                    <li><a href="#">Agotados</a></li>
		                    <li class="divider"></li>
		                    <li><a href="#">Inventario Inicial</a></li>
		                </ul>
		             </div>
				Herramientas de inventario
				@endsection
				@include('widgets.panel', array('class'=>'info', 'header'=>true, 'as'=>'panel2'))
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				@section ('panel23_panel_title', 'Terceros')
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
		                 	<li><a href="#">Resumen</a></li>
		                    <li><a href="#">Ventas</a></li>
		                    <li><a href="#">Utilidades</a></li>
		                    <li><a href="#">Cartera</a></li>
		                    <li><a href="#">Productos de mayor rotación</a></li>
		                    <li><a href="#">Productos de menor rotación</a></li>
		                </ul>
		             </div>
		          	Supervise las estadísticas
				@endsection
				@include('widgets.panel', array('class'=>'success', 'header'=>true, 'as'=>'panel22'))
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				@section ('panel33_panel_title', 'Cartera')
				@section ('panel33_panel_body')
				<div class="row">
					<div class="col-sm-3">
						<div class="btn-group">
				                <button type="button" class="btn btn-danger btn-lg dropdown-toggle" data-toggle="dropdown">
				                	<i class="fa fa-money"></i>  <span class="caret"></span>
				                </button>
				                <ul class="dropdown-menu" role="menu">
				                 	<li><a href="#">Abonos</a></li>
				                    <li><a href="#">Historial</a></li>
				                    <li><a href="#">Consolidados</a></li>				                    
				                </ul>
				             </div>	
				        </div>
				       	<div class="col-sm-9">
				       		Conozca el estado de las cuentas de sus deudores y acreedores.
				       	</div>
				    </div>							
				@endsection		
				@include('widgets.panel', array('class'=>'danger', 'header'=>true, 'as'=>'panel33'))		
		    </div>
			<div class="col-sm-6">
				@section ('panel32_panel_title', 'Productos')
				@section ('panel32_panel_body')
				<div class="row">
					<div class="col-sm-3">
						<div class="btn-group">
			                <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown">
			                	<i class="fa fa-qrcode"></i>  <span class="caret"></span>
			                </button>
			                <ul class="dropdown-menu" role="menu">
			                 	<li><a href="{{ url ('/categorias') }}">Categorias</a></li>
			                    <li><a href="{{ url ('/productos') }}">Productos</a></li>			                    
			                </ul>
			             </div>
			        </div>
			        <div class="col-sm-9">
						Administre sus productos, agregue edite u obtenga el listado.
			       	</div>
			    </div>				
				@endsection
				@include('widgets.panel', array('class'=>'warning', 'header'=>true, 'as'=>'panel32'))
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		@section ('cchart11_panel_title','Ventas Anuales')
        @section ('cchart11_panel_body')
        @include('widgets.charts.clinechart')
        @endsection
        @include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'cchart11'))

	</div>
</div>
@stop