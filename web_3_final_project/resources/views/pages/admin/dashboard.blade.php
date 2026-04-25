<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - Azure Luxe Hotel</title>
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
            --platinum: #E5E7EB;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --info: #06B6D4;
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
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 320px;
            background: linear-gradient(180deg, var(--deep-navy) 0%, #0F172A 50%, var(--royal-blue) 100%);
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 6px 0 40px rgba(10, 17, 40, 0.4);
            z-index: 100;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 800"><defs><pattern id="sidebarPattern" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="400" height="800" fill="url(%23sidebarPattern)"/></svg>');
            opacity: 1;
        }

        .sidebar-header {
            padding: 3rem 2.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--gold-accent), #FCD34D);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 0 40px rgba(251, 191, 36, 0.7);
        }

        @keyframes logoSpin {
            0% { box-shadow: 0 0 40px rgba(251, 191, 36, 0.7); }
            50% { box-shadow: 0 0 60px rgba(251, 191, 36, 0.9); }
            100% { box-shadow: 0 0 40px rgba(251, 191, 36, 0.7); }
        }

        .admin-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--danger), #F87171);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 2px;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
            animation: adminPulse 2s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes adminPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .user-section {
            padding: 2.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .user-avatar {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--gold-accent), #FCD34D);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.5);
            border: 4px solid rgba(255, 255, 255, 0.2);
            animation: avatarGlow 3s ease-in-out infinite;
        }

        @keyframes avatarGlow {
            0%, 100% { 
                box-shadow: 0 15px 40px rgba(251, 191, 36, 0.5);
                transform: translateY(0);
            }
            50% { 
                box-shadow: 0 20px 50px rgba(251, 191, 36, 0.8);
                transform: translateY(-5px);
            }
        }

        .user-info {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .user-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .user-role {
            color: var(--gold-accent);
            font-size: 1rem;
            font-weight: 600;
        }

        .nav-menu {
            list-style: none;
            padding: 2rem 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem 2.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-weight: 600;
            font-size: 1.05rem;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, var(--gold-accent), #FCD34D);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(251, 191, 36, 0.15), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            opacity: 1;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            padding-left: 3rem;
        }

        .nav-icon {
            font-size: 1.75rem;
            position: relative;
            z-index: 1;
        }

        .nav-text {
            position: relative;
            z-index: 1;
        }

        .logout-section {
            padding: 2.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .btn {
            padding: 1.25rem 2rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--gold-accent);
            color: var(--gold-accent);
            width: 100%;
        }

        .btn-outline:hover {
            background: var(--gold-accent);
            color: var(--deep-navy);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.5);
        }

        /* Main Content */
        .main-content {
            margin-left: 320px;
            flex: 1;
            padding: 3rem;
        }

        .header {
            margin-bottom: 3.5rem;
            animation: slideInDown 1s ease-out;
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
            font-size: 4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--deep-navy), var(--ocean-blue), var(--sky-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .header p {
            font-size: 1.35rem;
            color: var(--royal-blue);
            font-weight: 500;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
        }

        .stat-card {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            box-shadow: 0 15px 50px rgba(37, 99, 235, 0.12);
            animation: fadeInScale 0.8s ease-out backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--sky-blue), var(--gold-accent));
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .stat-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 70px rgba(37, 99, 235, 0.3);
            border-color: var(--sky-blue);
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--ice-blue), var(--light-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.3);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.6rem 1.25rem;
            border-radius: 50px;
        }

        .trend-up {
            background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            color: #065F46;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 800;
            color: var(--ocean-blue);
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .stat-label {
            color: var(--royal-blue);
            font-size: 1.1rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        /* Charts Section */
        .chart-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .section {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 15px 50px rgba(37, 99, 235, 0.12);
            border: 2px solid transparent;
            transition: all 0.4s ease;
            position: relative;
            overflow: visible;
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent, rgba(59, 130, 246, 0.05));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .section:hover {
            border-color: var(--ice-blue);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.2);
        }

        .section:hover::before {
            opacity: 1;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 3px solid var(--ice-blue);
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--deep-navy);
        }

        .chart-placeholder {
            height: 350px;
            background: linear-gradient(135deg, var(--pearl-white), var(--ice-blue));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--royal-blue);
            font-size: 1.5rem;
            font-weight: 600;
            border: 3px dashed var(--light-blue);
            position: relative;
            z-index: 1;
        }

        /* Revenue Card */
        .revenue-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.75rem 0;
            border-bottom: 2px solid var(--ice-blue);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .revenue-item:hover {
            padding-left: 1rem;
            background: linear-gradient(90deg, rgba(219, 234, 254, 0.5), transparent);
        }

        .revenue-item:last-child {
            border-bottom: none;
        }

        .revenue-label {
            font-weight: 600;
            color: var(--royal-blue);
            font-size: 1.1rem;
        }

        .revenue-amount {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--ocean-blue);
        }

        /* Table Section */
        .table-section {
            background: white;
            border-radius: 25px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 15px 50px rgba(37, 99, 235, 0.12);
        }

        .search-filter-bar {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 300px;
            padding: 1.25rem 2rem;
            border: 2px solid var(--ice-blue);
            border-radius: 50px;
            font-family: 'Raleway', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 5px rgba(59, 130, 246, 0.1);
        }

        .filter-select {
            padding: 1.25rem 2rem;
            border: 2px solid var(--ice-blue);
            border-radius: 50px;
            background: white;
            font-family: 'Raleway', sans-serif;
            font-size: 1rem;
            color: var(--royal-blue);
            cursor: pointer;
            min-width: 180px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 5px rgba(59, 130, 246, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            padding: 1.25rem 3rem;
            font-weight: 700;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.5);
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
            padding: 1.75rem 1.5rem;
            text-align: left;
            font-weight: 800;
            color: var(--ocean-blue);
            border-bottom: 3px solid var(--sky-blue);
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1.5px;
        }

        td {
            padding: 2rem 1.5rem;
            border-bottom: 2px solid var(--ice-blue);
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(219, 234, 254, 0.4), transparent);
            transform: translateX(8px);
        }

        .status-badge {
            padding: 0.75rem 1.75rem;
            border-radius: 50px;
            font-size: 0.9rem;
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
            padding: 0.85rem 1.75rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--info), #06B6D4);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--danger), #F87171);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-confirm {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-cancel {
            background: linear-gradient(135deg, var(--danger), #F87171);
            color: white;
        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-view {
            background: linear-gradient(135deg, var(--ocean-blue), #3B82F6);
            color: white;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            color: var(--royal-blue);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .empty-icon {
            font-size: 6rem;
            margin-bottom: 2rem;
            opacity: 0.4;
        }

        .empty-text {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Activity Feed */
        #activityFeed {
            height: 500px;
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll !important;
            overflow-x: hidden !important;
            padding-right: 10px;
            scroll-behavior: smooth;
            display: block !important;
            position: relative;
        }
        
        .activity-feed {
            height: 500px;
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll !important;
            overflow-x: hidden !important;
            padding-right: 10px;
            scroll-behavior: smooth;
            display: block !important;
            position: relative;
        }
        
        .activity-feed::-webkit-scrollbar {
            width: 10px;
        }
        
        .activity-feed::-webkit-scrollbar-track {
            background: rgba(203, 213, 225, 0.15);
            border-radius: 10px;
        }
        
        .activity-feed::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(96, 165, 250, 0.7), rgba(37, 99, 235, 0.7));
            border-radius: 10px;
            border: 2px solid rgba(203, 213, 225, 0.15);
            background-clip: padding-box;
        }
        
        .activity-feed::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(37, 99, 235, 1), rgba(30, 58, 138, 1));
            background-clip: padding-box;
        }

        /* Firefox scrollbar styling */
        .activity-feed {
            scrollbar-color: rgba(96, 165, 250, 0.7) rgba(203, 213, 225, 0.15);
            scrollbar-width: thin;
        }

        .activity-item {
            padding: 1.75rem;
            border-left: 4px solid var(--light-blue);
            margin-bottom: 1.5rem;
            background: var(--pearl-white);
            border-radius: 0 15px 15px 0;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .activity-item:hover {
            background: var(--ice-blue);
            border-left-color: var(--ocean-blue);
            transform: translateX(8px);
        }

        .activity-time {
            color: var(--royal-blue);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .activity-text {
            color: var(--deep-navy);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        canvas {
            max-width: 100%;
            height: auto !important;
            display: block;
        }

        /* Promo Codes Section */
        .promo-section {
            padding: 2rem;
        }

        .add-promo-form {
            background: linear-gradient(135deg, #E0F2FE 0%, #DBEAFE 100%);
            padding: 2.5rem;
            border-radius: 20px;
            border: 2px solid rgba(37, 99, 235, 0.15);
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--deep-navy);
            margin-bottom: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            color: var(--deep-navy);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"] {
            padding: 0.875rem 1rem;
            border: 2px solid rgba(37, 99, 235, 0.2);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .promo-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .promo-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: visible;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid rgba(37, 99, 235, 0.1);
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1);
        }

        .promo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.7s ease;
        }

        .promo-card:hover::before {
            left: 100%;
        }

        .promo-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.25);
            border-color: var(--sky-blue);
        }

        .promo-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(135deg, var(--sky-blue), var(--ocean-blue));
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .promo-header {
            margin-bottom: 1.5rem;
        }

        .promo-code-display {
            font-family: 'Courier New', monospace;
            font-size: 2rem;
            font-weight: 800;
            color: var(--ocean-blue);
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
            word-break: break-word;
        }

        .promo-discount-text {
            font-size: 1rem;
            color: var(--royal-blue);
            font-weight: 600;
        }

        .promo-info {
            margin: 1.5rem 0;
            padding: 1rem;
            background: var(--ice-blue);
            border-radius: 10px;
            border-left: 4px solid var(--sky-blue);
        }

        .promo-info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .promo-info-row:last-child {
            margin-bottom: 0;
        }

        .promo-info-label {
            font-weight: 600;
            color: var(--royal-blue);
        }

        .promo-info-value {
            color: var(--deep-navy);
            font-weight: 700;
        }

        .promo-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .promo-status.active {
            background: #D1FAE5;
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .promo-status.inactive {
            background: #FEE2E2;
            color: #7F1D1D;
            border: 1px solid #FCA5A5;
        }

        .promo-status.expired {
            background: #F3E8FF;
            color: #6B21A8;
            border: 1px solid #E9D5FF;
        }

        .promo-card-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--ice-blue);
        }

        .promo-card-actions button {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-toggle {
            background: var(--ice-blue);
            color: var(--sky-blue);
        }

        .btn-toggle:hover {
            background: var(--light-blue);
            color: white;
        }

        .btn-delete-promo {
            background: #FEE2E2;
            color: #DC2626;
        }

        .btn-delete-promo:hover {
            background: #FCA5A5;
            color: white;
        }

        @media (max-width: 1200px) {
            .chart-section {
                grid-template-columns: 1fr;
            }

            .promo-cards-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
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

            .search-filter-bar {
                flex-direction: column;
            }

            .search-box,
            .filter-select {
                width: 100%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">👑</div>
                <div>
                    <div>Azure Luxe</div>
                    <div class="admin-badge">ADMIN PORTAL</div>
                </div>
            </div>
        </div>

        <div class="user-section">
            <div class="user-avatar">👨‍💼</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">System Administrator</div>
            </div>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#overview" class="nav-link active" onclick="showSection('overview')">
                        <span class="nav-icon">📊</span>
                        <span class="nav-text">Overview</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#analytics" class="nav-link" onclick="showSection('analytics')">
                        <span class="nav-icon">📈</span>
                        <span class="nav-text">Analytics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#bookings-admin" class="nav-link" onclick="showSection('bookings-admin')">
                        <span class="nav-icon">📅</span>
                        <span class="nav-text">All Bookings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#staff" class="nav-link" onclick="showSection('staff')">
                        <span class="nav-icon">👥</span>
                        <span class="nav-text">Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#promo-codes" class="nav-link" onclick="showSection('promo-codes')">
                        <span class="nav-icon">🎟️</span>
                        <span class="nav-text">Promo Codes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#housekeeping" class="nav-link" onclick="showSection('housekeeping')">
                        <span class="nav-icon">🧹</span>
                        <span class="nav-text">Housekeeping</span>
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
        <!-- Overview Section -->
        <div id="overview" class="content-section">
            <div class="header">
                <h1>Admin Dashboard</h1>
                <p>Comprehensive hotel analytics and management</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">💰</div>
                        <div class="stat-trend trend-up">↑ 12.5%</div>
                    </div>
                    <div class="stat-value">{{ '$' . number_format($totalRevenue, 0) }}</div>
                    <div class="stat-label">Total Revenue</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">📅</div>
                        <div class="stat-trend trend-up">↑ 8.3%</div>
                    </div>
                    <div class="stat-value">{{ $totalBookings }}</div>
                    <div class="stat-label">Total Bookings</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">📊</div>
                        <div class="stat-trend trend-up">↑ 15.2%</div>
                    </div>
                    <div class="stat-value">{{ round($occupancyRate) }}%</div>
                    <div class="stat-label">Occupancy Rate</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">⭐</div>
                        <div class="stat-trend trend-up">↑ 0.3</div>
                    </div>
                    <div class="stat-value">4.8</div>
                    <div class="stat-label">Average Rating</div>
                </div>
            </div>

            <div class="chart-section">
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Revenue Trends (Last 30 Days)</h2>
                    </div>
                    <div style="position: relative; height: 350px; padding: 1.5rem 0;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Revenue by Room Type</h2>
                    </div>
                    <div style="position: relative; height: 350px; padding: 1.5rem 0; display: flex; justify-content: center; align-items: center;">
                        <canvas id="revenueByTypeChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="section" style="overflow: visible;">
                <div class="section-header">
                    <h2 class="section-title">Recent Activity</h2>
                </div>
                <div class="activity-feed" id="activityFeed">
                    <div class="empty-state">
                        <div class="empty-icon">📋</div>
                        <div class="empty-text">No recent activity</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div id="analytics" class="content-section" style="display: none;">
            <div class="header">
                <h1>Analytics</h1>
                <p>Detailed performance metrics</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📈</div>
                    <div class="stat-value" id="avgStayDuration">0</div>
                    <div class="stat-label">Avg. Stay (days)</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">💵</div>
                    <div class="stat-value" id="avgBookingValue">$0</div>
                    <div class="stat-label">Avg. Booking Value</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">🔄</div>
                    <div class="stat-value">23%</div>
                    <div class="stat-label">Return Guest Rate</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">⏱️</div>
                    <div class="stat-value">18</div>
                    <div class="stat-label">Lead Time (days)</div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem; margin-top: 2rem;">
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Bookings by Status</h2>
                    </div>
                    <div style="position: relative; height: 300px;">
                        <canvas id="bookingStatusChart"></canvas>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Room Occupancy by Type</h2>
                    </div>
                    <div style="position: relative; height: 300px;">
                        <canvas id="occupancyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Admin Section -->
        <div id="bookings-admin" class="content-section" style="display: none;">
            <div class="header">
                <h1>Booking Management</h1>
                <p>Complete reservation control</p>
            </div>

            <div class="table-section">
                <div class="section-header">
                    <h2 class="section-title">All Reservations</h2>
                </div>
                
                <div class="search-filter-bar">
                    <input type="text" class="search-box" placeholder="Search by guest name, email, or booking ID..." id="adminSearch" oninput="filterAdminBookings()">
                    <select class="filter-select" id="statusFilterAdmin" onchange="filterAdminBookings()">
                        <option value="all">All Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Checked-in">Checked-in</option>
                        <option value="Checked-out">Checked-out</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                    <button class="btn btn-primary">Export Report</button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest</th>
                                <th>Contact</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="adminBookingsBody">
                            @forelse($allBookings as $booking)
                            <tr>
                                <td><strong>#{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</strong></td>
                                <td>{{ $booking->user?->name ?? $booking->guest_name }}</td>
                                <td>{{ $booking->user?->email ?? $booking->guest_email }}</td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->check_in->format('M d, Y') }}</td>
                                <td>{{ $booking->check_out->format('M d, Y') }}</td>
                                <td>${{ number_format($booking->total_price, 2) }}</td>
                                <td><span class="status-badge status-{{ strtolower(str_replace('-', '_', $booking->status->value)) }}">{{ $booking->status->label() }}</span></td>
                                <td>
                                    <div class="action-buttons">
                                        @if($booking->status->value === 'pending')
                                            <button class="btn-action btn-confirm" onclick="updateBookingStatus({{ $booking->id }}, 'confirmed')">Confirm</button>
                                            <button class="btn-action btn-cancel" onclick="updateBookingStatus({{ $booking->id }}, 'no_show')">No Show</button>
                                            <button class="btn-action btn-delete" onclick="updateBookingStatus({{ $booking->id }}, 'cancelled')">Cancel</button>
                                        @elseif($booking->status->value === 'confirmed')
                                            <button class="btn-action btn-confirm" onclick="updateBookingStatus({{ $booking->id }}, 'checked_in')">Check-in</button>
                                        @elseif($booking->status->value === 'checked_in')
                                            <button class="btn-action btn-view" onclick="updateBookingStatus({{ $booking->id }}, 'checked_out')">Check-out</button>
                                        @else
                                            <span style="color: var(--text-secondary); font-size: 0.85rem;">No actions</span>
                                        @endif
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

        <!-- Staff Section -->
        <div id="staff" class="content-section" style="display: none;">
            <div class="header">
                <h1>Staff Management</h1>
                <p>Manage hotel staff and permissions</p>
            </div>

            <div class="table-section">
                <div class="section-header">
                    <h2 class="section-title">Staff Directory</h2>
                    <button class="btn btn-primary">Add New Staff</button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($staffMembers as $staff)
                            <tr>
                                <td><strong>{{ $staff->name }}</strong></td>
                                <td>Staff Member</td>
                                <td>Operations</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->phone ?? 'N/A' }}</td>
                                <td><span class="status-badge status-confirmed">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-edit">Edit</button>
                                        <button class="btn-action btn-delete">Remove</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-icon">👥</div>
                                        <div class="empty-text">No staff members found</div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Promo Codes Section -->
        <div id="promo-codes" class="content-section" style="display: none;">
            <div class="header">
                <h1>Promo Code Management</h1>
                <p>Create and manage promotional offers</p>
            </div>

            <div class="promo-section">
                <!-- Add New Promo Code Form -->
                <div class="add-promo-form">
                    <h2 class="form-title">Create New Promo Code</h2>
                    <form id="promoForm" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
                        <div class="form-group">
                            <label for="promoCode">Promo Code</label>
                            <input type="text" id="promoCode" name="code" placeholder="e.g., SUMMER20" required maxlength="20">
                        </div>
                        <div class="form-group">
                            <label for="discountPercent">Discount %</label>
                            <input type="number" id="discountPercent" name="discount_percent" placeholder="e.g., 20" min="0" max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="expiresAt">Expiration Date</label>
                            <input type="date" id="expiresAt" name="expires_at">
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" id="isActive" name="is_active" checked>
                                <span>Active</span>
                            </label>
                        </div>
                        <div style="display: flex; gap: 1rem; align-items: flex-end;">
                            <button type="submit" class="btn btn-primary">Create Promo Code</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </form>
                </div>

                <!-- Promo Codes List -->
                <div class="promo-list">
                    <h2 class="form-title">Active Promo Codes</h2>
                    <div id="promoCardsContainer" class="promo-cards-grid">
                        <div class="empty-state">
                            <div class="empty-icon">🎟️</div>
                            <div class="empty-text">No promo codes yet. Create your first one!</div>
                        </div>
                    </div>
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

    <script>
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

        function loadAdminData() {
            // Admin data now comes from server-side controller
            // This function is kept for backwards compatibility but data is rendered server-side
            
            // Only update elements if they exist
            const totalRevenueEl = document.getElementById('totalRevenue');
            const totalBookingsEl = document.getElementById('totalBookingsAdmin');
            const occupancyEl = document.getElementById('occupancyRate');
            
            // If these elements don't exist, the page is using server-rendered data already
            if (!totalRevenueEl || !totalBookingsEl || !occupancyEl) {
                return;
            }
            
            // Otherwise use localStorage as fallback (legacy system)
            const bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
            
            const totalRevenue = bookings.reduce((sum, booking) => {
                const price = parseInt(booking.price.replace('$', '')) || 0;
                const checkIn = new Date(booking.checkIn);
                const checkOut = new Date(booking.checkOut);
                const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                return sum + (price * nights);
            }, 0);

            const activeBookings = bookings.filter(b => ['Confirmed', 'Checked-in'].includes(b.status)).length;
            const occupancyRate = Math.round((activeBookings / 6) * 100);

            const avgStay = bookings.length > 0 ? 
                bookings.reduce((sum, booking) => {
                    const checkIn = new Date(booking.checkIn);
                    const checkOut = new Date(booking.checkOut);
                    return sum + Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                }, 0) / bookings.length : 0;

            const avgValue = bookings.length > 0 ? totalRevenue / bookings.length : 0;

            if (totalRevenueEl) totalRevenueEl.textContent = '$' + totalRevenue.toLocaleString();
            if (document.getElementById('roomRevenue')) document.getElementById('roomRevenue').textContent = '$' + totalRevenue.toLocaleString();
            if (totalBookingsEl) totalBookingsEl.textContent = bookings.length;
            if (occupancyEl) occupancyEl.textContent = occupancyRate + '%';
            if (document.getElementById('avgStayDuration')) document.getElementById('avgStayDuration').textContent = avgStay.toFixed(1);
            if (document.getElementById('avgBookingValue')) document.getElementById('avgBookingValue').textContent = '$' + avgValue.toFixed(0);

            displayAdminBookings(bookings);
            displayActivity(bookings);
        }

        function displayAdminBookings(bookings) {
            const tbody = document.getElementById('adminBookingsBody');

            if (bookings.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9"><div class="empty-state"><div class="empty-icon">📭</div><div class="empty-text">No bookings found</div></div></td></tr>`;
                return;
            }

            tbody.innerHTML = bookings.map((booking, index) => {
                const price = parseInt(booking.price.replace('$', ''));
                const checkIn = new Date(booking.checkIn);
                const checkOut = new Date(booking.checkOut);
                const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                const total = price * nights;

                return `
                    <tr>
                        <td><strong>#${String(index + 1).padStart(4, '0')}</strong></td>
                        <td><strong>${booking.guestName}</strong></td>
                        <td><div style="font-size: 0.9rem;">${booking.guestEmail}<br>${booking.guestPhone}</div></td>
                        <td>${booking.roomNumber}</td>
                        <td>${booking.checkIn}</td>
                        <td>${booking.checkOut}</td>
                        <td><strong>$${total}</strong></td>
                        <td><span class="status-badge status-${booking.status.toLowerCase().replace(/_/g, '-').replace(' ', '-')}">${formatStatus(booking.status)}</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action btn-edit">Edit</button>
                                <button class="btn-action btn-delete" onclick="deleteBooking(${index})">Delete</button>
                            </div>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        function displayActivity(bookings) {
            const feed = document.getElementById('activityFeed');
            
            if (bookings.length === 0) {
                feed.innerHTML = `<div class="empty-state"><div class="empty-icon">📋</div><div class="empty-text">No recent activity</div></div>`;
                return;
            }

            const recentBookings = bookings.slice(-10).reverse();
            feed.innerHTML = recentBookings.map(booking => {
                // Support both database format and localStorage format
                const bookingDate = new Date(booking.created_at || booking.bookingDate);
                const timeAgo = getTimeAgo(bookingDate);
                const roomNumber = booking.room?.room_number || booking.roomNumber || 'Unknown';
                
                // Format dates properly - handle both ISO strings and Date objects
                let checkIn = booking.check_in || booking.checkIn;
                let checkOut = booking.check_out || booking.checkOut;
                
                if (checkIn && typeof checkIn === 'string') {
                    checkIn = new Date(checkIn).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                }
                if (checkOut && typeof checkOut === 'string') {
                    checkOut = new Date(checkOut).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                }
                
                const guestName = booking.guest_name || booking.guestName;
                
                return `
                    <div class="activity-item">
                        <div class="activity-time">${timeAgo}</div>
                        <div class="activity-text">
                            <strong>${guestName}</strong> booked ${roomNumber} 
                            from ${checkIn} to ${checkOut}
                        </div>
                    </div>
                `;
            }).join('');
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

        function getTimeAgo(date) {
            const seconds = Math.floor((new Date() - date) / 1000);
            
            if (seconds < 60) return 'Just now';
            if (seconds < 3600) return Math.floor(seconds / 60) + ' minutes ago';
            if (seconds < 86400) return Math.floor(seconds / 3600) + ' hours ago';
            return Math.floor(seconds / 86400) + ' days ago';
        }

        function filterAdminBookings() {
            const search = document.getElementById('adminSearch').value.toLowerCase();
            const status = document.getElementById('statusFilterAdmin').value;
            const rows = document.querySelectorAll('#adminBookingsBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const statusMatch = status === 'all' || row.textContent.includes(status);
                const searchMatch = text.includes(search);
                
                row.style.display = (searchMatch && statusMatch) ? '' : 'none';
            });
        }

        function deleteBooking(index) {
            if (confirm('Are you sure you want to delete this booking?')) {
                const bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
                bookings.splice(index, 1);
                localStorage.setItem('hotelBookings', JSON.stringify(bookings));
                loadAdminData();
            }
        }

        loadAdminData();
        
        // Initialize recent activity with server-side data
        function initializeRecentActivity() {
            const recentActivityData = {!! json_encode($recentActivity) !!};
            if (recentActivityData && recentActivityData.length > 0) {
                displayActivity(recentActivityData);
            }
        }
        
        // Call immediately
        initializeRecentActivity();
        
        // Also reinitialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeRecentActivity);
        }

        // Promo Codes Management
        const promoForm = document.getElementById('promoForm');
        if (promoForm) {
            promoForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(promoForm);
                const data = {
                    code: formData.get('code').toUpperCase(),
                    discount_percent: formData.get('discount_percent'),
                    is_active: formData.get('is_active') ? 1 : 0,
                    expires_at: formData.get('expires_at') || null
                };

                try {
                    const response = await fetch('{{ route('promo-codes.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });

                    if (response.ok) {
                        const result = await response.json();
                        promoForm.reset();
                        loadPromoCodes();
                        alert('Promo code created successfully!');
                    } else {
                        alert('Error creating promo code');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Error creating promo code');
                }
            });
        }

        function loadPromoCodes() {
            const promoList = {!! json_encode($promoList ?? []) !!};
            const container = document.getElementById('promoCardsContainer');

            if (!promoList || promoList.length === 0) {
                container.innerHTML = `<div class="empty-state"><div class="empty-icon">🎟️</div><div class="empty-text">No promo codes yet. Create your first one!</div></div>`;
                return;
            }

            container.innerHTML = promoList.map(promo => {
                const expiryDate = promo.expires_at ? new Date(promo.expires_at) : null;
                const isExpired = expiryDate && expiryDate < new Date();
                const isActive = promo.is_active && !isExpired;
                
                let status = 'active';
                if (isExpired) status = 'expired';
                if (!promo.is_active) status = 'inactive';

                const expiryText = expiryDate 
                    ? expiryDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })
                    : 'No expiry';

                return `
                    <div class="promo-card">
                        <div class="promo-badge">${promo.discount_percent}% OFF</div>
                        <div class="promo-header">
                            <div class="promo-code-display">${promo.code}</div>
                            <div class="promo-discount-text">${promo.discount_percent}% discount on bookings</div>
                        </div>
                        <div class="promo-info">
                            <div class="promo-info-row">
                                <span class="promo-info-label">Discount:</span>
                                <span class="promo-info-value">${promo.discount_percent}%</span>
                            </div>
                            <div class="promo-info-row">
                                <span class="promo-info-label">Expires:</span>
                                <span class="promo-info-value">${expiryText}</span>
                            </div>
                            <div class="promo-info-row">
                                <span class="promo-info-label">Status:</span>
                                <span class="promo-status ${status}">${status.toUpperCase()}</span>
                            </div>
                        </div>
                        <div class="promo-card-actions">
                            <button class="btn-toggle" onclick="togglePromoStatus(${promo.id})">
                                ${isActive ? '🔴 Deactivate' : '🟢 Activate'}
                            </button>
                            <button class="btn-delete-promo" onclick="deletePromo(${promo.id})">Delete</button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function togglePromoStatus(promoId) {
            // This would require an API endpoint to toggle status
            console.log('Toggle promo:', promoId);
        }

        function deletePromo(promoId) {
            if (confirm('Are you sure you want to delete this promo code?')) {
                console.log('Delete promo:', promoId);
            }
        }

        // Load promo codes on page load
        loadPromoCodes();
        
        setInterval(loadAdminData, 30000);

        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initializeCharts, 100);
        });

        // Also initialize immediately if DOM is already loaded
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            setTimeout(initializeCharts, 100);
        }

        function initializeCharts() {
            // Prepare data
            const labels30Days = {!! json_encode($last30Days) !!};
            const revenue30Days = {!! json_encode($revenueData) !!};
            
            console.log('Chart Data:', {labels30Days, revenue30Days});

            // Revenue Trend Chart (Last 30 Days)
            const revenueCtx = document.getElementById('revenueChart');
            if (revenueCtx && labels30Days.length > 0) {
                const revenueCtx2d = revenueCtx.getContext('2d');
                new Chart(revenueCtx2d, {
                    type: 'line',
                    data: {
                        labels: labels30Days,
                        datasets: [{
                            label: 'Daily Revenue ($)',
                            data: revenue30Days,
                            borderColor: '#2563EB',
                            backgroundColor: 'rgba(37, 99, 235, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#2563EB',
                            pointBorderColor: '#FFFFFF',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { mode: 'index', intersect: false },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: '#0A1128',
                                    font: { size: 12, weight: 'bold' },
                                    usePointStyle: true,
                                    padding: 15
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { color: '#0A1128', stepSize: Math.max(1, Math.ceil(Math.max(...revenue30Days) / 5)) },
                                grid: { color: 'rgba(219, 234, 254, 0.5)', drawBorder: false }
                            },
                            x: {
                                ticks: { color: '#0A1128', maxRotation: 45, minRotation: 0 },
                                grid: { color: 'rgba(219, 234, 254, 0.3)', drawBorder: false }
                            }
                        }
                    }
                });
            }

            // Revenue by Room Type Chart
            const revenueByTypeCtx = document.getElementById('revenueByTypeChart');
            if (revenueByTypeCtx) {
                const categoryNames = {!! json_encode($revenueByCategory->pluck('name')) !!};
                const categoryRevenue = {!! json_encode($revenueByCategory->pluck('total')) !!};
                const colors = ['#2563EB', '#10B981', '#F59E0B', '#EF4444', '#06B6D4'];
                
                if (categoryNames.length > 0) {
                    const revenueByTypeCtx2d = revenueByTypeCtx.getContext('2d');
                    new Chart(revenueByTypeCtx2d, {
                    type: 'doughnut',
                    data: {
                        labels: categoryNames,
                        datasets: [{
                            data: categoryRevenue,
                            backgroundColor: colors.slice(0, categoryNames.length),
                            borderColor: '#FFFFFF',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: '#0A1128',
                                    font: { size: 12, weight: 'bold' },
                                    padding: 15
                                }
                            }
                        }
                    }
                    });
                }
            }

            // Bookings by Status Chart
            const statusCtx = document.getElementById('bookingStatusChart');
            if (statusCtx) {
                const statusLabels = {!! json_encode($bookingsByStatus->pluck('status')) !!};
                const statusCounts = {!! json_encode($bookingsByStatus->pluck('count')) !!};
                const statusColors = {
                    'pending': '#FCD34D',
                    'confirmed': '#A7F3D0',
                    'checked_in': '#BFDBFE',
                    'checked_out': '#D1D5DB',
                    'cancelled': '#FECACA'
                };
                
                if (statusLabels.length > 0) {
                    const statusCtx2d = statusCtx.getContext('2d');
                    new Chart(statusCtx2d, {
                    type: 'bar',
                    data: {
                        labels: statusLabels.map(s => s.charAt(0).toUpperCase() + s.slice(1).replace('_', ' ')),
                        datasets: [{
                            label: 'Number of Bookings',
                            data: statusCounts,
                            backgroundColor: statusLabels.map(s => statusColors[s] || '#2563EB'),
                            borderColor: '#0A1128',
                            borderWidth: 1.5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                labels: { color: '#0A1128', font: { size: 12, weight: 'bold' } }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { color: '#0A1128' },
                                grid: { color: 'rgba(219, 234, 254, 0.3)' }
                            },
                            x: {
                                ticks: { color: '#0A1128' },
                                grid: { color: 'rgba(219, 234, 254, 0.3)' }
                            }
                        }
                    }
                    });
                }
            }

            // Room Occupancy Chart
            const occupancyCtx = document.getElementById('occupancyChart');
            if (occupancyCtx) {
                const roomTypes = {!! json_encode($occupancyByType->pluck('name')) !!};
                const totalRooms = {!! json_encode($occupancyByType->pluck('total')) !!};
                const occupiedRooms = {!! json_encode($occupancyByType->pluck('occupied')) !!};
                
                if (roomTypes.length > 0) {
                    const occupancyCtx2d = occupancyCtx.getContext('2d');
                    new Chart(occupancyCtx2d, {
                    type: 'bar',
                    data: {
                        labels: roomTypes,
                        datasets: [
                            {
                                label: 'Occupied',
                                data: occupiedRooms,
                                backgroundColor: '#EF4444',
                                borderColor: '#991B1B',
                                borderWidth: 1.5
                            },
                            {
                                label: 'Available',
                                data: totalRooms.map((total, i) => total - occupiedRooms[i]),
                                backgroundColor: '#10B981',
                                borderColor: '#047857',
                                borderWidth: 1.5
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y',
                        plugins: {
                            legend: {
                                display: true,
                                labels: { color: '#0A1128', font: { size: 12, weight: 'bold' } }
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                                stacked: true,
                                ticks: { color: '#0A1128' },
                                grid: { color: 'rgba(219, 234, 254, 0.3)' }
                            },
                            y: {
                                stacked: true,
                                ticks: { color: '#0A1128' },
                                grid: { color: 'rgba(219, 234, 254, 0.3)' }
                            }
                        }
                    }
                    });
                }
            }
        }

        // Mark room as cleaned
        function markRoomCleaned(roomId, button) {
            console.log('markRoomCleaned called with roomId:', roomId);
            button.disabled = true;
            button.textContent = '⏳ Processing...';

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            console.log('CSRF Token:', csrfToken ? 'Present' : 'Missing');
            console.log('Sending request to:', `/rooms/${roomId}/mark-cleaned`);

            fetch(`/rooms/${roomId}/mark-cleaned`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken || ''
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    // Show success message
                    alert('✓ Room marked as cleaned and available!');
                    // Always reload to refresh the view with updated room data
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                    button.disabled = false;
                    button.textContent = '✓ Mark as Cleaned';
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Failed to mark room as cleaned: ' + error.message);
                button.disabled = false;
                button.textContent = '✓ Mark as Cleaned';
            });
        }

        // Update booking status
        function updateBookingStatus(bookingId, newStatus) {
            if (!confirm(`Update booking status to ${newStatus}?`)) {
                return;
            }

            const formData = new FormData();
            formData.append('status', newStatus);

            fetch(`/bookings/${bookingId}/update-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✓ Booking status updated successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to update booking'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update booking status');
            });
        }
    </script>
</body>
</html>
