<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking - Secure Digital Banking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/site_assets/style.css') }}">

    <!-- Toast message -->
    <link href="{{ asset('assets/admin-assets/plugins/toast/toastr.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toast message -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-university"></i> Banking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#investment">Investment</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showLogin()">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showSignup()">Sign Up</a>
                    </li>

                    @endguest


                    @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <h1>Drive More Revenue with Digital Banking</h1>
            <p>Get ready to cut your pipeline by empowering frontline sales management</p>
            <button class="btn btn-primary-custom btn-lg" onclick="showSignup()">Request Early Access</button>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="about">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold">Better <span style="color: var(--primary-color);">Insights,</span> Outcomes.</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                        <h4>50+ KPIs</h4>
                        <p>Cod built-in proprietary GPT-4 model that digests all your data</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                        <h4>100% Secure</h4>
                        <p>Obsec continually onboarding data without all your reps</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-brain"></i></div>
                        <h4>AI Insights</h4>
                        <p>Surfacing high-value insights down from flagging lost deals</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Section -->
    <section class="py-5" id="investment" style="background: white;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">PROTECT YOUR INVESTMENTS WITH<br>EXACTING PRECISION.</h2>
                <p class="text-muted">Our expert team offers personalized guidance, helping you<br>navigate your financial journey with confidence.</p>
            </div>
            <div class="row g-4">
                <!-- Card 1: Defend your money -->
                <div class="col-md-4">
                    <div class="investment-card" style="background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%); color: white; padding: 2.5rem; border-radius: 15px; height: 100%;">
                        <h5 class="mb-4" style="color: #9ae6b4;">Defend your money<br>accurately.</h5>
                        <div class="chart-container mb-3">
                            <div class="bar-chart d-flex align-items-end justify-content-around" style="height: 150px;">
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 45%; border-radius: 5px 5px 0 0;"></div>
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 60%; border-radius: 5px 5px 0 0;"></div>
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 75%; border-radius: 5px 5px 0 0;"></div>
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 55%; border-radius: 5px 5px 0 0;"></div>
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 85%; border-radius: 5px 5px 0 0;"></div>
                                <div style="width: 12%; background: linear-gradient(to top, #48bb78, #9ae6b4); height: 100%; border-radius: 5px 5px 0 0;"></div>
                            </div>
                        </div>
                        <h3 class="mb-0" style="color: #9ae6b4;">87,000</h3>
                        <small class="text-muted">New Users</small>
                    </div>
                </div>

                <!-- Card 2: Secure your assets -->
                <div class="col-md-4">
                    <div class="investment-card" style="background: var(--light-bg); padding: 2.5rem; border-radius: 15px; height: 100%;">
                        <h5 class="mb-4 fw-bold">Secure your assets<br>precisely</h5>
                        <p class="text-muted small">Ensure the assurance the future of your family. We can help you with trust.</p>
                        <div class="d-flex justify-content-center align-items-center my-4">
                            <div class="position-relative" style="width: 150px; height: 150px;">
                                <svg width="150" height="150">
                                    <circle cx="75" cy="75" r="65" fill="none" stroke="#e2e8f0" stroke-width="12"/>
                                    <circle cx="75" cy="75" r="65" fill="none" stroke="#2d3748" stroke-width="12" 
                                            stroke-dasharray="408.4" stroke-dashoffset="122.5" 
                                            transform="rotate(-90 75 75)" stroke-linecap="round"/>
                                </svg>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <h2 class="mb-0 fw-bold">70%</h2>
                                    <small class="text-muted">Secured</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <span class="badge bg-warning text-dark">4.9 ⭐</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Your savings precisely -->
                <div class="col-md-4">
                    <div class="investment-card" style="background: var(--light-bg); padding: 2.5rem; border-radius: 15px; height: 100%;">
                        <h5 class="mb-4 fw-bold">Your savings precisely</h5>
                        <p class="text-muted small">Our expert team will give you proper guidance about your future.</p>
                        <div class="my-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted small">9 JAN, 1992</span>
                            </div>
                            <div class="p-3" style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Equal income ®</span>
                                    <span class="small">?</span>
                                </div>
                                <h3 class="mb-1 fw-bold">$234.98K</h3>
                                <div class="d-flex align-items-center">
                                    <span class="badge" style="background: #fef08a; color: #854d0e;">● 256.49%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Benefits Section -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="feature-card">
                        <h4><i class="fas fa-shield-alt text-success"></i> Protected Investments</h4>
                        <p>Your investments are secured with bank-level encryption and insurance coverage up to $500,000.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card">
                        <h4><i class="fas fa-chart-line text-primary"></i> Growth Tracking</h4>
                        <p>Monitor your portfolio performance in real-time with detailed analytics and personalized insights.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Section (Hidden by default) -->
    <section class="dashboard container" id="userDashboard">
        <h2 class="mb-4">Welcome, <span id="userName"></span>!</h2>
        
        <!-- Balance Cards -->
        <div class="row">
            <div class="col-md-6">
                <div class="balance-card">
                    <h5>USD Account</h5>
                    <h2 class="display-4" id="usdBalance">$0.00</h2>
                    <div class="currency-toggle">
                        <span><i class="fas fa-dollar-sign"></i> USD</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="balance-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <h5>EUR Account</h5>
                    <h2 class="display-4" id="eurBalance">€0.00</h2>
                    <div class="currency-toggle">
                        <span><i class="fas fa-euro-sign"></i> EUR</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <button class="btn btn-primary-custom me-2" onclick="showTransferModal()">
                    <i class="fas fa-exchange-alt"></i> Transfer Funds
                </button>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="mt-5">
            <h4>Transaction History</h4>
            <div id="transactionList"></div>
        </div>
    </section>

    <!-- Admin Dashboard -->
    <section class="dashboard container" id="adminDashboard">
        <h2 class="mb-4">Admin Panel</h2>
        
        <div class="admin-panel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>User Management</h4>
                <button class="btn btn-primary-custom" onclick="showNewUserModal()">
                    <i class="fas fa-plus"></i> Add New User
                </button>
            </div>
            <div id="userList"></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5" id="contact">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Get In Touch</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="feature-card">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-university"></i> Cod Banking</h5>
                    <p>Your trusted partner in digital banking solutions. Secure, fast, and reliable.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <a href="#about">About Us</a>
                    <a href="#investment">Investment</a>
                    <a href="#contact">Contact</a>
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="col-md-4">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> </p>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Banking St, Financial District</p>
                </div>
            </div>
            <hr style="border-color: #444; margin: 2rem 0;">
            <div class="text-center">
                <p>&copy; 2026 Banking. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to Your Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="loginEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm">
                        @csrf

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Sign Up
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- OTP Verification Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verify OTP</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>OTP sent to your email. Please enter the code:</p>
                    <form id="otpForm">
                        @csrf
                        <input type="hidden" name="name">
                        <input type="hidden" name="email">
                        <input type="hidden" name="phone">
                        <input type="hidden" name="password">
                        <div class="mb-3">
                            <label class="form-label">Email OTP</label>
                            <input type="text" name="otp" class="form-control" id="emailOtp" maxlength="6" required>
                            {{-- <small class="text-muted">Your OTP: <span id="emailOtpDisplay"></span></small> --}}
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Phone OTP</label>
                            <input type="text" class="form-control" id="phoneOtp" maxlength="6" required>
                            <small class="text-muted">Your OTP: <span id="phoneOtpDisplay"></span></small>
                        </div> --}}
                        <button type="submit" class="btn btn-primary-custom w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Transfer Modal -->
    <div class="modal fade" id="transferModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transfer Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> Please contact support to complete this transaction.
                    </div>
                    <p>For security reasons, all fund transfers require support verification.</p>
                    <p><strong>Support:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c9babcb9b9a6bbbd89a8ada0b0a6e7aaa6a4">[email&#160;protected]</a> | +1 234 567 890</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Add User Modal -->
    <div class="modal fade" id="newUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User & Transfer Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newUserForm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="newUserName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="newUserPhone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="newUserEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" id="newUserAddress" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-control" id="newUserCurrency" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" id="newUserAmount" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Transfer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deposit Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="depositForm">
                        <input type="hidden" id="depositUserId">
                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <input type="text" class="form-control" id="depositUserName" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-control" id="depositCurrency" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" id="depositAmount" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Deposit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Withdraw Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="withdrawForm">
                        <input type="hidden" id="withdrawUserId">
                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <input type="text" class="form-control" id="withdrawUserName" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-control" id="withdrawCurrency" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" id="withdrawAmount" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Withdraw</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="{{ asset('assets/site_assets/script.js') }}"></script>

    <!-- toast message -->
    <script src="{{ asset('assets/admin-assets/plugins/toast/toastr.js') }}"></script>
    <script src="{{ asset('assets/admin-assets/js/toastr.init.js') }}"></script>
    <!-- toast message -->
    @include('layouts._massages')

    <script>

        $('#signupForm').submit(function(e){

            e.preventDefault();

            let form = $(this);

            let submitBtn = form.find('button[type="submit"]');

            // Disable button and show loading
            submitBtn.prop('disabled', true).text('Sending OTP...');

            let formData = form.serialize();

            $.post("{{ route('send.otp') }}", formData, function(res){

                if(res.status)
                {

                    let name = form.find('input[name="name"]').val();
                    let email = form.find('input[name="email"]').val();
                    let phone = form.find('input[name="phone"]').val();
                    let password = form.find('input[name="password"]').val();
                    let password_confirmation = form.find('input[name="password_confirmation"]').val();

                    $('#otpForm input[name="name"]').val(name);
                    $('#otpForm input[name="email"]').val(email);
                    $('#otpForm input[name="phone"]').val(phone);
                    $('#otpForm input[name="password"]').val(password);
                    $('#otpForm input[name="password_confirmation"]').val(password_confirmation);

                    $('#signupModal').modal('hide');
                    $('#otpModal').modal('show');

                }
                else
                {
                    alert(res.message || 'Failed to send OTP');
                }

            })
            .fail(function(){

                alert('Server error. Please try again.');

            })
            .always(function(){

                // Enable button and restore text
                submitBtn.prop('disabled', false).text('Sign Up');

            });

        });





        $('#otpForm').submit(function(e){

            e.preventDefault();

            $.post("{{ route('verify.otp') }}", $(this).serialize(), function(res){

                if(res.status)
                {
                    showToast('success', 'Success', 'Registration successful');

                    setTimeout(function(){

                        window.location.href = "{{ route('dashboard') }}";

                    }, 1000); // 1000ms = 1 second

                }
                else
                {
                    showToast('error', 'Error', res.message);
                }

            });

        });

    </script>

</body>
</html>
