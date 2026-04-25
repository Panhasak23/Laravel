<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Dashboard - Azure Luxe Hotel</title>
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
            background: linear-gradient(135deg, #F8FAFC 0%, #E0F2FE 100%);
            color: var(--deep-navy);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .header {
            margin-bottom: 3rem;
            animation: slideInDown 0.8s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--deep-navy), var(--ocean-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.1rem;
            color: var(--royal-blue);
            font-weight: 500;
        }

        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .nav-action {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout {
            background: linear-gradient(135deg, var(--danger), #DC2626);
            color: white;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-home {
            background: linear-gradient(135deg, var(--ocean-blue), var(--sky-blue));
            color: white;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid var(--ocean-blue);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-label {
            color: var(--royal-blue);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--ocean-blue);
        }

        .section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
            margin-bottom: 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--ice-blue);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--deep-navy);
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, var(--ocean-blue), var(--sky-blue));
            color: white;
        }

        th {
            padding: 1.2rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
        }

        td {
            padding: 1.2rem;
            border-bottom: 1px solid var(--ice-blue);
            font-size: 0.95rem;
        }

        tbody tr:hover {
            background: rgba(37, 99, 235, 0.05);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .status-pending {
            background: linear-gradient(135deg, #FEF3C7, #FDE68A);
            color: #92400E;
        }

        .status-confirmed {
            background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            color: #065F46;
        }

        .status-checked-in {
            background: linear-gradient(135deg, var(--ice-blue), #BFDBFE);
            color: var(--ocean-blue);
        }

        .status-checked-out {
            background: linear-gradient(135deg, #E5E7EB, #D1D5DB);
            color: #374151;
        }

        .status-cancelled {
            background: linear-gradient(135deg, #FEE2E2, #FECACA);
            color: #991B1B;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--royal-blue);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-text {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .room-info {
            font-weight: 600;
            color: var(--ocean-blue);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .top-nav {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-action {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Welcome back, {{ auth()->user()->name }}!</h1>
            <p>Manage your hotel bookings and reservations</p>
        </div>

        <!-- Top Navigation -->
        <div class="top-nav">
            <div></div>
            <div class="nav-action">
                <a href="/" class="btn btn-home">← Back to Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-label">Total Bookings</div>
                <div class="stat-value">{{ $totalBookings }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📅</div>
                <div class="stat-label">Upcoming Bookings</div>
                <div class="stat-value">{{ $upcomingBookings }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-label">Completed Stays</div>
                <div class="stat-value">{{ $completedBookings }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-label">Total Spent</div>
                <div class="stat-value">${{ number_format($totalSpent, 2) }}</div>
            </div>
        </div>

        <!-- Booking History -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">My Bookings</h2>
            </div>

            @if($bookings->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">🏨</div>
                    <div class="empty-text">You haven't made any bookings yet.</div>
                    <p style="margin-top: 1rem; color: var(--royal-blue); font-size: 0.95rem;">
                        <a href="/" style="color: var(--ocean-blue); text-decoration: none; font-weight: 600;">Browse our rooms</a> and make your first reservation!
                    </p>
                </div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Room</th>
                                <th>Room Type</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td><strong>#{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</strong></td>
                                <td><span class="room-info">{{ $booking->room->room_number }}</span></td>
                                <td>{{ $booking->room->category->name }}</td>
                                <td>{{ $booking->check_in->format('M d, Y') }}</td>
                                <td>{{ $booking->check_out->format('M d, Y') }}</td>
                                <td><strong>${{ number_format($booking->total_price, 2) }}</strong></td>
                                <td>
                                    <span class="status-badge status-{{ strtolower(str_replace('-', '_', $booking->status->value)) }}">
                                        {{ ucfirst($booking->status->value) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>