<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="TJMed Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TjMed</title>
	
</head>

<body>
	@include('layouts.style_links')
	@include('layouts.header')
	@yield('content')
	@include('layouts.footer')
	@include('layouts.scripts')
</body>
</html>
