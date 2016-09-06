@extends('layouts.plane')
<section style="width:11in;">
	<header id="header" class="">
	<div class="row">
		<div class="col-sm-3">
		 	<h4>Nit</h4>
		</div>
		<div class="col-sm-6">
			<h5>Empresa</h5>		
		</div>
		<div class="col-sm-3">
		 	<h4>Logo</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<h4>Telefono:</h4>
		</div>
		<div class="col-sm-2">
			<h4>Correo:</h4>
		</div>
		<div class="col-sm-5">
			<h4>Dirección:</h4>
		</div>
		<div class="col-sm-3">
			<h4>Ciudad/Departamento-estado/País</h4>
		</div>
	</div>	
	</header>
	<section>
		@yield('section')
	</section>
</section>
