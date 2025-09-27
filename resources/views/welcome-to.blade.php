<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>{{ $title }}</h1>
        <h3 class="text-muted">{{ $subtitle }}</h3>
        <p class="lead">{{ $welcome_message }}</p>

        <a href="/profil" class="btn btn-primary btn-lg mt-3">
            {{ $button_text }}
        </a>

        <!-- Debug: Cek apakah data terpassing -->
        <div class="mt-5">
            <div class="alert alert-info">
                <strong>Debug Info:</strong><br>
                Title: {{ $title }}<br>
                Subtitle: {{ $subtitle }}<br>
                Button Text: {{ $button_text }}
            </div>
        </div>
    </div>
</body>
</html>
