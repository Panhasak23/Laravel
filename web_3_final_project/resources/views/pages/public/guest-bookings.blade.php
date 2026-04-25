<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Booking - Azure Luxe Hotel</title>
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
            max-width: 700px;
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

        .booking-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.15);
            border: 2px solid rgba(37, 99, 235, 0.1);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.25);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--ice-blue);
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--deep-navy);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
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

        .booking-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-group {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 600;
            color: var(--royal-blue);
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .info-value.large {
            font-size: 1.3rem;
            color: var(--sky-blue);
        }

        .booking-summary {
            background: var(--ice-blue);
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid var(--sky-blue);
            margin-bottom: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(37, 99, 235, 0.2);
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: var(--royal-blue);
            font-weight: 600;
        }

        .summary-value {
            color: var(--deep-navy);
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
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

        @media (max-width: 640px) {
            .booking-card {
                padding: 1.5rem;
            }

            .booking-info {
                grid-template-columns: 1fr;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Azure <span>Luxe</span></div>
            <h1>Your Booking</h1>
        </div>

        <div class="booking-card">
            <div class="card-header">
                <div>
                    <div class="card-title">Booking ID: #{{ $booking->id }}</div>
                    <small style="color: var(--royal-blue); margin-top: 0.5rem; display: block;">Booked on {{ $booking->created_at->format('M d, Y') }}</small>
                </div>
                <span class="status-badge {{ strtolower(str_replace('-', '_', $booking->status->value)) }}">
                    {{ ucfirst(str_replace('_', ' ', $booking->status->value)) }}
                </span>
            </div>

            <div class="booking-info">
                <div class="info-group">
                    <span class="info-label">Guest Name</span>
                    <span class="info-value">{{ $booking->guest_name }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $booking->guest_email }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Phone</span>
                    <span class="info-value">{{ $booking->guest_phone }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Room Type</span>
                    <span class="info-value">{{ $booking->room->category->name }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Room Number</span>
                    <span class="info-value">#{{ $booking->room->room_number }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Base Price</span>
                    <span class="info-value">${{ number_format($booking->room->category->base_price, 2) }}/night</span>
                </div>
            </div>

            <div class="booking-summary">
                <div class="summary-row">
                    <span class="summary-label">Check-in</span>
                    <span class="summary-value">{{ $booking->check_in->format('l, M d, Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Check-out</span>
                    <span class="summary-value">{{ $booking->check_out->format('l, M d, Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Number of Nights</span>
                    <span class="summary-value">{{ $booking->check_in->diffInDays($booking->check_out) }} night{{ $booking->check_in->diffInDays($booking->check_out) !== 1 ? 's' : '' }}</span>
                </div>
                @if($booking->promo_code)
                <div class="summary-row">
                    <span class="summary-label">Promo Code</span>
                    <span class="summary-value">{{ $booking->promo_code }}</span>
                </div>
                @endif
                <div class="summary-row" style="border-top: 2px solid rgba(37, 99, 235, 0.3); padding-top: 1rem; margin-top: 0.5rem;">
                    <span class="summary-label" style="font-size: 1.1rem;">Total Amount</span>
                    <span class="summary-value" style="font-size: 1.3rem; color: var(--sky-blue);">${{ number_format($booking->total_price, 2) }}</span>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('guest.booking.lookup') }}" class="btn btn-primary">Find Another Booking</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>
