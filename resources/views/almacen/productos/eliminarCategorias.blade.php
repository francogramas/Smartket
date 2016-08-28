@extends('layouts.dashboard')
@section('page_heading','Eliminar categoría')
@section('section')

{!! Form::open(['route' => ['categorias.destroy',$categorias->id],'method'=>'DELETE']) !!}
<section class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! form::label('nombre') !!}
			<br>
			{!! $categorias->nombre !!}
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Eliminar</button>
			<a href="{{ route('categorias.index') }}" class="btn btn-warning">Cancelar</a>
		</div>

	</div>
</section>

{!! Form::close() !!}

@stop