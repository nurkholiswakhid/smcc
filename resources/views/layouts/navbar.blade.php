{{-- navbar --}}
<nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow' }}">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assest/icons/smcc.png') }}" height="55" width="55" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" 
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light active" href="/profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light active" href="/berita">Berita</a>
                </li>           
                <li class="nav-item">
                    <a class="nav-link text-light active" href="/foto">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light active" href="/video">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light active" href="/contact">Kontak</a>
                </li>
            </ul>

            <div class="d-flex">
                @auth
                    <!-- Navbar for authenticated users -->
                    <a href="/dashboard" class="btn btn-primary me-2">Dashboard</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                @else
                    <!-- Navbar for guests (not logged in) -->
                    <a href="https://api.whatsapp.com/send/?phone=6285777726035&text&type=phone_number&app_absent=0&wame_ctl=1&fbclid=PAY2xjawHZ1vhleHRuA2FlbQIxMAABprJ9_AGFSBVO8xB5_yEaC9yvBdXGH1jDJ4V2Q1wyjlK9WG8RWDpvplNmEA_aem_OlBmy5yBUOx4kDuKkwW6nw" class="btn btn-warning">
                        <i class="fas fa-phone-alt me-2"></i> Call Center
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
{{-- navbar --}}
