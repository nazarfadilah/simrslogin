<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rumah Sakit Islam Banjarmasin</title>
    <link rel="stylesheet" href="{{ asset('css/style/login.css') }}">
</head>

<body>
    <header>
        <div class="header-container">
            <img src="{{ asset('css/image/logo_rs.png') }}" alt="Logo Rumah Sakit" class="logo">
            <h1>RUMAH SAKIT ISLAM BANJARMASIN</h1>
        </div>
    </header>

    <main>
        <div class="login-card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Selamat Datang!</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <div class="input-group">
                    <img src="{{ asset('css/image/profile.png') }}" alt="icon Profile" class="icon">
                    <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required>
                </div>
                <label for="password">Kata Sandi</label>
                <div class="input-group">
                    <img src="{{ asset('css/image/key.png') }}" alt="Icon Sandi" class="icon">
                    <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi Anda" required>
                </div>

                <div class="forgot-password">
                    <a href="#">Lupa kata sandi?</a>
                </div>

                <button type="submit">Masuk</button>
            </form>

            <p class="register-text">Belum punya akun? <a href="daftar_akun.html">Daftar disini</a></p>
        </div>
    </main>
</body>

</html>