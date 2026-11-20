<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4 text-center">
                <h4 class="card-title mb-2">Selamat Datang di UTS PW-Sibermu</h4>
                <p class="text-muted small mb-4">Silakan klik tombol di bawah untuk masuk ke sistem.</p>

                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#formLoginCollapse" aria-expanded="{{ $errors->any() ? 'true' : 'false' }}" aria-controls="formLoginCollapse">
                    Login
                </button>

                <div class="collapse mt-3 text-start {{ $errors->any() ? 'show' : '' }}" id="formLoginCollapse">
                    <hr>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>