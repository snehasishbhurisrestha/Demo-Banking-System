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

        /* STATS */
        .stats-strip{background:var(--primary-navy);padding:3rem 0;border-top:3px solid var(--primary-gold);border-bottom:3px solid var(--primary-gold);}
        .stat-item{text-align:center;}
        .stat-item .number{font-size:2.5rem;font-weight:700;font-family:'Merriweather',serif;color:var(--primary-gold);display:block;}
        .stat-item .label{font-size:0.85rem;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.7);}

        /* FEATURED CEO */
        .ceo-block{background:var(--white);border:var(--border-elegant);overflow:hidden;}
        .ceo-img-wrap{position:relative;overflow:hidden;}
        .ceo-img{width:100%;height:500px;object-fit:cover;display:block;background:linear-gradient(160deg,#1A2F45 0%,#0B1E33 100%);display:flex;align-items:center;justify-content:center;}
        .ceo-avatar-lg{width:220px;height:220px;background:var(--gradient-gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Merriweather',serif;font-size:4rem;font-weight:900;color:var(--white);border:6px solid rgba(181,148,75,0.3);}
        .ceo-accent{position:absolute;bottom:0;left:0;right:0;height:4px;background:var(--gradient-gold);}
        .ceo-content{padding:3.5rem;}
        .ceo-tag{font-size:0.75rem;text-transform:uppercase;letter-spacing:2px;color:var(--primary-gold);margin-bottom:0.5rem;display:block;}
        .ceo-name{font-size:2.2rem;color:var(--primary-navy);margin-bottom:0.3rem;}
        .ceo-title{color:var(--neutral-graphite);font-size:1rem;margin-bottom:2rem;}
        .ceo-quote{font-size:1.15rem;font-style:italic;color:var(--neutral-charcoal);line-height:1.8;border-left:4px solid var(--primary-gold);padding-left:1.5rem;margin-bottom:2rem;}
        .ceo-bio{color:var(--neutral-graphite);font-size:0.92rem;line-height:1.8;margin-bottom:2rem;}
        .ceo-social a{width:40px;height:40px;background:rgba(181,148,75,0.08);border:var(--border-elegant);display:inline-flex;align-items:center;justify-content:center;color:var(--primary-gold);text-decoration:none;transition:all 0.3s;margin-right:0.5rem;}
        .ceo-social a:hover{background:var(--primary-gold);color:var(--white);}

        /* FILTER TABS */
        .dept-tabs{display:flex;gap:0;flex-wrap:wrap;border:var(--border-elegant);background:var(--white);width:fit-content;}
        .dept-tab{padding:0.85rem 1.6rem;font-size:0.8rem;font-weight:600;text-transform:uppercase;letter-spacing:1px;cursor:pointer;border:none;background:transparent;color:var(--neutral-graphite);transition:all 0.3s;border-right:var(--border-elegant);}
        .dept-tab:last-child{border-right:none;}
        .dept-tab.active{background:var(--primary-navy);color:var(--white);}
        .dept-tab:hover:not(.active){background:rgba(181,148,75,0.08);color:var(--primary-gold);}

        /* LEADER CARDS */
        .leader-card{background:var(--white);border:var(--border-elegant);overflow:hidden;height:100%;transition:all 0.4s cubic-bezier(0.165,0.84,0.44,1);cursor:pointer;}
        .leader-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gradient-gold);transform:scaleX(0);transition:transform 0.4s;}
        .leader-card{position:relative;}
        .leader-card:hover{transform:translateY(-10px);box-shadow:var(--shadow-elegant);}
        .leader-card:hover::before{transform:scaleX(1);}
        .leader-img-area{height:240px;background:linear-gradient(160deg,#1A2F45 0%,#0B1E33 100%);display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;}
        .leader-img-area::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:var(--gradient-gold);transform:scaleX(0);transition:transform 0.4s;}
        .leader-card:hover .leader-img-area::after{transform:scaleX(1);}
        .leader-avatar{width:100px;height:100px;background:var(--gradient-gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Merriweather',serif;font-size:2rem;font-weight:900;color:var(--white);border:4px solid rgba(255,255,255,0.15);}
        .leader-overlay{position:absolute;inset:0;background:rgba(11,30,51,0.9);display:flex;flex-direction:column;align-items:center;justify-content:center;padding:1.5rem;opacity:0;transition:opacity 0.3s;}
        .leader-card:hover .leader-overlay{opacity:1;}
        .leader-overlay p{color:rgba(255,255,255,0.85);font-size:0.82rem;text-align:center;line-height:1.6;}
        .leader-overlay .soc-links a{width:34px;height:34px;background:rgba(181,148,75,0.2);border:1px solid rgba(181,148,75,0.3);display:inline-flex;align-items:center;justify-content:center;color:var(--primary-gold);text-decoration:none;margin:0 0.2rem;margin-top:0.8rem;transition:all 0.3s;}
        .leader-overlay .soc-links a:hover{background:var(--primary-gold);color:var(--white);}
        .leader-info{padding:1.5rem;}
        .leader-name{font-size:1.15rem;color:var(--primary-navy);margin-bottom:0.2rem;}
        .leader-title{font-size:0.8rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;margin-bottom:0.5rem;}
        .leader-dept{font-size:0.78rem;color:var(--neutral-graphite);}
        .leader-tags{display:flex;flex-wrap:wrap;gap:0.3rem;margin-top:0.8rem;}
        .ltag{font-size:0.68rem;text-transform:uppercase;letter-spacing:0.5px;background:rgba(181,148,75,0.08);border:1px solid rgba(181,148,75,0.2);color:var(--primary-gold);padding:0.15rem 0.6rem;}

        /* BOARD SECTION */
        .board-card{background:var(--white);border:var(--border-elegant);padding:2rem;display:flex;gap:1.5rem;align-items:flex-start;transition:all 0.3s;height:100%;}
        .board-card:hover{box-shadow:var(--shadow-subtle);}
        .board-avatar{width:72px;height:72px;background:var(--gradient-gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Merriweather',serif;font-weight:900;color:var(--white);font-size:1.3rem;flex-shrink:0;}
        .board-info h5{color:var(--primary-navy);margin-bottom:0.2rem;font-size:1rem;}
        .board-role{font-size:0.78rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;margin-bottom:0.5rem;}
        .board-bg{font-size:0.83rem;color:var(--neutral-graphite);}

        /* TIMELINE */
        .timeline{position:relative;padding-left:2rem;}
        .timeline::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,var(--primary-gold),rgba(181,148,75,0.1));}
        .tl-item{position:relative;padding-bottom:2.5rem;padding-left:1.5rem;}
        .tl-dot{position:absolute;left:-2.5rem;top:0.2rem;width:16px;height:16px;background:var(--primary-gold);border-radius:50%;border:3px solid var(--neutral-ivory);}
        .tl-year{font-size:0.78rem;text-transform:uppercase;letter-spacing:2px;color:var(--primary-gold);margin-bottom:0.3rem;}
        .tl-title{font-family:'Merriweather',serif;font-size:1.1rem;color:var(--primary-navy);margin-bottom:0.3rem;}
        .tl-desc{font-size:0.88rem;color:var(--neutral-graphite);}

        /* VALUES */
        .value-strip{background:var(--primary-navy);padding:4rem 0;}
        .val-item{text-align:center;padding:2rem 1.5rem;}
        .val-num{font-size:3rem;font-family:'Merriweather',serif;font-weight:900;color:rgba(181,148,75,0.2);line-height:1;margin-bottom:0.5rem;}
        .val-title{font-size:1rem;font-family:'Merriweather',serif;color:var(--white);margin-bottom:0.5rem;}
        .val-desc{font-size:0.82rem;color:rgba(255,255,255,0.55);}

        /* AWARDS */
        .award-pill{background:var(--white);border:var(--border-elegant);padding:1.2rem 1.5rem;display:flex;align-items:center;gap:1rem;margin-bottom:1rem;transition:all 0.3s;}
        .award-pill:hover{box-shadow:var(--shadow-subtle);}
        .award-icon{width:44px;height:44px;background:rgba(181,148,75,0.08);border:var(--border-elegant);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
        .award-icon i{color:var(--primary-gold);}
        .award-title{font-weight:600;color:var(--primary-navy);font-size:0.9rem;}
        .award-body{font-size:0.8rem;color:var(--neutral-graphite);}
        .award-year{font-size:0.75rem;color:var(--primary-gold);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-left:auto;white-space:nowrap;}

        /* CTA */
        .cta-banner{background:var(--gradient-navy);padding:5rem 0;text-align:center;position:relative;overflow:hidden;}
        .cta-banner::before{content:'';position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" stroke="%23B5944B" fill="none"/></svg>') center/150px repeat;}

</style>
@endsection

@section('content')
<!-- HERO -->
<section class="page-hero text-center">
    <div class="container" data-aos="fade-up">
        <div class="hero-badge">About PremierBank</div>
        <h1 style="font-size:3.5rem;line-height:1.2;margin-bottom:1.5rem;">
            Our <span style="color:var(--primary-gold);font-style:italic;font-weight:300;">Leadership</span>
        </h1>
        <p style="font-size:1.1rem;max-width:620px;margin:0 auto;opacity:0.85;">The experienced executives and board directors who guide PremierBank's vision — honouring 140 years of heritage while building for the next generation.</p>
    </div>
</section>

<!-- STATS -->
<div class="stats-strip" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">140+</span><span class="label">Years of Heritage</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">28</span><span class="label">Executive Leaders</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">38</span><span class="label">Countries Operating</span></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><span class="number">$48B+</span><span class="label">Assets Under Management</span></div></div>
        </div>
    </div>
</div>

<!-- CEO SPOTLIGHT -->
<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Office of the CEO</span>
            <h2 style="color:var(--primary-navy);">Leading with Purpose</h2>
        </div>
        <div class="ceo-block" data-aos="fade-up">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5">
                    <div class="ceo-img-wrap h-100">
                        <div class="ceo-img">
                            <div class="ceo-avatar-lg">JW</div>
                        </div>
                        <div class="ceo-accent"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ceo-content">
                        <span class="ceo-tag">Chief Executive Officer</span>
                        <h2 class="ceo-name">James H. Wellington III</h2>
                        <p class="ceo-title">Chief Executive Officer & President · PremierBank</p>
                        <blockquote class="ceo-quote">
                            "Banking is ultimately an act of trust — trust that spans generations. Our responsibility is not just to grow assets, but to honour the confidence each client places in us, today and for decades to come."
                        </blockquote>
                        <p class="ceo-bio">James Wellington joined PremierBank in 2008 as Head of Private Banking and was appointed CEO in 2018. Under his leadership, the bank has expanded into 14 new markets, grown assets under management from $22B to $48B, and launched the bank's award-winning digital wealth platform. Previously, James served as Managing Director at Goldman Sachs Private Wealth Management and holds an MBA from Wharton and a BA from Yale University. He serves on the boards of the Financial Services Forum and the United Way of New York.</p>
                        <div class="d-flex gap-3 mb-3 flex-wrap">
                            <div style="text-align:center;"><div style="font-size:1.4rem;font-family:'Merriweather',serif;font-weight:700;color:var(--primary-gold);">18yr</div><div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1px;color:var(--neutral-graphite);">at PremierBank</div></div>
                            <div style="text-align:center;"><div style="font-size:1.4rem;font-family:'Merriweather',serif;font-weight:700;color:var(--primary-gold);">$26B</div><div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1px;color:var(--neutral-graphite);">AUM Growth</div></div>
                            <div style="text-align:center;"><div style="font-size:1.4rem;font-family:'Merriweather',serif;font-weight:700;color:var(--primary-gold);">14</div><div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1px;color:var(--neutral-graphite);">New Markets</div></div>
                        </div>
                        <div class="ceo-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EXECUTIVE TEAM -->
<section class="section" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Executive Committee</span>
            <h2 style="color:var(--primary-navy);">Senior Leadership Team</h2>
        </div>

        <div class="d-flex justify-content-center mb-5 flex-wrap gap-2" data-aos="fade-up">
            <div class="dept-tabs">
                <button class="dept-tab active" onclick="filterLeaders('all',this)">All</button>
                <button class="dept-tab" onclick="filterLeaders('executive',this)">C-Suite</button>
                <button class="dept-tab" onclick="filterLeaders('banking',this)">Banking</button>
                <button class="dept-tab" onclick="filterLeaders('wealth',this)">Wealth</button>
                <button class="dept-tab" onclick="filterLeaders('tech',this)">Technology</button>
                <button class="dept-tab" onclick="filterLeaders('risk',this)">Risk</button>
            </div>
        </div>

        <div class="row g-4" id="leaderGrid">

            <!-- CFO -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="executive" data-aos="fade-up">
                <div class="leader-card" onclick="openBio('Margaret L. Chen','Chief Financial Officer','Margaret brings 25 years of financial leadership, previously serving as CFO at JPMorgan Chase\'s Investment Bank. She oversees all financial reporting, treasury, capital markets, and investor relations for PremierBank. Margaret holds a CPA and MBA from the University of Chicago Booth School of Business.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">MC</div>
                        <div class="leader-overlay">
                            <p>25 years in financial leadership. Former CFO at JPMorgan Chase Investment Bank. CPA, MBA Chicago Booth.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Margaret L. Chen</h4>
                        <div class="leader-title">Chief Financial Officer</div>
                        <div class="leader-dept">Executive Committee</div>
                        <div class="leader-tags"><span class="ltag">Finance</span><span class="ltag">Capital Markets</span></div>
                    </div>
                </div>
            </div>

            <!-- COO -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="executive" data-aos="fade-up" data-aos-delay="50">
                <div class="leader-card" onclick="openBio('Robert A. Sinclair','Chief Operating Officer','Robert leads PremierBank\'s global operations, overseeing all branch networks, back-office functions, and operational risk. He joined from Citigroup where he spent 15 years in operations leadership. He is a Six Sigma Black Belt and holds degrees from Princeton and INSEAD.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">RS</div>
                        <div class="leader-overlay">
                            <p>Former Citigroup Operations Director. Six Sigma Black Belt. Oversees 4,800+ staff globally.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Robert A. Sinclair</h4>
                        <div class="leader-title">Chief Operating Officer</div>
                        <div class="leader-dept">Executive Committee</div>
                        <div class="leader-tags"><span class="ltag">Operations</span><span class="ltag">Strategy</span></div>
                    </div>
                </div>
            </div>

            <!-- CRO -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="executive risk" data-aos="fade-up" data-aos-delay="100">
                <div class="leader-card" onclick="openBio('Dr. Amelia J. Foster','Chief Risk Officer','Dr. Foster joined PremierBank from the Federal Reserve where she led stress testing and systemic risk analysis. She holds a PhD in Financial Economics from MIT and has co-authored three books on banking regulation. She chairs our Risk Committee and serves on the Basel Committee industry advisory panel.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">AF</div>
                        <div class="leader-overlay">
                            <p>Former Federal Reserve risk analyst. PhD MIT Financial Economics. Basel Committee advisor.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Dr. Amelia J. Foster</h4>
                        <div class="leader-title">Chief Risk Officer</div>
                        <div class="leader-dept">Executive Committee · Risk</div>
                        <div class="leader-tags"><span class="ltag">Risk</span><span class="ltag">Regulation</span></div>
                    </div>
                </div>
            </div>

            <!-- CTO -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="executive tech" data-aos="fade-up" data-aos-delay="150">
                <div class="leader-card" onclick="openBio('Nathan K. Okafor','Chief Technology Officer','Nathan leads PremierBank\'s digital transformation, overseeing the award-winning mobile platform, cloud infrastructure, AI initiatives, and cybersecurity. Previously CTO at Stripe and VP of Engineering at Goldman Sachs. He holds a BS in Computer Science from MIT and an MS from Stanford.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">NO</div>
                        <div class="leader-overlay">
                            <p>Former CTO Stripe, VP Engineering Goldman Sachs. Led $1.2B digital transformation. MIT & Stanford alumnus.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fab fa-twitter"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Nathan K. Okafor</h4>
                        <div class="leader-title">Chief Technology Officer</div>
                        <div class="leader-dept">Executive Committee · Technology</div>
                        <div class="leader-tags"><span class="ltag">Technology</span><span class="ltag">AI</span></div>
                    </div>
                </div>
            </div>

            <!-- Head of Wealth -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="wealth" data-aos="fade-up">
                <div class="leader-card" onclick="openBio('Victoria H. Ashby','Head of Wealth Management','Victoria oversees PremierBank\'s $48B wealth management division, including Private Banking, Investment Advisory, Trust, and Philanthropy Services. She joined from UBS Global Wealth Management where she spent 20 years. Victoria holds a CFA designation and MBA from Harvard Business School.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">VA</div>
                        <div class="leader-overlay">
                            <p>Former UBS Wealth Management. Manages $48B AUM. CFA, MBA Harvard Business School.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Victoria H. Ashby</h4>
                        <div class="leader-title">Head of Wealth Management</div>
                        <div class="leader-dept">Wealth Division</div>
                        <div class="leader-tags"><span class="ltag">Wealth</span><span class="ltag">CFA</span></div>
                    </div>
                </div>
            </div>

            <!-- Head of Private Banking -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="banking wealth" data-aos="fade-up" data-aos-delay="50">
                <div class="leader-card" onclick="openBio('Christopher D. Laurent','Head of Private Banking','Christopher leads the private banking division serving ultra-high-net-worth clients across 38 countries. With 22 years at PremierBank, he built the European private banking franchise from inception. He holds an MBA from London Business School and is fluent in four languages.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">CL</div>
                        <div class="leader-overlay">
                            <p>22 years at PremierBank. Built the European franchise. MBA London Business School. Fluent in 4 languages.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Christopher D. Laurent</h4>
                        <div class="leader-title">Head of Private Banking</div>
                        <div class="leader-dept">Wealth · Banking</div>
                        <div class="leader-tags"><span class="ltag">Private Banking</span><span class="ltag">Global</span></div>
                    </div>
                </div>
            </div>

            <!-- Head of Commercial Banking -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="banking" data-aos="fade-up" data-aos-delay="100">
                <div class="leader-card" onclick="openBio('Diana M. Reeves','Head of Commercial Banking','Diana leads the commercial and corporate banking division, overseeing lending, treasury, and trade finance for mid-market and large corporate clients. She joined from Wells Fargo\'s commercial banking group in 2015 and holds an MBA from NYU Stern.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">DR</div>
                        <div class="leader-overlay">
                            <p>Former Wells Fargo Commercial Banking. Oversees $12B corporate loan portfolio. MBA NYU Stern.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Diana M. Reeves</h4>
                        <div class="leader-title">Head of Commercial Banking</div>
                        <div class="leader-dept">Banking Division</div>
                        <div class="leader-tags"><span class="ltag">Commercial</span><span class="ltag">Lending</span></div>
                    </div>
                </div>
            </div>

            <!-- CISO -->
            <div class="col-md-6 col-lg-3 leader-item" data-dept="tech risk" data-aos="fade-up" data-aos-delay="150">
                <div class="leader-card" onclick="openBio('Marcus T. Singh','Chief Information Security Officer','Marcus leads cybersecurity strategy and data protection across all of PremierBank\'s operations. He previously served as Deputy CISO at the U.S. Department of the Treasury and holds CISSP, CISM certifications. Named one of the Top 50 CISOs in Finance by Forbes in 2024.')">
                    <div class="leader-img-area">
                        <div class="leader-avatar">MS</div>
                        <div class="leader-overlay">
                            <p>Former US Treasury Deputy CISO. CISSP, CISM certified. Forbes Top 50 CISOs in Finance 2024.</p>
                            <div class="soc-links"><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fas fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h4 class="leader-name">Marcus T. Singh</h4>
                        <div class="leader-title">Chief Information Security Officer</div>
                        <div class="leader-dept">Technology · Risk</div>
                        <div class="leader-tags"><span class="ltag">Cybersecurity</span><span class="ltag">CISSP</span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BOARD OF DIRECTORS -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Governance</span>
            <h2 style="color:var(--primary-navy);">Board of Directors</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up">
                <div class="board-card">
                    <div class="board-avatar">EW</div>
                    <div class="board-info">
                        <h5>Eleanor P. Wellington</h5>
                        <div class="board-role">Non-Executive Chair</div>
                        <p class="board-bg">Third-generation Wellington. Former Secretary, U.S. Department of Commerce. Harvard Law JD. Member since 1998.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div class="board-card">
                    <div class="board-avatar">KM</div>
                    <div class="board-info">
                        <h5>Dr. Kevin M. Osei</h5>
                        <div class="board-role">Lead Independent Director</div>
                        <p class="board-bg">Former Governor, Bank of England. Professor of Finance, LSE. PhD Economics, Oxford. Member since 2014.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="board-card">
                    <div class="board-avatar">SL</div>
                    <div class="board-info">
                        <h5>Sophia L. Marchetti</h5>
                        <div class="board-role">Independent Director — Audit Chair</div>
                        <p class="board-bg">Former Partner, PricewaterhouseCoopers. CPA. Audit Committee Chair since 2019. Columbia MBA. Member since 2016.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="board-card">
                    <div class="board-avatar">TH</div>
                    <div class="board-info">
                        <h5>Thomas J. Harrington</h5>
                        <div class="board-role">Independent Director — Risk Chair</div>
                        <p class="board-bg">Former CEO, Deutsche Bank Americas. 35 years in global finance. Risk Committee Chair. Dartmouth & Wharton MBA.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="board-card">
                    <div class="board-avatar">IP</div>
                    <div class="board-info">
                        <h5>Isabela R. Pereira</h5>
                        <div class="board-role">Independent Director — Technology</div>
                        <p class="board-bg">Founder & former CEO of FinTech unicorn PayVault. Stanford CS & MBA. Forbes 40 Under 40. Member since 2021.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                <div class="board-card">
                    <div class="board-avatar">GN</div>
                    <div class="board-info">
                        <h5>George N. Whitmore</h5>
                        <div class="board-role">Independent Director — Compensation Chair</div>
                        <p class="board-bg">Former CHRO, McKinsey & Company. Human Capital specialist. Yale & London Business School. Member since 2018.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BANK HISTORY TIMELINE -->
<section class="section" style="background:var(--neutral-ivory);">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4" data-aos="fade-right">
                <span class="section-subtitle">Our Heritage</span>
                <h2 style="color:var(--primary-navy);margin-bottom:1.5rem;">140 Years of Leadership</h2>
                <p style="color:var(--neutral-graphite);margin-bottom:2rem;">From a single office on Wall Street to a global private banking powerhouse, PremierBank's leadership has always been defined by vision, integrity, and a commitment to our clients.</p>
                <button class="btn btn-outline-banking">Our Full Story</button>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="timeline">
                    <div class="tl-item"><div class="tl-dot"></div><div class="tl-year">1885</div><div class="tl-title">Founded by Harold J. Wellington</div><div class="tl-desc">PremierBank established on Wall Street with $2M in capital, serving New York's merchant class.</div></div>
                    <div class="tl-item"><div class="tl-dot"></div><div class="tl-year">1921</div><div class="tl-title">First International Office — London</div><div class="tl-desc">Second-generation leadership opened our London office, beginning six decades of European expansion.</div></div>
                    <div class="tl-item"><div class="tl-dot"></div><div class="tl-year">1967</div><div class="tl-title">Private Wealth Division Launched</div><div class="tl-desc">Eleanor Wellington Sr. established the Private Wealth advisory division, a landmark moment in our history.</div></div>
                    <div class="tl-item"><div class="tl-dot"></div><div class="tl-year">1998</div><div class="tl-title">Asia Pacific Expansion</div><div class="tl-desc">Opened offices in Singapore and Hong Kong, extending private banking coverage to Asia's ultra-high-net-worth market.</div></div>
                    <div class="tl-item"><div class="tl-dot"></div><div class="tl-year">2018</div><div class="tl-title">James Wellington Appointed CEO</div><div class="tl-desc">James H. Wellington III takes the helm, announcing a bold digital transformation and global growth strategy.</div></div>
                    <div class="tl-item" style="padding-bottom:0;"><div class="tl-dot"></div><div class="tl-year">2024</div><div class="tl-title">$48B AUM Milestone</div><div class="tl-desc">PremierBank crosses $48B in assets under management, ranking among the top 10 global private banks.</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES STRIP -->
<div class="value-strip">
    <div class="container">
        <div class="row">
            <div class="col-md-3" data-aos="fade-up"><div class="val-item"><div class="val-num">I</div><div class="val-title">Integrity</div><div class="val-desc">We act with honesty and transparency in every client relationship and business decision.</div></div></div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100"><div class="val-item"><div class="val-num">E</div><div class="val-title">Excellence</div><div class="val-desc">We set the highest standards for ourselves and our work, without exception.</div></div></div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200"><div class="val-item"><div class="val-num">S</div><div class="val-title">Stewardship</div><div class="val-desc">We are trusted custodians of our clients' financial legacy — a responsibility we take seriously.</div></div></div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300"><div class="val-item"><div class="val-num">I</div><div class="val-title">Innovation</div><div class="val-desc">We embrace technology and bold ideas to serve the evolving needs of our clients.</div></div></div>
        </div>
    </div>
</div>

<!-- AWARDS -->
<section class="section bg-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <span class="section-subtitle">Recognition</span>
                <h2 style="color:var(--primary-navy);margin-bottom:1.5rem;">Industry Awards & Recognition</h2>
                <p style="color:var(--neutral-graphite);">Our leadership team's dedication to excellence has earned PremierBank recognition from the industry's most prestigious institutions.</p>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="award-pill"><div class="award-icon"><i class="fas fa-trophy"></i></div><div><div class="award-title">Best Private Bank — North America</div><div class="award-body">Global Finance Magazine — awarded for outstanding wealth management and client service.</div></div><div class="award-year">2025</div></div>
                <div class="award-pill"><div class="award-icon"><i class="fas fa-star"></i></div><div><div class="award-title">Top CEO in Banking</div><div class="award-body">James Wellington named to Barron's list of the Top 25 Financial Industry CEOs.</div></div><div class="award-year">2024</div></div>
                <div class="award-pill"><div class="award-icon"><i class="fas fa-shield-alt"></i></div><div><div class="award-title">Excellence in Risk Management</div><div class="award-body">Risk.net awarded PremierBank for its enterprise risk governance framework.</div></div><div class="award-year">2024</div></div>
                <div class="award-pill"><div class="award-icon"><i class="fas fa-laptop-code"></i></div><div><div class="award-title">Digital Transformation of the Year</div><div class="award-body">The Banker magazine recognised our AI-powered wealth platform for client impact.</div></div><div class="award-year">2023</div></div>
                <div class="award-pill"><div class="award-icon"><i class="fas fa-users"></i></div><div><div class="award-title">Best Bank to Work For</div><div class="award-body">American Banker ranked PremierBank #4 among Top 10 Best Banks to Work For.</div></div><div class="award-year">2023</div></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container" data-aos="fade-up" style="position:relative;z-index:1;">
        <div class="hero-badge">Join Our Team</div>
        <h2 style="color:var(--white);font-size:2.5rem;margin-bottom:1rem;">Work Alongside World-Class Leaders</h2>
        <p style="color:rgba(255,255,255,0.75);max-width:500px;margin:0 auto 2rem;">Explore opportunities to build your career at one of the world's most respected private banks.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="careers.html" class="btn btn-banking" style="padding:1rem 3rem;">View Open Roles</a>
            <button class="btn btn-outline-banking" style="padding:1rem 3rem;border-color:rgba(181,148,75,0.6);color:var(--primary-gold);">Contact Us</button>
        </div>
    </div>
</section>
@endsection