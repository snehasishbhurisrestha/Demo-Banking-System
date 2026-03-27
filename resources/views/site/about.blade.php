@extends('layouts.webapp')

@section('style')
<style>
    /* ===== HERO ===== */
    .about-hero {
        background: var(--gradient-navy);
        color: #fff;
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 60%; height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 100px;
    }

    .about-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 100%; height: 80px;
        background: linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%);
    }

    .about-hero .hero-inner { position: relative; z-index: 2; }

    .hero-badge {
        display: inline-block;
        background: rgba(181,148,75,0.15);
        border: 1px solid rgba(181,148,75,0.3);
        padding: 0.5rem 1.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.8rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--primary-gold);
    }
    /* ===== SECTION ===== */
    .section { padding: 6rem 0; }

    .section-subtitle {
        color: var(--primary-gold);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: block;
    }

    /* ===== HERITAGE FEATURED ===== */
    .featured {
        background: var(--white);
        border: var(--border-elegant);
    }

    .featured-content { padding: 3rem; }

    .featured-content h2 { font-size: 2rem; margin-bottom: 1rem; color: var(--primary-navy); }
    .featured-content p { font-size: 1rem; margin-bottom: 1.2rem; color: var(--neutral-graphite); line-height: 1.8; }

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

    .read-more:hover { gap: 0.8rem; color: var(--primary-navy); }

    /* ===== STATS STRIP ===== */
    .stats-strip {
        background: var(--primary-navy);
        padding: 3rem 0;
        border-top: 3px solid var(--primary-gold);
        border-bottom: 3px solid var(--primary-gold);
    }

    .stat-item { text-align: center; }

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
        color: rgba(255,255,255,0.7);
    }

    /* ===== VALUES CARDS ===== */
    .value-card {
        background: var(--white);
        border: var(--border-elegant);
        padding: 2.5rem 2rem;
        height: 100%;
        position: relative;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.4s;
    }

    .value-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-elegant); }
    .value-card:hover::before { transform: scaleX(1); }

    .value-icon {
        width: 64px; height: 64px;
        background: rgba(181,148,75,0.08);
        border: var(--border-elegant);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .value-icon i { font-size: 1.6rem; color: var(--primary-gold); }

    .value-card h4 { color: var(--primary-navy); margin-bottom: 0.75rem; font-size: 1.2rem; }
    .value-card p { color: var(--neutral-graphite); font-size: 0.92rem; line-height: 1.7; }

    /* ===== TIMELINE ===== */
    .timeline-wrap {
        position: relative;
        padding-left: 0;
    }

    .timeline-line {
        position: absolute;
        left: 50%;
        top: 0; bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-gold), rgba(181,148,75,0.2));
        transform: translateX(-50%);
    }

    .timeline-item {
        display: flex;
        justify-content: flex-end;
        padding-right: calc(50% + 2.5rem);
        margin-bottom: 3rem;
        position: relative;
    }

    .timeline-item.right {
        justify-content: flex-start;
        padding-right: 0;
        padding-left: calc(50% + 2.5rem);
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        top: 1.2rem;
        transform: translateX(-50%);
        width: 16px; height: 16px;
        background: var(--primary-gold);
        border-radius: 50%;
        box-shadow: 0 0 0 5px rgba(181,148,75,0.2);
        z-index: 2;
    }

    .timeline-card {
        background: var(--white);
        border: var(--border-elegant);
        padding: 1.5rem 2rem;
        max-width: 420px;
        transition: all 0.3s;
    }

    .timeline-card:hover { box-shadow: var(--shadow-subtle); transform: translateY(-3px); }

    .timeline-year {
        font-size: 1.6rem;
        font-weight: 900;
        font-family: 'Merriweather', serif;
        color: var(--primary-gold);
        display: block;
        margin-bottom: 0.3rem;
    }

    .timeline-card h5 { color: var(--primary-navy); font-size: 1rem; margin-bottom: 0.5rem; }
    .timeline-card p { color: var(--neutral-graphite); font-size: 0.88rem; margin: 0; line-height: 1.65; }

    /* Mobile timeline */
    @media (max-width: 768px) {
        .timeline-line { left: 1rem; }
        .timeline-item, .timeline-item.right {
            justify-content: flex-start;
            padding-left: 3.5rem;
            padding-right: 0;
        }
        .timeline-dot { left: 1rem; }
        .timeline-card { max-width: 100%; }
    }

    /* ===== LEADERSHIP CARDS ===== */
    .leader-card {
        background: var(--white);
        border: var(--border-elegant);
        overflow: hidden;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
    }

    .leader-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.4s;
    }

    .leader-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-elegant); }
    .leader-card:hover::before { transform: scaleX(1); }

    .leader-img {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .leader-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        transition: transform 0.5s ease;
    }

    .leader-card:hover .leader-img img { transform: scale(1.05); }

    .leader-img .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(11,30,51,0.6) 0%, transparent 60%);
    }

    .leader-body { padding: 1.6rem; }

    .leader-body h5 { color: var(--primary-navy); font-size: 1.1rem; margin-bottom: 0.25rem; }

    .leader-role {
        color: var(--primary-gold);
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        display: block;
        margin-bottom: 0.75rem;
    }

    .leader-body p { color: var(--neutral-graphite); font-size: 0.88rem; margin-bottom: 1rem; }

    .leader-footer {
        padding-top: 0.8rem;
        border-top: 1px dashed rgba(181,148,75,0.25);
        display: flex;
        gap: 0.75rem;
    }

    .leader-footer a {
        color: var(--neutral-graphite);
        font-size: 0.9rem;
        transition: color 0.2s;
    }

    .leader-footer a:hover { color: var(--primary-gold); }

    /* ===== MISSION/VISION SPLIT ===== */
    .mv-card {
        background: var(--white);
        border: var(--border-elegant);
        padding: 3rem 2.5rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
    }

    .mv-card:hover { box-shadow: var(--shadow-subtle); }

    .mv-card .mv-number {
        font-size: 6rem;
        font-weight: 900;
        font-family: 'Merriweather', serif;
        color: rgba(181,148,75,0.08);
        position: absolute;
        top: -1rem; right: 1.5rem;
        line-height: 1;
    }

    .mv-card h3 { color: var(--primary-navy); margin-bottom: 1.2rem; font-size: 1.5rem; }
    .mv-card p { color: var(--neutral-graphite); font-size: 0.95rem; line-height: 1.8; }

    .mv-icon {
        width: 56px; height: 56px;
        background: rgba(181,148,75,0.08);
        border: var(--border-elegant);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .mv-icon i { font-size: 1.4rem; color: var(--primary-gold); }

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
        top: 0; right: 0;
        width: 50%; height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 80px;
    }

    .cta-banner .cta-inner { position: relative; z-index: 2; }
    .cta-banner h2 { font-size: 2.4rem; margin-bottom: 1rem; }
    .cta-banner p { font-size: 1.1rem; opacity: 0.8; margin-bottom: 2rem; font-weight: 300; }
