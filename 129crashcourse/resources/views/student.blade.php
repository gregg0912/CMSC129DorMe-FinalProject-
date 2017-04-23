<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
</head>
<body>
@foreach($students as $student)
	{{$student->name}} {{$student->id}}<br />
@endforeach
</body>
</html>