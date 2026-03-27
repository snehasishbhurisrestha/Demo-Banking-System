@extends('layouts.webapp')

@section('style')
<style>
    /* HERO */
    .page-hero{background:var(--gradient-navy);color:#fff;padding:7rem 0 5rem;position:relative;overflow:hidden;}
    .page-hero::before{content:'';position:absolute;top:0;right:0;width:60%;height:100%;background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;background-size:100px;}
    .page-hero::after{content:'';position:absolute;bottom:0;left:0;width:100%;height:80px;background:linear-gradient(to top right,transparent 49%,var(--neutral-ivory) 50%);}
    .hero-badge{display:inline-block;background:rgba(181,148,75,0.15);border:1px solid rgba(181,148,75,0.3);padding:0.5rem 1.5rem;margin-bottom:1.5rem;font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;color:var(--primary-gold);}

    .section{padding:6rem 0;}
    .section-subtitle{color:var(--primary-gold);text-transform:uppercase;letter-spacing:3px;font-size:0.85rem;font-weight:600;margin-bottom:1rem;display:block;}

    /* LOAN TYPE CARDS */
    .loan-nav{display:flex;gap:0;flex-wrap:wrap;border:var(--border-elegant);background:var(--white);width:fit-content;}
    .loan-tab{padding:0.9rem 1.8rem;font-size:0.82rem;font-weight:600;text-transform:uppercase;letter-spacing:1px;cursor:pointer;border:none;background:transparent;color:var(--neutral-graphite);transition:all 0.3s;border-right:var(--border-elegant);}
    .loan-tab:last-child{border-right:none;}
    .loan-tab.active{background:var(--primary-navy);color:var(--white);}
    .loan-tab:hover:not(.active){background:rgba(181,148,75,0.08);color:var(--primary-gold);}
    .loan-panel{display:none;}
    .loan-panel.active{display:block;}

    /* PRODUCT CARD */
    .product-card{background:var(--white);border:var(--border-elegant);overflow:hidden;height:100%;position:relative;transition:all 0.4s cubic-bezier(0.165,0.84,0.44,1);}
    .product-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gradient-gold);transform:scaleX(0);transition:transform 0.4s;}
    .product-card:hover{transform:translateY(-10px);box-shadow:var(--shadow-elegant);}
    .product-card:hover::before{transform:scaleX(1);}
    .product-card.featured{border:2px solid var(--primary-gold);}
    .product-card.featured::before{transform:scaleX(1);}
    .featured-badge{position:absolute;top:1.2rem;right:1.2rem;background:var(--gradient-gold);color:var(--white);padding:0.25rem 0.8rem;font-size:0.68rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;}
    .pc-header{padding:2rem 2rem 1.5rem;border-bottom:var(--border-elegant);}
    .pc-icon{width:54px;height:54px;background:rgba(181,148,75,0.08);border:var(--border-elegant);display:flex;align-items:center;justify-content:center;margin-bottom:1.2rem;}
    .pc-icon i{color:var(--primary-gold);font-size:1.3rem;}
    .pc-name{font-size:1.3rem;color:var(--primary-navy);margin-bottom:0.3rem;}
    .pc-tag{font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;}
    .rate-row{display:flex;gap:2rem;padding:1.5rem 2rem;background:rgba(181,148,75,0.04);border-bottom:var(--border-elegant);}
    .rate-col{text-align:center;}
    .rate-num{font-size:1.8rem;font-family:'Merriweather',serif;font-weight:700;color:var(--primary-gold);}
    .rate-lbl{font-size:0.7rem;text-transform:uppercase;letter-spacing:1px;color:var(--neutral-graphite);}
    .feat-list{list-style:none;padding:1.5rem 2rem;margin:0;}
    .feat-list li{padding:0.5rem 0;border-bottom:1px solid rgba(181,148,75,0.08);font-size:0.88rem;color:var(--neutral-graphite);display:flex;align-items:center;gap:0.6rem;}
    .feat-list li:last-child{border-bottom:none;}
    .feat-list li i{color:var(--primary-gold);font-size:0.7rem;flex-shrink:0;}
    .pc-footer{padding:0 2rem 2rem;}

    /* STATS */
    .stats-strip{background:var(--primary-navy);padding:3rem 0;border-top:3px solid var(--primary-gold);border-bottom:3px solid var(--primary-gold);}
    .stat-item{text-align:center;}
    .stat-item .number{font-size:2.5rem;font-weight:700;font-family:'Merriweather',serif;color:var(--primary-gold);display:block;}
    .stat-item .label{font-size:0.85rem;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.7);}

    /* CALCULATOR */
    .calc-section{background:var(--primary-navy);padding:5rem 0;}
    .calc-box{background:rgba(255,255,255,0.04);border:1px solid rgba(181,148,75,0.3);padding:3rem;}
    .calc-result{background:rgba(181,148,75,0.12);border:1px solid rgba(181,148,75,0.4);padding:2.5rem;text-align:center;}
    .result-num{font-size:3rem;font-family:'Merriweather',serif;font-weight:700;color:var(--primary-gold);}
    .form-label-light{color:rgba(255,255,255,0.75);font-size:0.85rem;margin-bottom:0.4rem;display:block;text-transform:uppercase;letter-spacing:0.5px;}
    .form-ctrl-dark{background:rgba(255,255,255,0.07);border:1px solid rgba(181,148,75,0.3);color:var(--white);padding:0.85rem 1rem;border-radius:0;width:100%;font-size:0.95rem;font-family:'Inter',sans-serif;}
    .form-ctrl-dark:focus{outline:none;border-color:var(--primary-gold);background:rgba(181,148,75,0.08);}
    .form-ctrl-dark option{background:#0B1E33;color:var(--white);}
    input[type=range]{-webkit-appearance:none;width:100%;height:4px;background:rgba(181,148,75,0.3);border-radius:0;outline:none;margin-top:0.5rem;}
    input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;width:20px;height:20px;background:var(--primary-gold);cursor:pointer;border-radius:50%;}
    .calc-breakdown{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-top:1.5rem;}
    .breakdown-item{text-align:center;}
    .breakdown-num{font-size:1.1rem;font-family:'Merriweather',serif;font-weight:700;color:var(--white);}
    .breakdown-lbl{font-size:0.68rem;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.5);}

    /* PROCESS */
    .process-card{background:var(--white);padding:2.5rem 2rem;border:var(--border-elegant);transition:all 0.4s;position:relative;height:100%;}
    .process-card:hover{transform:translateY(-8px);box-shadow:var(--shadow-elegant);}
    .process-number{font-size:4rem;font-weight:900;font-family:'Merriweather',serif;color:rgba(181,148,75,0.12);line-height:1;margin-bottom:0.8rem;}
    .process-icon{width:60px;height:60px;background:rgba(181,148,75,0.08);border:var(--border-elegant);display:flex;align-items:center;justify-content:center;margin-bottom:1.5rem;}
    .process-icon i{font-size:1.4rem;color:var(--primary-gold);}

    /* WHY PREMIER */
    .why-card{background:var(--white);border:var(--border-elegant);padding:2rem;display:flex;gap:1.2rem;align-items:flex-start;height:100%;transition:all 0.3s;}
    .why-card:hover{box-shadow:var(--shadow-subtle);}
    .why-icon{width:48px;height:48px;background:rgba(181,148,75,0.08);border:var(--border-elegant);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
    .why-icon i{color:var(--primary-gold);}
    .why-card h5{color:var(--primary-navy);margin-bottom:0.3rem;font-size:1rem;}
    .why-card p{color:var(--neutral-graphite);font-size:0.87rem;margin:0;}

    /* COMPARE TABLE */
    .compare-table{width:100%;border-collapse:collapse;background:var(--white);border:var(--border-elegant);}
    .compare-table th{background:var(--primary-navy);color:var(--white);padding:1.2rem 1.5rem;font-family:'Merriweather',serif;font-size:0.9rem;text-align:left;border:none;}
    .compare-table th:first-child{color:rgba(255,255,255,0.55);font-family:'Inter',sans-serif;font-size:0.78rem;text-transform:uppercase;letter-spacing:1px;}
    .compare-table td{padding:1rem 1.5rem;border-bottom:1px solid rgba(181,148,75,0.1);font-size:0.88rem;color:var(--neutral-graphite);}
    .compare-table tr:hover td{background:rgba(181,148,75,0.03);}
    .tcheck{color:var(--primary-gold);}
    .thighlight{color:var(--primary-gold);font-weight:600;}

    /* TESTIMONIALS */
    .testimonial-card{background:var(--white);border:var(--border-elegant);padding:2.5rem;position:relative;height:100%;transition:all 0.3s;}
    .testimonial-card:hover{box-shadow:var(--shadow-elegant);}
    .testimonial-card::before{content:'\201C';font-family:'Merriweather',serif;font-size:5rem;color:rgba(181,148,75,0.12);position:absolute;top:1rem;left:1.5rem;line-height:1;}
    .tc-stars{color:var(--primary-gold);font-size:0.85rem;margin-bottom:1rem;}
    .tc-text{color:var(--neutral-graphite);font-size:0.92rem;font-style:italic;margin-bottom:1.5rem;line-height:1.7;}
    .tc-author{display:flex;align-items:center;gap:0.8rem;}
    .tc-avatar{width:44px;height:44px;background:var(--gradient-gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Merriweather',serif;font-weight:700;color:var(--white);font-size:0.9rem;}
    .tc-name{font-weight:600;color:var(--primary-navy);font-size:0.9rem;}
    .tc-role{font-size:0.78rem;color:var(--neutral-graphite);}

    /* CTA */
    .cta-banner{background:var(--gradient-navy);padding:5rem 0;text-align:center;position:relative;overflow:hidden;}
    .cta-banner::before{content:'';position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" stroke="%23B5944B" fill="none"/></svg>') center/150px repeat;}

</style>
@endsection

@section('content')
<!-- HERO -->
<section class="page-hero text-center">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">Lending Solutions</div>
        <h1 style="font-size:3.5rem;line-height:1.2;margin-bottom:1.5rem;">
            Finance Your <span style="color:var(--primary-gold);font-style:italic;font-weight:300;">Next Chapter</span>
        </h1>
        <p style="font-size:1.1rem;max-width:620px;margin:0 auto 2rem;opacity:0.85;">Competitive rates, flexible terms, and expert guidance for every milestone — from your first home to your next business venture.</p>
        <!-- <div class="d-flex gap-3 justify-content-center flex-wrap">
            <button class="btn btn-banking" style="padding:0.9rem 2.5rem;" onclick="scrollTo('loan-products')">Explore Loans</button>
            <button class="btn btn-outline-banking" style="padding:0.9rem 2.5rem;border-color:rgba(181,148,75,0.6);color:var(--primary-gold);" onclick="scrollTo('calculator')">Calculate Payment</button>
        </div> -->
    </div>
</section>

<!-- STATS -->
<div class="stats-strip" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">6.49%</span><span class="label">From — Mortgage APR</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">$12B+</span><span class="label">Loans Originated</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">24hr</span><span class="label">Pre-approval Decision</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">140+</span><span class="label">Years of Lending</span></div></div>
        </div>
    </div>
</div>

<!-- LOAN PRODUCTS -->
<section class="section" id="loan-products">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Our Products</span>
            <h2 style="color:var(--primary-navy);">Lending for Every Need</h2>
        </div>

        <div class="d-flex justify-content-center mb-5" data-aos="fade-up">
            <div class="loan-nav">
                <button class="loan-tab active" onclick="switchLoan('mortgage',this)"><i class="fas fa-home me-1"></i> Mortgage</button>
                <button class="loan-tab" onclick="switchLoan('personal',this)"><i class="fas fa-user me-1"></i> Personal</button>
                <button class="loan-tab" onclick="switchLoan('auto',this)"><i class="fas fa-car me-1"></i> Auto</button>
                <button class="loan-tab" onclick="switchLoan('business',this)"><i class="fas fa-briefcase me-1"></i> Business</button>
            </div>
        </div>

        <!-- MORTGAGE -->
        <div class="loan-panel active" id="panel-mortgage">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-home"></i></div>
                            <div class="pc-tag">Fixed Rate</div>
                            <h4 class="pc-name">30-Year Fixed</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">6.49%</div><div class="rate-lbl">Interest Rate</div></div>
                            <div class="rate-col"><div class="rate-num">6.61%</div><div class="rate-lbl">APR</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Stable payments for 30 years</li>
                            <li><i class="fas fa-check"></i> Up to $3M loan amount</li>
                            <li><i class="fas fa-check"></i> 3% minimum down payment</li>
                            <li><i class="fas fa-check"></i> No prepayment penalty</li>
                            <li><i class="fas fa-check"></i> Rate lock up to 90 days</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('30-Year Fixed Mortgage')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card featured">
                        <div class="featured-badge">Most Popular</div>
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-home"></i></div>
                            <div class="pc-tag">Fixed Rate</div>
                            <h4 class="pc-name">15-Year Fixed</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">5.89%</div><div class="rate-lbl">Interest Rate</div></div>
                            <div class="rate-col"><div class="rate-num">6.04%</div><div class="rate-lbl">APR</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Build equity faster</li>
                            <li><i class="fas fa-check"></i> Lower total interest paid</li>
                            <li><i class="fas fa-check"></i> Up to $3M loan amount</li>
                            <li><i class="fas fa-check"></i> 5% minimum down payment</li>
                            <li><i class="fas fa-check"></i> Rate lock up to 90 days</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-banking w-100" onclick="openApply('15-Year Fixed Mortgage')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-chart-line"></i></div>
                            <div class="pc-tag">Adjustable Rate</div>
                            <h4 class="pc-name">5/1 ARM</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">5.49%</div><div class="rate-lbl">Initial Rate</div></div>
                            <div class="rate-col"><div class="rate-num">6.20%</div><div class="rate-lbl">APR</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Low fixed rate for 5 years</li>
                            <li><i class="fas fa-check"></i> Ideal for shorter ownership</li>
                            <li><i class="fas fa-check"></i> Up to $5M jumbo available</li>
                            <li><i class="fas fa-check"></i> Annual cap: 2% / 5% lifetime</li>
                            <li><i class="fas fa-check"></i> Interest-only option available</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('5/1 ARM Mortgage')">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PERSONAL -->
        <div class="loan-panel" id="panel-personal">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-hand-holding-usd"></i></div>
                            <div class="pc-tag">Personal Loan</div>
                            <h4 class="pc-name">Signature Loan</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">8.99%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$50K</div><div class="rate-lbl">Max Amount</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> No collateral required</li>
                            <li><i class="fas fa-check"></i> Terms up to 84 months</li>
                            <li><i class="fas fa-check"></i> Same-day funding available</li>
                            <li><i class="fas fa-check"></i> Fixed monthly payments</li>
                            <li><i class="fas fa-check"></i> No origination fee</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Signature Loan')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card featured">
                        <div class="featured-badge">Best Rate</div>
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-home"></i></div>
                            <div class="pc-tag">Home Equity</div>
                            <h4 class="pc-name">HELOC</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">7.49%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$500K</div><div class="rate-lbl">Max Credit Line</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Draw as needed, pay as you go</li>
                            <li><i class="fas fa-check"></i> Interest-only draw period (10yr)</li>
                            <li><i class="fas fa-check"></i> Up to 85% combined LTV</li>
                            <li><i class="fas fa-check"></i> Potential tax advantages</li>
                            <li><i class="fas fa-check"></i> No closing costs option</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-banking w-100" onclick="openApply('HELOC')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-graduation-cap"></i></div>
                            <div class="pc-tag">Education</div>
                            <h4 class="pc-name">Student Loan Refi</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">5.24%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$300K</div><div class="rate-lbl">Max Amount</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Consolidate federal & private</li>
                            <li><i class="fas fa-check"></i> Fixed or variable rate options</li>
                            <li><i class="fas fa-check"></i> Terms: 5, 7, 10, 15, 20 years</li>
                            <li><i class="fas fa-check"></i> No origination or prepay fees</li>
                            <li><i class="fas fa-check"></i> 0.25% rate discount w/ autopay</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Student Loan Refinance')">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AUTO -->
        <div class="loan-panel" id="panel-auto">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="product-card featured">
                        <div class="featured-badge">Best Rate</div>
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-car"></i></div>
                            <div class="pc-tag">New Vehicle</div>
                            <h4 class="pc-name">New Auto Loan</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">5.99%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">84mo</div><div class="rate-lbl">Max Term</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> New vehicles up to $200K</li>
                            <li><i class="fas fa-check"></i> Same-day approval</li>
                            <li><i class="fas fa-check"></i> 0% down options available</li>
                            <li><i class="fas fa-check"></i> Rate discount with autopay</li>
                            <li><i class="fas fa-check"></i> No prepayment penalty</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-banking w-100" onclick="openApply('New Auto Loan')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-car-side"></i></div>
                            <div class="pc-tag">Pre-owned</div>
                            <h4 class="pc-name">Used Auto Loan</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">6.99%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">72mo</div><div class="rate-lbl">Max Term</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Vehicles up to 10 years old</li>
                            <li><i class="fas fa-check"></i> Up to $100K financing</li>
                            <li><i class="fas fa-check"></i> Private seller & dealer</li>
                            <li><i class="fas fa-check"></i> Online pre-approval in minutes</li>
                            <li><i class="fas fa-check"></i> No prepayment penalty</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Used Auto Loan')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-sync-alt"></i></div>
                            <div class="pc-tag">Refinance</div>
                            <h4 class="pc-name">Auto Refinance</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">5.74%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$500</div><div class="rate-lbl">Avg Monthly Savings</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Lower your current rate</li>
                            <li><i class="fas fa-check"></i> Reduce monthly payment</li>
                            <li><i class="fas fa-check"></i> 60-second pre-qualification</li>
                            <li><i class="fas fa-check"></i> No fees to refinance</li>
                            <li><i class="fas fa-check"></i> Skip first payment up to 90 days</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Auto Refinance')">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUSINESS -->
        <div class="loan-panel" id="panel-business">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="product-card featured">
                        <div class="featured-badge">Popular</div>
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-building"></i></div>
                            <div class="pc-tag">Commercial</div>
                            <h4 class="pc-name">Business Term Loan</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">7.25%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$5M</div><div class="rate-lbl">Max Amount</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Terms from 1 to 10 years</li>
                            <li><i class="fas fa-check"></i> Fixed or variable rate</li>
                            <li><i class="fas fa-check"></i> Equipment, expansion, M&A</li>
                            <li><i class="fas fa-check"></i> Dedicated relationship manager</li>
                            <li><i class="fas fa-check"></i> 48-hour credit decision</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-banking w-100" onclick="openApply('Business Term Loan')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-credit-card"></i></div>
                            <div class="pc-tag">Revolving</div>
                            <h4 class="pc-name">Business Line of Credit</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">Prime+</div><div class="rate-lbl">Rate</div></div>
                            <div class="rate-col"><div class="rate-num">$2M</div><div class="rate-lbl">Max Line</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Draw as needed anytime</li>
                            <li><i class="fas fa-check"></i> Pay interest only on drawn</li>
                            <li><i class="fas fa-check"></i> Annual renewal, no fees</li>
                            <li><i class="fas fa-check"></i> Secured & unsecured options</li>
                            <li><i class="fas fa-check"></i> Online access 24/7</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Business Line of Credit')">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="pc-header">
                            <div class="pc-icon"><i class="fas fa-landmark"></i></div>
                            <div class="pc-tag">Real Estate</div>
                            <h4 class="pc-name">Commercial Mortgage</h4>
                        </div>
                        <div class="rate-row">
                            <div class="rate-col"><div class="rate-num">6.75%</div><div class="rate-lbl">From APR</div></div>
                            <div class="rate-col"><div class="rate-num">$25M</div><div class="rate-lbl">Max Amount</div></div>
                        </div>
                        <ul class="feat-list">
                            <li><i class="fas fa-check"></i> Office, retail, industrial</li>
                            <li><i class="fas fa-check"></i> Up to 80% LTV</li>
                            <li><i class="fas fa-check"></i> Terms to 25 years</li>
                            <li><i class="fas fa-check"></i> Interest-only period option</li>
                            <li><i class="fas fa-check"></i> Bridge financing available</li>
                        </ul>
                        <div class="pc-footer">
                            <button class="btn btn-outline-banking w-100" onclick="openApply('Commercial Mortgage')">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- LOAN CALCULATOR -->
<section class="calc-section" id="calculator">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle" style="color:var(--primary-gold);">Loan Calculator</span>
            <h2 style="color:var(--white);">Estimate Your Payment</h2>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="calc-box h-100">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label-light">Loan Type</label>
                            <select class="form-ctrl-dark" id="loanType" onchange="calcLoan()">
                                <option value="6.49">30-Year Mortgage (6.49%)</option>
                                <option value="5.89">15-Year Mortgage (5.89%)</option>
                                <option value="8.99">Personal Loan (8.99%)</option>
                                <option value="5.99">Auto Loan (5.99%)</option>
                                <option value="7.25">Business Loan (7.25%)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Loan Amount: <span id="amtLabel" style="color:var(--primary-gold);">$250,000</span></label>
                            <input type="range" id="loanAmt" min="5000" max="2000000" step="5000" value="250000" oninput="updateAmt();calcLoan()">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Term (Years)</label>
                            <select class="form-ctrl-dark" id="loanTerm" onchange="calcLoan()">
                                <option value="5">5 Years</option>
                                <option value="10">10 Years</option>
                                <option value="15">15 Years</option>
                                <option value="20">20 Years</option>
                                <option value="30" selected>30 Years</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-light">Down Payment (%): <span id="dpLabel" style="color:var(--primary-gold);">20%</span></label>
                            <input type="range" id="downPayment" min="0" max="50" step="1" value="20" oninput="updateDP();calcLoan()">
                        </div>
                        <div class="col-12">
                            <label class="form-label-light">Credit Score Range</label>
                            <select class="form-ctrl-dark" id="creditScore" onchange="calcLoan()">
                                <option value="0">Excellent (760+)</option>
                                <option value="0.5">Good (720–759)</option>
                                <option value="1">Fair (680–719)</option>
                                <option value="1.5">Building (640–679)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="calc-result h-100 d-flex flex-column justify-content-center">
                    <div style="color:rgba(255,255,255,0.6);font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:0.5rem;">Estimated Monthly Payment</div>
                    <div class="result-num" id="monthlyPayment">$0</div>
                    <div style="color:rgba(255,255,255,0.4);font-size:0.78rem;margin-top:0.3rem;">Principal & Interest</div>
                    <hr style="border-color:rgba(181,148,75,0.3);margin:1.5rem 0;">
                    <div class="calc-breakdown">
                        <div class="breakdown-item">
                            <div class="breakdown-lbl">Loan Amount</div>
                            <div class="breakdown-num" id="calcLoanAmt">$0</div>
                        </div>
                        <div class="breakdown-item">
                            <div class="breakdown-lbl">Total Interest</div>
                            <div class="breakdown-num" style="color:var(--primary-gold);" id="calcInterest">$0</div>
                        </div>
                        <div class="breakdown-item">
                            <div class="breakdown-lbl">Total Cost</div>
                            <div class="breakdown-num" id="calcTotal">$0</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-banking w-100" onclick="openApply('Loan')">Get Pre-Approved</button>
                    </div>
                    <p style="color:rgba(255,255,255,0.35);font-size:0.72rem;margin-top:1rem;text-align:center;">Estimates only. Subject to credit approval. Rates may vary.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COMPARE TABLE -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Compare</span>
            <h2 style="color:var(--primary-navy);">Loan Products at a Glance</h2>
        </div>
        <div class="table-responsive" data-aos="fade-up">
            <table class="compare-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Mortgage</th>
                        <th>Personal</th>
                        <th>Auto</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Starting Rate</td><td class="thighlight">5.89% APR</td><td>8.99% APR</td><td>5.99% APR</td><td>7.25% APR</td></tr>
                    <tr><td>Max Amount</td><td class="thighlight">$5M</td><td>$500K (HELOC)</td><td>$200K</td><td>$25M</td></tr>
                    <tr><td>Collateral Required</td><td>Property</td><td>No (Signature)</td><td>Vehicle</td><td>Varies</td></tr>
                    <tr><td>Max Term</td><td>30 Years</td><td>84 Months</td><td>84 Months</td><td>25 Years</td></tr>
                    <tr><td>Prepayment Penalty</td><td class="tcheck"><i class="fas fa-times" style="color:#ccc;"></i> None</td><td class="tcheck"><i class="fas fa-times" style="color:#ccc;"></i> None</td><td class="tcheck"><i class="fas fa-times" style="color:#ccc;"></i> None</td><td>Varies</td></tr>
                    <tr><td>Decision Speed</td><td>24–48 hrs</td><td class="thighlight">Same day</td><td class="thighlight">Same day</td><td>48 hrs</td></tr>
                    <tr><td>Relationship Manager</td><td class="tcheck"><i class="fas fa-check"></i></td><td>—</td><td>—</td><td class="tcheck"><i class="fas fa-check"></i></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- WHY PREMIER LENDING -->
<section class="section" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Why Us</span>
            <h2 style="color:var(--primary-navy);">The PremierBank Lending Advantage</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up"><div class="why-card"><div class="why-icon"><i class="fas fa-bolt"></i></div><div><h5>Fast Decisions</h5><p>Same-day pre-approval on personal and auto loans. Mortgage decisions within 24 hours.</p></div></div></div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100"><div class="why-card"><div class="why-icon"><i class="fas fa-lock-open"></i></div><div><h5>No Hidden Fees</h5><p>We quote all costs upfront. No origination surprises, no prepayment penalties on most products.</p></div></div></div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200"><div class="why-card"><div class="why-icon"><i class="fas fa-user-tie"></i></div><div><h5>Expert Guidance</h5><p>Every borrower gets a dedicated loan officer — not a call centre, a named expert.</p></div></div></div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300"><div class="why-card"><div class="why-icon"><i class="fas fa-percentage"></i></div><div><h5>Rate Match Promise</h5><p>Found a better rate? We'll match or beat any competing offer from a qualified lender.</p></div></div></div>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">How It Works</span>
            <h2 style="color:var(--primary-navy);">Your Path to Approval</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="fas fa-clipboard-check"></i></div>
                    <h4 style="color:var(--primary-navy);margin-bottom:0.8rem;">Pre-Qualify</h4>
                    <p style="color:var(--neutral-graphite);font-size:0.9rem;">Complete a 2-minute application online. No hard credit pull at this stage.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card">
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="fas fa-file-upload"></i></div>
                    <h4 style="color:var(--primary-navy);margin-bottom:0.8rem;">Submit Documents</h4>
                    <p style="color:var(--neutral-graphite);font-size:0.9rem;">Securely upload ID, income verification, and supporting documents via our portal.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card">
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="fas fa-handshake"></i></div>
                    <h4 style="color:var(--primary-navy);margin-bottom:0.8rem;">Get Approved</h4>
                    <p style="color:var(--neutral-graphite);font-size:0.9rem;">Our underwriting team reviews your file and issues a formal approval with final terms.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="fas fa-money-bill-wave"></i></div>
                    <h4 style="color:var(--primary-navy);margin-bottom:0.8rem;">Receive Funds</h4>
                    <p style="color:var(--neutral-graphite);font-size:0.9rem;">Sign electronically and funds are disbursed — same day for eligible loans.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="section" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Client Stories</span>
            <h2 style="color:var(--primary-navy);">What Our Borrowers Say</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="testimonial-card">
                    <div class="tc-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="tc-text">PremierBank made buying our first home effortless. Our loan officer walked us through every step, and we closed in under 30 days. The rate was exceptional.</p>
                    <div class="tc-author"><div class="tc-avatar">SR</div><div><div class="tc-name">Sarah & Ryan M.</div><div class="tc-role">30-Year Fixed, New York</div></div></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="tc-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="tc-text">We refinanced our auto loan from another bank and saved $340 per month. The process took 48 hours total. I wish I'd done it sooner.</p>
                    <div class="tc-author"><div class="tc-avatar">DK</div><div><div class="tc-name">David K.</div><div class="tc-role">Auto Refinance, Chicago</div></div></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="tc-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="tc-text">The business line of credit gave us the flexibility to grow without the stress of a term loan. Our relationship manager understood our industry inside out.</p>
                    <div class="tc-author"><div class="tc-avatar">LT</div><div><div class="tc-name">Lauren T.</div><div class="tc-role">Business LOC, San Francisco</div></div></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection