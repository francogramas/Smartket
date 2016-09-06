@extends('layouts.printplane')
@section('section')
	
	<div>
		<h1>Inventario Inicial</h1>
		<div class="row">
			<div class="col-sm-2">Fecha:</div>
			<div class="col-sm-2">Fecha de Inventario</div>			
			<div class="col-sm-2">Valor Neto:</div>
			<div class="col-sm-2">Costo Neto:</div>
			<div class="col-sm-2">Utilidad Neta</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<div>
		<table class="table">
			<thead>
				<tr>					
					<td>Código</td>
					<td>Producto</td>
					<td>Cantidad</td>
					<td>Lote</td>	
					<td>Vence</td>								
					<td>Costo</td>
					<td>Costo Total</td>
					<td>Valor</td>
					<td>Valor Total</td>
					<td>Utlidad</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>				
					<td></td>				
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div>
		<!-- pie de página -->
	</div>

@stop