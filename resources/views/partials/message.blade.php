@if (count($errors)>0)
	<div class="alert alert-warning alert-dismissable" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Error!</strong>
	    <ul>
	    	@foreach ($errors->all() as $error)
	    		<li>{{  $error }}</li>
	    	@endforeach	    	
	    </ul>
	</div>
@endif

@if(Session::has('update'))
	<div class="alert alert-success alert-dismissable" rol="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong> {!! Session::get('update') !!} </strong>
	</div>
@endif

@if(Session::has('save'))
	<div class="alert alert-info alert-dismissable" rol="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong> {!! Session::get('save') !!}  </strong>
	</div>
@endif

@if(Session::has('delete'))
	<div class="alert alert-danger  alert-dismissable" rol="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>{!! Session::get('delete') !!} </strong>
	</div>
@endif

@if(Session::has('inicial'))
	<div class="alert alert-warning alert-dismissable" rol="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>{!! Session::get('inicial') !!} </strong>
	</div>
@endif