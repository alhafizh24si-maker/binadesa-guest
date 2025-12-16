<div class="navbar-container">
  <!-- Topbar -->
  <div class="topbar d-none d-lg-block">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center py-2">
        <div class="top-info">
          <small class="me-3">
            <i class="fas fa-map-marker-alt me-1"></i>
            <a href="#" class="text-decoration-none">Binadesa - Platform Desa Digital</a>
          </small>
          <small class="me-3">
            <i class="fas fa-envelope me-1"></i>
            <a href="mailto:info@binadesa.id" class="text-decoration-none">info@binadesa.id</a>
          </small>
        </div>
        <div class="top-link">
          <a href="#" class="text-decoration-none">
            <small class="mx-2">Kebijakan Privasi</small>
          </a>
          <span class="mx-1">|</span>
          <a href="#" class="text-decoration-none">
            <small class="mx-2">Syarat & Ketentuan</small>
          </a>
          <span class="mx-1">|</span>
          <a href="#" class="text-decoration-none">
            <small class="mx-2">Bantuan</small>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Navbar -->
  <nav class="navbar navbar-expand-xl navbar-main py-0">
    <div class="container">
      <!-- Brand/Logo -->
      <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center py-3">
        <img src="{{ asset('assets-guest/images/logobinadesa.png') }}"
             alt="Logo Binadesa"
             class="me-2"
             style="height: 40px; width: auto;">
        <h1 class="h4 mb-0 fw-bold text-primary">Portal Desa</h1>
      </a>

      <!-- Mobile Toggle Button -->
      <button class="navbar-toggler border-0"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarCollapse"
              aria-controls="navbarCollapse"
              aria-expanded="false"
              aria-label="Toggle navigation">
        <i class="fas fa-bars fs-4"></i>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Main Menu -->
        <ul class="navbar-nav mx-auto mb-2 mb-xl-0">
          <!-- Beranda -->
          <li class="nav-item mx-1">
            <a href="{{ url('/dashboard') }}"
               class="nav-link px-3 py-3 d-flex align-items-center {{ request()->is('/dashboard') ? 'active' : '' }}">
              <i class="fas fa-home me-2 d-none d-md-inline"></i>
              <span>Beranda</span>
            </a>
          </li>

          <!-- Dropdown Profil & Data -->
          <li class="nav-item dropdown mx-1">
            <a href="#"
               class="nav-link px-3 py-3 d-flex align-items-center dropdown-toggle {{
                  request()->is('profildesa*') ||
                  request()->is('warga*') ||
                  request()->is('agenda*') ||
                  request()->is('galeri*') ? 'active' : '' }}"
               data-bs-toggle="dropdown"
               aria-expanded="false">
              <i class="fas fa-database me-2 d-none d-md-inline"></i>
              <span>Data Master</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-0">
              <li>
                <h6 class="dropdown-header fw-bold">Data Master</h6>
              </li>
              <li><hr class="dropdown-divider"></li>

              <!-- Profil Desa -->
              <li>
                <a href="{{ route('profildesa.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('profildesa') ? 'active' : '' }}">
                  <i class="fas fa-home text-primary me-2"></i>
                  <span>Profil Desa</span>
                </a>
              </li>
              <li>
                <a href="{{ route('profildesa.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('profildesa/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-primary me-2"></i>
                  <span>Tambah Profil Desa</span>
                </a>
              </li>

              <li><hr class="dropdown-divider"></li>

              <!-- Data Warga -->
              <li>
                <a href="{{ route('warga.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('warga') ? 'active' : '' }}">
                  <i class="fas fa-users text-success me-2"></i>
                  <span>Data Warga</span>
                </a>
              </li>
              <li>
                <a href="{{ route('warga.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('warga/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-success me-2"></i>
                  <span>Tambah Warga</span>
                </a>
              </li>

              <li><hr class="dropdown-divider"></li>

              <!-- Agenda -->
              <li>
                <a href="{{ route('agenda.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('agenda') ? 'active' : '' }}">
                  <i class="fas fa-calendar-alt text-secondary me-2"></i>
                  <span>Agenda</span>
                </a>
              </li>
              <li>
                <a href="{{ route('agenda.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('agenda/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-secondary me-2"></i>
                  <span>Tambah Agenda</span>
                </a>
              </li>

              <li><hr class="dropdown-divider"></li>

              <!-- Galeri (Baru Ditambahkan) -->
              <li>
                <a href="{{ route('galeri.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('galeri') ? 'active' : '' }}">
                  <i class="fas fa-images text-info me-2"></i>
                  <span>Galeri Foto</span>
                </a>
              </li>
              <li>
                <a href="{{ route('galeri.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('galeri/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-info me-2"></i>
                  <span>Tambah Galeri</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- Dropdown Berita & Kategori -->
          <li class="nav-item dropdown mx-1">
            <a href="#"
               class="nav-link px-3 py-3 d-flex align-items-center dropdown-toggle {{
                  request()->is('berita*') ||
                  request()->is('kategoriberita*') ? 'active' : '' }}"
               data-bs-toggle="dropdown"
               aria-expanded="false">
              <i class="fas fa-newspaper me-2 d-none d-md-inline"></i>
              <span>Berita & Kategori</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-0">
              <li>
                <h6 class="dropdown-header fw-bold">Berita & Kategori</h6>
              </li>
              <li><hr class="dropdown-divider"></li>

              <!-- Kategori Berita -->
              <li>
                <a href="{{ route('kategoriberita.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('kategoriberita') ? 'active' : '' }}">
                  <i class="fas fa-tags text-warning me-2"></i>
                  <span>Kategori Berita</span>
                </a>
              </li>
              <li>
                <a href="{{ route('kategoriberita.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('kategoriberita/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-warning me-2"></i>
                  <span>Tambah Kategori</span>
                </a>
              </li>

              <li><hr class="dropdown-divider"></li>

              <!-- Data Berita -->
              <li>
                <a href="{{ route('berita.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('berita') ? 'active' : '' }}">
                  <i class="fas fa-newspaper text-info me-2"></i>
                  <span>Data Berita</span>
                </a>
              </li>
              <li>
                <a href="{{ route('berita.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('berita/create') ? 'active' : '' }}">
                  <i class="fas fa-plus-circle text-info me-2"></i>
                  <span>Tambah Berita</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- Dropdown Manajemen User -->
          <li class="nav-item dropdown mx-1">
            <a href="#"
               class="nav-link px-3 py-3 d-flex align-items-center dropdown-toggle {{
                  request()->is('user*') ? 'active' : '' }}"
               data-bs-toggle="dropdown"
               aria-expanded="false">
              <i class="fas fa-user-cog me-2 d-none d-md-inline"></i>
              <span>Manajemen User</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-0">
              <li>
                <h6 class="dropdown-header fw-bold">Manajemen User</h6>
              </li>
              <li><hr class="dropdown-divider"></li>

              <!-- Daftar User -->
              <li>
                <a href="{{ route('user.index') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('user') ? 'active' : '' }}">
                  <i class="fas fa-users text-danger me-2"></i>
                  <span>Daftar User</span>
                </a>
              </li>

              <!-- Tambah User -->
              <li>
                <a href="{{ route('user.create') }}"
                   class="dropdown-item d-flex align-items-center py-2 {{ request()->is('user/create') ? 'active' : '' }}">
                  <i class="fas fa-user-plus text-danger me-2"></i>
                  <span>Tambah User</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- Galeri Menu Tambahan (Opsional: Untuk quick access di mobile) -->
          <li class="nav-item mx-1 d-xl-none">
            <a href="{{ route('galeri.index') }}"
               class="nav-link px-3 py-3 d-flex align-items-center {{ request()->is('galeri') ? 'active' : '' }}">
              <i class="fas fa-images me-2 d-none d-md-inline"></i>
              <span>Galeri</span>
            </a>
          </li>
        </ul>

        <!-- Logout Button -->
        <div class="d-flex align-items-center">
          <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="submit"
                    class="btn btn-danger d-flex align-items-center"
                    onclick="return confirm('Apakah Anda yakin ingin logout?')">
              <i class="fas fa-sign-out-alt me-2"></i>
              <span>Logout</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</div>

