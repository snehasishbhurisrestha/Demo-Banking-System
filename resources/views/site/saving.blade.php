@extends('layouts.webapp')

@section('style')
<style>
        :root {
            --primary-navy: #0B1E33;
            --primary-gold: #B5944B;
            --secondary-slate: #2C3E50;
            --neutral-ivory: #F8F7F4;
            --neutral-charcoal: #2A2A2A;
            --neutral-graphite: #4A4A4A;
            --white: #FFFFFF;
            --shadow-elegant: 0 20px 40px -10px rgba(0,20,40,0.15), 0 8px 20px -8px rgba(0,0,0,0.1);
            --border-elegant: 1px solid rgba(181,148,75,0.2);
            --gradient-gold: linear-gradient(135deg, #B5944B 0%, #D4B568 50%, #B5944B 100%);
            --gradient-navy: linear-gradient(135deg, #0B1E33 0%, #1A2F45 100%);
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Inter',sans-serif; color:var(--neutral-charcoal); background:var(--neutral-ivory); line-height:1.6; overflow-x:hidden; }
        h1,h2,h3,h4,h5 { font-family:'Merriweather',serif; font-weight:700; letter-spacing:-0.02em; }

        /* NAVBAR */
        .navbar { background:var(--white); padding:1.2rem 0; box-shadow:0 2px 20px rgba(0,0,0,0.02); border-bottom:1px solid rgba(181,148,75,0.15); }
        .navbar-brand { font-family:'Merriweather',serif; font-size:1.8rem; font-weight:900; color:var(--primary-navy)!important; letter-spacing:-0.5px; }
        .navbar-brand span { color:var(--primary-gold); font-weight:300; margin-left:2px; }
        .nav-link { color:var(--secondary-slate)!important; font-weight:500; font-size:0.95rem; text-transform:uppercase; letter-spacing:0.5px; padding:0.5rem 1.2rem!important; margin:0 0.2rem; position:relative; transition:color 0.3s; }
        .nav-link:after { content:''; position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:0; height:2px; background:var(--gradient-gold); transition:width 0.3s ease; }
        .nav-link:hover:after { width:60%; }
        .nav-link:hover { color:var(--primary-gold)!important; }
        .btn-banking { background:var(--primary-navy); color:var(--white); border:1px solid var(--primary-navy); padding:0.7rem 2rem; border-radius:0; font-weight:600; text-transform:uppercase; letter-spacing:1px; font-size:0.85rem; transition:all 0.3s; }
        .btn-banking:hover { background:transparent; color:var(--primary-navy); border-color:var(--primary-gold); }
        .btn-outline-banking { background:transparent; border:1px solid var(--primary-gold); color:var(--primary-gold); padding:0.7rem 2rem; border-radius:0; font-weight:600; text-transform:uppercase; letter-spacing:1px; font-size:0.85rem; transition:all 0.3s; }
        .btn-outline-banking:hover { background:var(--primary-gold); color:var(--white); }

        /* HERO */
        .page-hero { background:var(--gradient-navy); color:#fff; padding:7rem 0 5rem; position:relative; overflow:hidden; }
        .page-hero::before { content:''; position:absolute; top:0; right:0; width:60%; height:100%; background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat; background-size:100px; }
        .page-hero::after { content:''; position:absolute; bottom:0; left:0; width:100%; height:80px; background:linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%); }
        .hero-badge { display:inline-block; background:rgba(181,148,75,0.15); border:1px solid rgba(181,148,75,0.3); padding:0.5rem 1.5rem; margin-bottom:1.5rem; font-size:0.8rem; letter-spacing:2px; text-transform:uppercase; color:var(--primary-gold); }

        .section { padding:6rem 0; }
        .section-subtitle { color:var(--primary-gold); text-transform:uppercase; letter-spacing:3px; font-size:0.85rem; font-weight:600; margin-bottom:1rem; display:block; }

        /* TAB TOGGLE */
        .account-tabs { display:flex; gap:0; margin-bottom:3rem; border:var(--border-elegant); background:var(--white); width:fit-content; }
        .account-tab { padding:1rem 2.5rem; font-size:0.9rem; font-weight:600; text-transform:uppercase; letter-spacing:1px; cursor:pointer; border:none; background:transparent; color:var(--neutral-graphite); transition:all 0.3s; }
        .account-tab.active { background:var(--primary-navy); color:var(--white); }
        .account-tab:hover:not(.active) { background:rgba(181,148,75,0.08); color:var(--primary-gold); }
        .tab-panel { display:none; }
        .tab-panel.active { display:block; }

        /* ACCOUNT CARDS */
        .account-card { background:var(--white); border:var(--border-elegant); height:100%; position:relative; overflow:hidden; transition:all 0.4s cubic-bezier(0.165,0.84,0.44,1); }
        .account-card::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; background:var(--gradient-gold); transform:scaleX(0); transition:transform 0.4s; }
        .account-card:hover { transform:translateY(-10px); box-shadow:var(--shadow-elegant); }
        .account-card:hover::before { transform:scaleX(1); }
        .account-card.featured { border:2px solid var(--primary-gold); }
        .account-card.featured::before { transform:scaleX(1); }
        .featured-badge { position:absolute; top:1.5rem; right:1.5rem; background:var(--gradient-gold); color:var(--white); padding:0.3rem 0.9rem; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; }
        .card-header-block { padding:2rem 2rem 1.5rem; border-bottom:var(--border-elegant); }
        .account-icon { width:56px; height:56px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center; margin-bottom:1.2rem; }
        .account-icon i { color:var(--primary-gold); font-size:1.4rem; }
        .account-name { font-size:1.4rem; color:var(--primary-navy); margin-bottom:0.3rem; }
        .account-tagline { color:var(--neutral-graphite); font-size:0.9rem; }
        .rate-block { padding:1.5rem 2rem; background:rgba(181,148,75,0.04); border-bottom:var(--border-elegant); }
        .rate-number { font-size:2.5rem; font-weight:700; font-family:'Merriweather',serif; color:var(--primary-gold); }
        .rate-label { font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; color:var(--neutral-graphite); }
        .features-list { list-style:none; padding:2rem; margin:0; }
        .features-list li { padding:0.6rem 0; border-bottom:1px solid rgba(181,148,75,0.08); font-size:0.92rem; color:var(--neutral-graphite); display:flex; align-items:center; gap:0.7rem; }
        .features-list li:last-child { border-bottom:none; }
        .features-list li i { color:var(--primary-gold); font-size:0.75rem; flex-shrink:0; }
        .card-footer-block { padding:0 2rem 2rem; }

        /* STATS */
        .stats-strip { background:var(--primary-navy); padding:3rem 0; border-top:3px solid var(--primary-gold); border-bottom:3px solid var(--primary-gold); }
        .stat-item { text-align:center; }
        .stat-item .number { font-size:2.5rem; font-weight:700; font-family:'Merriweather',serif; color:var(--primary-gold); display:block; }
        .stat-item .label { font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.7); }

        /* FEATURES GRID */
        .feature-tile { background:var(--white); border:var(--border-elegant); padding:2rem; transition:all 0.3s; height:100%; }
        .feature-tile:hover { box-shadow:var(--shadow-elegant); }
        .feature-tile i { font-size:1.8rem; color:var(--primary-gold); margin-bottom:1rem; display:block; }
        .feature-tile h5 { color:var(--primary-navy); margin-bottom:0.7rem; font-size:1.1rem; }
        .feature-tile p { color:var(--neutral-graphite); font-size:0.88rem; margin:0; }

        /* COMPARISON TABLE */
        .compare-table { width:100%; border-collapse:collapse; background:var(--white); border:var(--border-elegant); }
        .compare-table th { background:var(--primary-navy); color:var(--white); padding:1.2rem 1.5rem; font-family:'Merriweather',serif; font-size:0.95rem; text-align:left; border:none; }
        .compare-table th:first-child { color:rgba(255,255,255,0.6); font-family:'Inter',sans-serif; font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; }
        .compare-table td { padding:1rem 1.5rem; border-bottom:1px solid rgba(181,148,75,0.1); font-size:0.9rem; color:var(--neutral-graphite); }
        .compare-table tr:hover td { background:rgba(181,148,75,0.03); }
        .compare-table .check { color:var(--primary-gold); }
        .compare-table .cross { color:#ccc; }
        .compare-table .highlight { color:var(--primary-gold); font-weight:600; }

        /* CALCULATOR */
        .calc-section { background:var(--primary-navy); padding:5rem 0; }
        .calc-box { background:rgba(255,255,255,0.05); border:1px solid rgba(181,148,75,0.3); padding:3rem; }
        .calc-result { background:rgba(181,148,75,0.15); border:1px solid rgba(181,148,75,0.3); padding:2rem; text-align:center; }
        .calc-result .result-num { font-size:2.8rem; font-family:'Merriweather',serif; font-weight:700; color:var(--primary-gold); }
        .form-label-light { color:rgba(255,255,255,0.8); font-size:0.88rem; margin-bottom:0.4rem; display:block; }
        input[type=range] { -webkit-appearance:none; width:100%; height:4px; background:rgba(181,148,75,0.3); border-radius:0; outline:none; }
        input[type=range]::-webkit-slider-thumb { -webkit-appearance:none; width:20px; height:20px; background:var(--primary-gold); cursor:pointer; border-radius:50%; }
        .form-control-dark { background:rgba(255,255,255,0.08); border:1px solid rgba(181,148,75,0.3); color:var(--white); padding:0.8rem 1rem; border-radius:0; width:100%; font-size:0.95rem; }
        .form-control-dark:focus { outline:none; border-color:var(--primary-gold); background:rgba(181,148,75,0.08); }
        .form-select-dark { background:rgba(255,255,255,0.08); border:1px solid rgba(181,148,75,0.3); color:var(--white); padding:0.8rem 1rem; border-radius:0; width:100%; font-size:0.95rem; }

        /* PROCESS */
        .process-card { background:var(--white); padding:2.5rem 2rem; border:var(--border-elegant); transition:all 0.4s; position:relative; height:100%; }
        .process-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-elegant); }
        .process-number { font-size:4rem; font-weight:900; font-family:'Merriweather',serif; color:rgba(181,148,75,0.15); line-height:1; margin-bottom:1rem; }
        .process-icon { width:60px; height:60px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center; margin-bottom:1.5rem; }
        .process-icon i { font-size:1.4rem; color:var(--primary-gold); }

        /* CTA */
        .cta-banner { background:var(--gradient-navy); padding:5rem 0; text-align:center; position:relative; overflow:hidden; }
        .cta-banner::before { content:''; position:absolute; inset:0; background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" stroke="%23B5944B" fill="none"/></svg>') center/150px repeat; }

        /* FOOTER */
        .footer { background:var(--primary-navy); color:var(--white); padding:5rem 0 2rem; border-top:3px solid var(--primary-gold); }
        .footer h5 { color:var(--primary-gold); margin-bottom:1.5rem; font-size:1.1rem; }
        .footer-links { list-style:none; padding:0; }
        .footer-links li { margin-bottom:0.75rem; }
        .footer-links a { color:rgba(255,255,255,0.7); text-decoration:none; transition:color 0.3s; font-size:0.95rem; }
        .footer-links a:hover { color:var(--primary-gold); }
        .footer-bottom { margin-top:4rem; padding-top:2rem; border-top:1px solid rgba(255,255,255,0.1); text-align:center; color:rgba(255,255,255,0.5); font-size:0.85rem; }
    </style>
@endsection

@section('content')
<!-- HERO -->
<section class="page-hero text-center">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">Personal Banking</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            Checking & <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Savings</span>
        </h1>
        <p style="font-size:1.1rem; max-width:600px; margin:0 auto; opacity:0.85;">Accounts engineered for your everyday banking and long-term financial ambitions — with no hidden fees and industry-leading rates.</p>
    </div>
</section>

<!-- STATS -->
<div class="stats-strip" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">5.10%</span><span class="label">High-Yield Savings APY</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">$0</span><span class="label">Monthly Maintenance Fees</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">55,000+</span><span class="label">Fee-Free ATMs Nationwide</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">FDIC</span><span class="label">Insured up to $250,000</span></div></div>
        </div>
    </div>
</div>

<!-- ACCOUNT TABS -->
<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Our Accounts</span>
            <h2 style="color:var(--primary-navy);">Choose Your Account</h2>
        </div>

        <div class="d-flex justify-content-center" data-aos="fade-up">
            <div class="account-tabs mb-5">
                <button class="account-tab active" onclick="switchTab('checking',this)">Checking</button>
                <button class="account-tab" onclick="switchTab('savings',this)">Savings</button>
            </div>
        </div>

        <!-- CHECKING PANEL -->
        <div class="tab-panel active" id="tab-checking">
            <div class="row g-4">
                <!-- Essential Checking -->
                <div class="col-md-4" data-aos="fade-up">
                    <div class="account-card">
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-wallet"></i></div>
                            <h3 class="account-name">Essential Checking</h3>
                            <p class="account-tagline">Straightforward banking with zero surprises.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">$0</div>
                            <div class="rate-label">Monthly Fee</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> No minimum balance</li>
                            <li><i class="fas fa-check"></i> Visa debit card included</li>
                            <li><i class="fas fa-check"></i> 55,000+ fee-free ATMs</li>
                            <li><i class="fas fa-check"></i> Mobile cheque deposit</li>
                            <li><i class="fas fa-check"></i> Bill pay & Zelle® included</li>
                            <li style="color:#ccc;"><i class="fas fa-times"></i> Overdraft protection</li>
                            <li style="color:#ccc;"><i class="fas fa-times"></i> Priority banking line</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-outline-banking w-100" onclick="openAccountModal('Essential Checking')">Open Account</button>
                        </div>
                    </div>
                </div>

                <!-- Premier Checking -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="account-card featured">
                        <div class="featured-badge">Most Popular</div>
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-star"></i></div>
                            <h3 class="account-name">Premier Checking</h3>
                            <p class="account-tagline">Elevated benefits for the discerning banker.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">$0</div>
                            <div class="rate-label">Fee waived with $5,000 balance</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> $5,000 minimum (or $15/mo)</li>
                            <li><i class="fas fa-check"></i> Premium metal debit card</li>
                            <li><i class="fas fa-check"></i> Unlimited ATM fee rebates</li>
                            <li><i class="fas fa-check"></i> Overdraft protection included</li>
                            <li><i class="fas fa-check"></i> Priority 24/7 phone banking</li>
                            <li><i class="fas fa-check"></i> 0.05% APY on balance</li>
                            <li><i class="fas fa-check"></i> Free safe deposit box</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-banking w-100" onclick="openAccountModal('Premier Checking')">Open Account</button>
                        </div>
                    </div>
                </div>

                <!-- Private Checking -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="account-card">
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-crown"></i></div>
                            <h3 class="account-name">Private Checking</h3>
                            <p class="account-tagline">White-glove service for high-net-worth clients.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">$0</div>
                            <div class="rate-label">No fees. Ever.</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> $100,000 minimum balance</li>
                            <li><i class="fas fa-check"></i> Dedicated relationship manager</li>
                            <li><i class="fas fa-check"></i> Unlimited worldwide ATM rebates</li>
                            <li><i class="fas fa-check"></i> Concierge banking services</li>
                            <li><i class="fas fa-check"></i> 0.10% APY on balance</li>
                            <li><i class="fas fa-check"></i> Wire transfer fee waivers</li>
                            <li><i class="fas fa-check"></i> Access to Wealth Advisory</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-outline-banking w-100" onclick="openAccountModal('Private Checking')">Open Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SAVINGS PANEL -->
        <div class="tab-panel" id="tab-savings">
            <div class="row g-4">
                <!-- Standard Savings -->
                <div class="col-md-4" data-aos="fade-up">
                    <div class="account-card">
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-piggy-bank"></i></div>
                            <h3 class="account-name">Standard Savings</h3>
                            <p class="account-tagline">A reliable home for your everyday savings.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">4.25%</div>
                            <div class="rate-label">APY</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> $0 monthly fee</li>
                            <li><i class="fas fa-check"></i> $25 minimum to open</li>
                            <li><i class="fas fa-check"></i> Auto-save round-up feature</li>
                            <li><i class="fas fa-check"></i> No withdrawal limits</li>
                            <li><i class="fas fa-check"></i> FDIC insured to $250K</li>
                            <li style="color:#ccc;"><i class="fas fa-times"></i> Bonus rate tiers</li>
                            <li style="color:#ccc;"><i class="fas fa-times"></i> Wealth integration</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-outline-banking w-100" onclick="openAccountModal('Standard Savings')">Open Account</button>
                        </div>
                    </div>
                </div>

                <!-- High-Yield Savings -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="account-card featured">
                        <div class="featured-badge">Best Rate</div>
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-chart-line"></i></div>
                            <h3 class="account-name">High-Yield Savings</h3>
                            <p class="account-tagline">Maximise your returns with our top-tier rate.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">5.10%</div>
                            <div class="rate-label">APY — 10× national average</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> $0 monthly fee</li>
                            <li><i class="fas fa-check"></i> $1,000 minimum to open</li>
                            <li><i class="fas fa-check"></i> Daily interest compounding</li>
                            <li><i class="fas fa-check"></i> Tiered bonus rates at $50K+</li>
                            <li><i class="fas fa-check"></i> Goal-based savings buckets</li>
                            <li><i class="fas fa-check"></i> No withdrawal penalty</li>
                            <li><i class="fas fa-check"></i> FDIC insured to $250K</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-banking w-100" onclick="openAccountModal('High-Yield Savings')">Open Account</button>
                        </div>
                    </div>
                </div>

                <!-- Certificates of Deposit -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="account-card">
                        <div class="card-header-block">
                            <div class="account-icon"><i class="fas fa-lock"></i></div>
                            <h3 class="account-name">Premier CD</h3>
                            <p class="account-tagline">Lock in a guaranteed rate for a fixed term.</p>
                        </div>
                        <div class="rate-block">
                            <div class="rate-number">5.40%</div>
                            <div class="rate-label">APY — 12-month term</div>
                        </div>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> Terms: 3, 6, 12, 24, 36 mo</li>
                            <li><i class="fas fa-check"></i> $500 minimum deposit</li>
                            <li><i class="fas fa-check"></i> Guaranteed fixed rate</li>
                            <li><i class="fas fa-check"></i> Auto-renew option</li>
                            <li><i class="fas fa-check"></i> FDIC insured to $250K</li>
                            <li><i class="fas fa-check"></i> Rate bump option (once)</li>
                            <li style="color:#ccc;"><i class="fas fa-times"></i> Early withdrawal fee applies</li>
                        </ul>
                        <div class="card-footer-block">
                            <button class="btn btn-outline-banking w-100" onclick="openAccountModal('Premier CD')">Open Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COMPARISON TABLE -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Side by Side</span>
            <h2 style="color:var(--primary-navy);">Compare Checking Accounts</h2>
        </div>
        <div class="table-responsive" data-aos="fade-up">
            <table class="compare-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Essential</th>
                        <th>Premier</th>
                        <th>Private</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Monthly Fee</td><td class="highlight">$0</td><td>$0 / $15</td><td class="highlight">$0</td></tr>
                    <tr><td>Minimum Balance</td><td>None</td><td>$5,000</td><td>$100,000</td></tr>
                    <tr><td>ATM Fee Rebates</td><td class="cross"><i class="fas fa-minus"></i></td><td class="check">Unlimited</td><td class="check">Worldwide</td></tr>
                    <tr><td>Overdraft Protection</td><td class="cross"><i class="fas fa-minus"></i></td><td class="check"><i class="fas fa-check"></i></td><td class="check"><i class="fas fa-check"></i></td></tr>
                    <tr><td>Interest Earned</td><td class="cross"><i class="fas fa-minus"></i></td><td class="check">0.05% APY</td><td class="check">0.10% APY</td></tr>
                    <tr><td>Relationship Manager</td><td class="cross"><i class="fas fa-minus"></i></td><td class="cross"><i class="fas fa-minus"></i></td><td class="check"><i class="fas fa-check"></i></td></tr>
                    <tr><td>Wealth Advisory Access</td><td class="cross"><i class="fas fa-minus"></i></td><td class="cross"><i class="fas fa-minus"></i></td><td class="check"><i class="fas fa-check"></i></td></tr>
                    <tr><td>Wire Transfer Fees</td><td>Standard</td><td>Reduced</td><td class="highlight">Waived</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- SAVINGS CALCULATOR -->
<section class="calc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle" style="color:var(--primary-gold);">Savings Calculator</span>
            <h2 style="color:var(--white);">See Your Money Grow</h2>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="calc-box">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label-light">Initial Deposit</label>
                            <input type="number" class="form-control-dark" id="initialDeposit" value="10000" oninput="calcSavings()">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Monthly Contribution</label>
                            <input type="number" class="form-control-dark" id="monthlyContrib" value="500" oninput="calcSavings()">
                        </div>
                        <div class="col-12">
                            <label class="form-label-light">Time Period: <span id="yearLabel" style="color:var(--primary-gold);">5 years</span></label>
                            <input type="range" id="yearSlider" min="1" max="30" value="5" oninput="updateYear(); calcSavings()">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Account Type</label>
                            <select class="form-select-dark" id="calcAccount" onchange="calcSavings()">
                                <option value="5.10">High-Yield Savings (5.10%)</option>
                                <option value="5.40">Premier CD (5.40%)</option>
                                <option value="4.25">Standard Savings (4.25%)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Compounding</label>
                            <select class="form-select-dark" id="calcCompound" onchange="calcSavings()">
                                <option value="365">Daily</option>
                                <option value="12">Monthly</option>
                                <option value="1">Annually</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="calc-result">
                    <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.5rem;">Projected Balance</div>
                    <div class="result-num" id="projectedBalance">$0</div>
                    <div style="color:rgba(255,255,255,0.5); font-size:0.8rem; margin-top:0.5rem;">after <span id="resultYears">5</span> years</div>
                    <hr style="border-color:rgba(181,148,75,0.3); margin:1.5rem 0;">
                    <div class="row text-center">
                        <div class="col-6">
                            <div style="color:rgba(255,255,255,0.5); font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Total Deposited</div>
                            <div style="color:var(--white); font-size:1.3rem; font-family:'Merriweather',serif; font-weight:700;" id="totalDeposited">$0</div>
                        </div>
                        <div class="col-6">
                            <div style="color:rgba(255,255,255,0.5); font-size:0.75rem; text-transform:uppercase; letter-spacing:1px;">Interest Earned</div>
                            <div style="color:var(--primary-gold); font-size:1.3rem; font-family:'Merriweather',serif; font-weight:700;" id="interestEarned">$0</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-banking w-100" onclick="openAccountModal('High-Yield Savings')">Start Saving Today</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES GRID -->
<section class="section" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Banking Features</span>
            <h2 style="color:var(--primary-navy);">Everything You Need, Nothing You Don't</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4 col-lg-3" data-aos="fade-up"><div class="feature-tile"><i class="fas fa-mobile-alt"></i><h5>Mobile Banking</h5><p>Deposit cheques, pay bills, and manage accounts from our award-winning app.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="50"><div class="feature-tile"><i class="fas fa-shield-alt"></i><h5>Fraud Protection</h5><p>Real-time alerts and zero-liability protection on all unauthorised transactions.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100"><div class="feature-tile"><i class="fas fa-exchange-alt"></i><h5>Instant Transfers</h5><p>Move money instantly via Zelle®, ACH, or wire — domestically and internationally.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="150"><div class="feature-tile"><i class="fas fa-bell"></i><h5>Smart Alerts</h5><p>Customisable notifications for every transaction, low balance, and login attempt.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200"><div class="feature-tile"><i class="fas fa-robot"></i><h5>Auto-Save Rules</h5><p>Set intelligent rules to move money to savings automatically on payday.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="250"><div class="feature-tile"><i class="fas fa-file-alt"></i><h5>e-Statements</h5><p>Up to 7 years of digital statements available instantly in your portal.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300"><div class="feature-tile"><i class="fas fa-headset"></i><h5>24/7 Support</h5><p>Speak to a real banker any time, day or night — no bots, no wait times for Premier clients.</p></div></div>
            <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="350"><div class="feature-tile"><i class="fas fa-chart-bar"></i><h5>Spending Insights</h5><p>AI-powered analytics that categorise and visualise your spending habits.</p></div></div>
        </div>
    </div>
</section>

<!-- HOW TO OPEN -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">How It Works</span>
            <h2 style="color:var(--primary-navy);">Open an Account in Minutes</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="fas fa-mouse-pointer"></i></div>
                    <h4 style="color:var(--primary-navy); margin-bottom:0.8rem;">Choose Account</h4>
                    <p style="color:var(--neutral-graphite); font-size:0.9rem;">Select the account that best fits your lifestyle and financial goals.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card">
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="fas fa-id-card"></i></div>
                    <h4 style="color:var(--primary-navy); margin-bottom:0.8rem;">Verify Identity</h4>
                    <p style="color:var(--neutral-graphite); font-size:0.9rem;">Provide your details and government ID — takes under 3 minutes online.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card">
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="fas fa-university"></i></div>
                    <h4 style="color:var(--primary-navy); margin-bottom:0.8rem;">Fund Your Account</h4>
                    <p style="color:var(--neutral-graphite); font-size:0.9rem;">Transfer funds from any bank, wire, or deposit at a branch.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="fas fa-check-circle"></i></div>
                    <h4 style="color:var(--primary-navy); margin-bottom:0.8rem;">Start Banking</h4>
                    <p style="color:var(--neutral-graphite); font-size:0.9rem;">Your account is ready. Download the app and take full control.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
        <div class="hero-badge">Ready to begin?</div>
        <h2 style="color:var(--white); font-size:2.5rem; margin-bottom:1rem;">Open Your Account Today</h2>
        <p style="color:rgba(255,255,255,0.75); max-width:500px; margin:0 auto 2rem;">Join over 3,200 clients who trust PremierBank with their financial future.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <button class="btn btn-banking" style="padding:1rem 3rem;" onclick="showSignup()">Open an Account</button>
           
        </div>
    </div>
</section>
@endsection