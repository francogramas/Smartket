@extends('layouts.dashboard')
@section('page_heading','Ajuste de inventario')
@section('section')
<div class="row">
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-8">
				<h5>Producto</h5>
				{!! Form::text('prodcuto',null,['id'=>'prodcuto','required'=>'required','class'=>'form-control','placeholder'=>'prodcuto']) !!}
			</div>
			<div class="col-sm-2">
				<h5>Cant. real</h5>
				{!! Form::number('sobrantes','0',['id'=>'sobrantes','required'=>'required','class'=>'form-control','placeholder'=>'Cantidad']) !!}
			</div>
			<div class="col-sm-2">
				<h5>Cant. Sistema</h5>
				{!! Form::number('Faltantes','0',['id'=>'sobrantes','required'=>'required','class'=>'form-control','placeholder'=>'Cantidad']) !!}
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
		<button type="submit" class="btn btn-primary" >Agregar</button>
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<button type="submit" class="btn btn-success" formnovalidate="formnovalidate">Finalizar</button>
	</div>
	<div class="col-sm-1">
		<h5><br></h5>
		<button type="submit" class="btn btn-warning" formnovalidate="formnovalidate">Posponer</button>
	</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-1">
		<h5>Valor Total</h5>
	</div>
	<div class="col-sm-1">
		<h5>Costo Total</h5>
	</div>
	<div class="col-sm-1">
		<h5>Utilidad Neta</h5>
	</div>
</div>
{!! Form::close() !!}
@stop