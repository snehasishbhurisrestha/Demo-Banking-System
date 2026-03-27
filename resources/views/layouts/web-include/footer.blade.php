<footer class="footer" style="margin: 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>PremierBank</h5>
                <p style="color: rgba(255,255,255,0.7);">Private banking since 1885. Member FDIC. Equal Housing Lender.</p>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Personal</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('saving') }}">Savings</a></li>
                    <li><a href="{{ route('creditcards') }}">Credit Cards</a></li>
                    <li><a href="{{ route('lending') }}">Lending</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Business</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('commercial') }}">Commercial</a></li>
                    <li><a href="{{ route('treasury') }}">Treasury</a></li>
                    <li><a href="{{ route('markets') }}">Markets</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Wealth</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('privateBanking') }}">Private Banking</a></li>
                    <li><a href="{{ route('invesment') }}">Investment</a></li>
                    <li><a href="{{ route('trust') }}">Trust</a></li>
                    <li><a href="{{ route('estate-planning') }}">Estate Planning</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h5>About</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('story') }}">Our Story</a></li>
                    <li><a href="{{ route('leadership') }}">Leadership</a></li>
                    <li><a href="{{ route('carrers') }}">Careers</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Premier Bank. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- MODALS -->
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign in to PremierBank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-banking w-100">Sign In</button>
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
                <h5 class="modal-title">Open an account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="signupForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-banking w-100">Continue</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- OTP Modal -->
<div class="modal fade" id="otpModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verify your identity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">We've sent a verification code to your email.</p>
                <form id="otpForm">
                    @csrf
                    <input type="hidden" name="name">
                    <input type="hidden" name="email">
                    <input type="hidden" name="phone">
                    <input type="hidden" name="password">
                    <div class="mb-3">
                        <label class="form-label">Enter OTP</label>
                        <input type="text" name="otp" class="form-control" maxlength="6" required>
                    </div>
                    <button type="submit" class="btn btn-banking w-100">Verify</button>
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
                <h5 class="modal-title">Initiate transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-shield-alt me-2"></i> For your security, please call our private banking line to complete transfers over $10,000.
                </div>
                <p><strong>Private Banking:</strong> 1-800-555-0199</p>
                <p><strong>Email:</strong> privatebanking@premier.com</p>
            </div>
        </div>
    </div>
</div>

<!-- Admin New User Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newUserForm">
                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input type="text" class="form-control" id="newUserName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
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
                        <label class="form-label">Initial deposit currency</label>
                        <select class="form-select" id="newUserCurrency">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Initial amount</label>
                        <input type="number" class="form-control" id="newUserAmount" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-banking w-100">Create client</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Deposit Modal (Admin) -->
<div class="modal fade" id="depositModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="depositForm">
                    <input type="hidden" id="depositUserId">
                    <div class="mb-3">
                        <label class="form-label">Client</label>
                        <input type="text" id="depositUserName" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Currency</label>
                        <select id="depositCurrency" class="form-select">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" id="depositAmount" step="0.01" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-banking w-100">Process deposit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- toast message -->
<script src="{{ asset('assets/admin-assets/plugins/toast/toastr.js') }}"></script>
<script src="{{ asset('assets/admin-assets/js/toastr.init.js') }}"></script>
<!-- toast message -->
@include('layouts._massages')


<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true
    });

    function showLogin() { new bootstrap.Modal(document.getElementById('loginModal')).show(); }
    function showSignup() { new bootstrap.Modal(document.getElementById('signupModal')).show(); }

</script> 
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