<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — MTS Negeri 2 Kotabaru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f1b2d 0%, #1a2d45 50%, #198754 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        }

        .login-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, #198754, #20c997);
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(25,135,84,0.35);
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 2px solid #e9ecef;
            border-right: none;
            background: #f8f9fa;
        }

        .input-group .form-control {
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Header -->
        <div class="text-center mb-4">
            <img src="{{ asset('assets/foto/logo-sekolah.png') }}" alt="Logo" class="login-logo mb-3">
            <h5 class="fw-bold mb-1">Panel Admin</h5>
            <p class="text-muted small">MTS Negeri 2 Kotabaru</p>
        </div>

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible rounded-3 py-2" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <small>{{ $errors->first() }}</small>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible rounded-3 py-2" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <small>{{ session('error') }}</small>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold small">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope text-muted"></i></span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Alamat Email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock text-muted"></i></span>
                    <input type="password" name="password" id="passwordInput"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    <button type="button" class="btn btn-outline-secondary border-start-0"
                        style="border-radius:0 10px 10px 0;border:2px solid #e9ecef;border-left:none;"
                        onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                    <label class="form-check-label small" for="rememberMe">Ingat saya</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login btn-success text-white w-100">
                <i class="bi bi-shield-lock me-2"></i>Masuk ke Panel Admin
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-muted small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i>Kembali ke Website
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
</body>
</html>
