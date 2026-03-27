@extends('layouts.webapp')

@section('style')
<style>
        :root {
            --navy: #0B1E33;
            --gold: #B5944B;
            --slate: #2C3E50;
            --ivory: #F8F7F4;
            --charcoal: #2A2A2A;
            --graphite: #4A4A4A;
            --shadow: 0 20px 40px -10px rgba(0, 20, 40, 0.15);
            --border: 1px solid rgba(181, 148, 75, 0.2);
            --ggold: linear-gradient(135deg, #B5944B 0%, #D4B568 50%, #B5944B 100%);
            --gnavy: linear-gradient(135deg, #0B1E33 0%, #1A2F45 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--charcoal);
            background: var(--ivory);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .navbar {
            background: #fff;
            padding: 1.2rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02);
            border-bottom: 1px solid rgba(181, 148, 75, 0.15);
        }

        .navbar-brand {
            font-family: 'Merriweather', serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--navy) !important;
        }

        .navbar-brand span {
            color: var(--gold);
            font-weight: 300;
        }

        .nav-link {
            color: var(--slate) !important;
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem !important;
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
            background: var(--ggold);
            transition: width 0.3s;
        }

        .nav-link:hover:after {
            width: 60%;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        .btn-b {
            background: var(--navy);
            color: #fff;
            border: 1px solid var(--navy);
            padding: 0.65rem 1.8rem;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.82rem;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-b:hover {
            background: transparent;
            color: var(--navy);
            border-color: var(--gold);
        }

        .btn-ob {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 0.65rem 1.8rem;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.82rem;
            transition: all 0.3s;
            cursor: pointer;
        }

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

        .btn-ob:hover {
            background: var(--gold);
            color: #fff;
        }

        .hero {
            background: var(--gnavy);
            color: #fff;
            padding: 5rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 55%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
            background-size: 80px;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: linear-gradient(to top right, transparent 49%, var(--ivory) 50%);
        }

        .badge-pill {
            display: inline-block;
            background: rgba(181, 148, 75, 0.15);
            border: 1px solid rgba(181, 148, 75, 0.3);
            padding: 0.4rem 1.2rem;
            margin-bottom: 1.2rem;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
        }

        .section {
            padding: 4rem 0;
        }

        .sec-sub {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            display: block;
        }

        .stats-strip {
            background: var(--navy);
            padding: 2.5rem 0;
            border-top: 3px solid var(--gold);
            border-bottom: 3px solid var(--gold);
        }

        .stat-item .num {
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Merriweather', serif;
            color: var(--gold);
            display: block;
        }

        .stat-item .lbl {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.65);
        }

        .svc-card {
            background: #fff;
            border: var(--border);
            padding: 2rem;
            height: 100%;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .svc-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--ggold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .svc-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
        }

        .svc-card:hover::before {
            transform: scaleX(1);
        }

        .svc-icon {
            width: 52px;
            height: 52px;
            background: rgba(181, 148, 75, 0.08);
            border: var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
        }

        .svc-icon i {
            color: var(--gold);
            font-size: 1.25rem;
        }

        .svc-card h5 {
            color: var(--navy);
            margin-bottom: 0.6rem;
            font-size: 1.05rem;
        }

        .svc-card p {
            color: var(--graphite);
            font-size: 0.87rem;
            margin: 0;
        }

        /* TICKER */
        .ticker-wrap {
            background: var(--navy);
            border-top: 1px solid rgba(181, 148, 75, 0.2);
            border-bottom: 1px solid rgba(181, 148, 75, 0.2);
            padding: 0.7rem 0;
            overflow: hidden;
        }

        .ticker {
            display: flex;
            gap: 3rem;
            animation: ticker 25s linear infinite;
            white-space: nowrap;
        }

        @keyframes ticker {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .tick-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.82rem;
        }

        .tick-sym {
            color: var(--gold);
            font-weight: 700;
            font-family: 'Merriweather', serif;
        }

        .tick-val {
            color: #fff;
        }

        .tick-chg.up {
            color: #4ade80;
        }

        .tick-chg.dn {
            color: #f87171;
        }

        /* ASSET GRID */
        .asset-box {
            background: #fff;
            border: var(--border);
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s;
        }

        .asset-box:hover {
            box-shadow: 0 8px 24px rgba(0, 20, 40, 0.08);
        }

        .asset-icon {
            width: 44px;
            height: 44px;
            background: rgba(181, 148, 75, 0.08);
            border: var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .asset-icon i {
            color: var(--gold);
        }

        .asset-name {
            font-weight: 600;
            color: var(--navy);
            font-size: 0.95rem;
        }

        .asset-desc {
            font-size: 0.82rem;
            color: var(--graphite);
        }

        .asset-badge {
            margin-left: auto;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: rgba(181, 148, 75, 0.1);
            border: 1px solid rgba(181, 148, 75, 0.25);
            color: var(--gold);
            padding: 0.2rem 0.7rem;
            white-space: nowrap;
        }

        .cta {
            background: var(--gnavy);
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" stroke="%23B5944B" fill="none"/></svg>') center/120px repeat;
        }

        .footer {
            background: var(--navy);
            color: #fff;
            padding: 4rem 0 2rem;
            border-top: 3px solid var(--gold);
        }

        .footer h5 {
            color: var(--gold);
            margin-bottom: 1.2rem;
            font-size: 1rem;
        }

        .fl {
            list-style: none;
            padding: 0;
        }

        .fl li {
            margin-bottom: 0.6rem;
        }

        .fl a {
            color: rgba(255, 255, 255, 0.65);
            text-decoration: none;
            font-size: 0.88rem;
            transition: color 0.3s;
        }

        .fl a:hover {
            color: var(--gold);
        }

        .fb {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.8rem;
        }

        .modal-content {
            border: none;
            border-radius: 0;
        }

        .modal-header {
            background: var(--navy);
            color: #fff;
            border-radius: 0;
            padding: 1.4rem;
            border: none;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-control,
        .form-select {
            border-radius: 0;
            border: 1px solid rgba(0, 0, 0, 0.12);
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(181, 148, 75, 0.2);
        }
    </style>
@endsection

@section('content')
<!-- LIVE TICKER -->
    <div class="ticker-wrap">
        <div class="ticker">
            <span class="tick-item"><span class="tick-sym">S&P 500</span><span class="tick-val">5,842.47</span><span
                    class="tick-chg up">▲ +0.38%</span></span>
            <span class="tick-item"><span class="tick-sym">EUR/USD</span><span class="tick-val">1.0821</span><span
                    class="tick-chg dn">▼ -0.12%</span></span>
            <span class="tick-item"><span class="tick-sym">GOLD</span><span class="tick-val">$3,022</span><span
                    class="tick-chg up">▲ +0.54%</span></span>
            <span class="tick-item"><span class="tick-sym">GBP/USD</span><span class="tick-val">1.2964</span><span
                    class="tick-chg up">▲ +0.08%</span></span>
            <span class="tick-item"><span class="tick-sym">WTI OIL</span><span class="tick-val">$72.18</span><span
                    class="tick-chg dn">▼ -0.31%</span></span>
            <span class="tick-item"><span class="tick-sym">10Y UST</span><span class="tick-val">4.28%</span><span
                    class="tick-chg up">▲ +2bps</span></span>
            <span class="tick-item"><span class="tick-sym">S&P 500</span><span class="tick-val">5,842.47</span><span
                    class="tick-chg up">▲ +0.38%</span></span>
            <span class="tick-item"><span class="tick-sym">EUR/USD</span><span class="tick-val">1.0821</span><span
                    class="tick-chg dn">▼ -0.12%</span></span>
            <span class="tick-item"><span class="tick-sym">GOLD</span><span class="tick-val">$3,022</span><span
                    class="tick-chg up">▲ +0.54%</span></span>
            <span class="tick-item"><span class="tick-sym">GBP/USD</span><span class="tick-val">1.2964</span><span
                    class="tick-chg up">▲ +0.08%</span></span>
            <span class="tick-item"><span class="tick-sym">WTI OIL</span><span class="tick-val">$72.18</span><span
                    class="tick-chg dn">▼ -0.31%</span></span>
            <span class="tick-item"><span class="tick-sym">10Y UST</span><span class="tick-val">4.28%</span><span
                    class="tick-chg up">▲ +2bps</span></span>
        </div>
    </div>

    <section class="hero text-center">
        <div class="container" data-aos="fade-up">
            <div class="badge-pill">Capital Markets</div>
            <h1 style="font-size:3rem;line-height:1.2;margin-bottom:1rem;">Premier <span
                    style="color:var(--gold);font-style:italic;font-weight:300;">Markets</span></h1>
            <p style="opacity:0.8;max-width:560px;margin:0 auto 2rem;">Institutional-grade access to global capital
                markets — equities, fixed income, FX, derivatives, and alternative assets.</p>
            <div class="d-flex gap-3 justify-content-center">
                <button class="btn-b" style="padding:0.8rem 2rem;" onclick="openModal()">Contact Sales</button>
                <!-- <button class="btn-ob"
                    style="padding:0.8rem 2rem;border-color:rgba(181,148,75,0.5);color:var(--gold);">Market
                    Commentary</button> -->
            </div>
        </div>
    </section>

    <div class="stats-strip" data-aos="fade-up">
        <div class="container">
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="num">$80B+</span><span class="lbl">Daily Volume</span></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="num">180+</span><span class="lbl">Currencies</span></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="num">Top 5</span><span class="lbl">FX Dealer — Americas</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="num">500+</span><span class="lbl">Institutional Clients</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up"><span class="sec-sub">Asset Classes</span>
                <h2 style="color:var(--navy);">Trade Across All Markets</h2>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-chart-line"></i></div>
                        <h5>Equities</h5>
                        <p>Global equity trading, prime brokerage, and equity derivatives across all major exchanges and
                            OTC markets.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-percentage"></i></div>
                        <h5>Fixed Income</h5>
                        <p>Treasuries, corporates, municipals, EM bonds, and structured credit with deep liquidity and
                            tight spreads.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-globe"></i></div>
                        <h5>Foreign Exchange</h5>
                        <p>Spot, forwards, swaps, and options in 180+ currencies. Algorithmic and voice execution
                            available.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-shield-alt"></i></div>
                        <h5>Derivatives</h5>
                        <p>Interest rate swaps, credit default swaps, FX options, and structured products for hedging
                            and yield.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-cube"></i></div>
                        <h5>Commodities</h5>
                        <p>Energy, metals, and agricultural futures and OTC derivatives with physical settlement
                            capability.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="fas fa-search-dollar"></i></div>
                        <h5>Research & Strategy</h5>
                        <p>Award-winning macro and sector research from 120+ analysts across 38 markets.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mb-3" data-aos="fade-up"><span class="sec-sub">Execution</span>
                <h2 style="color:var(--navy);">How We Execute</h2>
            </div>
            <div data-aos="fade-up">
                <div class="asset-box">
                    <div class="asset-icon"><i class="fas fa-robot"></i></div>
                    <div>
                        <div class="asset-name">Algorithmic Trading</div>
                        <div class="asset-desc">VWAP, TWAP, implementation shortfall, and custom algos via direct market
                            access.</div>
                    </div>
                    <div class="asset-badge">Electronic</div>
                </div>
                <div class="asset-box">
                    <div class="asset-icon"><i class="fas fa-phone"></i></div>
                    <div>
                        <div class="asset-name">Voice Execution</div>
                        <div class="asset-desc">Dedicated sales traders for large blocks, structured products, and
                            bespoke strategies.</div>
                    </div>
                    <div class="asset-badge">High-Touch</div>
                </div>
                <div class="asset-box">
                    <div class="asset-icon"><i class="fas fa-project-diagram"></i></div>
                    <div>
                        <div class="asset-name">Dark Pool & Crossing</div>
                        <div class="asset-desc">Reduce market impact with access to Premier's internal liquidity pools
                            and ATS network.</div>
                    </div>
                    <div class="asset-badge">Alternative</div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
            <div class="badge-pill">Institutional Sales</div>
            <h2 style="color:#fff;font-size:2.2rem;margin-bottom:0.8rem;">Access Global Markets</h2>
            <p style="color:rgba(255,255,255,0.7);max-width:480px;margin:0 auto 2rem;">Speak with our markets team to
                discuss execution, research, and capital markets solutions.</p>
            <button class="btn-b" style="padding:0.9rem 2.5rem;" onclick="openModal()">Contact Markets Team</button>
        </div>
    </section>
@endsection