@extends('layouts.webapp')

@section('style')
<style>
    /* ===== HERO ===== */
    .business-hero {
        background: var(--gradient-navy);
        color: #fff;
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .business-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 100px;
    }

    .business-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background: linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%);
    }

    .business-hero .hero-inner {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(181, 148, 75, 0.15);
        border: 1px solid rgba(181, 148, 75, 0.3);
        padding: 0.5rem 1.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.8rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--primary-gold);
    }

    /* ===== SECTION ===== */
    .section {
        padding: 6rem 0;
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

    /* ===== FEATURED ===== */
    .featured {
        background: var(--white);
        border: var(--border-elegant);
    }

    .featured-content {
        padding: 3rem;
    }

    .featured .insight-tag {
        display: inline-block;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary-gold);
        margin-bottom: 0.5rem;
    }

    .featured-content h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--primary-navy);
    }

    .featured-content p {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        color: var(--neutral-graphite);
    }

    .read-more {
        color: var(--primary-gold);
        font-weight: 700;
        text-decoration: none;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: gap 0.2s;
    }

    .read-more:hover {
        gap: 0.8rem;
        color: var(--primary-navy);
    }

    /* ===== STATS STRIP ===== */
    .stats-strip {
        background: var(--primary-navy);
        padding: 3rem 0;
        border-top: 3px solid var(--primary-gold);
        border-bottom: 3px solid var(--primary-gold);
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .number {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Merriweather', serif;
        color: var(--primary-gold);
        display: block;
    }

    .stat-item .label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgba(255, 255, 255, 0.7);
    }

    /* ===== SERVICE CARDS ===== */
    .service-card {
        background: var(--white);
        border: var(--border-elegant);
        overflow: hidden;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
    }

    .service-card::before {
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

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-elegant);
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card .card-img-wrap {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .service-card .card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .service-card:hover .card-img-wrap img {
        transform: scale(1.06);
    }

    .service-card .card-img-wrap .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(11, 30, 51, 0.7) 0%, transparent 60%);
    }

    .service-card .card-img-wrap .cat-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--primary-gold);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 0.3rem 0.85rem;
    }

    .service-card .card-img-wrap .card-icon {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        background: rgba(181, 148, 75, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
    }

    .service-card .card-body-custom {
        padding: 1.6rem;
    }

    .service-card h4 {
        font-size: 1.15rem;
        color: var(--primary-navy);
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .service-card p {
        font-size: 0.88rem;
        color: var(--neutral-graphite);
        margin-bottom: 1.2rem;
    }

    .service-card .card-footer-custom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px dashed rgba(181, 148, 75, 0.25);
    }

    .service-card .learn-more {
        color: var(--primary-gold);
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        transition: gap 0.2s;
    }

    .service-card .learn-more:hover {
        gap: 0.75rem;
        color: var(--primary-navy);
    }

    .service-card .service-tag {
        font-size: 0.75rem;
        color: var(--neutral-graphite);
    }

    /* ===== PROCESS SECTION ===== */
    .process-card {
        background: var(--white);
        padding: 3rem 2rem;
        border: var(--border-elegant);
        transition: all 0.4s;
        position: relative;
        height: 100%;
    }

    .process-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-elegant);
    }

    .process-number {
        font-size: 4rem;
        font-weight: 900;
        font-family: 'Merriweather', serif;
        color: rgba(181, 148, 75, 0.15);
        line-height: 1;
        margin-bottom: 1rem;
    }

    .process-icon {
        width: 60px;
        height: 60px;
        background: rgba(181, 148, 75, 0.08);
        border: var(--border-elegant);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .process-icon i {
        font-size: 1.5rem;
        color: var(--primary-gold);
    }

    .process-card h4 {
        color: var(--primary-navy);
        margin-bottom: 1rem;
    }

    .process-card p {
        color: var(--neutral-graphite);
        font-size: 0.95rem;
    }

    /* ===== CTA BANNER ===== */
    .cta-banner {
        background: var(--gradient-navy);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
        color: #fff;
    }

    .cta-banner::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 80px;
    }

    .cta-banner .cta-inner {
        position: relative;
        z-index: 2;
    }

    .cta-banner h2 {
        font-size: 2.4rem;
        margin-bottom: 1rem;
    }

    .cta-banner p {
        font-size: 1.1rem;
        opacity: 0.8;
        margin-bottom: 2rem;
        font-weight: 300;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonial-card {
        background: var(--white);
        border: var(--border-elegant);
        padding: 2.5rem;
        height: 100%;
        transition: all 0.3s;
        position: relative;
    }

    .testimonial-card:hover {
        box-shadow: var(--shadow-subtle);
        transform: translateY(-5px);
    }

    .testimonial-card .quote-icon {
        font-size: 3rem;
        color: rgba(181, 148, 75, 0.2);
        font-family: 'Merriweather', serif;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .testimonial-card p {
        color: var(--neutral-graphite);
        font-size: 0.95rem;
        font-style: italic;
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-top: 1.2rem;
        border-top: 1px dashed rgba(181, 148, 75, 0.25);
    }

    .author-avatar {
        width: 48px;
        height: 48px;
        background: var(--gradient-gold);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        font-family: 'Merriweather', serif;
        flex-shrink: 0;
    }

    .author-info .name {
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--primary-navy);
        display: block;
    }

    .author-info .role {
        font-size: 0.8rem;
        color: var(--neutral-graphite);
    }
</style>
@endsection

@section('content')
<!-- HERO -->
<section class="business-hero text-center">
    <div class="container hero-inner" data-aos="fade-up">
        <div class="hero-badge">Business Banking</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            Banking Built for <span
                style="color:var(--primary-gold); font-style:italic; font-weight:300;">Business</span>
        </h1>
        <p style="font-size:1.2rem; opacity:0.85; font-weight:300; max-width:600px; margin:0 auto 2.5rem;">
            From startups to multinationals — tailored financial solutions that power your enterprise at every stage
            of growth.
        </p>
        <div class="d-flex gap-3 justify-content-center">
            <button onclick="showSignup()" class="btn btn-banking" style="padding:0.85rem 2.5rem;background-color:var(--primary-gold);">Open Business Account</button>
        </div>
    </div>
</section>

<!-- FEATURED SERVICE -->
<section class="section">
    <div class="container">
        <div class="featured" data-aos="fade-up">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80');
                                background-size: cover; background-position: center; height: 420px;">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="featured-content">
                        <span class="insight-tag">Featured Service</span>
                        <h2>Commercial Banking & Treasury Solutions</h2>
                        <p>Premier Bank's commercial banking division delivers end-to-end financial infrastructure
                            for growing businesses — from working capital and trade finance to sophisticated
                            treasury management. Our relationship bankers are embedded in your industry, not just
                            your account.</p>
                        {{-- <a href="#" class="read-more">Discover More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- STATS STRIP -->
<div class="stats-strip" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">$120B+</span>
                    <span class="label">Business Loans Issued</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">85K+</span>
                    <span class="label">Business Clients</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">62</span>
                    <span class="label">Countries Served</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">24/7</span>
                    <span class="label">Dedicated Support</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SERVICES GRID -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Our Services</span>
            <h2 style="color: var(--primary-navy);">Comprehensive Business Solutions</h2>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=80"
                            alt="Business Lending">
                        <div class="overlay"></div>
                        <span class="cat-badge">Lending</span>
                        <div class="card-icon"><i class="fas fa-hand-holding-usd"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>Business Loans & Credit Lines</h4>
                        <p>Flexible financing structures — from term loans and revolving credit to asset-backed
                            facilities — designed around your cash flow.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> From $50K</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80"
                            alt="Treasury">
                        <div class="overlay"></div>
                        <span class="cat-badge">Treasury</span>
                        <div class="card-icon"><i class="fas fa-chart-bar"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>Treasury & Cash Management</h4>
                        <p>Optimise liquidity, automate payables and receivables, and gain real-time visibility
                            across all your accounts globally.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> Real-Time</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1578574577315-3fbeb0cecdc2?auto=format&fit=crop&w=800&q=80"
                            alt="Trade Finance">
                        <div class="overlay"></div>
                        <span class="cat-badge">Trade Finance</span>
                        <div class="card-icon"><i class="fas fa-ship"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>International Trade Finance</h4>
                        <p>Letters of credit, documentary collections, and supply chain financing to support
                            cross-border transactions with confidence.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> 62 Countries</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80"
                            alt="Payments">
                        <div class="overlay"></div>
                        <span class="cat-badge">Payments</span>
                        <div class="card-icon"><i class="fas fa-credit-card"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>Business Payments & Merchant Services</h4>
                        <p>Fast, secure domestic and international payments with competitive FX rates and seamless
                            API integrations.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> API Ready</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80"
                            alt="Advisory">
                        <div class="overlay"></div>
                        <span class="cat-badge">Advisory</span>
                        <div class="card-icon"><i class="fas fa-user-tie"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>M&A and Corporate Advisory</h4>
                        <p>Strategic guidance on mergers, acquisitions, capital raises, and restructuring — backed
                            by deep sector expertise.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> Dedicated Team</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1518186285589-2f7649de83e0?auto=format&fit=crop&w=800&q=80"
                            alt="FX">
                        <div class="overlay"></div>
                        <span class="cat-badge">FX & Markets</span>
                        <div class="card-icon"><i class="fas fa-exchange-alt"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h4>Foreign Exchange & Hedging</h4>
                        <p>Protect margins with tailored FX hedging strategies — spot, forward, and options — across
                            140+ currency pairs.</p>
                        <div class="card-footer-custom">
                            {{-- <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                            <span class="service-tag"><i class="fas fa-check-circle"
                                    style="color:var(--primary-gold);"></i> 140+ Pairs</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="section" style="background: var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">How It Works</span>
            <h2 style="color: var(--primary-navy);">Getting Started Is Simple</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="fas fa-file-alt"></i></div>
                    <h4>Apply Online</h4>
                    <p>Complete our streamlined digital application in under 10 minutes. No branch visit required to
                        get started.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card">
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="fas fa-user-check"></i></div>
                    <h4>Meet Your Banker</h4>
                    <p>A dedicated relationship manager will contact you to understand your business needs and
                        tailor a solution.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card">
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="fas fa-cogs"></i></div>
                    <h4>Customise</h4>
                    <p>We configure your account, credit facilities, and integrated services to align with your
                        operating structure.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="fas fa-rocket"></i></div>
                    <h4>Launch & Grow</h4>
                    <p>Go live with full banking capabilities. Your banker remains your single point of contact as
                        your business scales.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Client Stories</span>
            <h2 style="color: var(--primary-navy);">What Our Clients Say</h2>
        </div>
        <div class="row g-4">

            <div class="col-md-4" data-aos="fade-up">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p>Premier Bank's treasury team transformed how we manage cash across 14 markets. The visibility
                        and efficiency gains were immediate and material.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RK</div>
                        <div class="author-info">
                            <span class="name">Rajiv Kumar</span>
                            <span class="role">CFO, TechNova Group</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p>The trade finance solutions gave us the confidence to expand into Southeast Asia. Our
                        relationship manager understood our industry from day one.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SL</div>
                        <div class="author-info">
                            <span class="name">Sarah Lim</span>
                            <span class="role">CEO, Meridian Exports</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p>When we needed to move fast on an acquisition, Premier Bank's advisory team delivered a
                        financing structure in 72 hours. Exceptional execution.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MH</div>
                        <div class="author-info">
                            <span class="name">Michael Hartmann</span>
                            <span class="role">Managing Director, Hartmann Capital</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection