<div>
	<table class="table">
		<thead>
			<tr>
				<td><b>Saldo</b></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					{{ '$ '.number_format(($saldo),2, '.', ',') }}
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div>
	<table class="table">
	<caption><b>Detalle de Deudas y Abonos</caption>
		<thead>
			<tr>
				<td><b>Fecha</b></td>
				<td><b>Deuda</b></td>
				<td><b>Abono</b></td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		@foreach ($cartera as $carterai)
			<tr>
				<td>{{ Carbon\Carbon::parse($carterai->created_at)->format('Y-m-d') }}</td>
				<td>{{ '$ '.number_format(($carterai->deuda),2, '.', ',') }}</td>
				<td>{{ '$ '.number_format(($carterai->abono),2, '.', ',') }}</td>
				<td></td>
			</tr>
		@endforeach		
		</tbody>
	</table>
</div>