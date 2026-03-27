
@extends('layouts.webapp')

@section('style')
<style>
    /* CINEMATIC HERO */
        .story-hero {
            position: relative;
            height: 100vh;
            min-height: 620px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: var(--gradient-navy);
            background-size: cover;
            background-position: center;
            animation: heroZoom 20s ease-in-out infinite alternate;
        }

        @keyframes heroZoom {
            from {
                transform: scale(1.03);
            }

            to {
                transform: scale(1.10);
            }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(11, 30, 51, 0.5) 0%, rgba(11, 30, 51, 0.75) 50%, rgba(11, 30, 51, 0.93) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            padding: 0 1rem;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            font-size: 0.78rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--primary-gold);
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        .hero-eyebrow::before,
        .hero-eyebrow::after {
            content: '';
            width: 40px;
            height: 1px;
            background: var(--primary-gold);
            opacity: 0.6;
        }

        .story-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 900;
            line-height: 1.08;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .story-hero h1 em {
            font-style: italic;
            color: var(--primary-gold);
            font-weight: 400;
        }

        .hero-subline {
            font-size: 1.1rem;
            opacity: 0.82;
            font-weight: 300;
            max-width: 540px;
            margin: 0 auto 2.5rem;
            font-family: 'Merriweather', serif;
            font-style: italic;
            line-height: 1.8;
        }

        .hero-scroll {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: bounceY 2.2s ease-in-out infinite;
        }

        @keyframes bounceY {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(9px);
            }
        }

        .hero-scroll i {
            font-size: 1.1rem;
            color: var(--primary-gold);
        }

        /* OPENING QUOTE */
        .opening-quote {
            background: var(--white);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .opening-quote::before {
            content: '"';
            position: absolute;
            top: -3rem;
            left: 2%;
            font-family: 'Playfair Display', serif;
            font-size: 20rem;
            color: rgba(181, 148, 75, 0.05);
            line-height: 1;
            pointer-events: none;
        }

        .quote-text {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.3rem, 2.8vw, 1.9rem);
            font-style: italic;
            color: var(--primary-navy);
            line-height: 1.65;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .quote-source {
            display: block;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary-gold);
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .quote-divider {
            width: 60px;
            height: 2px;
            background: var(--gradient-gold);
            margin: 1.5rem auto 0;
        }

        /* SECTION */
        .section {
            padding: 6rem 0;
        }

        .section-subtitle {
            color: var(--primary-gold);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.78rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
            font-family: 'Inter', sans-serif;
        }

        /* CHAPTER */
        .chapter-intro {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .chapter-number {
            font-family: 'Playfair Display', serif;
            font-size: 5.5rem;
            font-weight: 900;
            color: rgba(181, 148, 75, 0.13);
            line-height: 1;
            flex-shrink: 0;
            user-select: none;
        }

        .chapter-label {
            border-left: 3px solid var(--primary-gold);
            padding-left: 1.2rem;
        }

        .chapter-label .eyebrow {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--primary-gold);
            font-weight: 600;
            display: block;
            margin-bottom: 0.3rem;
            font-family: 'Inter', sans-serif;
        }

        .chapter-label h2 {
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            color: var(--primary-navy);
            line-height: 1.2;
        }

        /* STORY PROSE */
        .story-prose {
            font-family: 'Merriweather', serif;
            font-size: 1rem;
            line-height: 1.95;
            color: var(--neutral-charcoal);
            font-weight: 300;
        }

        .story-prose p {
            margin-bottom: 1.5rem;
        }

        .story-prose .drop-cap::first-letter {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 900;
            color: var(--primary-gold);
            float: left;
            line-height: 0.75;
            margin-right: 0.15em;
            margin-top: 0.1em;
        }

        .pull-quote {
            border-left: 4px solid var(--primary-gold);
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            background: rgba(181, 148, 75, 0.04);
        }

        .pull-quote p {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-style: italic;
            color: var(--primary-navy);
            margin: 0;
            line-height: 1.65;
        }

        /* PHOTO PANELS */
        .photo-panel {
            position: relative;
            overflow: hidden;
        }

        .photo-panel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
            display: block;
        }

        .photo-panel:hover img {
            transform: scale(1.04);
        }

        .photo-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(11, 30, 51, 0.88) 0%, transparent 100%);
            padding: 2.5rem 1.5rem 1.2rem;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.78rem;
            letter-spacing: 0.3px;
            font-style: italic;
        }

        .photo-caption strong {
            color: var(--primary-gold);
        }

        .photo-year-badge {
            position: absolute;
            top: 1.2rem;
            left: 1.2rem;
            background: var(--primary-gold);
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            padding: 0.4rem 1rem;
        }

        /* DARK CHAPTER */
        .dark-chapter {
            background: var(--gradient-navy);
            color: #fff;
            padding: 7rem 0;
            position: relative;
            overflow: hidden;
        }

        .dark-chapter::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.04"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
            background-size: 100px;
        }

        .dark-chapter .chapter-number {
            color: rgba(181, 148, 75, 0.1);
        }

        .dark-chapter .chapter-label h2 {
            color: #fff;
        }

        .dark-chapter .story-prose {
            color: rgba(255, 255, 255, 0.82);
        }

        .dark-chapter .pull-quote {
            background: rgba(181, 148, 75, 0.08);
        }

        .dark-chapter .pull-quote p {
            color: rgba(255, 255, 255, 0.92);
        }

        /* MILESTONES */
        .milestones-strip {
            background: var(--white);
            padding: 5rem 0;
            overflow: hidden;
        }

        .milestone-line {
            height: 2px;
            background: linear-gradient(to right, transparent, var(--primary-gold), transparent);
            margin-bottom: 0;
        }

        .milestone-row {
            display: flex;
            gap: 0;
            overflow-x: auto;
            scrollbar-width: none;
            border-top: 2px solid rgba(181, 148, 75, 0.25);
        }

        .milestone-row::-webkit-scrollbar {
            display: none;
        }

        .milestone-item {
            min-width: 190px;
            flex: 1;
            padding: 2.5rem 1.5rem 2rem;
            border-right: 1px dashed rgba(181, 148, 75, 0.25);
            position: relative;
            transition: background 0.3s;
        }

        .milestone-item:last-child {
            border-right: none;
        }

        .milestone-item:hover {
            background: rgba(181, 148, 75, 0.04);
        }

        .milestone-dot {
            width: 12px;
            height: 12px;
            background: var(--primary-gold);
            border-radius: 50%;
            position: absolute;
            top: -7px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 0 0 4px rgba(181, 148, 75, 0.15);
        }

        .milestone-year {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 900;
            color: var(--primary-gold);
            display: block;
            margin-bottom: 0.5rem;
        }

        .milestone-item h5 {
            font-size: 0.9rem;
            color: var(--primary-navy);
            margin-bottom: 0.4rem;
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }

        .milestone-item p {
            font-size: 0.8rem;
            color: var(--neutral-graphite);
            line-height: 1.55;
        }

        /* PORTRAITS */
        .founder-portrait {
            position: relative;
            overflow: hidden;
        }

        .founder-portrait img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            object-position: top;
            filter: sepia(15%) contrast(1.05);
            transition: filter 0.4s;
            display: block;
        }

        .founder-portrait:hover img {
            filter: sepia(0%) contrast(1);
        }

        .founder-portrait .gold-frame {
            position: absolute;
            inset: 1rem;
            border: 1px solid rgba(181, 148, 75, 0.3);
            pointer-events: none;
        }

        .founder-portrait .portrait-caption {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
            background: rgba(11, 30, 51, 0.88);
            padding: 1.2rem;
        }

        .founder-portrait .portrait-caption h5 {
            color: #fff;
            font-size: 1.05rem;
            margin-bottom: 0.2rem;
        }

        .founder-portrait .portrait-caption span {
            color: var(--primary-gold);
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        /* VALUES WALL */
        .values-wall {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .value-brick {
            padding: 2.5rem 2rem;
            border: var(--border-elegant);
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            background: var(--neutral-ivory);
        }

        .value-brick:hover {
            background: var(--white);
            box-shadow: var(--shadow-subtle);
            z-index: 1;
        }

        .value-brick .vb-number {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 900;
            color: rgba(181, 148, 75, 0.1);
            position: absolute;
            top: -0.5rem;
            right: 1rem;
            line-height: 1;
        }

        .value-brick i {
            font-size: 1.4rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
            display: block;
        }

        .value-brick h5 {
            color: var(--primary-navy);
            font-size: 0.95rem;
            margin-bottom: 0.6rem;
            font-family: 'Merriweather', serif;
        }

        .value-brick p {
            font-size: 0.84rem;
            color: var(--neutral-graphite);
            line-height: 1.65;
        }

        @media (max-width: 768px) {
            .values-wall {
                grid-template-columns: 1fr;
            }
        }

        /* STATS */
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
            font-family: 'Playfair Display', serif;
            color: var(--primary-gold);
            display: block;
        }

        .stat-item .label {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.7);
            font-family: 'Inter', sans-serif;
        }

        /* CTA */
        .story-cta {
            background: var(--white);
            padding: 6rem 0;
            text-align: center;
        }

        .cta-ornament {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            color: var(--primary-gold);
        }

        .cta-ornament::before,
        .cta-ornament::after {
            content: '';
            width: 80px;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--primary-gold));
        }

        .cta-ornament::after {
            background: linear-gradient(to left, transparent, var(--primary-gold));
        }

        .story-cta h2 {
            font-size: clamp(1.9rem, 4vw, 2.8rem);
            color: var(--primary-navy);
            margin-bottom: 1.2rem;
        }

        .story-cta p {
            color: var(--neutral-graphite);
            font-size: 1rem;
            max-width: 480px;
            margin: 0 auto 2.5rem;
            font-family: 'Merriweather', serif;
            font-weight: 300;
            font-style: italic;
            line-height: 1.8;
        }

