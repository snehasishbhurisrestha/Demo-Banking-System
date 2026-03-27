@extends('layouts.webapp')

@section('style')
<style>
    /* ===== HERO — same as wealth.html ===== */
    .insights-hero {
        background: var(--gradient-navy);
        color: #fff;
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    /* Geometric SVG pattern — identical to wealth hero ::before */
    .insights-hero::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 60%; height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
        background-size: 100px;
    }

    /* Diagonal cut — identical to wealth hero ::after */
    .insights-hero::after {
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

    /* FEATURED */
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

    /* INSIGHT CARDS */
    .insight-card {
        background: var(--white);
        border: var(--border-elegant);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        height: 100%;
        position: relative;
    }

    .insight-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--gradient-gold);
        transform: scaleX(0);
        transition: transform 0.4s;
    }

    .insight-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-elegant);
    }

    .insight-card:hover::before { transform: scaleX(1); }

    .insight-img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .insight-content { padding: 1.8rem; }

    .insight-tag {
        color: var(--primary-gold);
        font-size: 0.75rem;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .insight-content h4 {
        font-size: 1.3rem;
        margin: 1rem 0;
        color: var(--primary-navy);
    }

    .insight-content p {
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
</style>
@endsection

@section('content')
<!-- HERO — now matches wealth.html exactly -->
<section class="insights-hero text-center">
    <div class="container" data-aos="fade-up">
            <div class="hero-badge">Meaningful Insights</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            Financial <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Insights</span>
        </h1>
        <p class="mt-3" style="font-size:1.2rem; opacity:0.85; font-weight:300;">Expert perspectives on markets, wealth, and global finance.</p>
    </div>
</section>

<!-- FEATURED ARTICLE -->
<section class="section">
    <div class="container">
        <div class="featured" data-aos="fade-up">
            <div class="row align-items-center">

                <!-- Image Column -->
                <div class="col-lg-6">
                    <div style="background-image: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?auto=format&fit=crop&w=800&q=80');
                                background-size: cover; background-position: center;
                                height: 400px;">
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-6">
                    <div class="featured-content">
                        <span class="insight-tag">Featured</span>
                        <h2>Global Markets Outlook 2026</h2>
                        <p>Explore how evolving economic trends, inflation dynamics, and geopolitical shifts are
                            shaping investment strategies for the coming year. Gain actionable insights from market experts to optimize portfolios and anticipate emerging opportunities.</p>
                        {{-- <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- INSIGHT GRID -->
<style>
    /* Redesigned card style */
    .insight-card-v2 {
        background: var(--white);
        border: var(--border-elegant);
        overflow: hidden;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
    }

    .insight-card-v2:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-elegant);
    }

    .insight-card-v2 .card-img-wrap {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .insight-card-v2 .card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .insight-card-v2:hover .card-img-wrap img {
        transform: scale(1.06);
    }

    .insight-card-v2 .card-img-wrap .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(11,30,51,0.7) 0%, transparent 60%);
    }

    .insight-card-v2 .card-img-wrap .cat-badge {
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

    .insight-card-v2 .card-img-wrap .card-icon {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        background: rgba(181,148,75,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
    }

    .insight-card-v2 .card-body-custom {
        padding: 1.6rem;
    }

    .insight-card-v2 .card-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.78rem;
        color: var(--neutral-graphite);
        margin-bottom: 0.75rem;
    }

    .insight-card-v2 .card-meta i {
        color: var(--primary-gold);
        margin-right: 0.25rem;
    }

    .insight-card-v2 h4 {
        font-size: 1.15rem;
        color: var(--primary-navy);
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .insight-card-v2 p {
        font-size: 0.88rem;
        color: var(--neutral-graphite);
        margin-bottom: 1.2rem;
    }

    .insight-card-v2 .card-footer-custom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px dashed rgba(181,148,75,0.25);
    }

    .insight-card-v2 .read-more-v2 {
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

    .insight-card-v2 .read-more-v2:hover { gap: 0.75rem; color: var(--primary-navy); }

    .insight-card-v2 .read-time {
        font-size: 0.75rem;
        color: var(--neutral-graphite);
    }
</style>

<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle">Latest Insights</span>
            <h2 style="color: var(--primary-navy);">Research & Analysis</h2>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" alt="Real Estate">
                        <div class="overlay"></div>
                        <span class="cat-badge">Real Estate</span>
                        <div class="card-icon"><i class="fas fa-building"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Mar 12, 2026</span>
                            <span><i class="far fa-user"></i> James Whitfield</span>
                        </div>
                        <h4>Commercial Property in a High-Rate Environment</h4>
                        <p>How rising borrowing costs are reshaping commercial real estate valuations and deal flow globally.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 5 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://tse3.mm.bing.net/th/id/OIP.dz2Q96t_cdLoNgEvQoPBaAHaDV?rs=1&pid=ImgDetMain&o=7&rm=3" alt="AI Finance">
                        <div class="overlay"></div>
                        <span class="cat-badge">Technology</span>
                        <div class="card-icon"><i class="fas fa-microchip"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Mar 8, 2026</span>
                            <span><i class="far fa-user"></i> Priya Nair</span>
                        </div>
                        <h4>AI-Driven Portfolio Rebalancing: What to Expect</h4>
                        <p>Machine learning models are transforming how advisors monitor risk and rebalance client holdings in real time.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 6 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&fit=crop&w=800&q=80" alt="Currency">
                        <div class="overlay"></div>
                        <span class="cat-badge">Currency</span>
                        <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Mar 5, 2026</span>
                            <span><i class="far fa-user"></i> Oliver Beck</span>
                        </div>
                        <h4>Dollar Dominance: Cracks in the Reserve Currency</h4>
                        <p>Examining the structural shifts in global reserve holdings and what de-dollarisation means for investors.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 7 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1473445730015-841f29a9490b?auto=format&fit=crop&w=800&q=80" alt="Sustainability">
                        <div class="overlay"></div>
                        <span class="cat-badge">ESG</span>
                        <div class="card-icon"><i class="fas fa-leaf"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Feb 28, 2026</span>
                            <span><i class="far fa-user"></i> Sofia Martens</span>
                        </div>
                        <h4>Green Bonds & Sustainable Finance in 2026</h4>
                        <p>ESG investing matures as institutional capital floods green infrastructure and climate transition assets.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 5 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80" alt="Private Equity">
                        <div class="overlay"></div>
                        <span class="cat-badge">Private Equity</span>
                        <div class="card-icon"><i class="fas fa-handshake"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Feb 21, 2026</span>
                            <span><i class="far fa-user"></i> Marcus Chen</span>
                        </div>
                        <h4>Private Equity Exit Strategies Post-Rate Cycle</h4>
                        <p>As liquidity returns to markets, PE firms recalibrate exit timelines and valuation models for portfolio companies.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 8 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="insight-card-v2">
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?auto=format&fit=crop&w=800&q=80" alt="Global Trade">
                        <div class="overlay"></div>
                        <span class="cat-badge">Global Trade</span>
                        <div class="card-icon"><i class="fas fa-globe-asia"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> Feb 14, 2026</span>
                            <span><i class="far fa-user"></i> Anika Sharma</span>
                        </div>
                        <h4>Supply Chain Realignment & Trade Finance</h4>
                        <p>Geopolitical fragmentation is redrawing trade routes — and creating new financing opportunities for agile investors.</p>
                        <!-- <div class="card-footer-custom">
                            <a href="#" class="read-more-v2">Read Article <i class="fas fa-arrow-right"></i></a>
                            <span class="read-time"><i class="far fa-clock"></i> 6 min read</span>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection