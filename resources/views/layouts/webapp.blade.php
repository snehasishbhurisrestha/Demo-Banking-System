<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier Bank | Personal & Business Banking</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Merriweather + Inter (premium serif + sans combo) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* ===== PREMIUM BANKING DESIGN SYSTEM ===== */
        :root {
            --primary-navy: #0B1E33;      /* Deep navy - trust */
            --primary-gold: #B5944B;       /* Heritage gold - prestige */
            --secondary-slate: #2C3E50;     /* Slate - stability */
            --accent-teal: #1E4A5F;         /* Deep teal - growth */
            --neutral-ivory: #F8F7F4;       /* Warm ivory - luxury feel */
            --neutral-stone: #E8E6E1;       /* Stone - subtle */
            --neutral-charcoal: #2A2A2A;    /* Charcoal - text */
            --neutral-graphite: #4A4A4A;     /* Graphite - secondary text */
            --white: #FFFFFF;
            --shadow-elegant: 0 20px 40px -10px rgba(0,20,40,0.15), 0 8px 20px -8px rgba(0,0,0,0.1);
            --shadow-subtle: 0 10px 30px -5px rgba(0,20,40,0.08);
            --border-elegant: 1px solid rgba(181, 148, 75, 0.2);
            --gradient-gold: linear-gradient(135deg, #B5944B 0%, #D4B568 50%, #B5944B 100%);
            --gradient-navy: linear-gradient(135deg, #0B1E33 0%, #1A2F45 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--neutral-charcoal);
            background-color: var(--neutral-ivory);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        /* ===== NAVBAR - Sophisticated & Minimal ===== */
        .navbar {
            background: var(--white);
            padding: 1.2rem 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.02);
            border-bottom: 1px solid rgba(181, 148, 75, 0.15);
        }

        .navbar-brand {
            font-family: 'Merriweather', serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--primary-navy) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            color: var(--primary-gold);
            font-weight: 300;
            margin-left: 2px;
        }

        .nav-link {
            color: var(--secondary-slate) !important;
            font-weight: 500;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 1.2rem !important;
            margin: 0 0.2rem;
            position: relative;
            transition: color 0.3s;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--gradient-gold);
            transition: width 0.3s ease;
        }

        .nav-link:hover:after {
            width: 60%;
        }

        .nav-link:hover {
            color: var(--primary-gold) !important;
        }

        .btn-banking {
            background: var(--primary-navy);
            color: var(--white);
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s;
            border: 1px solid var(--primary-navy);
        }

        .btn-banking:hover {
            background: transparent;
            color: var(--primary-navy);
            border-color: var(--primary-gold);
        }

        .btn-outline-banking {
            background: transparent;
            border: 1px solid var(--primary-gold);
            color: var(--primary-gold);
            padding: 0.7rem 2rem;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .btn-outline-banking:hover {
            background: var(--primary-gold);
            color: var(--white);
            border-color: var(--primary-gold);
        }

        /* ===== HERO SECTION - Prestige Banking ===== */
        .hero-section {
            position: relative;
            background: var(--gradient-navy);
            color: var(--white);
            padding: 6rem 0 8rem;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 60%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
            background-size: 100px;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background: linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%);
        }

        .hero-badge {
            display: inline-block;
            background: rgba(181, 148, 75, 0.15);
            border: 1px solid rgba(181, 148, 75, 0.3);
            padding: 0.5rem 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--primary-gold);
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            font-family: 'Merriweather', serif;
        }

        .hero-section h1 .gold-text {
            color: var(--primary-gold);
            font-style: italic;
            font-weight: 300;
        }

        .hero-section p {
            font-size: 1.2rem;
            opacity: 0.85;
            margin-bottom: 2.5rem;
            max-width: 90%;
            font-weight: 300;
        }

        .hero-stats {
            margin-top: 4rem;
            display: flex;
            gap: 3rem;
        }

        .hero-stat-item {
            border-left: 2px solid var(--primary-gold);
            padding-left: 1.5rem;
        }

        .hero-stat-item .number {
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Merriweather', serif;
            color: var(--primary-gold);
            display: block;
        }

        .hero-stat-item .label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
        }

        /* ===== TRUST BADGES SECTION ===== */
        .trust-section {
            background: var(--white);
            padding: 2rem 0;
            border-bottom: var(--border-elegant);
        }

        .trust-badge {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--secondary-slate);
        }

        .trust-badge i {
            font-size: 2rem;
            color: var(--primary-gold);
        }

        .trust-badge span {
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== FEATURES SECTION ===== */
        .features-section {
            padding: 6rem 0;
            background: var(--neutral-ivory);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-subtitle {
            color: var(--primary-gold);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
        }

        .section-header h2 {
            font-size: 2.8rem;
            color: var(--primary-navy);
            margin-bottom: 1.5rem;
        }

        .section-header p {
            color: var(--neutral-graphite);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .feature-card {
            background: var(--white);
            padding: 3rem 2rem;
            border: var(--border-elegant);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            height: 100%;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-gold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-elegant);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: rgba(181, 148, 75, 0.05);
            border: var(--border-elegant);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .feature-icon i {
            font-size: 2rem;
            color: var(--primary-gold);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-navy);
        }

        .feature-card p {
            color: var(--neutral-graphite);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .feature-link {
            color: var(--primary-gold);
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-link:hover {
            gap: 1rem;
            color: var(--primary-navy);
        }

        /* ===== WEALTH MANAGEMENT SECTION ===== */
        .wealth-section {
            padding: 6rem 0;
            background: var(--white);
        }

        .wealth-card {
            background: var(--neutral-ivory);
            padding: 2.5rem;
            border: var(--border-elegant);
            height: 100%;
            transition: all 0.3s;
        }

        .wealth-card:hover {
            box-shadow: var(--shadow-subtle);
        }

        .wealth-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(181, 148, 75, 0.2);
        }

        .wealth-header h4 {
            margin: 0;
            color: var(--primary-navy);
        }

        .wealth-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-navy);
            margin-bottom: 1.5rem;
        }

        .wealth-change {
            color: #2E7D32;
            background: rgba(46, 125, 50, 0.1);
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .wealth-details {
            margin-top: 1.5rem;
        }

        .wealth-detail-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px dashed rgba(0,0,0,0.05);
        }

        /* ===== DASHBOARD PREVIEW ===== */
        .dashboard-preview {
            padding: 4rem 0;
            background: var(--gradient-navy);
            color: var(--white);
        }

        .balance-cards {
            margin-top: 2rem;
        }

        .balance-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 2rem;
            border-radius: 0;
            transition: all 0.3s;
        }

        .balance-card:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-5px);
        }

        .balance-card .currency {
            color: var(--primary-gold);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
        }

        .balance-card .amount {
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Merriweather', serif;
            margin-bottom: 1.5rem;
        }

        .balance-card .account-number {
            font-size: 0.85rem;
            opacity: 0.7;
            letter-spacing: 1px;
        }

        /* ===== TRANSACTION HISTORY ===== */
        .transaction-item {
            background: var(--white);
            padding: 1rem 1.5rem;
            border: var(--border-elegant);
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s;
        }

        .transaction-item:hover {
            background: var(--neutral-ivory);
            border-color: var(--primary-gold);
        }

        .transaction-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            background: rgba(181, 148, 75, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .transaction-details h6 {
            margin: 0;
            font-size: 0.95rem;
            color: var(--primary-navy);
        }

        .transaction-details small {
            color: var(--neutral-graphite);
            font-size: 0.8rem;
        }

        .transaction-amount {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .transaction-amount.positive {
            color: #2E7D32;
        }

        .transaction-amount.negative {
            color: #C62828;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--primary-navy);
            color: var(--white);
            padding: 5rem 0 2rem;
            border-top: 3px solid var(--primary-gold);
        }

        .footer h5 {
            color: var(--primary-gold);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--primary-gold);
        }

        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
        }

        /* ===== MODALS ===== */
        .modal-content {
            border: none;
            border-radius: 0;
        }

        .modal-header {
            background: var(--primary-navy);
            color: var(--white);
            border-radius: 0;
            padding: 1.5rem;
            border: none;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-control, .form-select {
            border-radius: 0;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(181, 148, 75, 0.25);
        }

        /* ===== UTILITY CLASSES ===== */
        .gold-text {
            color: var(--primary-gold);
        }

        .navy-bg {
            background: var(--primary-navy);
        }

        .dashboard {
            display: none;
            padding: 3rem 0;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
            }
            .section-header h2 {
                font-size: 2rem;
            }
        }
    </style>

    @yield('style')
</head>
<body>

    <!-- NAVBAR -->
    @include('layouts.web-include.header')

    @yield('content')

    <!-- FOOTER -->
    @include('layouts.web-include.footer')
    

</body>
</html>
