<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>
<body>
    <h1>Student Registration</h1>
    
    <form action="/student" method="POST">
        @csrf
        
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>