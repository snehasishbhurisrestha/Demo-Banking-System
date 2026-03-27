@extends('layouts.webapp')

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="hero-badge">EST. 1885 • PRIVATE BANKING</div>
                    <h1>Banking with<br><span class="gold-text">heritage</span> & integrity</h1>
                    <p>For over 135 years, Premier Bank has provided exceptional financial services to generations of families and businesses. Experience banking built on trust.</p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-banking btn-lg" onclick="showSignup()">Open an Account</button>
                        <a href="{{ route('contact') }}" class="btn btn-outline-banking btn-lg">Talk to an Advisor</a>
                    </div>
                    <div class="hero-stats">
                        <div class="hero-stat-item">
                            <span class="number">$127B</span>
                            <span class="label">Assets under management</span>
                        </div>
                        <div class="hero-stat-item">
                            <span class="number">2.3M</span>
                            <span class="label">Trusted clients</span>
                        </div>
                        <div class="hero-stat-item">
                            <span class="number">135+</span>
                            <span class="label">Years of service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST BADGES -->
    <section class="trust-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>FDIC Insured</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-lock"></i>
                        <span>256-bit Encryption</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-chart-line"></i>
                        <span>$0 Monthly Fees</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-clock"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features-section" id="personal">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Premium Banking</span>
                <h2>Designed for your financial future</h2>
                <p>From everyday banking to wealth management, experience service that puts you first.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <h3>Personal Banking</h3>
                        <p>Premium checking, savings, and lending solutions tailored to your lifestyle with exclusive benefits.</p>
                        {{-- <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business Banking</h3>
                        <p>Commercial lending, treasury management, and growth capital for businesses of all sizes.</p>
                        {{-- <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Wealth Management</h3>
                        <p>Private banking, investment advisory, and legacy planning for high-net-worth individuals.</p>
                        {{-- <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WEALTH MANAGEMENT SECTION -->
    <section class="wealth-section" id="wealth">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Wealth Management</span>
                <h2>Preserve and grow your legacy</h2>
                <p>Our private bankers provide sophisticated strategies for multi-generational wealth.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Global Equity</h4>
                            <span class="wealth-change">+12.4%</span>
                        </div>
                        <div class="wealth-value">$2.4M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>8.2%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>Moderate</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Dividend Yield</span>
                                <span>2.3%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Fixed Income</h4>
                            <span class="wealth-change">+4.1%</span>
                        </div>
                        <div class="wealth-value">$1.8M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>4.5%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>Low</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Duration</span>
                                <span>5.2 yrs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wealth-card">
                        <div class="wealth-header">
                            <h4>Private Equity</h4>
                            <span class="wealth-change">+18.7%</span>
                        </div>
                        <div class="wealth-value">$3.1M</div>
                        <div class="wealth-details">
                            <div class="wealth-detail-item">
                                <span>Annual Return</span>
                                <span>14.3%</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Risk Level</span>
                                <span>High</span>
                            </div>
                            <div class="wealth-detail-item">
                                <span>Lock-up Period</span>
                                <span>5 yrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD PREVIEW -->
    <section class="dashboard-preview" id="dashboard-preview">
        <div class="container">
            <div class="section-header text-white">
                <span class="section-subtitle">Digital Banking</span>
                <h2 class="text-white">Your accounts at a glance</h2>
                <p class="text-white-50">Secure, intuitive, and always accessible.</p>
            </div>
            <div class="row g-4 balance-cards">
                <div class="col-md-6">
                    <div class="balance-card">
                        <div class="currency">USD • CHECKING</div>
                        <div class="amount">$47,582.40</div>
                        <div class="account-number">•••• 4582</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="balance-card">
                        <div class="currency">EUR • SAVINGS</div>
                        <div class="amount">€32,190.75</div>
                        <div class="account-number">•••• 7912</div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="text-white mb-4">Recent transactions</h4>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-shopping-cart gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Whole Foods Market</h6>
                                <small>Mar 15, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount negative">-$234.56</div>
                    </div>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-wireless gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Wire Transfer</h6>
                                <small>Mar 14, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount positive">+$5,000.00</div>
                    </div>
                    <div class="transaction-item">
                        <div class="transaction-info">
                            <div class="transaction-icon">
                                <i class="fas fa-building gold-text"></i>
                            </div>
                            <div class="transaction-details">
                                <h6>Salary Deposit</h6>
                                <small>Mar 12, 2026</small>
                            </div>
                        </div>
                        <div class="transaction-amount positive">+$8,250.00</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- USER DASHBOARD (Hidden by default) -->
    <section class="dashboard" id="userDashboard">
        <div class="container">
            <h2 class="mb-4">Welcome back, <span id="userName" class="gold-text"></span></h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="balance-card navy-bg text-white">
                        <div class="currency">USD • CHECKING</div>
                        <div class="amount" id="usdBalance">$0.00</div>
                        <button class="btn btn-outline-banking btn-sm mt-3" onclick="showTransferModal()">Transfer</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="balance-card" style="background: var(--accent-teal); color: white;">
                        <div class="currency">EUR • SAVINGS</div>
                        <div class="amount" id="eurBalance">€0.00</div>
                        <button class="btn btn-outline-banking btn-sm mt-3" onclick="showTransferModal()">Transfer</button>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4>Transaction history</h4>
                <div id="transactionList"></div>
            </div>
        </div>
    </section>

    <!-- ADMIN DASHBOARD -->
    <section class="dashboard" id="adminDashboard">
        <div class="container">
            <h2 class="mb-4">Private Banking Administration</h2>
            <div class="admin-panel" style="background: white; padding: 2rem; border: var(--border-elegant);">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Client portfolio</h4>
                    <button class="btn btn-banking" onclick="showNewUserModal()">Add Client</button>
                </div>
                <div id="userList"></div>
            </div>
        </div>
    </section>
@endsection