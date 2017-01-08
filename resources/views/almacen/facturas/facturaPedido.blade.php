@extends('layouts.dashboard')
@section('page_heading','Pedido')
@section('section')


{!! Form::open(['route' => 'pedido.store','method'=>'POST']) !!}

<div class="row">
	<div class="col-sm-4">
		<div class="row">
			<div class="col-sm-3">
				<h5>Prefijo</h5>
				{!! Form::text('prefijo',$factura_id{'prefijo'},['id'=>'prefijo','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Número</h5>
				{!! Form::label($factura_id{'numero'},null,['id'=>'numero','class'=>'form-control']) !!}
			</div>
			<div class="col-sm-6">
				<h5>Fecha</h5>
				{!! Form::date('fecha',Carbon\Carbon::parse($factura_id{'fecha'})->format('Y-m-d'),['id'=>'fecha','required'=>'required','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			{!! Form::hidden('tipo',4,['id'=>'tipo']) !!}
			{!! Form::hidden('estado_id',1,['id'=>'estado_id']) !!}

		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-12">
				<h5>Proveedor</h5>
				{!! Form::hidden('users_id',$aut,['id'=>'users_id']) !!}
				{!! Form::hidden('tercero_id',$terceros1{'id'},['id'=>'tercero_id']) !!}
				{!! Form::text('buscarTercero',$terceros1{'nit'}.' || '.$terceros1{'nombres'}.' '.$terceros1{'apellido1'}.' '.$terceros1{'apellido2'},['id'=>'buscarTercero','required'=>'required','class'=>'form-control','placeholder'=>'Proveedor...']) !!}
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
				{!! Form::hidden('producto_id',null,['id'=>'producto_id','class'=>'form-control']) !!}
				{!! Form::text('buscarP',null,['id'=>'buscarP','required'=>'required','autocomplete'=>'on','class'=>'form-control','placeholder'=>'Prodcuto...']) !!}
				<input type="hidden" id="inventario_id" value="0">
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
		<a href={{ route('pedido.create') }} class="btn - btn-success"> Finalizar </a>
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<a href={{ route('pedido.show','0') }} class="btn - btn-danger"> Cancelar </a>
	</div>
	<div class="col-sm-3">
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
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach ($facturaDetalles as $facturaDetalle)
					<tr data-id="{{ $facturaDetalle->id }}">
						<td> {{ $facturaDetalle->cantidad }} </td>
						<td> {{ $facturaDetalle->codigo }} </td>
						<td> {{ $facturaDetalle->nombre }} </td>
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