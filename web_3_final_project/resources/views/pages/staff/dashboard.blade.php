<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Staff Dashboard - Azure Luxe Hotel</title>
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
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            background: linear-gradient(180deg, var(--deep-navy) 0%, var(--royal-blue) 100%);
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 30px rgba(10, 17, 40, 0.3);
            z-index: 100;
        }

        .sidebar-header {
            padding: 2.5rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            animation: logoGlow 3s ease-in-out infinite;
        }

        @keyframes logoGlow {
            0%, 100% { filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5)); }
            50% { filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.8)); }
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.6);
        }

        .staff-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--gold-accent), #FBBF24);
            color: var(--deep-navy);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-top: 0.5rem;
        }

        .user-section {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--light-blue), var(--sky-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
            animation: avatarFloat 4s ease-in-out infinite;
        }

        @keyframes avatarFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .user-info {
            text-align: center;
        }

        .user-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .user-role {
            color: var(--ice-blue);
            font-size: 0.95rem;
        }

        .nav-menu {
            list-style: none;
            padding: 1.5rem 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.25rem 2rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-weight: 500;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(180deg, var(--sky-blue), var(--light-blue));
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding-left: 2.5rem;
        }

        .nav-icon {
            font-size: 1.5rem;
        }

        .logout-section {
            padding: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 100%;
        }

        .btn-outline:hover {
            background: white;
            color: var(--ocean-blue);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.3);
        }

        /* Main Content */
        .main-content {
            margin-left: 300px;
            flex: 1;
            padding: 3rem;
        }

        .header {
            margin-bottom: 3rem;
            animation: slideInDown 0.8s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--deep-navy), var(--ocean-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.75rem;
        }

        .header p {
            font-size: 1.2rem;
            color: var(--royal-blue);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1);
            animation: fadeInUp 0.8s ease-out backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--sky-blue), var(--ocean-blue));
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.25);
            border-color: var(--sky-blue);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--ice-blue), var(--light-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--ocean-blue);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--royal-blue);
            font-size: 1rem;
            font-weight: 600;
        }

        /* Section */
        .section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1);
            border: 1px solid transparent;
            transition: all 0.4s ease;
        }

        .section:hover {
            border-color: var(--ice-blue);
            box-shadow: 0 15px 50px rgba(37, 99, 235, 0.15);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid var(--ice-blue);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .search-box {
            padding: 1rem 1.75rem;
            border: 2px solid var(--ice-blue);
            border-radius: 50px;
            width: 350px;
            font-family: 'Raleway', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, var(--ice-blue), #BFDBFE);
        }

        th {
            padding: 1.5rem;
            text-align: left;
            font-weight: 700;
            color: var(--ocean-blue);
            border-bottom: 3px solid var(--sky-blue);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        td {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid var(--ice-blue);
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(219, 234, 254, 0.3), transparent);
            transform: translateX(5px);
        }

        .status-badge {
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-block;
            letter-spacing: 0.5px;
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

        .status-no-show {
            background: linear-gradient(135deg, #F3E8FF, #E9D5FF);
            color: #6B21A8;
        }

        .status-cancelled {
            background: linear-gradient(135deg, #FEE2E2, #FECACA);
            color: #991B1B;
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn-action {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-confirm {
            background: linear-gradient(135deg, var(--success), #10B981);
            color: white;
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-cancel {
            background: linear-gradient(135deg, var(--danger), #EF4444);
            color: white;
        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-view {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        /* Room Grid */
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 2rem;
        }

        .room-item {
            background: white;
            border: 3px solid var(--ice-blue);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .room-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent, rgba(59, 130, 246, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .room-item:hover::before {
            opacity: 1;
        }

        .room-item:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }

        .room-item.available {
            border-color: var(--success);
            background: linear-gradient(135deg, #F0FDF4, #DCFCE7);
        }

        .room-item.occupied {
            border-color: var(--danger);
            background: linear-gradient(135deg, #FEF2F2, #FEE2E2);
        }

        .room-item.booked {
            border-color: var(--danger);
            background: linear-gradient(135deg, #FEF2F2, #FEE2E2);
            opacity: 0.75;
        }

        .room-item.booked:hover {
            transform: none;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        }

        .room-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--ocean-blue);
            margin-bottom: 0.75rem;
        }

        .room-type {
            color: var(--royal-blue);
            font-size: 0.95rem;
            margin-bottom: 1.25rem;
            font-weight: 500;
        }

        .room-status-badge {
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .room-status-available {
            background: var(--success);
            color: white;
        }

        .room-status-booked {
            background: var(--danger);
            color: white;
        }

        .room-status-occupied {
            background: var(--danger);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--royal-blue);
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-text {
            font-size: 1.25rem;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">🌊</div>
                <div>
                    <div>Azure Luxe</div>
                    <div class="staff-badge">STAFF PORTAL</div>
                </div>
            </div>
        </div>

        <div class="user-section">
            <div class="user-avatar">👤</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Staff Member</div>
            </div>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#dashboard" class="nav-link active" onclick="showSection('dashboard')">
                        <span class="nav-icon">📊</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#bookings" class="nav-link" onclick="showSection('bookings')">
                        <span class="nav-icon">📅</span>
                        <span>Bookings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#rooms" class="nav-link" onclick="showSection('rooms')">
                        <span class="nav-icon">🛏️</span>
                        <span>Rooms</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#guests" class="nav-link" onclick="showSection('guests')">
                        <span class="nav-icon">👥</span>
                        <span>Guests</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#housekeeping" class="nav-link" onclick="showSection('housekeeping')">
                        <span class="nav-icon">🧹</span>
                        <span>Housekeeping</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="logout-section">
            <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Dashboard Section -->
        <div id="dashboard" class="content-section">
            <div class="header">
                <h1>Dashboard</h1>
                <p>Welcome back! Here's today's overview</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div class="stat-value" id="totalBookings">{{ $totalBookings }}</div>
                    <div class="stat-label">Total Bookings</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">✓</div>
                    <div class="stat-value" id="confirmedBookings">{{ $confirmedBookings }}</div>
                    <div class="stat-label">Confirmed Today</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">🛏️</div>
                    <div class="stat-value" id="availableRooms">{{ $availableRooms }}</div>
                    <div class="stat-label">Available Rooms</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value" id="totalGuests">{{ $totalGuests }}</div>
                    <div class="stat-label">Guests Today</div>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Recent Bookings</h2>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Guest Name</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="recentBookingsBody">
                            @forelse($recentBookings as $booking)
                            <tr>
                                <td><strong>{{ $booking->user?->name ?? $booking->guest_name }}</strong></td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->check_in->format('M d, Y') }}</td>
                                <td>{{ $booking->check_out->format('M d, Y') }}</td>
                                <td><span class="status-badge status-{{ strtolower(str_replace('-', '_', $booking->status->value)) }}">{{ ucfirst($booking->status->value) }}</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" onclick="openViewBookingModal({{ $booking->id }}, '{{ $booking->user?->name ?? $booking->guest_name }}', '{{ $booking->room->room_number }}', '{{ $booking->check_in->format('M d, Y') }}', '{{ $booking->check_out->format('M d, Y') }}', '{{ $booking->status->value }}', {{ $booking->total_price }}, '{{ $booking->user?->email ?? $booking->guest_email }}', '{{ $booking->user?->phone ?? $booking->guest_phone ?? 'N/A' }}' )">View</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">📭</div>
                                        <div class="empty-text">No bookings yet</div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bookings Section -->
        <div id="bookings" class="content-section" style="display: none;">
            <div class="header">
                <h1>All Bookings</h1>
                <p>Manage all hotel reservations</p>
            </div>

            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Booking Management</h2>
                    <input type="text" class="search-box" placeholder="Search by guest name..." id="bookingSearch" oninput="filterBookings()">
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Guest Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="allBookingsBody">
                            @forelse($allBookings as $booking)
                            <tr>
                                <td><strong>#{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</strong></td>
                                <td>{{ $booking->user?->name ?? $booking->guest_name }}</td>
                                <td>{{ $booking->user?->email ?? $booking->guest_email }}</td>
                                <td>{{ $booking->user?->phone ?? $booking->guest_phone ?? 'N/A' }}</td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->check_in->format('M d, Y') }}</td>
                                <td>{{ $booking->check_out->format('M d, Y') }}</td>
                                <td><span class="status-badge status-{{ strtolower(str_replace('-', '_', $booking->status->value)) }}">{{ ucfirst($booking->status->value) }}</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" onclick="openViewBookingModal({{ $booking->id }}, '{{ $booking->user?->name ?? $booking->guest_name }}', '{{ $booking->room->room_number }}', '{{ $booking->check_in->format('M d, Y') }}', '{{ $booking->check_out->format('M d, Y') }}', '{{ $booking->status->value }}', {{ $booking->total_price }}, '{{ $booking->user?->email ?? $booking->guest_email }}', '{{ $booking->user?->phone ?? $booking->guest_phone ?? 'N/A' }}' )">View</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <div class="empty-icon">📭</div>
                                        <div class="empty-text">No bookings found</div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Rooms Section -->
        <div id="rooms" class="content-section" style="display: none;">
            <div class="header">
                <h1>Room Management</h1>
                <p>View and manage room availability</p>
            </div>

            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Room Status</h2>
                </div>
                <div class="rooms-grid" id="roomsGrid">
                    @foreach($allRooms as $room)
                    @php
                        $hasActiveBooking = $room->bookings->isNotEmpty();
                    @endphp
                    <div class="room-item {{ $hasActiveBooking ? 'booked' : 'available' }}" onclick="{{ $hasActiveBooking ? '' : 'openWalkInBooking(\'' . $room->room_number . '\', \'' . $room->category->name . '\', ' . $room->category->base_price . ', ' . $room->id . ')' }}" style="cursor: {{ $hasActiveBooking ? 'not-allowed' : 'pointer' }};">
                        <div class="room-number">{{ $room->room_number }}</div>
                        <div class="room-type">{{ $room->category->name }} Room</div>
                        <div class="room-status-badge room-status-{{ $hasActiveBooking ? 'booked' : 'available' }}">{{ $hasActiveBooking ? 'Booked' : 'Available' }}</div>
                        <div style="margin-top: 1rem; font-size: 0.85rem; color: {{ $hasActiveBooking ? 'var(--danger)' : 'var(--sky-blue)' }}; font-weight: 600;">{{ $hasActiveBooking ? 'Not available' : 'Click to book' }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Guests Section -->
        <div id="guests" class="content-section" style="display: none;">
            <div class="header">
                <h1>Guest Directory</h1>
                <p>View all guest information</p>
            </div>

            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Guest List</h2>
                    <input type="text" class="search-box" placeholder="Search guests..." id="guestSearch" oninput="filterGuests()">
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="guestsBody">
                            @forelse($activeGuests as $booking)
                            <tr>
                                <td><strong>{{ $booking->user?->name ?? $booking->guest_name }}</strong></td>
                                <td>{{ $booking->user?->email ?? $booking->guest_email }}</td>
                                <td>{{ $booking->user?->phone ?? $booking->guest_phone ?? 'N/A' }}</td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->check_in->format('M d, Y') }}</td>
                                <td><span class="status-badge status-{{ strtolower(str_replace('-', '_', $booking->status->value)) }}">{{ ucfirst($booking->status->value) }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">👥</div>
                                        <div class="empty-text">No active guests</div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Housekeeping Section -->
        <div id="housekeeping" class="content-section" style="display: none;">
            <div class="header">
                <h1>Housekeeping Management</h1>
                <p>Manage dirty rooms and cleaning status</p>
            </div>

            <div class="content-card">
                <div class="section-title" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem;">
                    <span style="font-size: 1.5rem;">🧹</span>
                    <span>Rooms Requiring Cleaning</span>
                </div>

                @forelse($dirtyRooms as $room)
                    <div class="room-cleaning-card" style="display: grid; grid-template-columns: 1fr auto; gap: 1.5rem; padding: 1.5rem; background: linear-gradient(135deg, #fff5e1 0%, #ffe4b5 100%); border-radius: 12px; margin-bottom: 1rem; border-left: 5px solid #ff9800; align-items: center;">
                        <div style="display: grid; gap: 0.5rem;">
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <h3 style="margin: 0; font-size: 1.1rem; color: #333;">
                                    Room #{{ $room->room_number }} - {{ $room->category->name }}
                                </h3>
                                <span style="background: #ff9800; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">🧹 Dirty</span>
                            </div>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">
                                Base Price: ${{ $room->category->base_price }}/night
                            </p>
                        </div>
                        <button type="button" 
                            class="btn btn-success" 
                            onclick="markRoomCleaned({{ $room->id }}, this)"
                            style="background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                            ✓ Mark as Cleaned
                        </button>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">✨</div>
                        <div class="empty-text">All rooms are clean! Great job.</div>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Walk-In Booking Modal -->
        <div class="modal" id="walkInBookingModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Walk-In Booking</h2>
                    <button class="close-modal" onclick="closeWalkInBooking()" style="background: none; border: none; font-size: 1.5rem; color: var(--ocean-blue); cursor: pointer;">&times;</button>
                </div>
                <form id="walkInBookingForm" onsubmit="submitWalkInBooking(event)">
                    <input type="hidden" name="room_id" id="walkInRoomId">
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Room Type</label>
                        <input type="text" readonly style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;" id="walkInRoomType">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Room Number</label>
                        <input type="text" readonly style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;" id="walkInRoomNumber">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Price per Night</label>
                        <input type="text" readonly style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;" id="walkInRoomPrice">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Guest Name</label>
                        <input type="text" name="guest_name" required placeholder="John Doe" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Email</label>
                        <input type="email" name="guest_email" required placeholder="john@example.com" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Phone</label>
                        <input type="tel" name="guest_phone" required placeholder="+1 (555) 123-4567" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Check-in Date</label>
                        <input type="date" name="check_in" required style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--deep-navy);">Check-out Date</label>
                        <input type="date" name="check_out" required style="width: 100%; padding: 0.85rem 1rem; border: 2px solid var(--ice-blue); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.9rem; background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue)); color: white; box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4); border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">Complete Walk-In Booking</button>
                </form>
            </div>
        </div>

        <!-- View Booking Modal -->
        <div class="modal" id="viewBookingModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Booking Details</h2>
                    <button class="close-modal" onclick="closeViewBookingModal()" style="background: none; border: none; font-size: 1.5rem; color: var(--ocean-blue); cursor: pointer;">&times;</button>
                </div>
                <div id="bookingDetails" style="margin-bottom: 1.5rem;">
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Booking ID</label>
                        <p id="detailBookingId" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Guest Name</label>
                        <p id="detailGuestName" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Email</label>
                        <p id="detailGuestEmail" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Phone</label>
                        <p id="detailGuestPhone" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Room Number</label>
                        <p id="detailRoomNumber" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Check-in Date</label>
                        <p id="detailCheckIn" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Check-out Date</label>
                        <p id="detailCheckOut" style="margin: 0.5rem 0 0 0; color: var(--royal-blue);">-</p>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Total Price</label>
                        <p id="detailTotalPrice" style="margin: 0.5rem 0 0 0; color: var(--ocean-blue); font-weight: 600;">-</p>
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <label style="font-weight: 600; color: var(--deep-navy); font-size: 0.9rem;">Current Status</label>
                        <p id="detailStatus" style="margin: 0.5rem 0 0 0;"><span id="statusBadge" class="status-badge"></span></p>
                    </div>
                </div>
                <div id="statusUpdateActions" style="display: flex; gap: 0.75rem;">
                    <!-- Actions will be populated by JavaScript based on current status -->
                </div>
            </div>
        </div>

        <style>
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(10, 17, 40, 0.85);
                backdrop-filter: blur(10px);
                z-index: 2000;
                justify-content: center;
                align-items: center;
                padding: 2rem;
            }

            .modal-content {
                background: white;
                border-radius: 16px;
                width: 95%;
                max-width: 480px;
                max-height: 90vh;
                padding: 1.5rem;
                box-shadow: 0 20px 40px rgba(10, 17, 40, 0.3);
                overflow-y: auto;
            }

            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .modal-header h2 {
                font-family: 'Playfair Display', serif;
                font-size: 1.75rem;
                color: var(--deep-navy);
                margin: 0;
            }

            .close-modal {
                background: none;
                border: none;
                font-size: 1.5rem;
                color: var(--ocean-blue);
                cursor: pointer;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </main>

    <script>
        const rooms = [
            { number: '101', type: 'Standard', status: 'available' },
            { number: '103', type: 'Standard', status: 'available' },
            { number: '105', type: 'Standard', status: 'available' },
            { number: '202', type: 'Deluxe', status: 'available' },
            { number: '301', type: 'Deluxe', status: 'available' },
            { number: '401', type: 'Suite', status: 'available' }
        ];

        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';

            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.closest('.nav-link').classList.add('active');
        }

        function loadBookings() {
            const bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
            updateDashboardStats(bookings);
            displayRecentBookings(bookings);
            displayAllBookings(bookings);
            displayGuests(bookings);
        }

        function updateDashboardStats(bookings) {
            document.getElementById('totalBookings').textContent = bookings.length;
            
            const confirmed = bookings.filter(b => b.status === 'Confirmed').length;
            document.getElementById('confirmedBookings').textContent = confirmed;

            const occupiedRooms = bookings.filter(b => b.status === 'Confirmed' || b.status === 'Checked-in').length;
            document.getElementById('availableRooms').textContent = rooms.length - occupiedRooms;

            const today = new Date().toISOString().split('T')[0];
            const guestsToday = bookings.filter(b => b.checkIn === today).length;
            document.getElementById('totalGuests').textContent = guestsToday;
        }

        function formatStatus(status) {
            if (!status) return '';
            const statusMap = {
                'pending': 'Pending',
                'confirmed': 'Confirmed',
                'checked_in': 'Checked In',
                'checked_out': 'Checked Out',
                'no_show': 'No Show',
                'cancelled': 'Cancelled'
            };
            return statusMap[status.toLowerCase()] || status;
        }

        function displayRecentBookings(bookings) {
            const tbody = document.getElementById('recentBookingsBody');
            const recent = bookings.slice(-5).reverse();

            if (recent.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state"><div class="empty-icon">📭</div><div class="empty-text">No bookings yet</div></div></td></tr>`;
                return;
            }

            tbody.innerHTML = recent.map((booking, index) => `
                <tr>
                    <td><strong>${booking.guestName}</strong></td>
                    <td>${booking.roomNumber}</td>
                    <td>${booking.checkIn}</td>
                    <td>${booking.checkOut}</td>
                    <td><span class="status-badge status-${booking.status.toLowerCase().replace(/_/g, '-').replace(' ', '-')}">${formatStatus(booking.status)}</span></td>
                    <td>
                        <div class="action-buttons">
                            ${booking.status === 'Pending' ? `
                                <button class="btn-action btn-confirm" onclick="updateBookingStatus(${bookings.length - 1 - index}, 'Confirmed')">Confirm</button>
                                <button class="btn-action btn-cancel" onclick="updateBookingStatus(${bookings.length - 1 - index}, 'No Show')">No Show</button>
                                <button class="btn-action btn-cancel" onclick="updateBookingStatus(${bookings.length - 1 - index}, 'Cancelled')">Cancel</button>
                            ` : `<button class="btn-action btn-view">View</button>`}
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function displayAllBookings(bookings) {
            const tbody = document.getElementById('allBookingsBody');

            if (bookings.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><div class="empty-state"><div class="empty-icon">📭</div><div class="empty-text">No bookings found</div></div></td></tr>`;
                return;
            }

            tbody.innerHTML = bookings.map((booking, index) => `
                <tr>
                    <td><strong>#${String(index + 1).padStart(4, '0')}</strong></td>
                    <td>${booking.guestName}</td>
                    <td>${booking.guestEmail}</td>
                    <td>${booking.guestPhone}</td>
                    <td>${booking.roomNumber}</td>
                    <td>${booking.checkIn}</td>
                    <td>${booking.checkOut}</td>
                    <td><span class="status-badge status-${booking.status.toLowerCase().replace(/_/g, '-').replace(' ', '-')}">${formatStatus(booking.status)}</span></td>
                    <td>
                        <div class="action-buttons">
                            ${booking.status === 'Pending' ? `
                                <button class="btn-action btn-confirm" onclick="updateBookingStatus(${index}, 'Confirmed')">Confirm</button>
                                <button class="btn-action btn-cancel" onclick="updateBookingStatus(${index}, 'No Show')">No Show</button>
                                <button class="btn-action btn-cancel" onclick="updateBookingStatus(${index}, 'Cancelled')">Cancel</button>
                            ` : booking.status === 'Confirmed' ? `
                                <button class="btn-action btn-confirm" onclick="updateBookingStatus(${index}, 'checked_in')">Check-in</button>
                            ` : booking.status === 'checked_in' ? `
                                <button class="btn-action btn-view" onclick="updateBookingStatus(${index}, 'checked_out')">Check-out</button>
                            ` : `<button class="btn-action btn-view">View</button>`}
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function displayGuests(bookings) {
            const tbody = document.getElementById('guestsBody');
            const activeGuests = bookings.filter(b => ['Confirmed', 'Checked-in'].includes(b.status));

            if (activeGuests.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state"><div class="empty-icon">👥</div><div class="empty-text">No active guests</div></div></td></tr>`;
                return;
            }

            tbody.innerHTML = activeGuests.map(guest => `
                <tr>
                    <td><strong>${guest.guestName}</strong></td>
                    <td>${guest.guestEmail}</td>
                    <td>${guest.guestPhone}</td>
                    <td>${guest.roomNumber}</td>
                    <td>${guest.checkIn}</td>
                    <td><span class="status-badge status-${guest.status.toLowerCase().replace(' ', '-')}">${guest.status}</span></td>
                </tr>
            `).join('');
        }

        function updateBookingStatus(index, newStatus) {
            const bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
            bookings[index].status = newStatus;
            localStorage.setItem('hotelBookings', JSON.stringify(bookings));
            loadBookings();
        }

        function filterBookings() {
            const search = document.getElementById('bookingSearch').value.toLowerCase();
            const rows = document.querySelectorAll('#allBookingsBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(search) ? '' : 'none';
            });
        }

        function filterGuests() {
            const search = document.getElementById('guestSearch').value.toLowerCase();
            const rows = document.querySelectorAll('#guestsBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(search) ? '' : 'none';
            });
        }

        function openWalkInBooking(roomNumber, roomType, price, roomId) {
            document.getElementById('walkInRoomType').value = roomType + ' Room';
            document.getElementById('walkInRoomNumber').value = roomNumber;
            document.getElementById('walkInRoomPrice').value = '$' + price;
            document.getElementById('walkInRoomId').value = roomId;
            const modal = document.getElementById('walkInBookingModal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            // Set today's date as default check-in
            const today = new Date().toISOString().split('T')[0];
            document.querySelector('input[name="check_in"]').value = today;
            document.querySelector('input[name="check_in"]').setAttribute('min', today);
        }

        function closeWalkInBooking() {
            const modal = document.getElementById('walkInBookingModal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
            document.getElementById('walkInBookingForm').reset();
        }

        function submitWalkInBooking(event) {
            event.preventDefault();
            const form = document.getElementById('walkInBookingForm');
            const formData = new FormData(form);
            
            // Add flag to indicate this is a walk-in booking
            formData.append('is_walk_in', '1');
            
            // Send AJAX request to create booking
            fetch('{{ route("bookings.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Walk-in booking created successfully! Guest: ' + formData.get('guest_name'));
                    closeWalkInBooking();
                    form.reset();
                    // Reload page to see updated room status (optional)
                    setTimeout(() => location.reload(), 500);
                } else {
                    alert('Error: ' + (data.message || 'Failed to create booking'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            });
        }

        // Close modal when clicking outside
        window.onclick = function(e) {
            const walkinModal = document.getElementById('walkInBookingModal');
            const viewModal = document.getElementById('viewBookingModal');
            if (e.target === walkinModal) {
                closeWalkInBooking();
            }
            if (e.target === viewModal) {
                closeViewBookingModal();
            }
        };

        function openViewBookingModal(bookingId, guestName, roomNumber, checkIn, checkOut, status, totalPrice, email, phone) {
            document.getElementById('detailBookingId').textContent = '#' + String(bookingId).padStart(4, '0');
            document.getElementById('detailGuestName').textContent = guestName;
            document.getElementById('detailGuestEmail').textContent = email;
            document.getElementById('detailGuestPhone').textContent = phone;
            document.getElementById('detailRoomNumber').textContent = roomNumber;
            document.getElementById('detailCheckIn').textContent = checkIn;
            document.getElementById('detailCheckOut').textContent = checkOut;
            document.getElementById('detailTotalPrice').textContent = '$' + totalPrice;
            
            // Set status badge
            const statusBadge = document.getElementById('statusBadge');
            const statusText = status.charAt(0).toUpperCase() + status.slice(1).replace('_', ' ');
            statusBadge.textContent = statusText;
            statusBadge.className = 'status-badge status-' + status.replace('_', '-');
            
            // Set action buttons based on current status
            const actionDiv = document.getElementById('statusUpdateActions');
            actionDiv.innerHTML = '';
            
            if (status === 'pending') {
                const confirmBtn = document.createElement('button');
                confirmBtn.className = 'btn-action btn-confirm';
                confirmBtn.style.flex = '1';
                confirmBtn.textContent = 'Confirm Booking';
                confirmBtn.onclick = () => updateBookingStatusAPI(bookingId, 'confirmed');
                
                const cancelBtn = document.createElement('button');
                cancelBtn.className = 'btn-action btn-cancel';
                cancelBtn.style.flex = '1';
                cancelBtn.textContent = 'Cancel Booking';
                cancelBtn.onclick = () => updateBookingStatusAPI(bookingId, 'cancelled');
                
                actionDiv.appendChild(confirmBtn);
                actionDiv.appendChild(cancelBtn);
            } else if (status === 'confirmed') {
                const checkinBtn = document.createElement('button');
                checkinBtn.className = 'btn-action btn-confirm';
                checkinBtn.style.flex = '1';
                checkinBtn.textContent = 'Check-in Guest';
                checkinBtn.onclick = () => updateBookingStatusAPI(bookingId, 'checked_in');
                actionDiv.appendChild(checkinBtn);
            } else if (status === 'checked_in') {
                const checkoutBtn = document.createElement('button');
                checkoutBtn.className = 'btn-action btn-confirm';
                checkoutBtn.style.flex = '1';
                checkoutBtn.textContent = 'Check-out Guest';
                checkoutBtn.onclick = () => updateBookingStatusAPI(bookingId, 'checked_out');
                actionDiv.appendChild(checkoutBtn);
            } else {
                const closeBtn = document.createElement('button');
                closeBtn.className = 'btn-action btn-view';
                closeBtn.style.flex = '1';
                closeBtn.textContent = 'Close';
                closeBtn.onclick = () => closeViewBookingModal();
                actionDiv.appendChild(closeBtn);
            }
            
            const modal = document.getElementById('viewBookingModal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeViewBookingModal() {
            const modal = document.getElementById('viewBookingModal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        function updateBookingStatusAPI(bookingId, newStatus) {
            fetch('/bookings/' + bookingId + '/update-status', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    status: newStatus
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Booking status updated successfully!');
                    closeViewBookingModal();
                    setTimeout(() => location.reload(), 500);
                } else {
                    alert('Error: ' + (data.message || 'Failed to update booking'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            });
        }

        // Mark room as cleaned
        function markRoomCleaned(roomId, button) {
            button.disabled = true;
            button.textContent = '⏳ Processing...';

            fetch(`/rooms/${roomId}/mark-cleaned`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert('✓ Room marked as cleaned and available!');
                    // Remove the card from the list
                    button.closest('.room-cleaning-card').style.opacity = '0';
                    setTimeout(() => {
                        button.closest('.room-cleaning-card').remove();
                        // Check if there are any rooms left
                        const container = document.querySelector('.content-section[id="housekeeping"] .content-card');
                        if (container && container.querySelector('.room-cleaning-card') === null) {
                            location.reload(); // Reload to show empty state
                        }
                    }, 300);
                } else {
                    alert('Error: ' + data.message);
                    button.disabled = false;
                    button.textContent = '✓ Mark as Cleaned';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to mark room as cleaned');
                button.disabled = false;
                button.textContent = '✓ Mark as Cleaned';
            });
        }
    </script>
</body>
</html>
