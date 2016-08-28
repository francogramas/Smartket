@extends('layouts.dashboard')
@section('page_heading','Agregar Productos')
@section('section')
	{!! Form::model($productos, ['route' => ['productos.update',$productos->id],'method'=>'PUT']) !!}
    <section>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="categoria_id">Categoría</label>
					{!! Form::select('categoria_id', $categorias,null, ['id' => 'categoria_id','class'=>'form-control']) !!}	
				</div>
				<div class="form-group">
					<label for="codigo">Código</label>
					{!! form::text('codigo',null,['id'=>'codigo','class'=>'form-control','placeholder'=>'Codigo del producto','required'=>'required']) !!}
				</div>
				<div class="form-group">
					<label for="nombre">Producto</label>
					{!! form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del producto','required'=>'required']) !!}					
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<a href="{{ route('productos.index') }}" class="btn btn-warning">Cancelar</a>
				</div>
			</div>
		</div>
	</section>

{!! Form::close() !!}
@stop