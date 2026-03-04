        // Data Storage
        let users = JSON.parse(localStorage.getItem('bankingUsers')) || [];
        let currentUser = JSON.parse(localStorage.getItem('currentUser')) || null;
        let transactions = JSON.parse(localStorage.getItem('transactions')) || [];

        // Initialize admin account if not exists
        if (users.length === 0) {
            users.push({
                id: 'admin',
                name: 'Admin',
                email: 'admin@adiyo.com',
                phone: '1234567890',
                password: 'admin123',
                isAdmin: true,
                usdBalance: 0,
                eurBalance: 0
            });
            saveUsers();
        }

        function saveUsers() {
            localStorage.setItem('bankingUsers', JSON.stringify(users));
        }

        function saveTransactions() {
            localStorage.setItem('transactions', JSON.stringify(transactions));
        }

        // Show/Hide Functions
        function showLogin() {
            new bootstrap.Modal(document.getElementById('loginModal')).show();
        }

        function showSignup() {
            new bootstrap.Modal(document.getElementById('signupModal')).show();
        }
        
        function showTransferModal() {
            new bootstrap.Modal(document.getElementById('transferModal')).show();
        }

        function showNewUserModal() {
            new bootstrap.Modal(document.getElementById('newUserModal')).show();
        }

        // Login Form
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            const user = users.find(u => u.email === email && u.password === password);
            
            if (user) {
                currentUser = user;
                localStorage.setItem('currentUser', JSON.stringify(user));
                bootstrap.Modal.getInstance(document.getElementById('loginModal')).hide();
                loadDashboard();
            } else {
                alert('Invalid credentials!');
            }
        });

        // Signup Form
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const phone = document.getElementById('signupPhone').value;
            const password = document.getElementById('signupPassword').value;

            // Check if user exists
            if (users.find(u => u.email === email)) {
                alert('Email already registered!');
                return;
            }

            // Generate OTPs
            const emailOtp = Math.floor(100000 + Math.random() * 900000);
            const phoneOtp = Math.floor(100000 + Math.random() * 900000);

            // Store temp user data
            window.tempUser = {
                id: Date.now().toString(),
                name,
                email,
                phone,
                password,
                isAdmin: false,
                usdBalance: 0,
                eurBalance: 0,
                emailOtp,
                phoneOtp
            };

            // Show OTP modal
            document.getElementById('emailOtpDisplay').textContent = emailOtp;
            document.getElementById('phoneOtpDisplay').textContent = phoneOtp;
            
            bootstrap.Modal.getInstance(document.getElementById('signupModal')).hide();
            new bootstrap.Modal(document.getElementById('otpModal')).show();
        });

        // OTP Verification
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailOtp = document.getElementById('emailOtp').value;
            const phoneOtp = document.getElementById('phoneOtp').value;

            if (emailOtp == window.tempUser.emailOtp && phoneOtp == window.tempUser.phoneOtp) {
                delete window.tempUser.emailOtp;
                delete window.tempUser.phoneOtp;
                users.push(window.tempUser);
                saveUsers();
                
                alert('Account created successfully! Please login.');
                bootstrap.Modal.getInstance(document.getElementById('otpModal')).hide();
                showLogin();
            } else {
                alert('Invalid OTP!');
            }
        });

        // Load Dashboard
        function loadDashboard() {
            document.querySelector('.hero-section').style.display = 'none';
            document.querySelector('.features-section').style.display = 'none';
            document.getElementById('about').style.display = 'none';
            document.getElementById('investment').style.display = 'none';
            document.getElementById('contact').style.display = 'none';
            
            document.getElementById('loginNavItem').classList.add('hidden');
            document.getElementById('signupNavItem').classList.add('hidden');
            document.getElementById('logoutNavItem').classList.remove('hidden');

            if (currentUser.isAdmin) {
                document.getElementById('adminDashboard').style.display = 'block';
                loadAdminPanel();
            } else {
                document.getElementById('userDashboard').style.display = 'block';
                loadUserDashboard();
            }
        }

        // Load User Dashboard
        function loadUserDashboard() {
            const user = users.find(u => u.id === currentUser.id);
            document.getElementById('userName').textContent = user.name;
            document.getElementById('usdBalance').textContent = '$' + user.usdBalance.toFixed(2);
            document.getElementById('eurBalance').textContent = '€' + user.eurBalance.toFixed(2);

            // Load transactions
            const userTransactions = transactions.filter(t => t.userId === user.id);
            const transactionList = document.getElementById('transactionList');
            transactionList.innerHTML = '';

            if (userTransactions.length === 0) {
                transactionList.innerHTML = '<p class="text-muted">No transactions yet.</p>';
            } else {
                userTransactions.reverse().forEach(trans => {
                    const div = document.createElement('div');
                    div.className = 'transaction-card';
                    div.innerHTML = `
                        <div>
                            <strong>${trans.type}</strong>
                            <p class="text-muted mb-0">${new Date(trans.date).toLocaleString()}</p>
                        </div>
                        <div>
                            <h5 class="${trans.type === 'Deposit' || trans.type === 'Received' ? 'text-success' : 'text-danger'}">
                                ${trans.type === 'Deposit' || trans.type === 'Received' ? '+' : '-'}${trans.currency === 'USD' ? '$' : '€'}${trans.amount.toFixed(2)}
                            </h5>
                        </div>
                    `;
                    transactionList.appendChild(div);
                });
            }
        }

        // Load Admin Panel
        function loadAdminPanel() {
            const userList = document.getElementById('userList');
            userList.innerHTML = '';

            users.filter(u => !u.isAdmin).forEach(user => {
                const div = document.createElement('div');
                div.className = 'user-list-item';
                div.innerHTML = `
                    <div>
                        <strong>${user.name}</strong>
                        <p class="mb-0 text-muted">${user.email}</p>
                        <small>USD: $${user.usdBalance.toFixed(2)} | EUR: €${user.eurBalance.toFixed(2)}</small>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-success me-2" onclick="openDepositModal('${user.id}')">
                            <i class="fas fa-plus"></i> Deposit
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="openWithdrawModal('${user.id}')">
                            <i class="fas fa-minus"></i> Withdraw
                        </button>
                    </div>
                `;
                userList.appendChild(div);
            });
        }

        // New User Form (Admin)
        document.getElementById('newUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('newUserName').value;
            const phone = document.getElementById('newUserPhone').value;
            const email = document.getElementById('newUserEmail').value;
            const address = document.getElementById('newUserAddress').value;
            const currency = document.getElementById('newUserCurrency').value;
            const amount = parseFloat(document.getElementById('newUserAmount').value);

            const newUser = {
                id: Date.now().toString(),
                name,
                email,
                phone,
                address,
                password: '123456',
                isAdmin: false,
                usdBalance: currency === 'USD' ? amount : 0,
                eurBalance: currency === 'EUR' ? amount : 0
            };

            users.push(newUser);
            saveUsers();

            // Add transaction
            transactions.push({
                userId: newUser.id,
                type: 'Deposit',
                currency,
                amount,
                date: new Date().toISOString()
            });
            saveTransactions();

            bootstrap.Modal.getInstance(document.getElementById('newUserModal')).hide();
            alert(`Account created for ${name} with ${currency} ${amount.toFixed(2)}`);
            loadAdminPanel();
            this.reset();
        });

        // Deposit Modal
        function openDepositModal(userId) {
            const user = users.find(u => u.id === userId);
            document.getElementById('depositUserId').value = userId;
            document.getElementById('depositUserName').value = user.name;
            new bootstrap.Modal(document.getElementById('depositModal')).show();
        }

        document.getElementById('depositForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const userId = document.getElementById('depositUserId').value;
            const currency = document.getElementById('depositCurrency').value;
            const amount = parseFloat(document.getElementById('depositAmount').value);

            const user = users.find(u => u.id === userId);
            
            if (currency === 'USD') {
                user.usdBalance += amount;
            } else {
                user.eurBalance += amount;
            }

            saveUsers();

            transactions.push({
                userId,
                type: 'Deposit',
                currency,
                amount,
                date: new Date().toISOString()
            });
            saveTransactions();

            bootstrap.Modal.getInstance(document.getElementById('depositModal')).hide();
            alert(`Deposited ${currency} ${amount.toFixed(2)} to ${user.name}`);
            loadAdminPanel();
            this.reset();
        });

        // Withdraw Modal
        function openWithdrawModal(userId) {
            const user = users.find(u => u.id === userId);
            document.getElementById('withdrawUserId').value = userId;
            document.getElementById('withdrawUserName').value = user.name;
            new bootstrap.Modal(document.getElementById('withdrawModal')).show();
        }

        document.getElementById('withdrawForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const userId = document.getElementById('withdrawUserId').value;
            const currency = document.getElementById('withdrawCurrency').value;
            const amount = parseFloat(document.getElementById('withdrawAmount').value);

            const user = users.find(u => u.id === userId);
            
            if (currency === 'USD') {
                if (user.usdBalance < amount) {
                    alert('Insufficient balance!');
                    return;
                }
                user.usdBalance -= amount;
            } else {
                if (user.eurBalance < amount) {
                    alert('Insufficient balance!');
                    return;
                }
                user.eurBalance -= amount;
            }

            saveUsers();

            transactions.push({
                userId,
                type: 'Withdrawal',
                currency,
                amount,
                date: new Date().toISOString()
            });
            saveTransactions();

            bootstrap.Modal.getInstance(document.getElementById('withdrawModal')).hide();
            alert(`Withdrawn ${currency} ${amount.toFixed(2)} from ${user.name}`);
            loadAdminPanel();
            this.reset();
        });

        // Logout
        function logout() {
            localStorage.removeItem('currentUser');
            currentUser = null;
            location.reload();
        }

        // Check if user is logged in on page load
        if (currentUser) {
            loadDashboard();
        }