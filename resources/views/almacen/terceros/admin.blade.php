@extends('layouts.dashboard')
@section('page_heading','Terceros')
@section('section')

{!! Form::open(['route' => 'terceros.store','method'=>'POST']) !!}


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
    					{!! Form::select('departamentos',['0'=>'Seleccione el estado/departamento'],null,['id'=>'departamentos','class'=>'form-control']) !!}
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
						<button type="submit" class="btn btn-primary btn-lg fa" ><b> Guardar </b> </button>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-12">
				<table class="table table-condensed table-bordered table-striped">
				<caption>Listado de terceros</caption>
					<thead class="theadN">
						<tr>
							<td>Nit</td>
							<td>Terceros</td>
							<td>Teléfono</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach($terceros as $tercero)
						<tr>
							<td>{{ $tercero->nit }}</td>
							<td>{{ $tercero->apellido1 . ' ' . $tercero->apellido2 . ' ' . $tercero->nombres }}</td>
							<td>{{ $tercero->telefono }}</td>
							<td><a href=" {{ route('terceros.edit',$tercero->id) }} "> [Editar] </a>
							 </td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $terceros->render() !!}
				</div>
			</div>

			</div>
		</div>
	</section>

{!! Form::close() !!}

@stop