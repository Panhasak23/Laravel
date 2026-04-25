<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0; padding: 0;
        }
        .navbar {
            background-color: #4CAF50; color: white;
            padding: 15px 20px; display: flex;
            justify-content: space-between; align-items: center;
        }
        .navbar h1 { margin: 0; }
        .logout-form { margin: 0; }
        .logout-btn {
            background-color: #f44336; color: white;
            padding: 8px 16px; border: none;
            border-radius: 4px; cursor: pointer;
        }
        .logout-btn:hover { background-color: #da190b; }
        .container {
            max-width: 800px; margin: 30px auto;
            background: white; padding: 30px;
            border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .welcome { color: #4CAF50; }
        .role-badge { 
            padding: 4px 8px; 
            border-radius: 4px; 
            font-weight: bold; 
            font-size: 0.9em;
        }
        .role-badge.user { background: #e8f5e8; color: #388e3c; }
        .role-badge.staff { background: #f3e5f5; color: #7b1fa2; }
        .role-badge.admin { background: #fff3e0; color: #f57c00; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="container">
        <h2 class="welcome">Welcome, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})!</h2>
        <p>You are successfully logged in.</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Role:</strong> <span class="role-badge {{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span></p>
    </div>
</body>
</html>