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
            --silver: #CBD5E1;
            --gold-accent: #FBBF24;
            --success: #10B981;
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
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--ocean-blue);
            margin-bottom: 0.5rem;
        }

        .logo-text {
            color: var(--gold-accent);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--deep-navy);
            margin-bottom: 1rem;
        }

        .success-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }

        .success-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .booking-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.15);
            border: 2px solid rgba(37, 99, 235, 0.1);
            margin-bottom: 2rem;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--deep-navy);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--ice-blue);
        }

        .booking-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-group {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 600;
            color: var(--royal-blue);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .info-value.large {
            font-size: 1.5rem;
            color: var(--sky-blue);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: fit-content;
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

        .confirmation-details {
            background: var(--ice-blue);
            border-left: 4px solid var(--sky-blue);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .confirmation-details p {
            margin-bottom: 0.75rem;
            line-height: 1.8;
            color: var(--royal-blue);
        }

        .confirmation-details strong {
            color: var(--deep-navy);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            flex: 1;
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

        @media (max-width: 640px) {
            .booking-card {
                padding: 1.5rem;
            }

            .booking-info {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
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
            <div class="logo">Azure <span class="logo-text">Luxe</span></div>
            <div class="success-icon">✓</div>
            <div class="success-badge">Booking Confirmed!</div>
        </div>

        <div class="booking-card">
            <h1 style="text-align: center; margin-bottom: 2rem;">Thank You for Your Booking</h1>
            
            <div class="confirmation-details">
                <p>
                    <strong>Booking Confirmation:</strong> We've sent a confirmation email to <strong>{{ $booking->guest_email }}</strong>
                </p>
                <p>
                    <strong>Booking Reference:</strong> <strong>#{{ $booking->id }}</strong>
                </p>
                <p>
                    Keep this reference number handy for check-in and future inquiries. You can use it along with your email to view this booking anytime.
                </p>
            </div>

            <div class="card-title">📋 Booking Details</div>

            <div class="booking-info">
                <div class="info-group">
                    <span class="info-label">Guest Name</span>
                    <span class="info-value">{{ $booking->guest_name }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Status</span>
                    <span class="status-badge {{ strtolower(str_replace('-', '_', $booking->status->value)) }}">
                        {{ ucfirst(str_replace('_', ' ', $booking->status->value)) }}
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Room</span>
                    <span class="info-value">{{ $booking->room->category->name }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Room Number</span>
                    <span class="info-value">#{{ $booking->room->room_number }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Check-in</span>
                    <span class="info-value">{{ $booking->check_in->format('M d, Y') }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Check-out</span>
                    <span class="info-value">{{ $booking->check_out->format('M d, Y') }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Total Price</span>
                    <span class="info-value large">${{ number_format($booking->total_price, 2) }}</span>
                </div>
                <div class="info-group">
                    <span class="info-label">Contact</span>
                    <span class="info-value">{{ $booking->guest_phone }}</span>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('guest.booking.lookup') }}" class="btn btn-primary">
                    View All Bookings
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    Back to Home
                </a>
            </div>
        </div>

        <div class="booking-card">
            <div style="text-align: center;">
                <p style="color: var(--royal-blue); line-height: 1.8;">
                    📧 A confirmation email has been sent to <strong>{{ $booking->guest_email }}</strong><br>
                    If you don't see it, please check your spam folder.<br><br>
                    🏨 For any questions, contact us at <strong>info@azureluxe.com</strong><br>
                    📞 Call us at <strong>+1 (555) 123-4567</strong>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
