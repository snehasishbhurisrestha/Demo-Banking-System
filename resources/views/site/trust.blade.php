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

    .trust-card {
      background: #fff;
      border: var(--border);
      padding: 2rem;
      height: 100%;
      transition: all 0.4s;
      position: relative;
      overflow: hidden;
    }

    .trust-card::before {
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

    .trust-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow);
    }

    .trust-card:hover::before {
      transform: scaleX(1);
    }

    .tc-icon {
      width: 52px;
      height: 52px;
      background: rgba(181, 148, 75, 0.08);
      border: var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.2rem;
    }

    .tc-icon i {
      color: var(--gold);
      font-size: 1.25rem;
    }

    .trust-card h5 {
      color: var(--navy);
      margin-bottom: 0.5rem;
      font-size: 1.05rem;
    }

    .trust-card p {
      color: var(--graphite);
      font-size: 0.86rem;
      margin: 0;
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

    /* TRUST TYPES */
    .type-row {
      background: #fff;
      border: var(--border);
      padding: 1.5rem 2rem;
      margin-bottom: 0.8rem;
      display: flex;
      gap: 1.5rem;
      align-items: flex-start;
      transition: all 0.3s;
    }

    .type-row:hover {
      box-shadow: 0 6px 20px rgba(0, 20, 40, 0.08);
      border-left: 3px solid var(--gold);
    }

    .type-icon {
      width: 40px;
      height: 40px;
      background: rgba(181, 148, 75, 0.08);
      border: var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .type-icon i {
      color: var(--gold);
      font-size: 0.9rem;
    }

    .type-row h6 {
      color: var(--navy);
      margin-bottom: 0.2rem;
      font-family: 'Merriweather', serif;
      font-size: 0.95rem;
    }

    .type-row p {
      color: var(--graphite);
      font-size: 0.83rem;
      margin: 0;
    }

    .type-badge {
      margin-left: auto;
      font-size: 0.7rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      background: rgba(181, 148, 75, 0.1);
      border: var(--border);
      color: var(--gold);
      padding: 0.15rem 0.6rem;
      white-space: nowrap;
      align-self: center;
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
      <div class="badge-pill">Wealth Management</div>
      <h1 style="font-size:3rem;line-height:1.2;margin-bottom:1rem;">Trust <span
          style="color:var(--gold);font-style:italic;font-weight:300;">Services</span></h1>
      <p style="opacity:0.8;max-width:560px;margin:0 auto 2rem;">Independent, professional trustee services to protect,
        manage, and distribute your assets — exactly as you intend, for generations to come.</p>
      <div class="d-flex gap-3 justify-content-center">
        <a href="{{ route('contact') }}" class="btn-b" style="padding:0.8rem 2rem;">Speak to a Trust Officer</a>
      </div>
    </div>
  </section>

  <div class="stats-strip" data-aos="fade-up">
    <div class="container">
      <div class="row g-3 text-center">
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">$8B+</span><span class="lbl">Trust Assets</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">1,800+</span><span class="lbl">Trusts Administered</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">75yr</span><span class="lbl">Trust Experience</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">100%</span><span class="lbl">Fiduciary Standard</span></div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up"><span class="sec-sub">Trust Types</span>
        <h2 style="color:var(--navy);">Find the Right Structure</h2>
      </div>

      <div class="row g-3 mb-5" data-aos="fade-up">
        <div class="col-12">
          <div class="type-row">
            <div class="type-icon"><i class="fas fa-home"></i></div>
            <div>
              <h6>Revocable Living Trust</h6>
              <p>Maintain control during your lifetime while ensuring seamless transfer to heirs, avoiding probate.</p>
            </div>
            <div class="type-badge">Most Common</div>
          </div>
          <div class="type-row">
            <div class="type-icon"><i class="fas fa-lock"></i></div>
            <div>
              <h6>Irrevocable Trust</h6>
              <p>Remove assets from your taxable estate to reduce estate taxes and protect against creditors.</p>
            </div>
            <div class="type-badge">Tax Planning</div>
          </div>
          <div class="type-row">
            <div class="type-icon"><i class="fas fa-child"></i></div>
            <div>
              <h6>Testamentary Trust</h6>
              <p>Created through your will to provide structured distributions to minor children or special-needs
                beneficiaries.</p>
            </div>
            <div class="type-badge">Family</div>
          </div>
          <div class="type-row">
            <div class="type-icon"><i class="fas fa-heart"></i></div>
            <div>
              <h6>Charitable Remainder Trust</h6>
              <p>Generate income during your lifetime while leaving a meaningful charitable legacy at death.</p>
            </div>
            <div class="type-badge">Philanthropy</div>
          </div>
          <div class="type-row">
            <div class="type-icon"><i class="fas fa-building"></i></div>
            <div>
              <h6>Dynasty Trust</h6>
              <p>Multi-generational trust structures designed to pass wealth across multiple generations free of estate
                tax.</p>
            </div>
            <div class="type-badge">Legacy</div>
          </div>
        </div>
      </div>

      <div class="text-center mb-4" data-aos="fade-up"><span class="sec-sub">Our Role</span>
        <h2 style="color:var(--navy);">What We Do as Trustee</h2>
      </div>
      <div class="row g-4" data-aos="fade-up">
        <div class="col-md-3">
          <div class="trust-card">
            <div class="tc-icon"><i class="fas fa-balance-scale"></i></div>
            <h5>Fiduciary Duty</h5>
            <p>We act solely in the interest of your beneficiaries — always and without exception.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="trust-card">
            <div class="tc-icon"><i class="fas fa-file-contract"></i></div>
            <h5>Administration</h5>
            <p>Recordkeeping, tax filings, distributions, and legal compliance handled by our expert team.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="trust-card">
            <div class="tc-icon"><i class="fas fa-chart-line"></i></div>
            <h5>Investment Management</h5>
            <p>Prudent investment of trust assets aligned with the trust's objectives and time horizon.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="trust-card">
            <div class="tc-icon"><i class="fas fa-users"></i></div>
            <h5>Beneficiary Relations</h5>
            <p>Compassionate communication and support for beneficiaries throughout the trust's life.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
      <div class="badge-pill">Confidential</div>
      <h2 style="color:#fff;font-size:2.2rem;margin-bottom:0.8rem;">Protect What Matters Most</h2>
      <p style="color:rgba(255,255,255,0.7);max-width:480px;margin:0 auto 2rem;">A 30-minute conversation with our Trust
        Officers can clarify which structure best serves your family.</p>
      <a href="{{ route('contact') }}" class="btn-b" style="padding:0.9rem 2.5rem;">Schedule Consultation</a>
    </div>
  </section>
@endsection