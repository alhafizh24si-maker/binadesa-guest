<!DOCTYPE html>
<html>
<head>
    <title>Profil Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/" class="btn btn-secondary">← Kembali ke Welcome</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">PROFIL DESA {{ $profil['nama_desa'] }}</h2>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Data Profil Desa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Nama Desa</th>
                                <td>{{ $profil['nama_desa'] }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>{{ $profil['kecamatan'] }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>{{ $profil['kabupaten'] }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $profil['provinsi'] }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Alamat Kantor</th>
                                <td>{{ $profil['alamat_kantor'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $profil['email'] }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $profil['telepon'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Visi -->
                <div class="mt-4">
                    <h5 class="text-primary">Visi Desa</h5>
                    <div class="border p-3 bg-light rounded">
                        <p class="mb-0">{{ $profil['visi'] }}</p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="mt-3">
                    <h5 class="text-primary">Misi Desa</h5>
                    <div class="border p-3 bg-light rounded">
                        <p class="mb-0">{{ $profil['misi'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
