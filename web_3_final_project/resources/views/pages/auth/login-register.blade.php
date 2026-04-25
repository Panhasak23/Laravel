<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register - Azure Luxe Hotel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --deep-navy: #0A1128;
            --royal-blue: #1E3A8A;
            --ocean-blue: #2563EB;
            --sky-blue: #3B82F6;
            --light-blue: #60A5FA;
            --ice-blue: #DBEAFE;
            --pearl-white: #F8FAFC;
            --silver: #CBD5E1;
            --gold-accent: #FBBF24;
            --crystal: rgba(255, 255, 255, 0.1);
            --error-red: #DC2626;
            --success-green: #16A34A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, var(--deep-navy) 0%, var(--royal-blue) 50%, var(--ocean-blue) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--deep-navy);
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(10, 17, 40, 0.3);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .form-section {
            padding: 3rem 2rem;
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--deep-navy);
        }

        .form-section p {
            color: var(--silver);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--deep-navy);
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid var(--ice-blue);
            border-radius: 8px;
            font-family: 'Raleway', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-group input::placeholder {
            color: var(--silver);
        }

        .btn {
            width: 100%;
            padding: 0.9rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.6);
        }

        .form-toggle {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: var(--silver);
        }

        .form-toggle a {
            color: var(--sky-blue);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-toggle a:hover {
            color: var(--ocean-blue);
        }

        .side-panel {
            background: linear-gradient(135deg, var(--royal-blue), var(--ocean-blue));
            color: white;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            grid-column: 2;
            grid-row: 1 / 3;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .side-panel h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .side-panel p {
            font-size: 0.95rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .role-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .role-item {
            text-align: left;
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }

        .role-item h4 {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            color: var(--gold-accent);
        }

        .role-item p {
            font-size: 0.85rem;
            margin: 0;
        }

        .error-message {
            background: #FEE2E2;
            color: var(--error-red);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid var(--error-red);
        }

        .success-message {
            background: #DCFCE7;
            color: var(--success-green);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid var(--success-green);
        }

        @media (max-width: 768px) {
            .form-container {
                grid-template-columns: 1fr;
            }

            .side-panel {
                grid-column: 1;
                grid-row: auto;
                display: none;
            }

            .form-section {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <!-- Login Form -->
            <div class="form-section active" id="loginForm">
                <h2>Welcome Back</h2>
                <p>Sign in to your Azure Luxe account</p>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="you@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required placeholder="••••••••">
                    </div>

                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>

                <div class="form-toggle">
                    Don't have an account? <a onclick="toggleForms()">Create one</a>
                </div>
            </div>

            <!-- Register Form -->
            <div class="form-section" id="registerForm">
                <h2>Join Azure Luxe</h2>
                <p>Create your account now</p>

                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" required placeholder="John Doe" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="you@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required placeholder="••••••••">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••">
                    </div>

                    <p style="font-size: 0.85rem; color: #CBD5E1; margin-bottom: 1.5rem;">By creating an account, you'll be registered as a <strong>Customer</strong>. Staff and admin accounts are created exclusively by administrators.</p>

                    <button type="submit" class="btn btn-primary">Create Account</button>
                </form>

                <div class="form-toggle">
                    Already have an account? <a onclick="toggleForms()">Sign in</a>
                </div>
            </div>

            <!-- Side Panel -->
            <div class="side-panel">
                <div class="logo">
                    <div class="logo-icon">🏨</div>
                    <h1>Azure Luxe</h1>
                </div>

                <p>Where Elegance Meets the Sky</p>

                <div class="role-info">
                    <div class="role-item">
                        <h4>👥 Customer</h4>
                        <p>Browse rooms and manage your bookings</p>
                    </div>
                    <div class="role-item">
                        <h4>👔 Staff</h4>
                        <p>Manage hotel operations and guest services</p>
                    </div>
                    <div class="role-item">
                        <h4>⚙️ Admin</h4>
                        <p>Full control of hotel management system</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            loginForm.classList.toggle('active');
            registerForm.classList.toggle('active');
        }
    </script>
</body>
</html>
