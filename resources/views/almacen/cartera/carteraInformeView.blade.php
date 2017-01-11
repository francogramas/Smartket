@extends('layouts.dashboard')
@section('page_heading','Informe de cartera')
@section('section')

{!! Form::open(['route' => 'carteraInforme.store','method'=>'POST']) !!}
{{ csrf_field() }}

<div class="panel panel-info">
	<div class="panel-heading">Rango de Fechas</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<label for="txtfechai">Fecha Inicial</label>
					{!! Form::date('txtfechai',$fechai,['id'=>'txtfechaf','required'=>'required','class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="txtfechaf">Fecha Final</label>
					{!! Form::date('txtfechaf',$fechaf,['id'=>'txtfechaf','required'=>'required','class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<button type="submit" name="Consultar" class="btn btn-info">Consultar</button>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="panel panel-success">
					<div class="panel-heading">Consolidado deudores</div>
					<div class="panel-body">
						<div id='consolidadoDeudores'>
							<table class="table">
								<thead>
									<tr>
										<td><b>Deudas Totales</b></td>
										<td><b>Abonos Totales</b></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ '$ '.number_format(($deudaDeudores),2, '.', ',') }} </td>
										<td>{{ '$ '.number_format(($abonoDeudores),2, '.', ',') }} </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="panel panel-danger">
					<div class="panel-heading">Consolidado acreedores</div>
					<div class="panel-body">
						<div id='consolidadoAcreedores'>
							<table class="table">
								<thead>
									<tr>
										<td><b>Deudas Totales</td>
										<td><b>Abonos Totales</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ '$ '.number_format(($deudaAcreedores),2, '.', ',') }} </td>
										<td>{{ '$ '.number_format(($abonoAcreedores),2, '.', ',') }} </td>
									</tr>
								</body>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">Detalle de deudores</div>
			<div class="panel-body">
				<div id="detalleDeudores">
					<table class="table">
						<thead>
							<tr>
								<td><b>Fecha</b></td>
								<td><b>Nombres</b></td>
								<td><b>Deuda</b></td>
								<td><b>Abono</b></td>
							</tr>
						</thead>
						<tbody>
						@foreach ($carteraDeudores as $carteraDeudoresi)
							<tr>
								<td>{{ Carbon\Carbon::parse($carteraDeudoresi->created_at)->format('Y-m-d')  }}</td>
								<td>{{ $carteraDeudoresi->nombres.' '.$carteraDeudoresi->apellido1.' '.$carteraDeudoresi->apellido2 }}</td>
								<td>{{ '$ '.number_format(($carteraDeudoresi->deuda),2, '.', ',') }}</td>
								<td>{{ '$ '.number_format(($carteraDeudoresi->abono),2, '.', ',') }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-danger">
			<div class="panel-heading">Detalle de acreedores</div>
			<div class="panel-body">
				<div id="detalleAcreedores">
					<table class="table">
						<thead>
							<tr>
								<td><b>Fecha</b></td>
								<td><b>Nombres</b></td>
								<td><b>Deuda</b></td>
								<td><b>Abono</b></td>
							</tr>
						</thead>
						<tbody>
						@foreach ($carteraAcreedores as $carteraAcreedoresi)
							<tr>
								<td>{{Carbon\Carbon::parse($carteraAcreedoresi->created_at)->format('Y-m-d')}}</td>
								<td>{{ $carteraAcreedoresi->nombres.' '.$carteraAcreedoresi->apellido1.' '.$carteraAcreedoresi->apellido2 }}</td>
								<td>{{ '$ '.number_format(($carteraAcreedoresi->deuda),2, '.', ',') }}</td>
								<td>{{ '$ '.number_format(($carteraAcreedoresi->abono),2, '.', ',') }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop