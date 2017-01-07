@extends('layouts.dashboard')
@section('page_heading','Factura de venta')
@section('section')

{!! Form::open(['route' => 'venta.store','method'=>'POST']) !!}

<div class="row">
	<div class="col-sm-4">
		<div class="row">
			<div class="col-sm-3">
				<h5>Prefijo</h5>
				{!! Form::text('prefijo',$factura_id{'prefijo'},['id'=>'prefijo','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Numero</h5>
				{!! Form::label($factura_id{'numero'},null,['id'=>'numero','class'=>'form-control']) !!}
			</div>
			<div class="col-sm-6">
				<h5>Fecha</h5>
				{!! Form::date('fecha',Carbon\Carbon::parse($factura_id{'fecha'})->format('Y-m-d'),['id'=>'fecha','required'=>'required','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			{!! Form::hidden('tipo',1,['id'=>'tipo']) !!}
			{!! Form::hidden('estado_id',1,['id'=>'estado_id']) !!}
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-12">
				<h5>Cliente</h5>
				<input type="hidden" id="users_id" value={{ $aut }}>
				{!! Form::hidden('tercero_id',$terceros1{'id'},['id'=>'tercero_id']) !!}
				{!! Form::text('buscarTercero',$terceros1{'nit'}.' || '.$terceros1{'nombres'}.' '.$terceros1{'apellido1'}.' '.$terceros1{'apellido2'},['id'=>'buscarTercero','required'=>'required','class'=>'form-control','placeholder'=>'Cliente...']) !!}
			</div>
		</div>
	</div>
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
				{!! Form::hidden('producto_id',null,['id'=>'producto_id']) !!}
				<input type="hidden" id="producto_id">
				{!! Form::text('buscarPInv',null,['id'=>'buscarPInv','required'=>'required','autocomplete'=>'on','class'=>'form-control','placeholder'=>'Prodcuto...']) !!}				
				{!! Form::hidden('inventario_id',null,['id'=>'inventario_id']) !!}

			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-3">
				<h5>Valor</h5>
				{!! Form::number('valor',null,['id'=>'valor','required'=>'required','class'=>'form-control','placeholder'=>'$0.00','readonly'=>'true']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Lote</h5>
				{!! Form::text('lote','',['id'=>'lote','required'=>'required','class'=>'form-control','placeholder'=>'0000','readonly'=>'true']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Stock</h5>
				{!! Form::text('stock','1',['id'=>'stock','required'=>'required','class'=>'form-control','placeholder'=>'0','readonly'=>'true']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-1">
		<h5><br></h5>
		<button type="submit" class="btn btn-primary" name="agregar" > Agregar </button>
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<a href={{ route('venta.create') }} class="btn - btn-success"> Finalizar </a>		
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<button type="submit" class="btn btn-danger" name="cancelar" formnovalidate="formnovalidate">Cancelar</button>
	</div>
	<div class="col-sm-2">
		<h5>Valor Total</h5>
		<input type="hidden" value="{{ $totales->valorTotal }}" id="hdnTotal">
		<label id="vrTotal">{{ '$ '.number_format(($totales->valorTotal),2, '.', ',') }}</label>
	</div>	
	<div class="col-sm-2">
		<h5>Efectivo</h5>
		<input type="text" id="TxtEfectivo" class="form-control currency" placeholder="$ 0.00">
	</div>
	<div class="col-sm-2">
		<h5>Cambio</h5>
		<input type="text" id="LblCambio" class="form-control currency" placeholder="$ 0.00" readonly="true">		
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
						<td> {{ '$ '.number_format(($facturaDetalle->valor),2, '.', ',') }} </td>
						<td> {{ '$ '.number_format((($facturaDetalle->valor)*($facturaDetalle->cantidad)),2, '.', ',') }} </td>	
						<td><a href= "#" class="btn-delete" >[Eliminar]</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

{!! Form::close() !!}

{!! Form::open(['route' => ['inicial.destroy',':DETALLE_ID'],'method'=>'DELETE', 'id'=>'form-delete' ]) !!}
{!! Form::close() !!}

@stop