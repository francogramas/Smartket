@if (count($errors)>0)
	<div class="alert alert-warning" role="alert">
	    <strong>Error!</strong>
	    <ul>
	    	@foreach ($errors->all() as $error)
	    		<li>{{  $error }}</li>
	    	@endforeach	    	
	    </ul>
	</div>
@endif

@if(Session::has('update'))
	<div class="alert alert-success" rol="alert">
		<strong> {!! Session::get('update') !!} </strong>
	</div>
@endif

@if(Session::has('save'))
	<div class="alert alert-success" rol="alert">
		<strong> {!! Session::get('save') !!}  </strong>
	</div>
@endif

@if(Session::has('delete'))
	<div class="alert alert-success" rol="alert">
		<strong>{!! Session::get('delete') !!} </strong>
	</div>
@endif