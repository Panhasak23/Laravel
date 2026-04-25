<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azure Luxe Hotel - Where Elegance Meets the Sky</title>
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: var(--pearl-white);
            color: var(--deep-navy);
            overflow-x: hidden;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 17, 40, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--crystal);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav.scrolled {
            padding: 1rem 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
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
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
            50% { box-shadow: 0 0 50px rgba(59, 130, 246, 0.9); }
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: 0.5px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--sky-blue), var(--gold-accent));
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--light-blue);
        }

        .nav-links a:hover::before {
            width: 100%;
        }

        .btn {
            padding: 0.85rem 2rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4);
            position: relative;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.6);
        }

        /* Hero Section */
        .hero {
            margin-top: 90px;
            height: 90vh;
            background: linear-gradient(135deg, #0A1128 0%, #1E3A8A 50%, #2563EB 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: visible;
            overscroll-behavior: contain;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(37, 99, 235, 0.3) 0%, transparent 50%);
            animation: gradientShift 8s ease-in-out infinite;
        }

        @keyframesShift {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="1200" height="600" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .shape {
            position: absolute;
            background: linear-gradient(135deg, rgba(96, 165, 250, 0.2), rgba(59, 130, 246, 0.1));
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 250px;
            height: 250px;
            bottom: 10%;
            left: 50%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            max-width: 900px;
            padding: 0 2rem;
            animation: fadeInUp 1.2s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 400;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            color: var(--ice-blue);
            animation: fadeInUp 1.2s ease-out 0.2s both;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 5.5rem;
            font-weight: 800;
            margin-bottom: 2rem;
            line-height: 1.1;
            background: linear-gradient(135deg, #FFFFFF 0%, var(--light-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1.2s ease-out 0.4s both;
        }

        .hero-description {
            font-size: 1.35rem;
            font-weight: 300;
            letter-spacing: 1px;
            margin-bottom: 3rem;
            line-height: 1.8;
            opacity: 0.95;
            animation: fadeInUp 1.2s ease-out 0.6s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            animation: fadeInUp 1.2s ease-out 0.8s both;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            transform: translateY(-3px);
        }

        /* Offers Section */
        .offers-section {
            padding: 8rem 3rem;
            background: linear-gradient(180deg, var(--pearl-white) 0%, #E0F2FE 100%);
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
            animation: fadeInUp 1s ease-out;
        }

        .section-label {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--ocean-blue);
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            color: var(--deep-navy);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--sky-blue), var(--gold-accent));
            border-radius: 2px;
        }

        .section-description {
            font-size: 1.2rem;
            color: var(--royal-blue);
            max-width: 700px;
            margin: 2rem auto 0;
            line-height: 1.8;
        }

        .offers-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 3rem;
        }

        .offer-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            position: relative;
            overflow: visible;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(37, 99, 235, 0.1);
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1);
        }

        .offer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.7s ease;
        }

        .offer-card:hover::before {
            left: 100%;
        }

        .offer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.25);
            border-color: var(--sky-blue);
        }

        .offer-badge {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .offer-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--ice-blue), var(--light-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .offer-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--deep-navy);
            margin-bottom: 1.5rem;
        }

        .offer-description {
            font-size: 1.1rem;
            color: var(--royal-blue);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .offer-details {
            padding-top: 2rem;
            border-top: 2px solid var(--ice-blue);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .offer-code {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .code-label {
            font-weight: 600;
            color: var(--royal-blue);
        }

        .code-value {
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, var(--ice-blue), #BFDBFE);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--ocean-blue);
            letter-spacing: 2px;
        }

        .offer-validity {
            color: var(--royal-blue);
            font-size: 0.95rem;
        }

        /* Rooms Section - FIXED: TOP-ONLY ROUNDED CORNERS */
        .rooms-section {
            padding: 8rem 3rem;
            background: linear-gradient(180deg, #E0F2FE 0%, var(--pearl-white) 100%);
        }

        .filters {
            max-width: 1400px;
            margin: 0 auto 4rem;
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            padding: 1rem 2.5rem;
            background: white;
            border: 2px solid var(--ice-blue);
            border-radius: 50px;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            color: var(--royal-blue);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        .rooms-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 3rem;
        }

        /* ✅ CRITICAL FIX: Room card — all corners rounded */
        .room-card {
            background: white;
            border-radius: 16px; /* ← ALL CORNERS ROUNDED */
            overflow: hidden; /* prevents overflow outside curved corners */
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.15);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }

        .room-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 60px rgba(37, 99, 235, 0.3);
            border-color: var(--sky-blue);
        }

        .room-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 100%);
            position: relative;
            overflow: visible;
        }

        .room-image::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.4) 0%, transparent 70%);
            animation: imageGlow 4s ease-in-out infinite;
        }

        @keyframes imageGlow {
            0%, 100% { opacity: 0.5; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.8; transform: translate(-50%, -50%) scale(1.2); }
        }

        .view-tag {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: var(--ocean-blue);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .room-details {
            padding: 2.5rem;
        }

        .room-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .room-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem; /* reduced for clarity */
            font-weight: 700;
            color: var(--deep-navy);
            margin-bottom: 0.5rem;
        }

        .room-number {
            color: var(--royal-blue);
            font-weight: 500;
        }

        .room-price {
            text-align: right;
        }

        .price-amount {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem; /* reduced */
            font-weight: 700;
            color: var(--ocean-blue);
        }

        .price-period {
            color: var(--royal-blue);
            font-size: 0.9rem;
        }

        .room-features {
            display: flex;
            gap: 2rem;
            margin: 1.5rem 0;
            color: var(--royal-blue);
        }

        .feature {
            display: flex;
            align-items: center;
 gap: 0.5rem;
            font-size: 0.95rem;
        }

        .room-amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin: 1.5rem 0 2rem;
        }

        .amenity {
            background: linear-gradient(135deg, var(--ice-blue), #BFDBFE);
            color: var(--ocean-blue);
            padding: 0.5rem 1.25rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .book-btn {
            width: 100%;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--deep-navy) 0%, var(--royal-blue) 100%);
            color: white;
            padding: 5rem 3rem 2rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400"><defs><pattern id="footerGrid" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="1200" height="400" fill="url(%23footerGrid)"/></svg>');
            opacity: 0.5;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 4rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 1;
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: var(--light-blue);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-section a:hover {
            color: var(--light-blue);
            transform:(5px);
        }

        .footer-bottom {
            max-width: 1400px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            opacity: 0.8;
            position: relative;
            z-index: 1;
        }

        /* Modal - Compact & Working */
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
            font-size:1.5rem;
            color: var(--royal-blue);
            cursor: pointer;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-modal:hover {
            color: var(--ocean-blue);
            transform: rotate(90deg);
        }

        .form-group {
            margin-bottom: 1.25rem;
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
            padding: 0.75rem 1rem;
            border: 1px solid var(--ice-blue);
            border-radius: 8px;
            font-family: 'Raleway', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .success-message {
            background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            border: 2px solid #6EE7B7;
            color: #065F46;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            display: none;
            font-weight: 600;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3.5rem;
            }

            .section-title {
                font-size: 3rem;
            }

            .offers-grid,
            .rooms-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">🌊</div>
                <span>Azure Luxe</span>
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#offers">Offers</a></li>
                <li><a href="#rooms">Rooms</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="{{ route('guest.booking.lookup') }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem; font-size: 0.95rem;">📋 View Booking</a>
                <a href="/login" class="btn btn-primary">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <div class="hero-content">
            <div class="hero-subtitle">Welcome to Paradise</div>
            <h1>Aazure Luxe Hotel</h1>
            <p class="hero-description">Experience unparalleled luxury where the sky meets elegance. Discover your perfect escape in our world-class accommodations.</p>
            <div class="hero-buttons">
                <button class="btn btn-primary" onclick="scrollToRooms()">Explore Rooms</button>
                <button class="btn btn-secondary" onclick="scrollToOffers()">View Offers</button>
            </div>
        </div>
    </section>

    <!-- Offers Section -->
    <section class="offers-section" id="offers">
        <div class="section-header">
            <div class="section-label">Exclusive Deals</div>
            <h2 class="section-title">Special Offers</h2>
            <p class="section-description">Take advantage of our limited-time promotions and make your dream vacation a reality</p>
        </div>

        <div class="offers-grid">
            @forelse($promoCodes as $promoCode)
            <div class="offer-card">
                <div class="offer-badge">{{ $promoCode->discount_percent }}% OFF</div>
                <div class="offer-icon">
                    @php
                        $icons = ['🌅', '🌴', '🎉', '✨', '🌟', '💎', '🎁', '🏝️'];
                        echo $icons[($loop->index) % count($icons)];
                    @endphp
                </div>
                <h3 class="offer-title">{{ ucfirst(str_replace('_', ' ', preg_replace('/\d+/', '', strtolower($promoCode->code)))) }} Special</h3>
                <p class="offer-description">Enjoy an exclusive {{ $promoCode->discount_percent }}% discount on your next booking with code <strong>{{ $promoCode->code }}</strong>. Don't miss this amazing opportunity!</p>
                <div class="offer-details">
                    <div class="offer-code">
                        <span class="code-label">Code:</span>
                        <span class="code-value">{{ $promoCode->code }}</span>
                    </div>
                    <div class="offer-validity">
                        @if($promoCode->expires_at)
                            Valid until {{ $promoCode->expires_at->format('m/d/Y') }}
                        @else
                            No expiry date
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="offer-card">
                <div class="offer-badge">20% OFF</div>
                <div class="offer-icon">🌅</div>
                <h3 class="offer-title">Early Bird Special</h3>
                <p class="offer-description">Book your stay 30 days in advance and enjoy an exclusive 20% discount on all room types. Perfect for planners who love great deals!</p>
                <div class="offer-details">
                    <div class="offer-code">
                        <span class="code-label">Code:</span>
                        <span class="code-value">EARLY20</span>
                    </div>
                    <div class="offer-validity">Valid until 12/31/2026</div>
                </div>
            </div>

            <div class="offer-card">
                <div class="offer-badge">33% OFF</div>
                <div class="offer-icon">🌴</div>
                <h3 class="offer-title">Weekend Getaway</h3>
                <p class="offer-description">Stay 3 nights and pay for only 2 on weekends. The perfect escape to recharge and enjoy luxury at an unbeatable value.</p>
                <div class="offer-details">
                    <div class="offer-code">
                        <span class="code-label">Code:</span>
                        <span class="code-value">WEEKEND3</span>
                    </div>
                    <div class="offer-validity">Valid until 3/31/2026</div>
                </div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="rooms-section" id="rooms">
        <div class="section-header">
            <div class="section-label">Accommodations</div>
            <h2 class="section-title">Luxury Rooms & Suites</h2>
            <p class="section-description">Each room is thoughtfully designed to provide the ultimate comfort and elegance</p>
        </div>

        <div class="filters">
            <button class="filter-btn active" onclick="filterRooms('all')">All Rooms</button>
            @foreach($categories as $category)
            <button class="filter-btn" onclick="filterRooms('{{ strtolower($category->name) }}')">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="rooms-grid" id="roomsGrid">
            @foreach($rooms as $room)
            <div class="room-card" data-type="{{ strtolower($room->category->name) }}" data-room-id="{{ $room->id }}">
                <div class="room-image">
                    <span class="view-tag">
                        @if($room->category->name === 'Single') 🌳 Garden View
                        @elseif($room->category->name === 'Double') 🏙️ City View
                        @elseif($room->category->name === 'Deluxe') 🌊 Ocean View
                        @elseif($room->category->name === 'Suite') 🌊 Ocean View
                        @else 🏛️ Premium View
                        @endif
                    </span>
                </div>
                <div class="room-details">
                    <div class="room-header">
                        <div class="room-info">
                            <h3>{{ $room->category->name }} Room</h3>
                            <p class="room-number">Room {{ $room->room_number }}</p>
                        </div>
                        <div class="room-price">
                            <div class="price-amount">${{ $room->category->base_price }}</div>
                            <div class="price-period">per night</div>
                        </div>
                    </div>
                    <div class="room-features">
                        <div class="feature">
                            <span>👥</span>
                            <span>{{ $room->category->capacity }} Guests</span>
                        </div>
                        <div class="feature">
                            <span>📏</span>
                            <span>{{ $room->category->capacity * 60 + 200 }} sq ft</span>
                        </div>
                    </div>
                    <div class="room-amenities">
                        <span class="amenity">WiFi</span>
                        <span class="amenity">TV</span>
                        <span class="amenity">Mini Bar</span>
                        <span class="amenity">A/C</span>
                        @if($room->category->name === 'Deluxe' || $room->category->name === 'Suite')
                            <span class="amenity">Smart TV</span>
                            <span class="amenity">Bathtub</span>
                        @endif
                        @if($room->category->name === 'Suite')
                            <span class="amenity">Living Room</span>
                            <span class="amenity">Jacuzzi</span>
                        @endif
                    </div>
                <button class="btn btn-primary book-btn" 
                            onclick="openBookingModal({{ $room->id }}, '{{ $room->category->name }} Room', 'Room {{ $room->room_number }}', {{ $room->category->base_price }})">
                        Book Now
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Azure Luxe Hotel</h3>
                <p>Experience luxury redefined. Where every moment is crafted to perfection.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#offers">Offers</a></li>
                    <li><a href="#rooms">Rooms</a></li>
                    <li><a href="/staff">Staff Portal</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li>📞 +1 (555) 123-4567</li>
                    <li>✉️ info@azureluxe.com</li>
                    <li>📍 123 Ocean Drive, Paradise</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Azure Luxe Hotel. All rights reserved.</p>
        </div>
    </footer>

    <!-- Booking Modal -->
    <div class="modal" id="bookingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Book Your Stay</h2>
                <button class="close-modal" onclick="closeBookingModal()">&times;</button>
            </div>
            <div id="successMessage" class="success-message">
                ✓ Booking confirmed! Check your email for details.
            </div>
            <form id="bookingForm" action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <input type="hidden" name="room_id" id="room_id">
                <div class="form-group">
                    <label>Room Type</label>
                    <input type="text" name="room_type" readonly>
                </div>
                <div class="form-group">
                    <label>Room Number</label>
                    <input type="text" name="room_number" readonly>
                </div>
                <div class="form-group">
                    <label>Price per Night</label>
                    <input type="text" name="room_price" readonly>
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="guest_name" required placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="guest_email" required placeholder="john@example.com">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="guest_phone" required placeholder="+1 (555) 123-4567">
                </div>
                <div class="form-group">
                    <label>Check-in Date</label>
                    <input type="date" name="check_in" required>
                </div>
                <div class="form-group">
                    <label>Check-out Date</label>
                    <input type="date" name="check_out" required>
                </div>
                <div class="form-group">
                    <label>Promo Code (Optional)</label>
                    <input type="text" name="promo_code" placeholder="EARLY20">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Confirm Booking</button>
            </form>
        </div>
    </div>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Room filtering
        function filterRooms(type) {
            const cards = document.querySelectorAll('.room-card');
            const buttons = document.querySelectorAll('.filter-btn');

            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            cards.forEach(card => {
                if (type === 'all' || card.dataset.type === type) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Smooth scroll
        function scrollToRooms() {
            document.getElementById('rooms').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToOffers() {
            document.getElementById('offers').scrollIntoView({ behavior: 'smooth' });
        }

        // Booking modal
        function openBookingModal(roomId, roomType, roomNumber, price) {
            document.querySelector('#room_id').value = roomId;
            document.querySelector('input[name="room_type"]').value = roomType;
            document.querySelector('input[name="room_number"]').value = roomNumber;
            document.querySelector('input[name="room_price"]').value = '$' + price;
            document.getElementById('bookingModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.body.style.overflow = '';
            document.getElementById('bookingForm').reset();
            document.getElementById('successMessage').style.display = 'none';
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.body.style.overflow = '';
            document.getElementById('bookingForm').reset();
            document.getElementById('successMessage').style.display = 'none';
        }

        // Set min date
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[name="check_in"]').setAttribute('min', today);
        
        document.querySelector('input[name="check_in"]').addEventListener('change', function() {
            document.querySelector('input[name="check_out"]').setAttribute('min', this.value);
            filterRoomsByDates(); // Filter rooms when check-in date changes
        });

        // Filter rooms when check-out date changes
        document.querySelector('input[name="check_out"]').addEventListener('change', function() {
            filterRoomsByDates();
        });

        // Function to filter available rooms based on selected dates
        function filterRoomsByDates() {
            const checkInInput = document.querySelector('input[name="check_in"]');
            const checkOutInput = document.querySelector('input[name="check_out"]');
            
            const checkIn = checkInInput.value;
            const checkOut = checkOutInput.value;
            
            // If both dates are selected, fetch available rooms for those dates
            if (checkIn && checkOut) {
                fetch(`/?check_in=${checkIn}&check_out=${checkOut}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Parse the HTML response and extract room data
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newRoomCards = doc.querySelectorAll('[data-room-id]');
                    const currentRoomCards = document.querySelectorAll('[data-room-id]');
                    
                    // Hide rooms that are no longer available
                    currentRoomCards.forEach(card => {
                        const roomId = card.getAttribute('data-room-id');
                        const foundRoom = Array.from(newRoomCards).find(r => r.getAttribute('data-room-id') === roomId);
                        
                        if (!foundRoom) {
                            card.style.display = 'none';
                            const notice = document.createElement('div');
                            notice.style.cssText = 'text-align: center; padding: 1rem; color: #666; font-size: 0.9rem;';
                            notice.textContent = 'Not available for selected dates';
                            card.replaceWith(notice);
                        } else {
                            card.style.display = 'block';
                        }
                    });
                })
                .catch(error => console.error('Error filtering rooms:', error));
            }
        }

        // Close modal on click outside
        window.onclick = function(e) {
            if (e.target === document.getElementById('bookingModal')) {
                closeBookingModal();
            }
        };
    </script>
</body>
</html>