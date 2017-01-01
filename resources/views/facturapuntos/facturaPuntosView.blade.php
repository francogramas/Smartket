@extends('layouts.dashboard')
@section('page_heading','Registro de factura de venta')
@section('section')

{!! Form::open(['route' => 'ventapuntos.store','method'=>'POST']) !!}

<div class="row">
	<div class="col-sm-5">
		<div class="row">
			<div class="col-sm-3">
				<h5>Prefijo</h5>
				{!! Form::text('prefijo',$factura_id{'prefijo'},['id'=>'prefijo','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Numero</h5>
				{!! Form::text($factura_id{'numero'},null,['id'=>'numero','class'=>'form-control']) !!}
			</div>
			<div class="col-sm-6">
				<h5>Fecha</h5>
				{!! Form::date('fecha',Carbon\Carbon::parse($factura_id{'fecha'})->format('Y-m-d'),['id'=>'fecha','required'=>'required','class'=>'form-control','placeholder'=>'']) !!}
			</div>
			{!! Form::hidden('tipo',1,['id'=>'tipo']) !!}
			{!! Form::hidden('estado_id',1,['id'=>'estado_id']) !!}
		</div>
	</div>
	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-6">
				<h5>Cliente</h5>
				{!! Form::hidden('tercero_id',$terceros1{'id'},['id'=>'tercero_id']) !!}
				{!! Form::text('buscarTercero',$terceros1{'nit'}.' || '.$terceros1{'nombres'}.' '.$terceros1{'apellido1'}.' '.$terceros1{'apellido2'},['id'=>'buscarTercero','required'=>'required','class'=>'form-control','placeholder'=>'Cliente...']) !!}
			</div>
			<div class="col-sm-6">
				<h5>Maestro de Obra</h5>
				{!! Form::hidden('tercero_id',$terceros1{'id'},['id'=>'tercero_id']) !!}
				{!! Form::text('buscarTercero',$terceros1{'nit'}.' || '.$terceros1{'nombres'}.' '.$terceros1{'apellido1'}.' '.$terceros1{'apellido2'},['id'=>'buscarTercero','required'=>'required','class'=>'form-control','placeholder'=>'Cliente...']) !!}
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-3">
				<h5>Valor Neto</h5>
				{!! Form::number('valor',null,['id'=>'valor','required'=>'required','class'=>'form-control','placeholder'=>'$0.00']) !!}
			</div>
			<div class="col-sm-3">
				<h5>Puntos acumulados</h5>
				{!! Form::label('',null,['id'=>'puntos','required'=>'required','class'=>'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-1">
		<h5><br></h5>
		<a href={{ route('inicial.create') }} class="btn - btn-success"> Finalizar </a>		
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<button type="submit" class="btn btn-warning" name="posponer" formnovalidate="formnovalidate">Posponer</button>
	</div>	
</div>

{!! Form::close() !!}
@stop