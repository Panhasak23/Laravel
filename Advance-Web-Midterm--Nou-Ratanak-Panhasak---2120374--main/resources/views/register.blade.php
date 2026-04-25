<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: white; padding: 30px; border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 350px;
        }
        h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 10px; border: 1px solid #ddd;
            border-radius: 4px; box-sizing: border-box;
        }

        select#role {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #ddd;
            font-size: 16px;
        }

        select#role:hover {
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        select#role:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        select#role option {
            padding: 10px;
            background: white;
        }

        select#role option[value="user"] { 
            color: #388e3c; font-weight: 500; 
        }

        select#role option[value="staff"] { 
            color: #7b1fa2; font-weight: 500; 
        }

        select#role option[value="admin"] { 
            color: #f57c00; font-weight: 500; 
        }
        button {
            width: 100%; padding: 12px; background-color: #4CAF50;
            color: white; border: none; border-radius: 4px;
            cursor: pointer; font-size: 16px;
        }
        button:hover { background-color: #45a049; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        .link { text-align: center; margin-top: 15px; }
        .link a { color: #4CAF50; text-decoration: none; }
        .link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        
        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="" disabled {{ old('role') == '' ? 'selected' : '' }}><span style="font-weight: 500;">👤 Select a role</span></option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>👤 User</option>
                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>👨‍💼 Staff</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Admin</option>
                </select>
            </div>
            <button type="submit">Register</button>

        </form>

        <div class="link">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>
</body>
</html>