</style>
@endsection

@section('content')
<!-- HERO -->
<section class="about-hero text-center">
    <div class="container hero-inner" data-aos="fade-up">
        <div class="hero-badge">Est. 1885</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            About <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Premier Bank</span>
        </h1>
        <p style="font-size:1.2rem; opacity:0.85; font-weight:300; max-width:600px; margin:0 auto;">
            A legacy of trust, innovation, and financial excellence — serving generations since 1885.
        </p>
    </div>
</section>

<!-- HERITAGE FEATURED -->
<section class="section">
    <div class="container">
        <div class="featured" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div style="background-image: url('https://images.unsplash.com/photo-1486325212027-8081e485255e?auto=format&fit=crop&w=800&q=80');
                                background-size: cover; background-position: center; height: 420px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="featured-content">
                        <span class="section-subtitle">Our Heritage</span>
                        <h2>Over 140 Years of Financial Excellence</h2>
                        <p>Founded in 1885 as a private institution serving high-net-worth families, Premier Bank has grown into a global financial powerhouse — while never losing sight of the relationships that made us who we are.</p>
                        <p>From a single branch to operations across 62 countries, our commitment has remained constant: putting clients first, always.</p>
                        {{-- <a href="#timeline" class="read-more">Explore Our History <i class="fas fa-arrow-right"></i></a> --}}
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
                    <span class="number">140+</span>
                    <span class="label">Years of Heritage</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">$127B+</span>
                    <span class="label">Assets Under Management</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">2M+</span>
                    <span class="label">Clients Worldwide</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">62</span>
                    <span class="label">Countries Served</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MISSION & VISION -->
