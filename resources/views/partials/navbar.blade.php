<nav class="navbar navbar-expand-lg shadow-sm bg-danger navbar-dark">
  <div class="container ">
      <a class="navbar-brand" href="#">Gadget News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}"  href="/">Home</a>
        </li>
        <li class="nav-item d-none">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "hp") ? 'active' : '' }}" href="/daftarHp">Hp</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
        {{-- <li class="nav-item ">
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Category</a>
        </li> --}}
        <div class="dropdown">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #C0D6E8 !important;">
              Categories
            </a>
        
          <!-- Tambahkan pengecekan apakah koleksi tidak kosong -->
          @if ($categories->isNotEmpty())
            <ul class="dropdown-menu">
              <!-- Pastikan loop mengiterasi dengan benar dan mengakses properti yang tepat -->
              @foreach ($categories as $category) 
                <li>
                  <!-- Gunakan $category, bukan $post -->
                  <a class="dropdown-item" href="/blog?category={{ $category->slug }}">
                    {{ $category->name }}
                  </a>
                </li>
              @endforeach
            </ul>
          @else
            <!-- Tampilkan pesan alternatif jika tidak ada kategori -->
            <p>Tidak ada kategori yang tersedia.</p>
          @endif
        </div>
        
      </ul>

      <ul class="navbar nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span style="color: #ffffff !important;">Welcome back {{ auth()->user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item d-block justify-content-center text-center" href="/dashboard"><i class="fa-solid fa-newspaper"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>

           
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item d-block justify-content-center text-center">
                  <i class="fa-solid fa-right-from-bracket"></i> Log out
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a href="/login" class="nav-link text-light {{ ($active === "login") ? 'active' : '' }}"> <i class="fa-solid fa-right-to-bracket"></i> Login</a>
        </li>
      </ul>
      @endauth
      
    </div>
  </div>
</nav>


