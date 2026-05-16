<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hospital Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#0f172a,#1e3a8a,#0ea5e9);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }

        .login-card{
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.95);
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }
        .form-control{
            height: 50px;
            border-radius: 12px;
        }

        .btn-login{
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg,#2563eb,#06b6d4);
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37,99,235,0.3);
        }

        .title{
            font-weight: 700;
            color: #0f172a;
        }

        .subtitle{
            color: #64748b;
            font-size: 14px;
        }

    </style>
</head>

<body>

<div class="card login-card p-4">

    <div class="text-center mb-4">

    <div class="hospital-logo mb-3 ">
        <img src="{{ asset('assets/img/unico_icon.jpg') }}" style="border-radius: 15px;" width="200" alt="Unico Icon">
    </div>

        <h3 class="title">
            Unico Hospital PLC
        </h3>

        <p class="subtitle">
            Hospital Management System
        </p>

    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <!-- Email -->
        <div class="mb-3">

            <label class="form-label fw-semibold">
                Email Address
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                >

            </div>

        </div>

        <!-- Password -->
        <div class="mb-3">

            <label class="form-label fw-semibold">
                Password
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password"
                    required
                >

            </div>

        </div>

        <!-- Remember -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember"
                >

                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="text-decoration-none"
                >
                    Forgot Password?
                </a>
            @endif

        </div>

        <!-- Login Button -->
        <button type="submit" class="btn btn-primary btn-login w-100">

            <i class="bi bi-box-arrow-in-right me-2"></i>

            Login Now

        </button>

    </form>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
