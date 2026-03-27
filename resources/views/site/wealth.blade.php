@extends('layouts.webapp')

@section('style')
<style>
    /* HERO */
    .wealth-hero {
        background: var(--gradient-navy);
        color: #fff;
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .wealth-hero::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 60%; height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 100px;
    }

    .wealth-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 100%; height: 80px;
        background: linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%);
    }

    /* SECTION */
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

    /* FEATURED WEALTH SERVICE */
    .featured {
        background: var(--white);
        border: var(--border-elegant);
    }

    .featured .insight-img {
        background-size: cover;
        background-position: center;
        width: 100%;
    }

    .featured-content { padding: 3rem; }

    .featured .insight-tag {
        display: inline-block;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary-gold);
        margin-bottom: 0.5rem;
    }

    .featured-content h2 { font-size: 2rem; margin-bottom: 1rem; }
    .featured-content p { font-size: 1rem; margin-bottom: 1rem; }

    .featured-content .read-more {
        color: var(--primary-gold);
        font-weight: 600;
        text-decoration: none;
        font-size: 0.85rem;
    }

    /* WEALTH SERVICE CARDS */
    .wealth-card {
        background: var(--white);
        border: var(--border-elegant);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        height: 100%;
        position: relative;
    }

    .wealth-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.4s;
    }

    .wealth-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-elegant);
    }

    .wealth-card:hover::before { transform: scaleX(1); }

    .wealth-img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .wealth-content { padding: 1.8rem; }

    .wealth-tag {
        color: var(--primary-gold);
        font-size: 0.75rem;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .wealth-content h4 {
        font-size: 1.3rem;
        margin: 1rem 0;
        color: var(--primary-navy);
    }

    .wealth-content p {
        color: var(--neutral-graphite);
        font-size: 0.9rem;
    }

    .read-more {
        color: var(--primary-gold);
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: 1rem;
    }

    .read-more:hover { gap: 0.8rem; color: var(--primary-navy); }

    /* STATS STRIP */
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

    /* PROCESS SECTION */
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
        width: 60px; height: 60px;
        background: rgba(181, 148, 75, 0.08);
        border: var(--border-elegant);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .process-icon i { font-size: 1.5rem; color: var(--primary-gold); }

    .process-card h4 { color: var(--primary-navy); margin-bottom: 1rem; }
    .process-card p { color: var(--neutral-graphite); font-size: 0.95rem; }
</style>
@endsection

@section('content')
<!-- HERO -->
<section class="wealth-hero text-center">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">Wealth Management</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            Wealth <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Management</span>
        </h1>
        <p class="mt-3">Bespoke strategies to grow, protect, and transfer your legacy across generations.</p>
    </div>
</section>

<!-- FEATURED WEALTH SERVICE -->
<section class="section">
    <div class="container">
        <div class="featured" data-aos="fade-up">
            <div class="row align-items-center">

                <!-- Image Column -->
                <div class="col-lg-6">
                    <div style="background-image: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?auto=format&fit=crop&w=800&q=80');
                                background-size: cover; background-position: center;
                                height: 400px;">
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-6">
                    <div class="featured-content">
                        <span class="insight-tag">Featured Service</span>
                        <h2>Private Wealth Advisory</h2>
                        <p>Our dedicated team of private bankers and wealth advisors craft personalized strategies aligned with your financial goals. From portfolio construction to estate planning, we deliver holistic solutions for high-net-worth individuals and families seeking lasting financial security.</p>
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
                    <span class="number">$48B+</span>
                    <span class="label">Assets Under Management</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">140+</span>
                    <span class="label">Years of Heritage</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">98%</span>
                    <span class="label">Client Retention Rate</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="number">3,200+</span>
                    <span class="label">Private Clients Worldwide</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WEALTH SERVICES GRID -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle">Our Services</span>
            <h2 style="color: var(--primary-navy);">Comprehensive Wealth Solutions</h2>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Investment</span>
                        <h4>Portfolio Management</h4>
                        <p>Diversified investment strategies tailored to your risk profile and long-term objectives.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Planning</span>
                        <h4>Estate & Legacy Planning</h4>
                        <p>Structured plans to ensure your wealth is preserved and transferred seamlessly to future generations.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1604594849809-dfedbc827105?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Tax</span>
                        <h4>Tax Optimisation</h4>
                        <p>Proactive tax planning strategies to minimise liabilities and enhance after-tax returns.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Private Banking</span>
                        <h4>Exclusive Banking Privileges</h4>
                        <p>Dedicated relationship managers, priority access, and bespoke financial products.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Philanthropy</span>
                        <h4>Charitable Giving & Foundations</h4>
                        <p>Structured philanthropic vehicles to maximise social impact while optimising tax efficiency.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="wealth-card">
                    <div class="wealth-img"
                        style="background-image:url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="wealth-content">
                        <span class="wealth-tag">Real Assets</span>
                        <h4>Alternative Investments</h4>
                        <p>Access to private equity, real estate, hedge funds, and exclusive alternative asset classes.</p>
                        {{-- <a href="#" class="read-more">Learn More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- OUR PROCESS -->
<section class="section" style="background: var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">How It Works</span>
            <h2 style="color: var(--primary-navy);">Our Wealth Advisory Process</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="fas fa-comments"></i></div>
                    <h4>Discovery</h4>
                    <p>We begin with a comprehensive consultation to understand your financial situation, goals, and values.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card">
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>Strategy</h4>
                    <p>Our experts design a bespoke wealth management plan aligned with your risk profile and timeline.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card">
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="fas fa-cogs"></i></div>
                    <h4>Implementation</h4>
                    <p>We execute your strategy with precision, leveraging our global network and proprietary research.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="fas fa-sync-alt"></i></div>
                    <h4>Review</h4>
                    <p>Regular portfolio reviews and proactive adjustments ensure your plan evolves with your life.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection