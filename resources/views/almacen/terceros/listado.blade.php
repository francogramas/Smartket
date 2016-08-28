@extends('layouts.dashboard')
@section('page_heading','Listado de Terceros')
@section('section')

<table class="table table-condensed table-bordered table-striped">
	<thead style="font-weight:bold; background-color: rgba(240, 173, 78, 0.4);"">
		<tr>
			<td>Nit</td>			
			<td>Terceros</td>
			<td>Teléfono</td>
			<td>Correo</td>
			<td>Pais</td>
			<td>Estado/Departamento</td>			
			<td>Ciudad</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($terceros as $terceros)
		<tr>
			<td>{{ $terceros->nit }}</td>				
			<td>{{ $terceros->apellido1 . ' ' . $terceros->apellido2 . ' ' . $terceros->nombres }}</td>
			<td>{{ $terceros->telefono }}</td>
			<td>{{ $terceros->correo }}</td>
			<td>{{ $terceros->pais }}</td>						
			<td>{{ $terceros->Estados }}</td>
			<td>{{ $terceros->Ciudad }}</td>
			<td> <a href="#" class="danger"> [Eliminar] </a> 
			<a href=" {{ route('terceros.edit'),$terceros->id }} " class="info"> [Editar] </a> </td>
		</tr>
	@endforeach
	</tbody>

</table>

@stop