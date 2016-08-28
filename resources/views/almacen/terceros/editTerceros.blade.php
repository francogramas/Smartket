@extends('layouts.dashboard')
@section('page_heading','Administración de Terceros')
@section('section')

{!! Form::model($terceros, ['route' => ['terceros.update',$terceros->id],'method'=>'PUT']) !!}
    
    <section>
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<h5>Tipo de Documento</h5>								
						{!! Form::text('tipoDocumento',null,['id'=>'tipoDocumento','required'=>'required','class'=>'form-control','placeholder'=>'Tipo de documento']) !!}						
					</div>
					<div class="col-sm-6">
						<h5>Documento</h5>
						{!! Form::text('nit',null,['id'=>'nit','required'=>'required','class'=>'form-control','placeholder'=>'Documento']) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h5>Nombre</h5>
						{!! Form::text('nombres',null,['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Nombre']) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<h5>Primer Apellido</h5>
						{!! Form::text('apellido1',null,['id'=>'Apellido1','required'=>'required','class'=>'form-control','placeholder'=>'Primer Apellido']) !!}
					</div>
					<div class="col-sm-6">
						<h5>Segundo Apellido</h5>
						{!! Form::text('apellido2',null,['id'=>'Apellido2','required'=>'required','class'=>'form-control','placeholder'=>'Segundo Apellido']) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">						
    					<h5>Paises del mundo</h5>
    						{!! Form::select('paises', $pais1,null, ['id' => 'paises','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-4">						
    					<h5>Estados/Departamentos</h5>
    					{!! Form::select('departamentos',['placeholder'=>'Seleccione el estado/departamento'],null,['id'=>'departamentos','class'=>'form-control']) !!}
					</div>
					<div class="col-sm-4">						
    					<h5>Ciudades/Municipios</h5>
    					{!! Form::select('ciudad', ['0'=>'Seleccione la ciudad/municipio'],null,['id'=>'ciudad','class'=>'form-control']) !!}
					</div>
				</div>			
				<div class="row">
					<div class="col-sm-6">
						<h5>Teléfono</h5>
						{!! Form::text('telefono',null,['id'=>'telefono','required'=>'required','class'=>'form-control','placeholder'=>'Teléfono ó Movil']) !!}
					</div>
					<div class="col-sm-6">
						<h5>Correo</h5>
						{!! Form::text('correo',null,['id'=>'correo','required'=>'required','class'=>'form-control','placeholder'=>'Correo Electrónico']) !!}
					</div>
				</div>
				<div class="row" style="text-align: right;">
					<div class="col-sm-12">
						<br>
						<button type="submit" class="btn btn-primary btn-lg fa fa-users" ><b> Guardar </b> </button>
						<a href=" {{ url('terceros') }} " class="btn btn-warning">Cancelar</a>
					</div>
				</div>
			</div>
		</div>		
	</section>
{!! Form::close() !!}

@stop