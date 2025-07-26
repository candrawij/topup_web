<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff5e13;">
  <div class="container">

    <div class="navbar-brand-box">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="36" height="36" class="me-2">
        <span class="text-white" style="font-family: 'Arial', sans-serif; font-weight: 600; font-size: 1.25rem;">Nemma Store</span>
      </a>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0" style="font-size: 0.90rem;">
        <li class="nav-item">
          <a class="nav-link text-white" href="/"><i class="fas fa-home me-2"></i>Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/history"><i class="fas fa-search me-2"></i>Cek Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/pricelist"><i class="fas fa-list me-2"></i>Daftar Harga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/page/about"><i class="fas fa-info-circle me-2"></i>Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/api-docs"><i class="fas fa-book me-2"></i>Dokumentasi API</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/tools"><i class="fas fa-wrench me-2"></i>Tool Cek Akun</a>
        </li>

        <!-- Dropdown Akun -->
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownAkun" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-2"></i>Akun
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAkun">
            @auth
              <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                <i class="fas fa-user me-2"></i>Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right me-2 text-danger"></i>Logout
                  </button>
                </form>
              </li>
            @else
              <li><a class="dropdown-item" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-2 text-success"></i>Login</a></li>
            @endauth
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>