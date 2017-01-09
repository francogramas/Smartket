@extends('layouts.dashboard')
@section('page_heading','Cartera')
@section('section')

<div class="row">
	<div class="col-sm-4">
		@section ('inside_panel_title', 'Resumen de Cartera')
		@section ('inside_panel_body')
		<div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td>Total Acreedores</td>
						<td>Total Deudores</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<label for="">Listado de Saldos</label>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td>Nombres</td>
						<td>Saldo</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'inside', 'class'=>'info'))		 		
	</div>
	<div class="col-sm-8">
		<div class="row">

		<div class="col-sm-12">
			<div class="panel panel-info">
			  <div class="panel-heading">Agregar Información</div>
			  <div class="panel-body">
			  <div class="row">
			  	<div class="col-sm-12">
			  		<label for="terceroCartera">Buscar</label>
					<input type="text" id="terceroCartera" class="form-control" placeholder="Buscar...">			  		
			  	</div>
			  </div>
			  <br>
			  	<div class="row">
			  			<div class="col-sm-4">
			  				<label for="tipoCartera">Tipo de Cartera</label>
							<select name="tipoCartera" id="tipoCartera" class="form-control">
								<option value="1">Deudores</option>
								<option value="2">Acreedores</option>
							</select>
			  			</div>
			  			<div class="col-sm-2">
			  				<label for="txtDeuda">Deuda</label>
			  				<input class="form-control currency" id="txtDeuda" type="text" placeholder="$ 0.00"></div>
			  			<div class="col-sm-2">
			  				<label for="txtAbono">Abono</label>
			  				<input class="form-control currency" id="txtAbono" type="text" placeholder="$ 0.00"></div>
			  			<div class="col-sm-2">
			  				<label for="txtSaldo">Saldo</label>
			  				<input class="form-control currency" id="txtSaldo" type="text" placeholder="$ 0.00" readonly="true"></div>
			  			<div class="col-sm-2">
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
				  	<table class="table table-striped">
						<thead>
							<tr>
								<td>Fecha</td>
								<td>Nombres</td>
								<td>Deuda</td>
								<td>Abono</td>
								<td>Saldo</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>
@stop