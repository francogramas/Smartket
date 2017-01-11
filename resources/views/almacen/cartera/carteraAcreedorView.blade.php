@extends('layouts.dashboard')
@section('page_heading','Cartera de acreedores')
@section('section')

{{ csrf_field() }}
<div class="row">
	<div class="col-sm-4">
		<div id="consolidadoCartera">
		@section ('inside_panel_title', 'Resumen de Cartera')
		@section ('inside_panel_body')
		<div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td><b>Total Acreedores</td>
						<td><b>Total Deudores</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ '$ '.number_format(($acreedoresTotal),2, '.', ',') }}</td>
						<td>{{ '$ '.number_format(($deudoresTotal),2, '.', ',') }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<label for="">Listado de Saldos</label>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td><b>Nombres</td>
						<td><b>Saldo</td>
					</tr>
				</thead>
				<tbody>
				@foreach ($listado as $listadoi)
					<tr>
						<td>{{ $listadoi->nombres.' '.$listadoi->apellido1.' '.$listadoi->apellido2 }}</td>
						<td>{{ '$ '.number_format(($listadoi->saldo),2, '.', ',') }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'inside', 'class'=>'danger'))
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">

		<div class="col-sm-12">
			<div class="panel panel-info">
			  <div class="panel-heading">Agregar Información</div>
			  <div class="panel-body">
			  <div class="row">
			  	<div class="col-sm-12">
			  		<label for="buscarTerceroCartera">Buscar</label>
					<input type="text" id="buscarTerceroCartera" class="form-control" placeholder="Buscar...">	
					<input type="hidden" value="0" id="tercero_id">
					<input type="hidden" value="2" id="tipocartera_id">
			  	</div>
			  </div>
			  <br>
			  	<div class="row">
			  			<div class="col-sm-3">
			  				<label for="txtDeuda">Deuda</label>
			  				<input class="form-control currency" id="txtDeuda" type="text" placeholder="$ 0.00"></div>
			  			<div class="col-sm-3">
			  				<label for="txtAbono">Abono</label>
			  				<input class="form-control currency" id="txtAbono" type="text" placeholder="$ 0.00"></div>
			  			<div class="col-sm-3">
			  				<label for=""> <br> </label> 
			  				<a href="#" class="form-control btn btn-info" id="agregarAbono">Agregar</a> </div>	
			  	</div>
			  </div>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">Detalle de Abonos</div>
				  <div class="panel-body">
				  	<div id="detalleAbonos"></div>
				</div>
			</div>
		</div>
	</div>	
</div>
@stop