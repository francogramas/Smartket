@extends('layouts.plane')
<style type="text/css">
	.fact{
		border: 2px solid black;
		border-radius: 12px;
		height: 100%;
		width: 100%;
		padding-left: 10px;
	}
</style>
<section style="width:11in; margin: 10px 10px 10px 20px ">
	<header id="header" class="">
	<table class="table">
		<tr>
			<td>
				Logo
			</td>
			<td>
				<div>
				<h3> {{ $empresa{'razonsocial'} }} </h3>
			 	<h5> Nit: {{ $empresa{'nit'} }}</h5>
			 	<h5> {{ $empresa{'direccion'}.', '. $empresa{'ciudad'}.' - '.$empresa{'estado'} }}  </h5>
			 	<h5>Teléfono: {{ $empresa{'telefono'} }}</h5>
			 	</div>
			</td>
			<td>
				<div class="fact">
					<h3>Factura de Venta No:</h3>
					<h3>10101</h3>

				</div>
			</td>

		</tr>
	</table>
	</header>
	<section>
		@yield('section')
	</section>
</section>
