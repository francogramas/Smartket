@extends('layouts.dashboard')
@section('page_heading','Inventario disponible')
@section('section')
<table class="table table-bordered">
	<thead class="theadN">
		<tr>
			<td>Código</td>
			<td>Producto</td>
			<td>Cantidad</td>
			<td>Lote</td>
			<td>Costo</td>
			<td>Costo Total</td>
			<td>Valor</td>
			<td>Valor Total</td>
			<td>Utilidad Neta</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($inventario as $inventarioi)
		<tr>
			<td>{{ $inventarioi->codigo }}</td>
			<td>{{ $inventarioi->nombre }}</td>
			<td>{{ $inventarioi->cantidad }}</td>
			<td>{{ $inventarioi->lote }}</td>
			<td>{{ '$ '.number_format(($inventarioi->costo),2, '.', ',') }}</td>
			<td>{{ '$ '.number_format(($inventarioi->cantidad*$inventarioi->costo),2, '.', ',') }}</td>
			<td>{{ '$ '.number_format(($inventarioi->valor),2, '.', ',') }}</td>
			<td>{{ '$ '.number_format(($inventarioi->valor*$inventarioi->cantidad ),2, '.', ',') }}</td>
			<td>{{ '$ '.number_format(($inventarioi->cantidad*($inventarioi->valor-$inventarioi->costo)),2, '.', ',') }}</td>
		</tr>
		@endforeach		
	</tbody>
</table>
@stop