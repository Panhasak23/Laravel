<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Azure Luxe Hotel Admin</title>
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
            --success: #10B981;
            --warning: #F59E0B;
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--deep-navy);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(10, 17, 40, 0.1);
        }

        .form-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: var(--deep-navy);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--deep-navy);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
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

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-full {
            grid-column: 1 / -1;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-submit {
            flex: 1;
            padding: 0.85rem;
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .error-message {
            background: #FEE2E2;
            color: var(--danger);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--danger);
        }

        .success-message {
            background: #DCFCE7;
            color: var(--success);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--success);
        }

        .info-box {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.1));
            border-left: 4px solid var(--sky-blue);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            color: var(--deep-navy);
        }

        .role-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .role-badge.staff {
            background: rgba(59, 130, 246, 0.2);
            color: var(--sky-blue);
        }

        .role-badge.admin {
            background: rgba(251, 191, 36, 0.2);
            color: #D97706;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>User Management</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">← Back to Dashboard</a>
        </div>

        <!-- Create User Form -->
        <div class="form-card">
            <h2>Create New Account</h2>

            <div class="info-box">
                <strong>ℹ️ Note:</strong> Use this form to create <strong>Staff</strong> or <strong>Admin</strong> accounts. Customer accounts can only be created through the public registration page.
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <strong>Error:</strong>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.create-user') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" required placeholder="John Doe" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="john@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required placeholder="••••••••" minlength="8">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••">
                    </div>

                    <div class="form-group form-full">
                        <label>Account Role</label>
                        <select name="role" required>
                            <option value="">-- Select Role --</option>
                            <option value="staff">Staff Member</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Create Account</button>
                </div>
            </form>
        </div>

        <!-- Account Types Info -->
        <div class="form-card">
            <h2>Account Types</h2>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <div class="role-badge staff">Staff</div>
                    <p style="margin-top: 1rem; color: #666;">
                        Staff members can manage bookings, check room status, handle guest check-ins/check-outs, and access the staff dashboard.
                    </p>
                </div>
                <div>
                    <div class="role-badge admin">Admin</div>
                    <p style="margin-top: 1rem; color: #666;">
                        Administrators have full system access including creating staff/admin accounts, managing promo codes, and accessing the admin dashboard with analytics.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
