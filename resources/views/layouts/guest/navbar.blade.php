<div class="navbar-container">
        <div class="topbar d-none d-lg-block">
          <div class="container">
            <div class="d-flex justify-content-between align-items-center">
              <div class="top-info">
                <small class="me-3">
                  <i class="fas fa-map-marker-alt me-2"></i>
                  <a href="#">Binadesa - Platform Desa Digital</a>
                </small>
                <small class="me-3">
                  <i class="fas fa-envelope me-2"></i>
                  <a href="#">info@binadesa.id</a>
                </small>
              </div>
              <div class="top-link">
                <a href="#">
                  <small class="mx-2">Kebijakan Privasi</small>
                </a>
                <span class="text-white">/</span>
                <a href="#">
                  <small class="mx-2">Syarat & Ketentuan</small>
                </a>
                <span class="text-white">/</span>
                <a href="#">
                  <small class="ms-2">Bantuan</small>
                </a>
              </div>
            </div>
          </div>
        </div>

        <nav class="navbar navbar-expand-xl navbar-main">
          <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
              <h1>Binadesa</h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('/dashboard') ? 'active' : '' }}">
                    Beranda
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('warga.index') }}" class="nav-link {{ request()->is('warga*') ? 'active' : '' }}">
                    Data Warga
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('kategoriberita.index') }}" class="nav-link {{ request()->is('kategoriberita*') ? 'active' : '' }}">
                    Kategori Berita
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                    Manajemen User
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle {{ request()->is('warga/create') || request()->is('kategoriberita/create') || request()->is('users/create') ? 'active' : '' }}"
                     data-bs-toggle="dropdown">
                    Tambah Data
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{ route('warga.create') }}" class="dropdown-item">
                        Tambah Warga
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('kategoriberita.create') }}" class="dropdown-item">
                        Tambah Kategori
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('user.create') }}" class="dropdown-item">
                        Tambah User
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <div class="navbar-actions">
                <button class="action-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <i class="fas fa-search"></i>
                </button>

                <button class="action-btn position-relative">
                  <i class="fas fa-bell"></i>
                  <span class="notification-badge">3</span>
                </button>

                <div class="nav-item dropdown">
                  <a href="#" class="user-avatar" data-bs-toggle="dropdown">
                    <i class="fas fa-user"></i>
                  </a>
                  <ul class="dropdown-menu user-dropdown-menu">
                    <li>
                      <a href="#" class="user-dropdown-item">
                        <i class="fas fa-user me-2"></i>Profil
                      </a>
                    </li>
                    <li>
                      <a href="#" class="user-dropdown-item">
                        <i class="fas fa-cog me-2"></i>Pengaturan
                      </a>
                    </li>
                    <li><hr class="user-dropdown-divider"></li>
                    <li>
                      <a href="{{ route('logout') }}" class="user-dropdown-item text-danger"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
