<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengelolaan Data Peserta Sertifikasi</title>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            padding: 40px;
            width: 100%;
            max-width: 440px;
            text-align: center;
        }

        .icon-box {
            width: 64px;
            height: 64px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        p {
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 28px;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-outline {
            background-color: transparent;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .footer-text {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 24px;
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- Icon Sertifikasi -->
        <div class="icon-box">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>

        <!-- Judul & Deskripsi -->
        <h1>Certification Application</h1>
        <p>Welcome to the Participant Data & Certification Scheme Management System.</p>

        <!-- Tombol Aksi -->
        <div class="btn-group">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        <i class="fa-solid fa-gauge"></i> Ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline">
                            <i class="fa-solid fa-user-plus"></i> Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Footer Kecil -->
        <div class="footer-text">
            LSP Junior Web Developer &copy; {{ date('Y') }}
        </div>
    </div>

</body>
</html>
