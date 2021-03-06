@extends('layouts.dashboard')
@section('page_heading','Inventario inicial')
@section('section')
{!! Form::open(['route' => 'inicial.store','method'=>'POST']) !!}

<div style="visibility: {{ $visible }};">
	<div>
		{!! Form::hidden('numero',0,['id'=>'numero']) !!}
		{!! Form::hidden('prefijo','',['id'=>'prefijo']) !!}
		{!! Form::hidden('tercero_id',1,['id'=>'tercero_id']) !!}
		{!! Form::hidden('fecha',$dateActual,['id'=>'fecha']) !!}
		{!! Form::hidden('tipo',6,['id'=>'tipo']) !!}
		{!! Form::hidden('estado_id',1,['id'=>'estado_id']) !!}
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-2">
					<h5>Cantidad</h5>
					{!! Form::number('cantidad','1',['id'=>'cantidad','required'=>'required','class'=>'form-control','placeholder'=>'Cantidad']) !!}
				</div>
				<div class="col-sm-10">
					<h5>Producto</h5>
					{!! Form::hidden('producto_id',null,['id'=>'producto_id','class'=>'form-control']) !!}
					{!! Form::text('buscarP',null,['id'=>'buscarP','required'=>'required','autocomplete'=>'on','class'=>'form-control','placeholder'=>'Prodcuto...']) !!}
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-3">
					<h5>Valor</h5>
					{!! Form::number('valor',null,['id'=>'valor','required'=>'required','class'=>'form-control','placeholder'=>'$0.00']) !!}
				</div>
				<div class="col-sm-3">
					<h5>Costo</h5>
					{!! Form::number('costo',null,['id'=>'costo','required'=>'required','class'=>'form-control','placeholder'=>'$0.00']) !!}
				</div>
				<div class="col-sm-3">
					<h5>Stock Minimo</h5>
					{!! Form::number('stockMin','1',['id'=>'stockMin','required'=>'required','class'=>'form-control','placeholder'=>'1']) !!}
				</div>
				<div class="col-sm-3">
					<h5>Lote</h5>
					{!! Form::text('lote','0000',['id'=>'lote','required'=>'required','class'=>'form-control','placeholder'=>'0000']) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<h5>Vence</h5>
			{!! Form::date('vence',$date,['id'=>'vence','required'=>'required','class'=>'form-control']) !!}
		</div>
		<div class="col-sm-1">
			<h5><br></h5>
			<button type="submit" class="btn btn-primary" name="agregar" >Agregar</button>
		</div>
		<div class="col-sm-1">
			<h5><br></h5>
			<a href={{ route('inicial.create') }} class="btn - btn-success"> Finalizar </a>
		</div>
		<div class="col-sm-1">
			<h5><br></h5>
			<a href={{ route('inicial.create') }} class="btn - btn-info"> Imprimir </a>
		</div>
		<div class="col-sm-1">
		</div>
		<div class="col-sm-4">
			<table class="table">
				<thead>
					<tr>
						<td><h5><b>Valor Neto</b> </h5></td>
						<td><h5><b>Costo Neto</b> </h5</td>
						<td><h5><b>Utilidad Neta</b> </h5</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($totales as $total)
						<tr>
							<td> {{ '$ '.number_format(($total->valorTotal),2, '.', ',') }}</td>
							<td> {{ '$ '.number_format(($total->costoTotal),2, '.', ',') }}</td>
							<td> {{ '$ '.number_format(($total->UtilidadNeta),2, '.', ',') }}</td>													
						</tr>
					@endforeach				
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<table class="table table-bordered">
				<caption>Listado de Productos</caption>
				<thead class="theadN">
					<tr>
						<td>Cantidad</td>
						<td>Código</td>
						<td>Prodcuto</td>
						<td>Lote</td>
						<td>Vence</td>
						<td>Costo</td>
						<td>Costo Total</td>
						<td>Valor</td>
						<td>Valor total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($facturaDetalles as $facturaDetalle)
						<tr data-id="{{ $facturaDetalle->id }}">
							<td> {{ $facturaDetalle->cantidad }} </td>
							<td> {{ $facturaDetalle->codigo }} </td>
							<td> {{ $facturaDetalle->nombre }} </td>
							<td> {{ $facturaDetalle->lote }} </td>
							<td> {{ Carbon\Carbon::parse($facturaDetalle->vence)->format('d-m-Y') }} </td>
							<td> {{ '$ '.number_format(($facturaDetalle->costo),2, '.', ',') }} </td>
							<td> {{ '$ '.number_format((($facturaDetalle->costo)*($facturaDetalle->cantidad)),2, '.', ',') }} </td>
							<td> {{ '$ '.number_format(($facturaDetalle->valor),2, '.', ',') }} </td>
							<td> {{ '$ '.number_format((($facturaDetalle->valor)*($facturaDetalle->cantidad)),2, '.', ',') }} </td>	
							<td><a href= "#" class="btn-delete" >[Eliminar]</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{!! Form::close() !!}

{!! Form::open(['route' => ['inicial.destroy',':DETALLE_ID'],'method'=>'DELETE', 'id'=>'form-delete' ]) !!}
{!! Form::close() !!}

@stop