<!DOCTYPE html>
<html>
<head>
	<title>My Page</title>
</head>
<body>
	<h1>My page</h1>
	@if($var1=='gregg')
		I love {{$var2}}
	@endif

	@foreach($subjects as $subject)
		<li>{{$subject->name}}</li>
	@endforeach
	{{$var1}}<br />
	{{$var2}}<br />
	{{$var3}}<br />
</body>
</html>