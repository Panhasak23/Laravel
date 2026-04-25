<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h1>Student List</h1>
    <ul>
        @foreach($students as $student)
            <li>{{ $student['name'] }} — {{ $student['email'] }} (Grade: {{ $student['grade'] }})</li>
        @endforeach
    </ul>
</body>
</html>