</style>
@endsection

@section('content')
<!-- CINEMATIC HERO -->
    <section class="story-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content" data-aos="fade-up">
            <div class="hero-eyebrow">Premier Bank &mdash; Est. 1885</div>
            <h1>A Story of<br><em>Enduring Trust</em></h1>
            <p class="hero-subline">Over 140 years of financial stewardship — built one relationship, one family, one
                generation at a time.</p>
        </div>
        <div class="hero-scroll">
            <span>Scroll to Read</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- OPENING QUOTE -->
    <div class="opening-quote" data-aos="fade-up">
        <div class="container">
            <blockquote class="quote-text">
                "We did not set out to build a bank. We set out to build something that would outlast us — an
                institution that generations yet unborn could trust with their futures."
                <span class="quote-source">— Edmund Harrington Wellington, Founder &nbsp;·&nbsp; 1885</span>
            </blockquote>
            <div class="quote-divider"></div>
        </div>
    </div>

    <!-- CHAPTER I: THE FOUNDING -->
    <section class="section" style="background: var(--neutral-ivory);">
        <div class="container">
            <div class="chapter-intro" data-aos="fade-right">
                <div class="chapter-number">I</div>
                <div class="chapter-label">
                    <span class="eyebrow">Chapter One &nbsp;·&nbsp; 1885</span>
                    <h2>The Founding Vision</h2>
                </div>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="story-prose">
                        <p class="drop-cap">In the autumn of 1885, Edmund Harrington Wellington walked into a rented
                            office on Broad Street, New York, with a ledger, a seal, and a belief that private banking
                            should be built on something more than capital — it should be built on character.</p>
                        <p>Wellington had spent fifteen years in the counting houses of London and Edinburgh, watching
                            wealth accumulate and vanish in cycles of boom and recklessness. He returned to America with
                            one conviction: that the families who had built this nation deserved a bank that would grow
                            with them, not at their expense.</p>
                        <div class="pull-quote">
                            <p>"A banker is a custodian of dreams. Every deposit is an act of faith, and that faith must
                                be honoured above all else."</p>
                        </div>
                        <p>With seven founding clients — all personal acquaintances — Premier Bank opened its doors on
                            September 14th, 1885. By year's end, assets under custody had reached $240,000. By 1890, the
                            first branch outside New York had opened in Boston, and Premier was already being spoken of
                            alongside the great private banks of the era.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="photo-panel" style="height:460px;">
                        <img src="https://images.unsplash.com/photo-1604689598793-b8bf1dc445a1?auto=format&fit=crop&w=800&q=80"
                            alt="Founding era" style="height:460px;">
                        <div class="photo-year-badge">1885</div>
                        <div class="photo-caption"><strong>Premier Bank's original Broad Street office</strong> — New
                            York City, 1885. The first eight employees pictured in the entrance hall.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EARLY MILESTONES -->
    <div class="milestones-strip" data-aos="fade-up">
        <div class="container-fluid px-4">
            <div class="text-center mb-5">
                <span class="section-subtitle">Milestones</span>
                <h3 style="color:var(--primary-navy); font-size:1.6rem; font-family:'Playfair Display',serif;">The Early
                    Decades</h3>
            </div>
            <div class="milestone-row">
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1885</span>
                    <h5>Founded in New York</h5>
                    <p>Seven founding clients, one ledger, and a vision for principled banking.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1892</span>
                    <h5>National Expansion</h5>
                    <p>Branches in Boston and Philadelphia. Assets exceed $2 million.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1901</span>
                    <h5>Trust Division Opens</h5>
                    <p>Launch of estate management and generational trust services.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1920</span>
                    <h5>Commercial Banking</h5>
                    <p>Introduced business lending to support post-war industrial growth.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1935</span>
                    <h5>Survived the Depression</h5>
                    <p>Not one client lost savings during the Great Depression — a point of enduring pride.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CHAPTER II: TESTED BY HISTORY -->
    <section class="dark-chapter">
        <div class="container" style="position:relative; z-index:2;">
            <div class="chapter-intro" data-aos="fade-right">
                <div class="chapter-number">II</div>
                <div class="chapter-label">
                    <span class="eyebrow" style="color:var(--primary-gold);">Chapter Two &nbsp;·&nbsp; 1929–1950</span>
                    <h2 style="color:#fff;">Tested by History</h2>
                </div>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="photo-panel" style="height:420px;">
                        <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=800&q=80"
                            alt="1929 markets" style="height:420px; filter:grayscale(30%) sepia(10%);">
                        <div class="photo-year-badge" style="background:rgba(181,148,75,0.85);">1929</div>
                        <div class="photo-caption"
                            style="background:linear-gradient(to top, rgba(11,30,51,0.96) 0%, transparent 100%);">
                            Premier Bank weathered the 1929 crash without a single client default — a feat unmatched in
                            the industry.</div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="story-prose" style="color:rgba(255,255,255,0.83);">
                        <p class="drop-cap">When Black Tuesday struck on October 29, 1929, banks across America
                            collapsed overnight. Premier Bank did not. The conservative lending philosophy instilled by
                            Wellington — never lend what you cannot afford to forgive — proved not merely prudent, but
                            prophetic.</p>
                        <p>While competitors scrambled and failed, Premier's second-generation leadership under Charles
                            Montgomery Wellington made a deliberate choice: they would not call in a single client's
                            loan. They would absorb the loss before they would betray a trust.</p>
                        <div class="pull-quote">
                            <p>"There are institutions that weather storms. Premier is one of the rare ones that helped
                                its clients weather theirs."</p>
                        </div>
                        <p>The years that followed — through the Depression, through the Second World War — forged
                            Premier's reputation as the bank that stood by you when no one else would. By 1950, that
                            reputation was worth more than any balance sheet could capture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CHAPTER III: THE PEOPLE -->
    <section class="section" style="background: var(--neutral-ivory);">
        <div class="container">
            <div class="chapter-intro" data-aos="fade-right">
                <div class="chapter-number">III</div>
                <div class="chapter-label">
                    <span class="eyebrow">Chapter Three &nbsp;·&nbsp; The People</span>
                    <h2>The Men & Women Who Built It</h2>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="founder-portrait">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80"
                            alt="Edmund Wellington">
                        <div class="gold-frame"></div>
                        <div class="portrait-caption">
                            <h5>Edmund H. Wellington</h5><span>Founder &nbsp;·&nbsp; 1885–1912</span>
                        </div>
                    </div>
                    <div class="story-prose mt-3" style="font-size:0.88rem;">
                        <p>A former merchant banker from Edinburgh, Wellington brought Old World discipline to a young
                            nation. He wrote the foundational principles by hand — they hang, framed, in the lobby of
                            every Premier branch to this day.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="founder-portrait">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80"
                            alt="Charles Wellington">
                        <div class="gold-frame"></div>
                        <div class="portrait-caption">
                            <h5>Charles M. Wellington</h5><span>2nd Generation &nbsp;·&nbsp; 1912–1948</span>
                        </div>
                    </div>
                    <div class="story-prose mt-3" style="font-size:0.88rem;">
                        <p>Charles guided Premier through the Depression, two World Wars, and Prohibition. His decision
                            never to foreclose on a client during the 1929 crash remains the defining act of Premier's
                            character.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="founder-portrait">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                            alt="Margaret Ashford">
                        <div class="gold-frame"></div>
                        <div class="portrait-caption">
                            <h5>Margaret R. Ashford</h5><span>First Female Director &nbsp;·&nbsp; 1952</span>
                        </div>
                    </div>
                    <div class="story-prose mt-3" style="font-size:0.88rem;">
                        <p>Appointed in 1952, Margaret broke barriers that most institutions wouldn't question for
                            another two decades. She built Premier's wealth management division from scratch and tripled
                            assets under management in eight years.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MODERN MILESTONES -->
    <div class="milestones-strip" style="background: var(--white);" data-aos="fade-up">
        <div class="container-fluid px-4">
            <div class="text-center mb-5">
                <span class="section-subtitle">The Modern Era</span>
                <h3 style="color:var(--primary-navy); font-size:1.6rem; font-family:'Playfair Display',serif;">1960 to
                    Today</h3>
            </div>
            <div class="milestone-row">
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1965</span>
                    <h5>Goes International</h5>
                    <p>First overseas offices in London and Zurich.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">1985</span>
                    <h5>Centenary Year</h5>
                    <p>$10B in assets. 62 countries. A century of trust celebrated.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">2000</span>
                    <h5>Digital Banking</h5>
                    <p>Pioneered secure online banking with 256-bit encryption.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">2015</span>
                    <h5>AI & Fintech</h5>
                    <p>AI-driven portfolio analytics and mobile-first banking.</p>
                </div>
                <div class="milestone-item">
                    <div class="milestone-dot"></div><span class="milestone-year">2026</span>
                    <h5>Today</h5>
                    <p>$127B+ AUM. 2M+ clients. The same promise, 140 years on.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CHAPTER IV: TODAY -->
    <section class="dark-chapter">
        <div class="container" style="position:relative; z-index:2;">
            <div class="chapter-intro" data-aos="fade-right">
                <div class="chapter-number">IV</div>
                <div class="chapter-label">
                    <span class="eyebrow" style="color:var(--primary-gold);">Chapter Four &nbsp;·&nbsp; 2026</span>
                    <h2 style="color:#fff;">The Story Continues</h2>
                </div>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="story-prose" style="color:rgba(255,255,255,0.83);">
                        <p class="drop-cap">One hundred and forty-one years after Edmund Wellington opened his ledger on
                            Broad Street, Premier Bank manages over $127 billion in assets for more than two million
                            clients across 62 countries. The numbers are remarkable. But they are not the story.</p>
                        <p>The story is the family in Singapore whose great-grandfather opened his first account with
                            Premier in 1931. The story is the entrepreneur in Lagos whose business banking relationship
                            started a decade ago and has since grown into a multinational operation. The story is the
                            widow in Boston who called her Premier advisor at 9 PM on a Tuesday — and he answered.</p>
                        <div class="pull-quote">
                            <p>"Technology changes. Markets change. What has never changed is our obligation — to the
                                person on the other side of every transaction."</p>
                        </div>
                        <p>Premier Bank in 2026 is the most technologically advanced it has ever been. AI-driven
                            analytics, real-time risk management, global digital infrastructure — all of it exists in
                            service of that original promise. Not efficiency. Not scale. Trust. And like every great
                            story, this one is far from over.</p>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="photo-panel" style="height:460px;">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80"
                            alt="Premier Bank today" style="height:460px;">
                        <div class="photo-year-badge">2026</div>
                        <div class="photo-caption"
                            style="background:linear-gradient(to top, rgba(11,30,51,0.96) 0%, transparent 100%);">
                            Premier Bank Global Headquarters — New York City. Home to 3,200 professionals serving
                            clients across 62 countries.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <div class="stats-strip" data-aos="fade-up">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="number">1885</span><span class="label">Founded</span></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="number">$127B+</span><span class="label">Assets Under
                            Management</span></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="number">2M+</span><span class="label">Clients Worldwide</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item"><span class="number">62</span><span class="label">Countries Served</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WELLINGTON'S SIX PRINCIPLES -->
    <section class="section" style="background:var(--neutral-ivory);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle">Written in 1885 &nbsp;·&nbsp; Unchanged Today</span>
                <h2 style="color:var(--primary-navy);">Wellington's Six Principles</h2>
                <p
                    style="color:var(--neutral-graphite); max-width:500px; margin:1rem auto 0; font-family:'Merriweather',serif; font-style:italic; font-size:0.92rem; line-height:1.8;">
                    The original founding principles, handwritten by Edmund Wellington, preserved in Premier Bank's
                    archives.</p>
            </div>
            <div class="values-wall" data-aos="fade-up">
                <div class="value-brick">
                    <div class="vb-number">I</div><i class="fas fa-shield-alt"></i>
                    <h5>Honour Every Trust</h5>
                    <p>A client's confidence is a sacred obligation — never compromised for profit, convenience, or
                        expedience.</p>
                </div>
                <div class="value-brick">
                    <div class="vb-number">II</div><i class="fas fa-balance-scale"></i>
                    <h5>Lend with Prudence</h5>
                    <p>Never extend credit you would not extend to your own family. Reckless lending falls hardest on
                        those who can least afford it.</p>
                </div>
                <div class="value-brick">
                    <div class="vb-number">III</div><i class="fas fa-handshake"></i>
                    <h5>Serve the Person</h5>
                    <p>Know your client as a human being. A balance sheet tells you what they have. Your relationship
                        tells you who they are.</p>
                </div>
                <div class="value-brick">
                    <div class="vb-number">IV</div><i class="fas fa-eye"></i>
                    <h5>Transparency Above All</h5>
                    <p>No hidden fee, no undisclosed risk, no private motive should ever sit between an advisor and
                        their client.</p>
                </div>
                <div class="value-brick">
                    <div class="vb-number">V</div><i class="fas fa-seedling"></i>
                    <h5>Build for Generations</h5>
                    <p>We are stewards, not owners, of our clients' wealth. Our obligation extends to their children and
                        their children's children.</p>
                </div>
                <div class="value-brick">
                    <div class="vb-number">VI</div><i class="fas fa-globe"></i>
                    <h5>Bear Responsibility</h5>
                    <p>A great bank must be a good citizen. The communities we serve deserve not just our services, but
                        our stewardship.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <div class="story-cta" data-aos="fade-up">
        <div class="container">
            <div class="cta-ornament"><i class="fas fa-landmark"></i></div>
            <h2>Become Part of the Story</h2>
            <p>140 years of trust, built one relationship at a time. Your chapter starts here.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <button class="btn btn-banking" onclick="showSignup()" style="padding:0.9rem 2.5rem;">Open an Account</button>
                <a href="{{ route('contact') }}" class="btn btn-outline-banking" style="padding:0.9rem 2.5rem;">Talk to an
                    Advisor</a>
            </div>
        </div>
    </div>
@endsection