<section class="section" style="background: var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">What Drives Us</span>
            <h2 style="color: var(--primary-navy);">Our Mission & Vision</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up">
                <div class="mv-card">
                    <div class="mv-number">M</div>
                    <div class="mv-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p>To deliver world-class financial solutions that empower individuals, businesses, and institutions — built on a foundation of unwavering integrity, long-term relationships, and exceptional expertise.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="mv-card">
                    <div class="mv-number">V</div>
                    <div class="mv-icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be the most trusted and respected private banking institution in the world — where every client feels they are our only client, and every decision reflects our 140-year legacy of excellence.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">What We Stand For</span>
            <h2 style="color: var(--primary-navy);">Our Core Values</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                    <h4>Trust & Integrity</h4>
                    <p>Every decision we make is guided by honesty and transparency. We earn trust through consistent action, not words alone.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4>Innovation</h4>
                    <p>We continuously evolve — combining century-old wisdom with modern technology to deliver solutions that are ahead of their time.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-users"></i></div>
                    <h4>Client First</h4>
                    <p>Our clients' success is our success. We listen deeply, advise carefully, and act in their best interest — always.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-globe"></i></div>
                    <h4>Global Perspective</h4>
                    <p>With presence in 62 countries, we bring local expertise and global reach to every client relationship.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-leaf"></i></div>
                    <h4>Responsibility</h4>
                    <p>We invest in sustainable futures — for our clients, our communities, and our planet. Finance with purpose.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-award"></i></div>
                    <h4>Excellence</h4>
                    <p>We hold ourselves to the highest standard in everything — from our products to the way we answer the phone.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section class="section" id="timeline" style="background: var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Our Legacy</span>
            <h2 style="color: var(--primary-navy);">A Journey Through Time</h2>
        </div>

        <div class="timeline-wrap position-relative">
            <div class="timeline-line d-none d-md-block"></div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">1885</span>
                    <h5>Foundation of Excellence</h5>
                    <p>Premier Bank was established as a private financial institution focused on serving high-net-worth families with integrity and discretion.</p>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">1920</span>
                    <h5>Commercial Banking Expansion</h5>
                    <p>Introduced business banking services, supporting industrial growth and emerging enterprises during a transformative economic era.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">1950</span>
                    <h5>National Growth</h5>
                    <p>Expanded to over 100 branches nationwide, becoming a trusted name in personal and corporate banking across the country.</p>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">1985</span>
                    <h5>Global Presence</h5>
                    <p>Opened international offices in key financial hubs, offering cross-border wealth management and investment solutions across 30+ countries.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">2000</span>
                    <h5>Digital Transformation</h5>
                    <p>Launched secure online banking, pioneering digital financial services with advanced encryption and user-focused design.</p>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">2015</span>
                    <h5>Fintech Integration</h5>
                    <p>Integrated AI-driven analytics and mobile-first banking experiences, enhancing personalisation and real-time financial insights.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">2020</span>
                    <h5>Resilience & Innovation</h5>
                    <p>Adapted to global challenges by expanding digital infrastructure and offering seamless remote banking services worldwide.</p>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-year">2026</span>
                    <h5>Modern Private Banking Leader</h5>
                    <p>Serving over 2 million clients globally with $127B+ in assets under management and cutting-edge financial technology.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LEADERSHIP -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">The People Behind Premier</span>
            <h2 style="color: var(--primary-navy);">Our Leadership Team</h2>
        </div>
        <div class="row g-4">

            <div class="col-md-4" data-aos="fade-up">
                <div class="leader-card">
                    <div class="leader-img">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" alt="James Wellington">
                        <div class="overlay"></div>
                    </div>
                    <div class="leader-body">
                        <h5>James Wellington</h5>
                        <span class="leader-role">Chief Executive Officer</span>
                        <p>30+ years in global banking leadership. Previously at Goldman Sachs and Barclays Private Bank. Architect of Premier's global expansion strategy.</p>
                        <div class="leader-footer">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="leader-card">
                    <div class="leader-img">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Sarah Mitchell">
                        <div class="overlay"></div>
                    </div>
                    <div class="leader-body">
                        <h5>Sarah Mitchell</h5>
                        <span class="leader-role">Chief Financial Officer</span>
                        <p>Expert in wealth management and investment strategy with 25 years of experience across JP Morgan and Deutsche Bank's private wealth divisions.</p>
                        <div class="leader-footer">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="leader-card">
                    <div class="leader-img">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80" alt="David Clark">
                        <div class="overlay"></div>
                    </div>
                    <div class="leader-body">
                        <h5>David Clark</h5>
                        <span class="leader-role">Chief Technology Officer</span>
                        <p>Driving Premier's digital transformation agenda. Former Head of Fintech at HSBC. Pioneer in AI-driven risk management and banking infrastructure.</p>
                        <div class="leader-footer">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="cta-banner" data-aos="fade-up">
    <div class="container cta-inner text-center">
        <span class="section-subtitle">Join Premier Bank</span>
        <h2>Experience Banking Built on a Century of Trust</h2>
        <p>Open an account today and become part of a legacy that has stood the test of time.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <button onclick="showSignup()" class="btn btn-banking" style="padding:0.9rem 2.5rem; background:var(--primary-gold); border-color:var(--primary-gold); color:#fff;">Open an Account</button>
        </div>
    </div>
</section>
@endsection