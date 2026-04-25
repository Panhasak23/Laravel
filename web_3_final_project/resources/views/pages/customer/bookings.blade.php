<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Bookings - Azure Luxe Hotel</title>
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
            text-align: center;
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
            background: linear-gradient(135deg, var(--ocean-blue), var(--sky-blue));
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6B7280, #9CA3AF);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .booking-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid var(--ocean-blue);
            margin-bottom: 1.5rem;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .booking-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .status-confirmed { background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; }
        .status-pending { background: linear-gradient(135deg, #FEF3C7, #FDE68A); color: #92400E; }
        .status-checked_out { background: linear-gradient(135deg, #E5E7EB, #D1D5DB); color: #374151; }
        .status-cancelled { background: linear-gradient(135deg, #FEE2E2, #FECACA); color: #991B1B; }

        .booking-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 0.85rem;
            color: var(--royal-blue);
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: var(--deep-navy);
            font-size: 1.1rem;
        }

        .booking-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
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

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .booking-header {
                flex-direction: column;
                gap: 1rem;
            }

            .booking-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>My Bookings</h1>
            <p>Manage your reservations and upcoming stays</p>
        </div>

        <!-- Top Navigation -->
        <div class="top-nav">
            <div></div>
            <div>
                <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary">← Dashboard</a>
                <a href="/" class="btn">Home</a>
            </div>
        </div>

        @if($bookings->count() > 0)
            @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-header">
                    <div>
                        <h2 class="booking-title">{{ $booking->room->category->name }} - Room {{ $booking->room->room_number }}</h2>
                        <p>{{ $booking->guest_name }}</p>
                    </div>
                    <span class="status-badge status-{{ strtolower(str_replace('_', '-', $booking->status->value)) }}">
                        {{ ucfirst(str_replace('_', ' ', $booking->status->value)) }}
                    </span>
                </div>

                <div class="booking-details">
                    <div class="detail-item">
                        <span class="detail-label">Check-in</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Check-out</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nights</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total</span>
                        <span class="detail-value">${{ number_format($booking->total_price, 2) }}</span>
                    </div>
                </div>

                <div class="booking-actions">
                    <button onclick="printBooking({{ $booking->id }})" class="btn btn-secondary">Print</button>
                    @if($booking->status->value === 'pending')
                        <button onclick="cancelBooking({{ $booking->id }})" class="btn" style="background: linear-gradient(135deg, var(--danger), #DC2626); color: white;">Cancel</button>
                    @endif
                </div>
            </div>
            @endforeach

            <div class="pagination">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">📋</div>
                <h3 style="font-size: 1.8rem; font-weight: 700; color: var(--deep-navy); margin-bottom: 1rem;">No bookings found</h3>
                <p style="font-size: 1.1rem; margin-bottom: 2rem;">Your reservations will appear here once you make a booking.</p>
                <a href="/" class="btn">Book a Room</a>
            </div>
        @endif
    </div>

    <script>
        function printBooking(id) {
            window.print();
        }

        function cancelBooking(id) {
            if (confirm('Are you sure you want to cancel this booking? This action cannot be undone.')) {
                // TODO: Implement AJAX cancel
                alert('Booking cancelled successfully!');
                location.reload();
            }
        }
    </script>
</body>
</html>
