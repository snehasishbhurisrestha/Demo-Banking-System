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

    .stat-item {
      text-align: center;
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

    /* DARK BAND */
    .dark-band {
      background: var(--navy);
      padding: 3.5rem 0;
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
      color: rgba(255, 255, 255, 0.7);
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
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      text-align: center;
      color: rgba(255, 255, 255, 0.5);
      font-size: 0.85rem;
    }

    .db-item {
      text-align: center;
      padding: 1.5rem;
    }

    .db-icon {
      font-size: 2rem;
      color: var(--gold);
      margin-bottom: 0.8rem;
    }

    .db-item h5 {
      color: #fff;
      margin-bottom: 0.4rem;
      font-size: 1rem;
    }

    .db-item p {
      color: rgba(255, 255, 255, 0.6);
      font-size: 0.83rem;
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
<section class="hero text-center">
    <div class="container" data-aos="fade-up">
      <div class="badge-pill">Business Banking</div>
      <h1 style="font-size:3rem;line-height:1.2;margin-bottom:1rem;">Treasury <span
          style="color:var(--gold);font-style:italic;font-weight:300;">Management</span></h1>
      <p style="opacity:0.8;max-width:560px;margin:0 auto 2rem;">Intelligent cash management, payments, and liquidity
        solutions — optimise every dollar your business holds.</p>
      <div class="d-flex gap-3 justify-content-center">
        <button class="btn-b" style="padding:0.8rem 2rem;" onclick="openModal()">Get Started</button>
      </div>
    </div>
  </section>

  <div class="stats-strip" data-aos="fade-up">
    <div class="container">
      <div class="row g-3 text-center">
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">$4.2T</span><span class="lbl">Payments Processed</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">99.99%</span><span class="lbl">Platform Uptime</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">180+</span><span class="lbl">Currencies Supported</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">24/7</span><span class="lbl">Operations Centre</span></div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up"><span class="sec-sub">Solutions</span>
        <h2 style="color:var(--navy);">Complete Treasury Suite</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-coins"></i></div>
            <h5>Cash Management</h5>
            <p>Automated sweeps, zero-balance accounts, and concentration banking to maximise yield on idle cash.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-paper-plane"></i></div>
            <h5>Payments & Collections</h5>
            <p>ACH, wire, SWIFT, real-time payments, and integrated receivables across all channels.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-water"></i></div>
            <h5>Liquidity Management</h5>
            <p>Multi-bank notional pooling, cross-currency sweeps, and intraday credit facilities.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-shield-alt"></i></div>
            <h5>FX Risk Management</h5>
            <p>Hedging strategies using forwards, options, and swaps to protect against currency volatility.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <h5>Trade Finance</h5>
            <p>Documentary credits, guarantees, and supply chain finance integrated with treasury operations.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-laptop"></i></div>
            <h5>Online Treasury Portal</h5>
            <p>Single-platform visibility across all accounts, transactions, and FX positions in real time.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="dark-band" data-aos="fade-up">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3">
          <div class="db-item">
            <div class="db-icon"><i class="fas fa-bolt"></i></div>
            <h5>Real-Time Payments</h5>
            <p>Instant payment rails in 38 countries, 24/7/365.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="db-item">
            <div class="db-icon"><i class="fas fa-lock"></i></div>
            <h5>Bank-Grade Security</h5>
            <p>Multi-factor auth, fraud monitoring, and end-to-end encryption.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="db-item">
            <div class="db-icon"><i class="fas fa-plug"></i></div>
            <h5>ERP Integration</h5>
            <p>Native connectors for SAP, Oracle, NetSuite, and more.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="db-item">
            <div class="db-icon"><i class="fas fa-headset"></i></div>
            <h5>Dedicated Support</h5>
            <p>Named treasury specialist on call for your team.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="cta" style="margin-top:0;">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
      <div class="badge-pill">Get in Touch</div>
      <h2 style="color:#fff;font-size:2.2rem;margin-bottom:0.8rem;">Optimise Your Cash Flow Today</h2>
      <p style="color:rgba(255,255,255,0.7);max-width:480px;margin:0 auto 2rem;">Our treasury specialists will analyse
        your current setup and identify savings opportunities — at no cost.</p>
      <button class="btn-b" style="padding:0.9rem 2.5rem;" onclick="openModal()">Free Treasury Review</button>
    </div>
  </section>
@endsection