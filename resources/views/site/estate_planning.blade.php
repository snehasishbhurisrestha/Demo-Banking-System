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

    /* CHECKLIST */
    .checklist-box {
      background: #fff;
      border: var(--border);
      padding: 2.5rem;
    }

    .cl-item {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      padding: 1rem 0;
      border-bottom: 1px solid rgba(181, 148, 75, 0.08);
    }

    .cl-item:last-child {
      border-bottom: none;
    }

    .cl-check {
      width: 32px;
      height: 32px;
      background: rgba(181, 148, 75, 0.08);
      border: var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 0.1rem;
    }

    .cl-check i {
      color: var(--gold);
      font-size: 0.8rem;
    }

    .cl-item h6 {
      color: var(--navy);
      margin-bottom: 0.2rem;
      font-family: 'Merriweather', serif;
      font-size: 0.93rem;
    }

    .cl-item p {
      color: var(--graphite);
      font-size: 0.82rem;
      margin: 0;
    }

    /* PROCESS STRIP */
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

    .process-strip {
      background: var(--navy);
      padding: 3.5rem 0;
    }

    .proc-item {
      text-align: center;
      padding: 1rem;
    }

    .proc-num {
      font-size: 2.5rem;
      font-family: 'Merriweather', serif;
      font-weight: 900;
      color: rgba(181, 148, 75, 0.2);
      line-height: 1;
      margin-bottom: 0.5rem;
    }

    .proc-item h5 {
      color: #fff;
      margin-bottom: 0.4rem;
      font-size: 0.95rem;
    }

    .proc-item p {
      color: rgba(255, 255, 255, 0.55);
      font-size: 0.8rem;
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
      <h1 style="font-size:3rem;line-height:1.2;margin-bottom:1rem;">Estate <span
          style="color:var(--gold);font-style:italic;font-weight:300;">Planning</span></h1>
      <p style="opacity:0.8;max-width:560px;margin:0 auto 2rem;">Protect your legacy. Provide for your loved ones.
        Minimise taxation. Our estate planning specialists work alongside your attorney to create a plan built to last.
      </p>
      <div class="d-flex gap-3 justify-content-center">
        <button class="btn-b" style="padding:0.8rem 2rem;" onclick="openModal()">Start Your Plan</button>
      </div>
    </div>
  </section>

  <div class="stats-strip" data-aos="fade-up">
    <div class="container">
      <div class="row g-3 text-center">
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">$15B+</span><span class="lbl">Estates Planned</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">4,500+</span><span class="lbl">Families Served</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">40%</span><span class="lbl">Avg Estate Tax Reduction</span></div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-item"><span class="num">3 Gen</span><span class="lbl">Average Legacy Span</span></div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up"><span class="sec-sub">Our Services</span>
        <h2 style="color:var(--navy);">Comprehensive Estate Planning</h2>
      </div>
      <div class="row g-4 mb-5">
        <div class="col-md-4" data-aos="fade-up">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-file-alt"></i></div>
            <h5>Will Preparation</h5>
            <p>Coordinate with your legal team to ensure your will reflects your wishes precisely and holds up to
              challenge.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-percentage"></i></div>
            <h5>Estate Tax Planning</h5>
            <p>Strategies to reduce your taxable estate through gifting, trusts, and family limited partnerships.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-users"></i></div>
            <h5>Beneficiary Planning</h5>
            <p>Ensuring account titling, beneficiary designations, and POA documents are aligned with your estate plan.
            </p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-heart"></i></div>
            <h5>Charitable Giving</h5>
            <p>Donor advised funds, charitable trusts, and family foundations to leave a meaningful philanthropic
              legacy.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="80">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-briefcase"></i></div>
            <h5>Business Succession</h5>
            <p>Buy-sell agreements, family partnership structures, and ESOP planning for business owners.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="160">
          <div class="svc-card">
            <div class="svc-icon"><i class="fas fa-shield-alt"></i></div>
            <h5>Asset Protection</h5>
            <p>Shielding assets from creditors, legal judgements, and divorces through proper legal structuring.</p>
          </div>
        </div>
      </div>

      <!-- CHECKLIST + PROCESS -->
      <div class="row g-5 align-items-start">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="sec-sub">Estate Checklist</span>
          <h2 style="color:var(--navy);margin-bottom:1.5rem;">Is Your Estate Plan Complete?</h2>
          <div class="checklist-box">
            <div class="cl-item">
              <div class="cl-check"><i class="fas fa-check"></i></div>
              <div>
                <h6>Updated Will</h6>
                <p>Reflects current wishes, names correct executor, and provides for all intended beneficiaries.</p>
              </div>
            </div>
            <div class="cl-item">
              <div class="cl-check"><i class="fas fa-check"></i></div>
              <div>
                <h6>Durable Power of Attorney</h6>
                <p>A trusted person authorised to manage financial affairs if you become incapacitated.</p>
              </div>
            </div>
            <div class="cl-item">
              <div class="cl-check"><i class="fas fa-check"></i></div>
              <div>
                <h6>Healthcare Directive</h6>
                <p>Documented medical wishes and a healthcare proxy named for end-of-life decisions.</p>
              </div>
            </div>
            <div class="cl-item">
              <div class="cl-check"><i class="fas fa-check"></i></div>
              <div>
                <h6>Beneficiary Designations</h6>
                <p>All accounts, insurance, and retirement plans have current, coordinated beneficiary designations.</p>
              </div>
            </div>
            <div class="cl-item">
              <div class="cl-check"><i class="fas fa-check"></i></div>
              <div>
                <h6>Trust in Place</h6>
                <p>Appropriate trust structure to avoid probate, reduce taxes, and protect heirs.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <span class="sec-sub">Our Process</span>
          <h2 style="color:var(--navy);margin-bottom:1.5rem;">How We Work With You</h2>
          <div style="position:relative;padding-left:2rem;">
            <div
              style="position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,var(--gold),rgba(181,148,75,0.1));">
            </div>
            <div style="padding-bottom:2rem;padding-left:1.5rem;position:relative;">
              <div
                style="position:absolute;left:-2.4rem;top:0.2rem;width:14px;height:14px;background:var(--gold);border-radius:50%;border:3px solid var(--ivory);">
              </div>
              <div
                style="font-size:0.72rem;text-transform:uppercase;letter-spacing:2px;color:var(--gold);margin-bottom:0.3rem;">
                Step 01</div>
              <h5 style="color:var(--navy);font-size:1rem;margin-bottom:0.3rem;">Discovery Meeting</h5>
              <p style="color:var(--graphite);font-size:0.86rem;">We learn your full financial picture, family dynamics,
                charitable intentions, and legacy goals.</p>
            </div>
            <div style="padding-bottom:2rem;padding-left:1.5rem;position:relative;">
              <div
                style="position:absolute;left:-2.4rem;top:0.2rem;width:14px;height:14px;background:var(--gold);border-radius:50%;border:3px solid var(--ivory);">
              </div>
              <div
                style="font-size:0.72rem;text-transform:uppercase;letter-spacing:2px;color:var(--gold);margin-bottom:0.3rem;">
                Step 02</div>
              <h5 style="color:var(--navy);font-size:1rem;margin-bottom:0.3rem;">Plan Design</h5>
              <p style="color:var(--graphite);font-size:0.86rem;">Our specialists and your attorney collaborate to
                design the optimal estate structure.</p>
            </div>
            <div style="padding-bottom:2rem;padding-left:1.5rem;position:relative;">
              <div
                style="position:absolute;left:-2.4rem;top:0.2rem;width:14px;height:14px;background:var(--gold);border-radius:50%;border:3px solid var(--ivory);">
              </div>
              <div
                style="font-size:0.72rem;text-transform:uppercase;letter-spacing:2px;color:var(--gold);margin-bottom:0.3rem;">
                Step 03</div>
              <h5 style="color:var(--navy);font-size:1rem;margin-bottom:0.3rem;">Implementation</h5>
              <p style="color:var(--graphite);font-size:0.86rem;">We coordinate execution — trust formation, deed
                transfers, beneficiary updates, and more.</p>
            </div>
            <div style="padding-left:1.5rem;position:relative;">
              <div
                style="position:absolute;left:-2.4rem;top:0.2rem;width:14px;height:14px;background:var(--gold);border-radius:50%;border:3px solid var(--ivory);">
              </div>
              <div
                style="font-size:0.72rem;text-transform:uppercase;letter-spacing:2px;color:var(--gold);margin-bottom:0.3rem;">
                Step 04</div>
              <h5 style="color:var(--navy);font-size:1rem;margin-bottom:0.3rem;">Annual Review</h5>
              <p style="color:var(--graphite);font-size:0.86rem;">Life changes. We review and update your plan whenever
                circumstances evolve.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
      <div class="badge-pill">Your Legacy Matters</div>
      <h2 style="color:#fff;font-size:2.2rem;margin-bottom:0.8rem;">Begin Your Estate Plan Today</h2>
      <p style="color:rgba(255,255,255,0.7);max-width:480px;margin:0 auto 2rem;">A free, confidential consultation with
        our estate planning team. No obligations.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <button class="btn-b" style="padding:0.9rem 2.5rem;" onclick="openModal()">Book Consultation</button>
        <a href="trust.html" class="btn-ob" style="padding:0.9rem 2.5rem;">Explore Trust Services</a>
      </div>
    </div>
  </section>
@endsection