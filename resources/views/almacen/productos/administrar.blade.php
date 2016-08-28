@extends('layouts.dashboard')
@section('page_heading','Agregar Productos')
@section('section')
	{!! Form::open(['route' => 'productos.store','method'=>'POST']) !!}
    <section>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="categoria_id">Categoría</label>
					{!! Form::select('categoria_id', $categorias,null, ['id' => 'categoria_id','class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" id="codigo" name="codigo" class="form-control">
				</div>
				<div class="form-group">
					<label for="nombre">Producto</label>
					<input type="text" id="nombre" name="nombre" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
			<div class="col-sm-6">
				<table class="table table-bordered" >
					<caption>Listado de prouctos</caption>
					<thead class="theadN">
						<tr>
							<td>Código</td>
							<td>Producto</td>
							<td>Categoría</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach($productos as $producto)
						<tr>
							<td>{{ $producto->codigo }}</td>
							<td>{{ $producto->nombre }}</td>
							<td>{{ $producto->categorias }}</td>
							<td>
								<a href=" {{ route('productos.show',$producto->id) }} "> [Eliminar] </a>
								<a href=" {{ route('productos.edit',$producto->id) }} "> [Editar] </a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $productos->render() !!}
				</div>
			</div>
		</div>
	</section>



{!! Form::close() !!}
@stop