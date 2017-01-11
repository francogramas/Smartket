@extends('layouts.dashboard')
@section('page_heading','Cartera de deudores')
@section('section')
{{ csrf_field() }}

<div class="row">
	<div class="col-sm-3">
		<div class="row">
			<div class="col-sm-6">
				<label for="txtfechai">Fecha Inicial</label>
				<input type="date" id="txtfechai" class="form-control">
			</div>
			<div class="col-sm-6">
				<label for="txtfechaf">Fecha Final</label>
				<input type="date" id="txtfechaf" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		
	</div>
</div>

@stop