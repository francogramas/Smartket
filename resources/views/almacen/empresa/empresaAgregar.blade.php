@extends('layouts.dashboard')
@section('page_heading','Datos de la empresa')
@section('section')
{!! Form::open(['route' => 'empresa.store','method'=>'POST']) !!}
	{!! Form::hidden('id',$empresa1{'id'},['id'=>'id']) !!}
	
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="nit">Nit</label>
				{!! Form::text('nit',$empresa1{'nit'},['id'=>'nit','required'=>'required','class'=>'form-control','placeholder'=>'Nit']) !!}
			</div>
			<div class="form-group">
				<label for="razonsocial">Razón Social</label>
				{!! Form::text('razonsocial',$empresa1{'razonsocial'},['id'=>'nit','required'=>'required','class'=>'form-control','placeholder'=>'Razón Social']) !!}				
			</div>
			<div class="form-group">
				<label for="pais">País</label>
				{!! Form::select('paises', $pais1,$empresa1{'pais'}, ['id' => 'paises','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				<label for="estado">Departamento/estado</label>    		
    			{!! Form::select('departamentos',$estados1,$empresa1{'estado'},['id'=>'departamentos','class'=>'form-control']) !!}    				
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
    			{!! Form::select('ciudad', $ciudades1,$empresa1{'ciudad'},['id'=>'ciudad','class'=>'form-control']) !!}				
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label>
				{!! Form::text('direccion',$empresa1{'direccion'},['id'=>'direccion','required'=>'required','class'=>'form-control','placeholder'=>'Dirección']) !!}				
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				{!! Form::text('telefono',$empresa1{'telefono'},['id'=>'telefono','required'=>'required','class'=>'form-control','placeholder'=>'Teléfono']) !!}
			</div>
			<div class="form-group">
				<label for="correo">Correo</label>
				{!! Form::email('correo',$empresa1{'correo'},['id'=>'correo','required'=>'required','class'=>'form-control','placeholder'=>'Correo']) !!}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" > {{ $texto }}  </button>
			</div>
		</div>
	</div>
{!! Form::close() !!}
@stop