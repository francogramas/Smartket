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
		@include('widgets.panel', array('header'=>true, 'as'=>'inside', 'class'=>'info'))