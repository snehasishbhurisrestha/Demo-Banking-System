@extends('layouts.webapp')

@section('style')
<style>
    /* HERO */
        .careers-hero { background:var(--gradient-navy); color:#fff; padding:7rem 0 5rem; position:relative; overflow:hidden; }
        .careers-hero::before { content:''; position:absolute; top:0; right:0; width:60%; height:100%; background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat; background-size:100px; }
        .careers-hero::after { content:''; position:absolute; bottom:0; left:0; width:100%; height:80px; background:linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%); }
        .hero-badge { display:inline-block; background:rgba(181,148,75,0.15); border:1px solid rgba(181,148,75,0.3); padding:0.5rem 1.5rem; margin-bottom:1.5rem; font-size:0.8rem; letter-spacing:2px; text-transform:uppercase; color:var(--primary-gold); }

        /* SECTION */
        .section { padding:6rem 0; }
        .section-subtitle { color:var(--primary-gold); text-transform:uppercase; letter-spacing:3px; font-size:0.85rem; font-weight:600; margin-bottom:1rem; display:block; }

        /* VALUES */
        .value-card { background:var(--white); border:var(--border-elegant); padding:2.5rem 2rem; transition:all 0.4s cubic-bezier(0.165,0.84,0.44,1); position:relative; overflow:hidden; height:100%; }
        .value-card::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; background:var(--gradient-gold); transform:scaleX(0); transition:transform 0.4s; }
        .value-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-elegant); }
        .value-card:hover::before { transform:scaleX(1); }
        .value-icon { width:64px; height:64px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center; margin-bottom:1.5rem; }
        .value-icon i { font-size:1.6rem; color:var(--primary-gold); }
        .value-card h4 { color:var(--primary-navy); margin-bottom:0.8rem; font-size:1.2rem; }
        .value-card p { color:var(--neutral-graphite); font-size:0.9rem; }

        /* JOB LISTINGS */
        .job-card { background:var(--white); border:var(--border-elegant); padding:2rem; transition:all 0.3s; display:flex; align-items:flex-start; gap:1.5rem; margin-bottom:1rem; }
        .job-card:hover { box-shadow:var(--shadow-elegant); transform:translateX(6px); border-left:3px solid var(--primary-gold); }
        .job-dept { min-width:48px; height:48px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .job-dept i { color:var(--primary-gold); font-size:1.2rem; }
        .job-info { flex:1; }
        .job-info h5 { color:var(--primary-navy); margin-bottom:0.3rem; font-size:1.1rem; }
        .job-meta { display:flex; gap:1rem; flex-wrap:wrap; margin-top:0.5rem; }
        .job-tag { font-size:0.75rem; text-transform:uppercase; letter-spacing:1px; color:var(--primary-gold); background:rgba(181,148,75,0.08); padding:0.2rem 0.8rem; border:1px solid rgba(181,148,75,0.2); }
        .job-location { font-size:0.85rem; color:var(--neutral-graphite); }
        .apply-btn { background:transparent; border:1px solid var(--primary-gold); color:var(--primary-gold); padding:0.5rem 1.5rem; font-size:0.8rem; font-weight:600; text-transform:uppercase; letter-spacing:1px; cursor:pointer; transition:all 0.3s; white-space:nowrap; flex-shrink:0; align-self:center; }
        .apply-btn:hover { background:var(--primary-gold); color:var(--white); }

        /* FILTER BAR */
        .filter-bar { display:flex; gap:0.5rem; flex-wrap:wrap; margin-bottom:2rem; }
        .filter-btn { padding:0.5rem 1.2rem; border:1px solid rgba(181,148,75,0.3); background:transparent; color:var(--neutral-graphite); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; cursor:pointer; transition:all 0.3s; }
        .filter-btn.active, .filter-btn:hover { background:var(--primary-navy); color:var(--white); border-color:var(--primary-navy); }

        /* STATS */
        .stats-strip { background:var(--primary-navy); padding:3rem 0; border-top:3px solid var(--primary-gold); border-bottom:3px solid var(--primary-gold); }
        .stat-item { text-align:center; }
        .stat-item .number { font-size:2.5rem; font-weight:700; font-family:'Merriweather',serif; color:var(--primary-gold); display:block; }
        .stat-item .label { font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.7); }

        /* BENEFITS */
        .benefit-item { display:flex; gap:1rem; align-items:flex-start; padding:1.5rem; background:var(--white); border:var(--border-elegant); margin-bottom:1rem; transition:all 0.3s; }
        .benefit-item:hover { box-shadow:var(--shadow-elegant); }
        .benefit-icon { width:44px; height:44px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .benefit-icon i { color:var(--primary-gold); }
        .benefit-item h6 { color:var(--primary-navy); margin-bottom:0.2rem; font-family:'Merriweather',serif; }
        .benefit-item p { color:var(--neutral-graphite); font-size:0.88rem; margin:0; }

        /* CTA BANNER */
        .cta-banner { background:var(--gradient-navy); padding:5rem 0; text-align:center; position:relative; overflow:hidden; }
        .cta-banner::before { content:''; position:absolute; inset:0; background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" stroke="%23B5944B" fill="none"/></svg>') center/150px repeat; }
</style>
@endsection

@section('content')
<!-- HERO -->
<section class="careers-hero text-center">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">Careers at PremierBank</div>
        <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
            Build Your <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Legacy</span> With Us
        </h1>
        <p class="mt-3" style="font-size:1.1rem; max-width:600px; margin:0 auto; opacity:0.85;">Join a 140-year tradition of excellence. Shape the future of private banking alongside the industry's brightest minds.</p>
        <div class="mt-4 d-flex gap-3 justify-content-center flex-wrap">
            <a href="#openings" class="btn btn-banking" style="padding:0.9rem 2.5rem;">Explore Openings</a>
            <a href="#culture" class="btn btn-outline-banking" style="padding:0.9rem 2.5rem; border-color:rgba(181,148,75,0.6); color:var(--primary-gold);">Our Culture</a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-strip" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">4,800+</span><span class="label">Employees Globally</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">38</span><span class="label">Countries & Territories</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">94%</span><span class="label">Employee Satisfaction</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">Top 10</span><span class="label">Best Banks to Work For</span></div></div>
        </div>
    </div>
</div>

<!-- VALUES -->
<section class="section" id="culture">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Who We Are</span>
            <h2 style="color:var(--primary-navy);">Values That Define Us</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Integrity First</h4>
                    <p>We hold ourselves to the highest ethical standards, building trust with every client and colleague.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4>Driven by Innovation</h4>
                    <p>We invest in bold ideas that redefine private banking for the next generation of wealth.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-users"></i></div>
                    <h4>Inclusive Excellence</h4>
                    <p>Diverse perspectives strengthen our decisions and enrich the communities we serve.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-globe"></i></div>
                    <h4>Global Mindset</h4>
                    <p>With offices across 38 countries, we bring a world-class perspective to every client relationship.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BENEFITS -->
<section class="section bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <span class="section-subtitle">Why PremierBank</span>
                <h2 style="color:var(--primary-navy); margin-bottom:1.5rem;">An Investment in Your Future</h2>
                <p style="color:var(--neutral-graphite); margin-bottom:2rem;">We believe that when our people thrive, our clients thrive. That's why we offer a comprehensive suite of benefits designed for every stage of your life and career.</p>
                <a href="#openings" class="btn btn-banking" style="padding:0.9rem 2.5rem;">See Open Roles</a>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-heart"></i></div>
                    <div><h6>Premium Health Coverage</h6><p>Comprehensive medical, dental, and vision for you and your family, including mental wellness programmes.</p></div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-chart-pie"></i></div>
                    <div><h6>Competitive Compensation</h6><p>Base salary, performance bonuses, equity participation, and a generous 401(k) match up to 6%.</p></div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div><h6>Learning & Development</h6><p>Annual education stipend, CFA/CFP sponsorship, and access to our internal Premier Academy.</p></div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-umbrella-beach"></i></div>
                    <div><h6>Generous Leave Policy</h6><p>25 days PTO, paid parental leave (20 weeks primary / 10 secondary), and volunteer days.</p></div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-laptop-house"></i></div>
                    <div><h6>Flexible Working</h6><p>Hybrid-first model with premium home office stipend and access to 38 global co-working hubs.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JOB OPENINGS -->
<section class="section" id="openings" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Open Positions</span>
            <h2 style="color:var(--primary-navy);">Current Opportunities</h2>
        </div>

        <div class="filter-bar justify-content-center" data-aos="fade-up">
            <button class="filter-btn active" onclick="filterJobs('all',this)">All Departments</button>
            <button class="filter-btn" onclick="filterJobs('wealth',this)">Wealth Management</button>
            <button class="filter-btn" onclick="filterJobs('tech',this)">Technology</button>
            <button class="filter-btn" onclick="filterJobs('risk',this)">Risk & Compliance</button>
            <button class="filter-btn" onclick="filterJobs('ops',this)">Operations</button>
        </div>

        <div id="jobList" data-aos="fade-up">

            <div class="job-card" data-dept="wealth">
                <div class="job-dept"><i class="fas fa-briefcase"></i></div>
                <div class="job-info">
                    <h5>Private Wealth Advisor</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>New York, NY &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Wealth Management</span>
                        <span class="job-tag">Senior</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Private Wealth Advisor')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="wealth">
                <div class="job-dept"><i class="fas fa-chart-line"></i></div>
                <div class="job-info">
                    <h5>Portfolio Manager – Fixed Income</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>London, UK &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Wealth Management</span>
                        <span class="job-tag">Mid-level</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Portfolio Manager – Fixed Income')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="tech">
                <div class="job-dept"><i class="fas fa-code"></i></div>
                <div class="job-info">
                    <h5>Senior Software Engineer – Digital Banking</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>Remote &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Technology</span>
                        <span class="job-tag">Senior</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Senior Software Engineer')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="tech">
                <div class="job-dept"><i class="fas fa-shield-alt"></i></div>
                <div class="job-info">
                    <h5>Cybersecurity Analyst</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>Singapore &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Technology</span>
                        <span class="job-tag">Mid-level</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Cybersecurity Analyst')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="risk">
                <div class="job-dept"><i class="fas fa-balance-scale"></i></div>
                <div class="job-info">
                    <h5>Head of Compliance – APAC</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>Hong Kong &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Risk & Compliance</span>
                        <span class="job-tag">Director</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Head of Compliance – APAC')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="risk">
                <div class="job-dept"><i class="fas fa-search-dollar"></i></div>
                <div class="job-info">
                    <h5>AML Investigations Analyst</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>New York, NY &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Risk & Compliance</span>
                        <span class="job-tag">Entry-level</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('AML Investigations Analyst')">Apply Now</button>
            </div>

            <div class="job-card" data-dept="ops">
                <div class="job-dept"><i class="fas fa-cogs"></i></div>
                <div class="job-info">
                    <h5>Treasury Operations Manager</h5>
                    <div class="job-location"><i class="fas fa-map-marker-alt me-1" style="color:var(--primary-gold);"></i>Zurich, Switzerland &nbsp;·&nbsp; Full-time</div>
                    <div class="job-meta">
                        <span class="job-tag">Operations</span>
                        <span class="job-tag">Senior</span>
                    </div>
                </div>
                <button class="apply-btn" onclick="openApply('Treasury Operations Manager')">Apply Now</button>
            </div>

        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="cta-banner">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
        <div class="hero-badge">Don't see your role?</div>
        <h2 style="color:var(--white); font-size:2.5rem; margin-bottom:1rem;">Send Us Your CV</h2>
        <p style="color:rgba(255,255,255,0.75); max-width:500px; margin:0 auto 2rem;">We're always looking for exceptional talent. Submit a speculative application and we'll keep you in mind.</p>
        <a href="mailto:careers@premier.com" class="btn btn-outline-banking" style="padding:1rem 3rem;">careers@premier.com</a>
    </div>
</section>
@endsection