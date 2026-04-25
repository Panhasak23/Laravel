<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings - Azure Luxe Hotel</title>
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
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
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
            font-size: 2.5rem;
            color: var(--deep-navy);
            margin-bottom: 1rem;
        }

        .bookings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .booking-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.15);
            border: 2px solid rgba(37, 99, 235, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.25);
            border-color: var(--sky-blue);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .booking-id {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.pending {
            background: #FEF08A;
            color: #854d0e;
        }

        .status-badge.confirmed {
            background: #D1FAE5;
            color: #065f46;
        }

        .status-badge.checked_in {
            background: #BFDBFE;
            color: #0c4a6e;
        }

        .status-badge.checked_out {
            background: #E5E7EB;
            color: #1f2937;
        }

        .booking-details {
            margin-bottom: 1.5rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--ice-blue);
        }

        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: var(--royal-blue);
            font-size: 0.85rem;
        }

        .detail-value {
            font-weight: 700;
            color: var(--deep-navy);
        }

        .price {
            font-size: 1.2rem;
            color: var(--sky-blue);
        }

        .view-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .view-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn {
            padding: 1rem 2rem;
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

        @media (max-width: 768px) {
            .bookings-grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Azure <span>Luxe</span></div>
            <h1>Your Bookings</h1>
        </div>

        <div class="bookings-grid">
            @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="card-header">
                    <div class="booking-id">Booking #{{ $booking->id }}</div>
                    <span class="status-badge {{ strtolower(str_replace('-', '_', $booking->status->value)) }}">
                        {{ str_replace('_', ' ', $booking->status->value) }}
                    </span>
                </div>

                <div class="booking-details">
                    <div class="detail-row">
                        <span class="detail-label">Room</span>
                        <span class="detail-value">{{ $booking->room->category->name }} #{{ $booking->room->room_number }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Check-in</span>
                        <span class="detail-value">{{ $booking->check_in->format('M d, Y') }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Check-out</span>
                        <span class="detail-value">{{ $booking->check_out->format('M d, Y') }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Duration</span>
                        <span class="detail-value">{{ $booking->check_in->diffInDays($booking->check_out) }} night{{ $booking->check_in->diffInDays($booking->check_out) !== 1 ? 's' : '' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total</span>
                        <span class="detail-value price">${{ number_format($booking->total_price, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('guest.booking.search') }}?booking_id={{ $booking->id }}&email={{ urlencode($booking->guest_email) }}" class="view-button">
                    View Details →
                </a>
            </div>
            @endforeach
        </div>

        <div class="action-buttons">
            <a href="{{ route('guest.booking.lookup') }}" class="btn btn-primary">Search Again</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>
</body>
</html>
