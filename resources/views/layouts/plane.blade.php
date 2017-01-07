<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>GuiasSoft V3.1</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/estilos.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/themes/base/jquery-ui.css") }}" />

</head>
<body>

	@yield('body')
	{!! Html::script('assets/scripts/frontend.js') !!}
	{!! Html::script('assets/scripts/jquery-ui.min.js') !!}
	{!! Html::script('js/jquery.maskMoney.min.js') !!}
	{!! Html::script('js/dropdown.js') !!}
</body>
</html>