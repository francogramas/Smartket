@extends('layouts.dashboard')
@section('page_heading','Agregar Productos')
@section('section')

	{!! Form::open(['route' => ['productos.destroy',$productos->id],'method'=>'DELETE']) !!}
    
    <section>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="categoria_id">Categoría</label>
					{!! Form::select('categoria_id', $categorias,null, ['id' => 'categoria_id','class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="codigo">Código</label>
					<br>
					{!! $productos->codigo !!}
				</div>
				<div class="form-group">
					<label for="nombre">Producto</label>
					<br>
					{!! $productos->nombre !!}
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-danger">Eliminar</button>
					<a href="{{ route('productos.index') }}" class="btn btn-warning">Cancelar</a>

				</div>
			</div>
		</div>
	</section>
{!! Form::close() !!}
@stop