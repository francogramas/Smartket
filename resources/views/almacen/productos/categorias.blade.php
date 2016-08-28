@extends('layouts.dashboard')
@section('page_heading','Categorías de productos')
@section('section')

{!! Form::open(['route' => 'categorias.store','method'=>'POST']) !!}

<section class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" name="nombre" class="form-control" required="required">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Agregar</button>
		</div>
	</div>
	<div class="col-sm-6">
		<table class="table table-bordered">
			<thead class="theadN" >
				<tr>
					<td>Catergoría</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
			@foreach($categorias as $categoria)
				<tr>
					<td>{{ $categoria->nombre  }}</td>
					<td>
						<a href="{{ route('categorias.show', $categoria->id) }}"> [Eliminar] </a>
						<a href="{{ route('categorias.edit', $categoria->id) }}"> [Editar] </a> 
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $categorias->render() !!}
		</div>
	</div>
</section>
{!! Form::close() !!}

@stop