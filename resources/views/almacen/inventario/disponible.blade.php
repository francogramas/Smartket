@extends('layouts.dashboard')
@section('page_heading','Inventario disponible')
@section('section')
<table class="table table-bordered">
	<thead class="theadN">
		<tr>
			<td>Código</td>
			<td>Producto</td>
			<td>Cantidad</td>
			<td>Costo</td>
			<td>Costo Total</td>
			<td>Valor</td>
			<td>Valor Total</td>
			<td>Utilidad Neta</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		@foreach ($inventario as $inventarioi)
		<tr>
			<td>{{ $inventarioi->codigo }}</td>
			<td>{{ $inventarioi->nombre }}</td>
			<td>{{ $inventarioi->cantidad }}</td>
			<td>{{ $inventarioi->costo }}</td>
			<td>{{ $inventarioi->cantidad*$inventarioi->costo }}</td>
			<td>{{ $inventarioi->valor }}</td>
			<td>{{ $inventarioi->valor*$inventarioi->cantidad }}</td>
			<td>{{ $inventarioi->cantidad*($inventarioi->valor-$inventarioi->costo) }}</td>
			<td></td>
		</tr>
		@endforeach		
	</tbody>
</table>
@stop