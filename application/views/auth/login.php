<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Media Monitoring | DISNAKER Kota Semarang</title>
    
    <!-- Modern Typography: Plus Jakarta Sans for Display, Inter for Body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/sbadmin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            /* Semarang Red Palette - Soft, Mature, Professional */
            --brand-50: #fef2f2;
            --brand-100: #fee2e2;
            --brand-500: #ef4444;
            --brand-600: #dc2626;
            --brand-700: #b91c1c;
            --brand-800: #991b1b;
            --brand-900: #7f1d1d;
            --brand-950: #450a0a;
            
            /* Neutral Palette */
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            
            /* Typography */
            --font-sans: 'Inter', system-ui, -apple-system, sans-serif;
            --font-display: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            
            /* Layout & Shadows */
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.05), 0 4px 6px -4px rgb(0 0 0 / 0.05);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.05), 0 8px 10px -6px rgb(0 0 0 / 0.05);
            
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* CSS Reset */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-size-adjust: 100%; }
        
        /* Centered Body Background */
        body { 
            font-family: var(--font-sans); 
            color: var(--gray-700); 
            background: linear-gradient(135deg, #7f1d1d 0%, var(--brand-800) 50%, var(--brand-700) 100%);
            line-height: 1.5; 
            min-height: 100vh; 
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        img { display: block; max-width: 100%; height: auto; }
        a { color: inherit; text-decoration: none; }
        button, input { font-family: inherit; }

        /* Floating Card Layout */
        .layout-wrapper {
            display: flex;
            width: 100%;
            max-width: 1080px;
            min-height: 600px;
            background-color: var(--white);
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01), 0 0 0 1px rgba(0,0,0,0.04);
            overflow: hidden; /* Ensures child elements don't break rounded corners */
        }

        /* ----------------------------------------------------
           Left Side: Brand & Identity
        ---------------------------------------------------- */
        .brand-section {
            flex: 1;
            position: relative;
            background: linear-gradient(135deg, var(--brand-800) 0%, var(--brand-950) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            overflow: hidden;
            color: white;
        }

        /* Subtle Geometric Overlay for Premium Feel */
        .brand-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.83v58.34h-58.34l-.83-.83V0h58.34zM29.5 48.5c10.493 0 19-8.507 19-19s-8.507-19-19-19-19 8.507-19 19 8.507 19 19 19zm0-2c-9.389 0-17-7.611-17-17s7.611-17 17-17 17 7.611 17 17-7.611 17-17 17z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            background-size: 60px 60px;
            opacity: 0.8;
            pointer-events: none;
        }

        /* Gradient Glow Accent */
        .brand-section::after {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: radial-gradient(circle at top right, rgba(220, 38, 38, 0.15) 0%, transparent 60%);
            top: -25%;
            right: -25%;
            pointer-events: none;
        }

        .brand-content {
            position: relative;
            z-index: 10;
            max-width: 480px;
            width: 100%;
        }

        .logo-container {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .logo-container img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .gov-title {
            font-family: var(--font-display);
            font-size: 0.8125rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.5rem;
            display: block;
        }

        .main-title {
            font-family: var(--font-display);
            font-size: 2.25rem;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .sub-title {
            font-family: var(--font-display);
            font-size: 1.125rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .description {
            font-size: 1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.7);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 2rem;
        }

        /* ----------------------------------------------------
           Right Side: Auth Form
        ---------------------------------------------------- */
        .auth-section {
            flex: 1;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem 4rem;
            position: relative;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .auth-header {
            margin-bottom: 2.5rem;
        }

        .auth-header h2 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .auth-header p {
            font-size: 0.9375rem;
            color: var(--gray-500);
        }

        /* Alert styling */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: 1px solid transparent;
        }

        .alert-error {
            background-color: var(--brand-50);
            border-color: var(--brand-100);
            color: var(--brand-800);
        }

        .alert-success {
            background-color: #f0fdf4;
            border-color: #dcfce7;
            color: #166534;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 0.9375rem;
            pointer-events: none;
            transition: var(--transition);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            font-size: 0.9375rem;
            color: var(--gray-900);
            background-color: #fff;
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-md);
            transition: var(--transition);
            box-shadow: 0 1px 2px rgba(0,0,0,0.01);
        }

        .form-control::placeholder {
            color: var(--gray-400);
        }

        .form-control:hover {
            border-color: var(--gray-300);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--brand-600);
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        }

        .input-group:focus-within .input-icon {
            color: var(--brand-600);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: 0;
            font-size: 0.9375rem;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--gray-600);
        }

        .password-toggle:focus-visible {
            outline: 2px solid var(--brand-600);
            outline-offset: 2px;
            border-radius: 2px;
        }

        /* Form Actions & Extras */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-input {
            width: 1rem;
            height: 1rem;
            border: 1.5px solid var(--gray-300);
            border-radius: 0.25rem;
            accent-color: var(--brand-600);
            cursor: pointer;
        }

        .checkbox-label {
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
        }

        .text-link {
            color: var(--brand-700);
            font-weight: 600;
            transition: var(--transition);
        }

        .text-link:hover {
            color: var(--brand-800);
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 0.875rem 1.5rem;
            background-color: var(--brand-700);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-size: 0.9375rem;
            font-weight: 600;
            font-family: var(--font-display);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(185, 28, 28, 0.2);
        }

        .btn-submit:hover {
            background-color: var(--brand-800);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px -2px rgba(185, 28, 28, 0.25);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px -1px rgba(185, 28, 28, 0.15);
        }

        .btn-submit:focus-visible {
            outline: 2px solid var(--brand-600);
            outline-offset: 2px;
        }
        
        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Footer */
        .auth-footer {
            margin-top: 3rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--gray-500);
        }
        
        .auth-footer a {
            color: var(--gray-700);
            font-weight: 500;
            transition: var(--transition);
        }
        
        .auth-footer a:hover {
            color: var(--brand-700);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .auth-section {
                padding: 3rem;
            }
            .brand-section {
                padding: 3rem;
            }
            .main-title {
                font-size: 2.25rem;
            }
        }

        @media (max-width: 768px) {
            .layout-wrapper {
                flex-direction: column;
            }
            .brand-section {
                flex: none;
                padding: 3rem 2rem;
                text-align: center;
            }
            .brand-content {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .logo-container {
                margin-bottom: 1.5rem;
            }
            .auth-section {
                flex: 1;
                padding: 3rem 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .brand-section {
                padding: 2.5rem 1.5rem;
            }
            .main-title {
                font-size: 1.875rem;
            }
            .sub-title {
                font-size: 1.125rem;
            }
            .description {
                font-size: 0.9375rem;
            }
            .auth-section {
                padding: 2.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="layout-wrapper">
        <!-- Brand Section (Left) -->
        <section class="brand-section" aria-label="Informasi Instansi">
            <div class="brand-content">
                <div class="logo-container">
                    <img src="<?= base_url('assets/images/logodisnaker.png') ?>" alt="Logo Pemerintah Kota Semarang">
                </div>
                <span class="gov-title">Pemerintah Kota Semarang</span>
                <h1 class="main-title">Dinas Tenaga Kerja</h1>
                <div class="sub-title">Media Monitoring</div>
                
                <p class="description">
                    Pantau pemberitaan media secara real-time dari berbagai sumber untuk mendukung pengambilan keputusan yang akurat dan tepat.
                </p>
            </div>
        </section>

        <!-- Auth Section (Right) -->
        <main class="auth-section" role="main">
            <div class="auth-wrapper">
                
                <div class="auth-header">
                    <h2>Masuk ke Akun</h2>
                    <p>Silakan masukkan kredensial Anda untuk melanjutkan.</p>
                </div>

                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-error" role="alert">
                        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                        <span><?= htmlspecialchars($this->session->flashdata('message')) ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-error" role="alert">
                        <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                        <span><?= htmlspecialchars($this->session->flashdata('error')) ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span><?= htmlspecialchars($this->session->flashdata('success')) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" action="<?= base_url('auth/login') ?>" id="login-form">
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <div class="input-group">
                            <i class="far fa-envelope input-icon" aria-hidden="true"></i>
                            <input type="email" id="email" name="email" class="form-control" 
                                   placeholder="nama@email.com" 
                                   required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <i class="fas fa-lock input-icon" aria-hidden="true"></i>
                            <input type="password" id="password" name="password" class="form-control" 
                                   placeholder="••••••••" 
                                   required autocomplete="current-password">
                            <button type="button" class="password-toggle" id="toggle-password" aria-label="Tampilkan kata sandi">
                                <i class="far fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-actions">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember" id="remember" class="checkbox-input">
                            <span class="checkbox-label">Ingat saya</span>
                        </label>
                        <a href="<?= base_url('auth/forgot') ?>" class="text-link">Lupa sandi?</a>
                    </div>

                    <button type="submit" class="btn-submit" id="btn-submit">
                        Masuk
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </button>
                    
                </form>

                <div class="auth-footer">
                    <p>Belum memiliki akun? <a href="<?= base_url('auth/register') ?>" class="text-link">Daftar sekarang</a></p>
                    <p style="margin-top: 2rem; font-size: 0.8125rem;">
                        <a href="<?= base_url('home') ?>"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
                    </p>
                    <p style="margin-top: 1.5rem; font-size: 0.75rem; color: var(--gray-400);">
                        &copy; <?= date('Y') ?> Dinas Tenaga Kerja Kota Semarang.
                    </p>
                </div>

            </div>
        </main>
    </div>

    <!-- JavaScript for Form Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const loginForm = document.getElementById('login-form');
            const submitBtn = document.getElementById('btn-submit');

            // Password Visibility Toggle
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                const icon = this.querySelector('i');
                if (type === 'text') {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    this.setAttribute('aria-label', 'Sembunyikan kata sandi');
                } else {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    this.setAttribute('aria-label', 'Tampilkan kata sandi');
                }
            });

            // Loading state on submit
            loginForm.addEventListener('submit', function() {
                if (this.checkValidity()) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memproses...';
                }
            });
        });
    </script>

</body>
</html>
