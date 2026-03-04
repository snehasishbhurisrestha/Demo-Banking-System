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
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Premier<span>Bank</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Personal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#business">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="#wealth">Wealth</a></li>
                    <li class="nav-item"><a class="nav-link" href="#insights">Insights</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                </ul>
                <div class="d-flex gap-2">

                    @guest
                    <button class="btn btn-outline-banking" onclick="showLogin()">Sign In</button>
                    <button class="btn btn-banking" onclick="showSignup()">Open Account</button>
                    @endguest

                    @auth
                    <a class="btn btn-outline-banking" href="{{ route('dashboard') }}">Dashboard</a>
                    
                    <a class="btn btn-banking" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="hero-badge">EST. 1885 • PRIVATE BANKING</div>
                    <h1>Banking with<br><span class="gold-text">heritage</span> & integrity</h1>
                    <p>For over 135 years, Premier Bank has provided exceptional financial services to generations of families and businesses. Experience banking built on trust.</p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-banking btn-lg" onclick="showSignup()">Open an Account</button>
                        <button class="btn btn-outline-banking btn-lg">Talk to an Advisor</button>
                    </div>
                    <div class="hero-stats">
                        <div class="hero-stat-item">
                            <span class="number">$127B</span>
                            <span class="label">Assets under management</span>
                        </div>
                        <div class="hero-stat-item">
                            <span class="number">2.3M</span>
                            <span class="label">Trusted clients</span>
                        </div>
                        <div class="hero-stat-item">
                            <span class="number">135+</span>
                            <span class="label">Years of service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST BADGES -->
    <section class="trust-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>FDIC Insured</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-lock"></i>
                        <span>256-bit Encryption</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-chart-line"></i>
                        <span>$0 Monthly Fees</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-clock"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features-section" id="personal">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Premium Banking</span>
                <h2>Designed for your financial future</h2>
                <p>From everyday banking to wealth management, experience service that puts you first.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <h3>Personal Banking</h3>
                        <p>Premium checking, savings, and lending solutions tailored to your lifestyle with exclusive benefits.</p>
                        <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business Banking</h3>
                        <p>Commercial lending, treasury management, and growth capital for businesses of all sizes.</p>
                        <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Wealth Management</h3>
                        <p>Private banking, investment advisory, and legacy planning for high-net-worth individuals.</p>
                        <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WEALTH MANAGEMENT SECTION -->
    <section class="wealth-section" id="wealth">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Wealth Management</span>
                <h2>Preserve and grow your legacy</h2>
                <p>Our private bankers provide sophisticated strategies for multi-generational wealth.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Global Equity</h4>
                            <span class="wealth-change">+12.4%</span>
                        </div>
                        <div class="wealth-value">$2.4M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>8.2%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>Moderate</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Dividend Yield</span>
                                <span>2.3%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Fixed Income</h4>
                            <span class="wealth-change">+4.1%</span>
                        </div>
                        <div class="wealth-value">$1.8M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>4.5%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>Low</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Duration</span>
                                <span>5.2 yrs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Private Equity</h4>
                            <span class="wealth-change">+18.7%</span>
                        </div>
                        <div class="wealth-value">$3.1M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>14.3%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>High</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Lock-up Period</span>
                                <span>5 yrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD PREVIEW -->
    <section class="dashboard-preview" id="dashboard-preview">
        <div class="container">
            <div class="section-header text-white">
                <span class="section-subtitle">Digital Banking</span>
                <h2 class="text-white">Your accounts at a glance</h2>
                <p class="text-white-50">Secure, intuitive, and always accessible.</p>
            </div>
            <div class="row g-4 balance-cards">
                <div class="col-md-6">
                    <div class="balance-card">
                        <div class="currency">USD • CHECKING</div>
                        <div class="amount">$47,582.40</div>
                        <div class="account-number">•••• 4582</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="balance-card">
                        <div class="currency">EUR • SAVINGS</div>
                        <div class="amount">€32,190.75</div>
                        <div class="account-number">•••• 7912</div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="text-white mb-4">Recent transactions</h4>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-shopping-cart gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Whole Foods Market</h6>
                                <small>Mar 15, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount negative">-$234.56</div>
                    </div>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-wireless gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Wire Transfer</h6>
                                <small>Mar 14, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount positive">+$5,000.00</div>
                    </div>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-building gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Salary Deposit</h6>
                                <small>Mar 12, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount positive">+$8,250.00</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- USER DASHBOARD (Hidden by default) -->
    <section class="dashboard" id="userDashboard">
        <div class="container">
            <h2 class="mb-4">Welcome back, <span id="userName" class="gold-text"></span></h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="balance-card navy-bg text-white">
                        <div class="currency">USD • CHECKING</div>
                        <div class="amount" id="usdBalance">$0.00</div>
                        <button class="btn btn-outline-banking btn-sm mt-3" onclick="showTransferModal()">Transfer</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="balance-card" style="background: var(--accent-teal); color: white;">
                        <div class="currency">EUR • SAVINGS</div>
                        <div class="amount" id="eurBalance">€0.00</div>
                        <button class="btn btn-outline-banking btn-sm mt-3" onclick="showTransferModal()">Transfer</button>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4>Transaction history</h4>
                <div id="transactionList"></div>
            </div>
        </div>
    </section>

    <!-- ADMIN DASHBOARD -->
    <section class="dashboard" id="adminDashboard">
        <div class="container">
            <h2 class="mb-4">Private Banking Administration</h2>
            <div class="admin-panel" style="background: white; padding: 2rem; border: var(--border-elegant);">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Client portfolio</h4>
                    <button class="btn btn-banking" onclick="showNewUserModal()">Add Client</button>
                </div>
                <div id="userList"></div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer" style="margin: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>PremierBank</h5>
                    <p style="color: rgba(255,255,255,0.7);">Private banking since 1885. Member FDIC. Equal Housing Lender.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Personal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Checking</a></li>
                        <li><a href="#">Savings</a></li>
                        <li><a href="#">Credit Cards</a></li>
                        <li><a href="#">Lending</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Business</h5>
                    <ul class="footer-links">
                        <li><a href="#">Commercial</a></li>
                        <li><a href="#">Treasury</a></li>
                        <li><a href="#">Lending</a></li>
                        <li><a href="#">Markets</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Wealth</h5>
                    <ul class="footer-links">
                        <li><a href="#">Private Banking</a></li>
                        <li><a href="#">Investment</a></li>
                        <li><a href="#">Trust</a></li>
                        <li><a href="#">Estate Planning</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>About</h5>
                    <ul class="footer-links">
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Leadership</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 Premier Bank. All rights reserved. | Privacy | Terms | Security</p>
            </div>
        </div>
    </footer>

    <!-- MODALS -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in to PremierBank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-banking w-100">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Open an account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-banking w-100">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- OTP Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verify your identity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">We've sent a verification code to your email.</p>
                    <form id="otpForm">
                        @csrf
                        <input type="hidden" name="name">
                        <input type="hidden" name="email">
                        <input type="hidden" name="phone">
                        <input type="hidden" name="password">
                        <div class="mb-3">
                            <label class="form-label">Enter OTP</label>
                            <input type="text" name="otp" class="form-control" maxlength="6" required>
                        </div>
                        <button type="submit" class="btn btn-banking w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Transfer Modal -->
    <div class="modal fade" id="transferModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Initiate transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-shield-alt me-2"></i> For your security, please call our private banking line to complete transfers over $10,000.
                    </div>
                    <p><strong>Private Banking:</strong> 1-800-555-0199</p>
                    <p><strong>Email:</strong> privatebanking@premier.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin New User Modal -->
    <div class="modal fade" id="newUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newUserForm">
                        <div class="mb-3">
                            <label class="form-label">Full name</label>
                            <input type="text" class="form-control" id="newUserName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="newUserPhone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="newUserEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" id="newUserAddress" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Initial deposit currency</label>
                            <select class="form-select" id="newUserCurrency">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Initial amount</label>
                            <input type="number" class="form-control" id="newUserAmount" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-banking w-100">Create client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Modal (Admin) -->
    <div class="modal fade" id="depositModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Process deposit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="depositForm">
                        <input type="hidden" id="depositUserId">
                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" id="depositUserName" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select id="depositCurrency" class="form-select">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" id="depositAmount" step="0.01" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-banking w-100">Process deposit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- toast message -->
    <script src="{{ asset('assets/admin-assets/plugins/toast/toastr.js') }}"></script>
    <script src="{{ asset('assets/admin-assets/js/toastr.init.js') }}"></script>
    <!-- toast message -->
    @include('layouts._massages')


    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        function showLogin() { new bootstrap.Modal(document.getElementById('loginModal')).show(); }
        function showSignup() { new bootstrap.Modal(document.getElementById('signupModal')).show(); }

    </script> 
    <script>

        $('#signupForm').submit(function(e){

            e.preventDefault();

            let form = $(this);

            let submitBtn = form.find('button[type="submit"]');

            // Disable button and show loading
            submitBtn.prop('disabled', true).text('Sending OTP...');

            let formData = form.serialize();

            $.post("{{ route('send.otp') }}", formData, function(res){

                if(res.status)
                {

                    let name = form.find('input[name="name"]').val();
                    let email = form.find('input[name="email"]').val();
                    let phone = form.find('input[name="phone"]').val();
                    let password = form.find('input[name="password"]').val();
                    let password_confirmation = form.find('input[name="password_confirmation"]').val();

                    $('#otpForm input[name="name"]').val(name);
                    $('#otpForm input[name="email"]').val(email);
                    $('#otpForm input[name="phone"]').val(phone);
                    $('#otpForm input[name="password"]').val(password);
                    $('#otpForm input[name="password_confirmation"]').val(password_confirmation);

                    $('#signupModal').modal('hide');
                    $('#otpModal').modal('show');

                }
                else
                {
                    alert(res.message || 'Failed to send OTP');
                }

            })
            .fail(function(){

                alert('Server error. Please try again.');

            })
            .always(function(){

                // Enable button and restore text
                submitBtn.prop('disabled', false).text('Sign Up');

            });

        });





        $('#otpForm').submit(function(e){

            e.preventDefault();

            $.post("{{ route('verify.otp') }}", $(this).serialize(), function(res){

                if(res.status)
                {
                    showToast('success', 'Success', 'Registration successful');

                    setTimeout(function(){

                        window.location.href = "{{ route('dashboard') }}";

                    }, 1000); // 1000ms = 1 second

                }
                else
                {
                    showToast('error', 'Error', res.message);
                }

            });

        });

    </script>

</body>
</html>
