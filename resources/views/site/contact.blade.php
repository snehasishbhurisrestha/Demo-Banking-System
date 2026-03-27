@extends('layouts.webapp')

@section('style')
<style>
    /* ===== HERO ===== */
        .advisor-hero {
            background: var(--gradient-navy);
            color: #fff;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .advisor-hero::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 60%; height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path d="M20 20 L80 20 L80 80 L20 80 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" stroke="%23B5944B" fill="none" stroke-width="1"/><path d="M40 40 L60 40 L60 60 L40 60 Z" stroke="%23B5944B" fill="none" stroke-width="1"/></svg>') repeat;
            background-size: 100px;
        }

        .advisor-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 100%; height: 80px;
            background: linear-gradient(to top right, transparent 49%, var(--neutral-ivory) 50%);
        }

        .advisor-hero .hero-inner { position: relative; z-index: 2; }

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

        /* ===== CONTACT OPTIONS ===== */
        .contact-option {
            background: var(--white);
            border: var(--border-elegant);
            padding: 2.5rem 2rem;
            height: 100%;
            position: relative;
            transition: all 0.4s cubic-bezier(0.165,0.84,0.44,1);
            cursor: pointer;
            text-align: center;
        }

        .contact-option::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--gradient-gold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .contact-option:hover { transform: translateY(-8px); box-shadow: var(--shadow-elegant); }
        .contact-option:hover::before { transform: scaleX(1); }

        .contact-option.active {
            border-color: var(--primary-gold);
            box-shadow: var(--shadow-subtle);
        }

        .contact-option.active::before { transform: scaleX(1); }

        .contact-icon {
            width: 72px; height: 72px;
            background: rgba(181,148,75,0.08);
            border: var(--border-elegant);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: all 0.3s;
        }

        .contact-option:hover .contact-icon,
        .contact-option.active .contact-icon {
            background: var(--gradient-gold);
            border-color: transparent;
        }

        .contact-option:hover .contact-icon i,
        .contact-option.active .contact-icon i { color: #fff; }

        .contact-icon i { font-size: 1.8rem; color: var(--primary-gold); transition: color 0.3s; }

        .contact-option h4 { color: var(--primary-navy); font-size: 1.15rem; margin-bottom: 0.75rem; }
        .contact-option p { color: var(--neutral-graphite); font-size: 0.9rem; margin-bottom: 1rem; }

        .availability-badge {
            display: inline-block;
            background: rgba(46,125,50,0.1);
            color: #2E7D32;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }

        .availability-badge.busy {
            background: rgba(181,148,75,0.12);
            color: var(--primary-gold);
        }

        /* ===== BOOKING FORM ===== */
        .booking-form-wrap {
            background: var(--white);
            border: var(--border-elegant);
            padding: 3rem;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--secondary-slate);
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            border-radius: 0;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            transition: border-color 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(181,148,75,0.15);
        }

        .time-slot {
            border: var(--border-elegant);
            padding: 0.6rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary-navy);
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            background: var(--white);
        }

        .time-slot:hover, .time-slot.selected {
            background: var(--primary-navy);
            color: var(--white);
            border-color: var(--primary-navy);
        }

        .time-slot.unavailable {
            opacity: 0.35;
            cursor: not-allowed;
            text-decoration: line-through;
        }

        /* ===== ADVISOR PROFILES ===== */
        .advisor-card {
            background: var(--white);
            border: var(--border-elegant);
            overflow: hidden;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.165,0.84,0.44,1);
            position: relative;
        }

        .advisor-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--gradient-gold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .advisor-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-elegant); }
        .advisor-card:hover::before { transform: scaleX(1); }

        .advisor-img {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .advisor-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            transition: transform 0.5s;
        }

        .advisor-card:hover .advisor-img img { transform: scale(1.05); }

        .advisor-img .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(11,30,51,0.65) 0%, transparent 55%);
        }

        .advisor-img .availability-pill {
            position: absolute;
            top: 1rem; right: 1rem;
            background: rgba(46,125,50,0.9);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.25rem 0.75rem;
        }

        .advisor-body { padding: 1.6rem; }
        .advisor-body h5 { color: var(--primary-navy); font-size: 1.1rem; margin-bottom: 0.2rem; }

        .advisor-role {
            color: var(--primary-gold);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: block;
            margin-bottom: 0.75rem;
        }

        .advisor-body p { color: var(--neutral-graphite); font-size: 0.88rem; margin-bottom: 1rem; }

        .advisor-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; margin-bottom: 1.2rem; }

        .advisor-tag {
            background: rgba(181,148,75,0.08);
            border: var(--border-elegant);
            color: var(--primary-navy);
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.25rem 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .advisor-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px dashed rgba(181,148,75,0.25);
        }

        .advisor-rating { font-size: 0.82rem; color: var(--neutral-graphite); }
        .advisor-rating i { color: var(--primary-gold); font-size: 0.75rem; }

        .btn-book {
            background: transparent;
            border: 1px solid var(--primary-gold);
            color: var(--primary-gold);
            padding: 0.4rem 1.2rem;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.2s;
            border-radius: 0;
        }

        .btn-book:hover { background: var(--primary-gold); color: #fff; }

        /* ===== LIVE CHAT WIDGET ===== */
        .chat-widget {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
        }

        .chat-toggle {
            width: 60px; height: 60px;
            background: var(--gradient-gold);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(181,148,75,0.4);
            transition: all 0.3s;
            color: #fff;
            font-size: 1.4rem;
        }

        .chat-toggle:hover { transform: scale(1.1); box-shadow: 0 12px 32px rgba(181,148,75,0.5); }

        .chat-box {
            display: none;
            position: absolute;
            bottom: 75px; right: 0;
            width: 340px;
            background: var(--white);
            border: var(--border-elegant);
            box-shadow: var(--shadow-elegant);
            flex-direction: column;
        }

        .chat-box.open { display: flex; }

        .chat-header {
            background: var(--gradient-navy);
            padding: 1rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #fff;
        }

        .chat-avatar {
            width: 36px; height: 36px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: 700;
            font-family: 'Merriweather', serif;
            flex-shrink: 0;
        }

        .chat-header-info .name { font-size: 0.9rem; font-weight: 600; display: block; }
        .chat-header-info .status { font-size: 0.75rem; opacity: 0.7; }
        .chat-header-info .status::before { content: '●'; color: #4CAF50; margin-right: 4px; font-size: 0.6rem; }

        .chat-messages {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
            max-height: 260px;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            background: var(--neutral-ivory);
        }

        .chat-msg {
            max-width: 80%;
            padding: 0.65rem 1rem;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .chat-msg.bot {
            background: var(--white);
            border: var(--border-elegant);
            color: var(--neutral-charcoal);
            align-self: flex-start;
        }

        .chat-msg.user {
            background: var(--primary-navy);
            color: #fff;
            align-self: flex-end;
        }

        .chat-msg .msg-time { font-size: 0.7rem; opacity: 0.6; display: block; margin-top: 0.3rem; }

        .chat-input-wrap {
            display: flex;
            border-top: var(--border-elegant);
            background: var(--white);
        }

        .chat-input {
            flex: 1;
            border: none;
            padding: 0.85rem 1rem;
            font-size: 0.88rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            background: transparent;
        }

        .chat-send {
            background: var(--primary-gold);
            border: none;
            padding: 0 1.2rem;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.2s;
        }

        .chat-send:hover { background: var(--primary-navy); }

        /* ===== FAQ ===== */
        .faq-item {
            background: var(--white);
            border: var(--border-elegant);
            margin-bottom: 0.5rem;
            overflow: hidden;
            transition: all 0.3s;
        }

        .faq-item:hover { border-color: var(--primary-gold); }

        .faq-question {
            padding: 1.2rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--primary-navy);
        }

        .faq-question i { color: var(--primary-gold); transition: transform 0.3s; font-size: 0.85rem; }
        .faq-item.open .faq-question i { transform: rotate(45deg); }

        .faq-answer {
            display: none;
            padding: 0 1.5rem 1.2rem;
            color: var(--neutral-graphite);
            font-size: 0.92rem;
            line-height: 1.7;
            border-top: 1px dashed rgba(181,148,75,0.2);
        }

        /* ===== STATS STRIP ===== */
        .stats-strip { background: var(--primary-navy); padding: 3rem 0; border-top: 3px solid var(--primary-gold); border-bottom: 3px solid var(--primary-gold); }
        .stat-item { text-align: center; }
        .stat-item .number { font-size: 2.5rem; font-weight: 700; font-family: 'Merriweather', serif; color: var(--primary-gold); display: block; }
        .stat-item .label { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.7); }

        /* ===== SUCCESS STATE ===== */
        .success-state {
            display: none;
            text-align: center;
            padding: 3rem 2rem;
        }

        .success-icon {
            width: 80px; height: 80px;
            background: rgba(46,125,50,0.1);
            border: 2px solid rgba(46,125,50,0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .success-icon i { font-size: 2rem; color: #2E7D32; }
</style>
@endsection

@section('content')
<!-- HERO -->
    <section class="advisor-hero text-center">
        <div class="container hero-inner" data-aos="fade-up">
            <div class="hero-badge">Expert Guidance</div>
            <h1 style="font-size:3.5rem; line-height:1.2; margin-bottom:1.5rem;">
                Talk to an <span style="color:var(--primary-gold); font-style:italic; font-weight:300;">Advisor</span>
            </h1>
            <p style="font-size:1.2rem; opacity:0.85; font-weight:300; max-width:580px; margin:0 auto;">
                Connect with a dedicated Premier Bank advisor — by phone, video, or in-branch. Your financial goals deserve expert attention.
            </p>
        </div>
    </section>

    <!-- CONTACT OPTIONS -->
    <section class="section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle">Choose Your Preferred Way</span>
                <h2 style="color:var(--primary-navy);">How Would You Like to Connect?</h2>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="contact-option active" onclick="selectMethod(this, 'schedule')">
                        <div class="contact-icon"><i class="fas fa-calendar-check"></i></div>
                        <h4>Schedule a Call</h4>
                        <p>Book a callback at a time that suits you. We'll call you within your chosen window.</p>
                        <span class="availability-badge">Available Today</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-option" onclick="selectMethod(this, 'video')">
                        <div class="contact-icon"><i class="fas fa-video"></i></div>
                        <h4>Video Consultation</h4>
                        <p>Face-to-face meeting via secure video — from the comfort of your home or office.</p>
                        <span class="availability-badge">Next Slot: 2:00 PM</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-option" onclick="selectMethod(this, 'branch')">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h4>In-Branch Visit</h4>
                        <p>Meet your advisor in person at your nearest Premier Bank private banking suite.</p>
                        <span class="availability-badge busy">Limited Slots</span>
                    </div>
                </div>
            </div>

            <!-- BOOKING FORM -->
            <div class="row g-5 align-items-start" data-aos="fade-up">
                <div class="col-lg-7">
                    <div class="booking-form-wrap">
                        <div id="formState">
                            <span class="section-subtitle">Book Your Session</span>
                            <h3 style="color:var(--primary-navy); margin-bottom:2rem;" id="formTitle">Schedule a Callback</h3>

                            <form id="bookingForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" placeholder="John" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Smith" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" placeholder="john@example.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" placeholder="+1 212 555 0199" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Preferred Date</label>
                                        <input type="date" class="form-control" id="preferredDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Topic</label>
                                        <select class="form-select">
                                            <option value="">Select a topic...</option>
                                            <option>Wealth Management</option>
                                            <option>Investment Portfolio</option>
                                            <option>Estate Planning</option>
                                            <option>Business Banking</option>
                                            <option>Mortgage & Lending</option>
                                            <option>Retirement Planning</option>
                                            <option>Tax Optimisation</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Preferred Time Slot</label>
                                        <div class="row g-2 mt-1">
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">9:00 AM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">10:00 AM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot unavailable">11:00 AM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">12:00 PM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot unavailable">1:00 PM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">2:00 PM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">3:00 PM</div></div>
                                            <div class="col-4 col-md-3"><div class="time-slot" onclick="selectTime(this)">4:00 PM</div></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Additional Notes <span style="font-weight:400; text-transform:none; letter-spacing:0;">(optional)</span></label>
                                        <textarea class="form-control" rows="3" placeholder="Tell us a little about your financial goals or any specific questions..."></textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="consentCheck" required style="border-radius:0; border-color:rgba(181,148,75,0.4);">
                                            <label class="form-check-label" for="consentCheck" style="font-size:0.85rem; color:var(--neutral-graphite);">
                                                I consent to Premier Bank contacting me regarding this enquiry.
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-banking w-100" style="padding:1rem; font-size:0.95rem;">
                                            <i class="fas fa-calendar-check me-2"></i>Confirm Booking
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- SUCCESS STATE -->
                        <div class="success-state" id="successState">
                            <div class="success-icon"><i class="fas fa-check"></i></div>
                            <h3 style="color:var(--primary-navy); margin-bottom:1rem;">Booking Confirmed!</h3>
                            <p style="color:var(--neutral-graphite); margin-bottom:0.5rem;">Thank you for reaching out to Premier Bank.</p>
                            <p style="color:var(--neutral-graphite); margin-bottom:2rem;">A confirmation has been sent to your email. One of our advisors will be in touch at your scheduled time.</p>
                            <div style="background:var(--neutral-ivory); padding:1.5rem; border:var(--border-elegant); text-align:left; margin-bottom:2rem;">
                                <div style="display:flex; justify-content:space-between; padding:0.5rem 0; border-bottom:1px dashed rgba(181,148,75,0.2);">
                                    <span style="font-size:0.85rem; color:var(--neutral-graphite);">Reference</span>
                                    <strong id="bookingRef" style="color:var(--primary-navy); font-size:0.85rem;"></strong>
                                </div>
                                <div style="display:flex; justify-content:space-between; padding:0.5rem 0; border-bottom:1px dashed rgba(181,148,75,0.2);">
                                    <span style="font-size:0.85rem; color:var(--neutral-graphite);">Method</span>
                                    <strong id="bookingMethod" style="color:var(--primary-navy); font-size:0.85rem;"></strong>
                                </div>
                                <div style="display:flex; justify-content:space-between; padding:0.5rem 0;">
                                    <span style="font-size:0.85rem; color:var(--neutral-graphite);">Status</span>
                                    <strong style="color:#2E7D32; font-size:0.85rem;">Confirmed ✓</strong>
                                </div>
                            </div>
                            <button class="btn btn-outline-banking" onclick="resetForm()">Book Another Session</button>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR INFO -->
                <div class="col-lg-5">
                    <div style="background: var(--gradient-navy); padding: 2.5rem; color: #fff; margin-bottom: 1.5rem;" data-aos="fade-left">
                        <span class="section-subtitle">Why Premier Bank</span>
                        <h4 style="color:#fff; margin-bottom:1.5rem;">What to Expect</h4>
                        <div style="display:flex; flex-direction:column; gap:1.2rem;">
                            <div style="display:flex; gap:1rem; align-items:flex-start;">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.2); border:1px solid rgba(181,148,75,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fas fa-user-shield" style="color:var(--primary-gold); font-size:0.9rem;"></i>
                                </div>
                                <div>
                                    <strong style="display:block; font-size:0.9rem; margin-bottom:0.2rem;">Dedicated Advisor</strong>
                                    <span style="font-size:0.82rem; opacity:0.75;">You'll be matched with a specialist relevant to your query — not a generalist call centre.</span>
                                </div>
                            </div>
                            <div style="display:flex; gap:1rem; align-items:flex-start;">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.2); border:1px solid rgba(181,148,75,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fas fa-lock" style="color:var(--primary-gold); font-size:0.9rem;"></i>
                                </div>
                                <div>
                                    <strong style="display:block; font-size:0.9rem; margin-bottom:0.2rem;">Fully Confidential</strong>
                                    <span style="font-size:0.82rem; opacity:0.75;">All conversations are protected under strict banking confidentiality laws.</span>
                                </div>
                            </div>
                            <div style="display:flex; gap:1rem; align-items:flex-start;">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.2); border:1px solid rgba(181,148,75,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fas fa-clock" style="color:var(--primary-gold); font-size:0.9rem;"></i>
                                </div>
                                <div>
                                    <strong style="display:block; font-size:0.9rem; margin-bottom:0.2rem;">Response Within 2 Hours</strong>
                                    <span style="font-size:0.82rem; opacity:0.75;">Bookings made before 3 PM are confirmed same-day during business hours.</span>
                                </div>
                            </div>
                            <div style="display:flex; gap:1rem; align-items:flex-start;">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.2); border:1px solid rgba(181,148,75,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fas fa-star" style="color:var(--primary-gold); font-size:0.9rem;"></i>
                                </div>
                                <div>
                                    <strong style="display:block; font-size:0.9rem; margin-bottom:0.2rem;">No Obligation</strong>
                                    <span style="font-size:0.82rem; opacity:0.75;">This is a complimentary consultation — no commitment or obligation required.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DIRECT CONTACT -->
                    <div style="background:var(--white); border:var(--border-elegant); padding:2rem;">
                        <h5 style="color:var(--primary-navy); margin-bottom:1.2rem; font-size:1rem;">Or Contact Us Directly</h5>
                        <div style="display:flex; flex-direction:column; gap:1rem;">
                            <a href="tel:+12125550199" style="display:flex; align-items:center; gap:0.75rem; text-decoration:none; color:var(--neutral-charcoal); padding:0.75rem; border:var(--border-elegant); transition:0.2s;" onmouseover="this.style.borderColor='var(--primary-gold)'" onmouseout="this.style.borderColor='rgba(181,148,75,0.2)'">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-phone" style="color:var(--primary-gold); font-size:0.85rem;"></i>
                                </div>
                                <div>
                                    <span style="font-size:0.75rem; color:var(--neutral-graphite); display:block; text-transform:uppercase; letter-spacing:0.5px;">Private Banking Line</span>
                                    <strong style="font-size:0.9rem;">+1 (212) 555-0199</strong>
                                </div>
                            </a>
                            <a href="mailto:advisor@premierbank.com" style="display:flex; align-items:center; gap:0.75rem; text-decoration:none; color:var(--neutral-charcoal); padding:0.75rem; border:var(--border-elegant); transition:0.2s;" onmouseover="this.style.borderColor='var(--primary-gold)'" onmouseout="this.style.borderColor='rgba(181,148,75,0.2)'">
                                <div style="width:36px; height:36px; background:rgba(181,148,75,0.08); border:var(--border-elegant); display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-envelope" style="color:var(--primary-gold); font-size:0.85rem;"></i>
                                </div>
                                <div>
                                    <span style="font-size:0.75rem; color:var(--neutral-graphite); display:block; text-transform:uppercase; letter-spacing:0.5px;">Email Us</span>
                                    <strong style="font-size:0.9rem;">advisor@premierbank.com</strong>
                                </div>
                            </a>
                        </div>
                        <p style="font-size:0.78rem; color:var(--neutral-graphite); margin-top:1rem;">
                            <i class="fas fa-clock me-1" style="color:var(--primary-gold);"></i>
                            Mon–Fri: 8:00 AM – 8:00 PM &nbsp;|&nbsp; Sat: 9:00 AM – 1:00 PM
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS STRIP -->
    <div class="stats-strip" data-aos="fade-up">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3"><div class="stat-item"><span class="number">320+</span><span class="label">Certified Advisors</span></div></div>
                <div class="col-6 col-md-3"><div class="stat-item"><span class="number">98%</span><span class="label">Client Satisfaction</span></div></div>
                <div class="col-6 col-md-3"><div class="stat-item"><span class="number">&lt;2hr</span><span class="label">Average Response Time</span></div></div>
                <div class="col-6 col-md-3"><div class="stat-item"><span class="number">24/7</span><span class="label">Digital Support</span></div></div>
            </div>
        </div>
    </div>

    <!-- MEET OUR ADVISORS -->
    <section class="section bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle">Our Specialists</span>
                <h2 style="color:var(--primary-navy);">Meet Your Advisors</h2>
            </div>
            <div class="row g-4">

                <div class="col-md-4" data-aos="fade-up">
                    <div class="advisor-card">
                        <div class="advisor-img">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" alt="Richard Ashford">
                            <div class="overlay"></div>
                            <div class="availability-pill">Available Today</div>
                        </div>
                        <div class="advisor-body">
                            <h5>Richard Ashford</h5>
                            <span class="advisor-role">Senior Wealth Advisor</span>
                            <p>25 years specialising in high-net-worth portfolio construction and multi-generational wealth transfer strategies.</p>
                            <div class="advisor-tags">
                                <span class="advisor-tag">Portfolio</span>
                                <span class="advisor-tag">Estate</span>
                                <span class="advisor-tag">HNW</span>
                            </div>
                            <div class="advisor-footer">
                                <div class="advisor-rating">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="ms-1">4.9 (182 reviews)</span>
                                </div>
                                <button class="btn-book" onclick="scrollToForm('Richard Ashford')">Book</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="advisor-card">
                        <div class="advisor-img">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Priya Kapoor">
                            <div class="overlay"></div>
                            <div class="availability-pill">Available Today</div>
                        </div>
                        <div class="advisor-body">
                            <h5>Priya Kapoor</h5>
                            <span class="advisor-role">Business Banking Specialist</span>
                            <p>Expert in commercial lending, trade finance, and treasury solutions for SMEs and multinational corporates.</p>
                            <div class="advisor-tags">
                                <span class="advisor-tag">Commercial</span>
                                <span class="advisor-tag">Treasury</span>
                                <span class="advisor-tag">Trade</span>
                            </div>
                            <div class="advisor-footer">
                                <div class="advisor-rating">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    <span class="ms-1">4.7 (154 reviews)</span>
                                </div>
                                <button class="btn-book" onclick="scrollToForm('Priya Kapoor')">Book</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="advisor-card">
                        <div class="advisor-img">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80" alt="Marcus Webb">
                            <div class="overlay"></div>
                            <div class="availability-pill" style="background:rgba(181,148,75,0.9);">Next: 3:00 PM</div>
                        </div>
                        <div class="advisor-body">
                            <h5>Marcus Webb</h5>
                            <span class="advisor-role">Investment & Markets Advisor</span>
                            <p>Specialises in equity markets, alternative investments, and ESG portfolio construction for institutional and private clients.</p>
                            <div class="advisor-tags">
                                <span class="advisor-tag">Equities</span>
                                <span class="advisor-tag">ESG</span>
                                <span class="advisor-tag">Alternatives</span>
                            </div>
                            <div class="advisor-footer">
                                <div class="advisor-rating">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="ms-1">5.0 (98 reviews)</span>
                                </div>
                                <button class="btn-book" onclick="scrollToForm('Marcus Webb')">Book</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="section" style="background:var(--neutral-ivory);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle">Common Questions</span>
                <h2 style="color:var(--primary-navy);">Frequently Asked Questions</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            Is the consultation completely free?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">Yes. Your initial consultation with a Premier Bank advisor is entirely complimentary and carries no obligation. We believe understanding your needs comes before any recommendation.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            How long does a typical session last?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">Initial consultations typically run 30–45 minutes. Follow-up sessions, particularly for wealth management or complex business banking needs, may be scheduled for up to 90 minutes.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            Will I speak to the same advisor each time?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">Absolutely. Once matched, you'll work with your dedicated relationship manager for all subsequent meetings, ensuring continuity and a deep understanding of your financial profile.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            What should I prepare before the meeting?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">No preparation is required — our advisors are trained to guide the conversation. However, having a rough idea of your financial goals, current assets, or specific questions will help us make the most of your time.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            How secure is the video consultation platform?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">Our video platform uses end-to-end 256-bit encryption — the same standard used in our online banking services. Sessions are never recorded without your explicit consent.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            Can I reschedule or cancel my booking?
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">Yes. You can reschedule or cancel up to 2 hours before your appointment at no cost. Simply use the link in your confirmation email or call our private banking line.</div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection