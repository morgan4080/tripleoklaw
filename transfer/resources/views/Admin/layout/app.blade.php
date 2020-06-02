<!DOCTYPE html>
<html lang="en">
<head>
	@include('Admin.layout.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	@include('Admin.layout.header')
	@include('Admin.layout.sidebar')
	@section('main-content')
		@show
	@include('Admin.layout.footer')
</div>
</body>
</html>