<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student: {{ $student->name }}</h1>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><a href="{{ route('students.index') }}">← Back to All Students</a></p>
</body>
</html>