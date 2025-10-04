<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .welcome-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #28a745;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }
        p {
            color: #333;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .btn-outline-secondary {
            border: 2px solid #6c757d;
            color: #6c757d;
            background: transparent;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
            transform: translateY(-2px);
        }
        .success-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="success-icon">🎉</div>
        <h1>Login Berhasil!</h1>
        <p>{{ session('message', $message ?? 'Selamat! Anda berhasil login.') }}</p>

        <div class="btn-group">
            <a href="/profil" class="btn btn-primary">
                📊 Lihat Profil Desa
            </a>
            <a href="/auth" class="btn btn-outline-secondary">
                🔐 Login Kembali
            </a>
        </div>

        <!-- Informasi tambahan -->
        <div class="mt-4 p-3 bg-light rounded">
            <small class="text-muted">
                <strong>Fitur yang tersedia:</strong><br>
                • Lihat data profil desa lengkap<br>
                • Akses visi dan misi desa<br>
                • Informasi kontak desa
            </small>
        </div>
    </div>
</body>
</html>
