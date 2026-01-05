<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <title>Giriş Yap | DijiERP </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Selimcan Gürsu | Full Stack Web Developer" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link href="{{ asset('assets/css/vendors.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-md-6 col-sm-8">
                    <div class="auth-brand text-center mb-4">
                        <a href="index.html" class="logo-dark">
                            <img src="assets/images/logo-black.png" alt="dark logo" />
                        </a>
                        <a href="index.html" class="logo-light">
                            <img src="assets/images/logo.png" alt="logo" />
                        </a>
                        <h4 class="fw-bold mt-3">Hoşgeldin!</h4>
                        <p class="text-muted w-lg-75 mx-auto">Devam etmek için e-posta adresinizi ve şifrenizi girin..
                        </p>
                    </div>
                    <div class="card p-4">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">
                                    E-Posta Adresi
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="selimcangursu@wikywatch.com"
                                        required />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="userPassword" class="form-label">
                                    Parola
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="123456" required />

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Beni Hatırla</label>
                                </div>
                                <a href="auth-reset-pass.html"
                                    class="text-decoration-underline link-offset-3 text-muted">Şifremi unuttum?</a>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold py-2">Giriş Yap</button>
                            </div>
                        </form>

                        <p class="text-muted text-center mt-4 mb-0">
                            Sorun mu Yaşıyorsun ?
                            <a href="auth-sign-up.html" class="text-decoration-underline link-offset-3 fw-semibold">Bize
                                Ulaşın</a>
                        </p>
                    </div>

                    <p class="text-center text-muted mt-4 mb-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        Dijistack.com
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