<!-- Tambahkan style untuk mempercantik navbar -->
<style>
.navbar-container {
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.topbar {
  background-color: #2c3e50;
  color: #ecf0f1;
}

.topbar a {
  color: #ecf0f1 !important;
  transition: color 0.3s;
}

.topbar a:hover {
  color: #3498db !important;
}

.navbar-main {
  background-color: #ffffff;
}

.navbar-brand {
  color: #2c3e50 !important;
}

.nav-link {
  color: #34495e !important;
  font-weight: 500;
  border-radius: 6px;
  transition: all 0.3s ease;
  position: relative;
}

.nav-link:hover {
  color: #2980b9 !important;
  background-color: #f8f9fa;
}

.nav-link.active {
  color: #ffffff !important;
  background-color: #3498db;
}

.nav-link.active:hover {
  background-color: #2980b9;
}

.dropdown-menu {
  border: none;
  border-radius: 8px;
  padding: 0.5rem 0;
  min-width: 240px;
}

.dropdown-item {
  padding: 0.5rem 1rem;
  color: #34495e;
  transition: all 0.2s;
  font-size: 0.9rem;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #2980b9;
}

.dropdown-item.active {
  background-color: #3498db;
  color: white;
}

.dropdown-header {
  font-size: 0.85rem;
  color: #6c757d;
}

.navbar-toggler:focus {
  box-shadow: none;
  outline: none;
}

/* Warna khusus untuk ikon Galeri */
.fa-images {
  color: #17a2b8;
}

/* Responsive adjustments */
@media (max-width: 1200px) {
  .navbar-nav .nav-item {
    margin: 0.1rem 0;
  }

  .nav-link {
    padding: 0.75rem 1rem !important;
  }
}

@media (max-width: 768px) {
  .navbar-collapse {
    padding: 1rem 0;
  }

  .dropdown-menu {
    border: 1px solid #eee;
    margin-top: 0.5rem;
    margin-left: 1rem;
  }

  .btn-danger {
    width: 100%;
    justify-content: center;
    margin-top: 1rem;
  }
}

/* Hover effect untuk dropdown di desktop */
@media (min-width: 1200px) {
  .nav-item.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
  }

  .dropdown-menu {
    animation: fadeIn 0.2s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
}

/* Efek hover khusus untuk menu Galeri */
.dropdown-item:hover .fa-images {
  color: #ffffff;
}

.dropdown-item.active .fa-images {
  color: #ffffff;
}
</style>

<script>
// Menambahkan hover effect untuk dropdown di desktop
document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = document.querySelectorAll('.nav-item.dropdown');

  dropdowns.forEach(dropdown => {
    // Untuk desktop (hover)
    dropdown.addEventListener('mouseenter', function() {
      if (window.innerWidth >= 1200) {
        const dropdownMenu = this.querySelector('.dropdown-menu');
        dropdownMenu.classList.add('show');
      }
    });

    dropdown.addEventListener('mouseleave', function() {
      if (window.innerWidth >= 1200) {
        const dropdownMenu = this.querySelector('.dropdown-menu');
        dropdownMenu.classList.remove('show');
      }
    });
  });
});
</script>
