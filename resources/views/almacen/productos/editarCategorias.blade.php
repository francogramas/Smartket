@extends('layouts.dashboard')
@section('page_heading','Edición de categorías de productos')
@section('section')

{!! Form::model($categorias, ['route' => ['categorias.update',$categorias->id],'method'=>'PUT']) !!}
<section class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			{!! form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre de la categoría','required'=>'required']) !!}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('categorias.index') }}" class="btn btn-warning">Cancelar</a>
		</div>

	</div>
</section>
{!! Form::close() !!}

@stop
