<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Your Booking - Azure Luxe Hotel</title>
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
            --danger: #EF4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #F8FAFC 0%, #E0F2FE 50%, #DBEAFE 100%);
            color: var(--deep-navy);
            min-height: 100vh;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 500px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .logo span {
            color: #FBBF24;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--deep-navy);
            margin-bottom: 1rem;
        }

        .subtitle {
            color: var(--royal-blue);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.15);
            border: 2px solid rgba(37, 99, 235, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            font-weight: 600;
            color: var(--deep-navy);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        input[type="email"],
        input[type="text"] {
            width: 100%;
            padding: 1rem;
            border: 2px solid rgba(37, 99, 235, 0.2);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Raleway', sans-serif;
        }

        input[type="email"]:focus,
        input[type="text"]:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .help-text {
            font-size: 0.85rem;
            color: var(--royal-blue);
            margin-top: 0.5rem;
            line-height: 1.5;
        }

        .btn-container {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: white;
            color: var(--sky-blue);
            border: 2px solid var(--sky-blue);
        }

        .btn-secondary:hover {
            background: var(--ice-blue);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background: #FEE2E2;
            color: #991B1B;
            border-left: 4px solid var(--danger);
        }

        @media (max-width: 640px) {
            .form-card {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .btn-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Azure <span>Luxe</span></div>
        </div>

        <div class="form-card">
            <h1>Find Your Booking</h1>
            <p class="subtitle">Enter your email and booking reference to view your booking details</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('guest.booking.search') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="your.email@example.com" 
                        required
                    >
                    <div class="help-text">The email you used when making the booking</div>
                </div>

                <div class="form-group">
                    <label for="booking_reference">Booking Reference</label>
                    <input 
                        type="text" 
                        id="booking_reference" 
                        name="booking_reference" 
                        placeholder="Enter booking ID or your name" 
                        required
                    >
                    <div class="help-text">You can use your booking ID number or your full name</div>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Search Booking</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back Home</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
