<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assest/icons/images.ico') }}">
    <title>smcc unesa</title>

    <!-- Add this in your HTML head section -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assest/css/style.css') }}">

    <style>
        /* Menangani overflow horizontal */
        html, body {
            overflow-x: hidden; /* Menyembunyikan scroll horizontal */
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box; /* Mengatur box model agar padding dan border tidak mempengaruhi lebar */
        }

        /* Custom Footer Style */
        #footer {
            background-color: #f8f9fa;
        }
        
        #footer .nav-link {
            color: #6c757d;
        }

        #footer .nav-link:hover {
            color: #495057;
        }

        #footer .text-muted {
            font-size: 0.875rem;
        }

        .footer-icons img {
            margin-right: 10px;
        }

        .footer-icons a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    <section id="footer" class="py-4" data-aos="zoom-out">
        <div class="container">
            <footer>
                <div class="row">
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="/" class="nav-link">Beranda</a></li>
                            <li class="nav-item mb-2"><a href="/profil" class="nav-link">Profil</a></li>
                            <li class="nav-item mb-2"><a href="/berita" class="nav-link">Berita</a></li>
                            <li class="nav-item mb-2"><a href="/foto" class="nav-link">Gallery</a></li>
                            <li class="nav-item mb-2"><a href="/video" class="nav-link">Video</a></li>
                            <li class="nav-item mb-2"><a href="/contact" class="nav-link">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Follow Kami</h5>
                        <div class="footer-icons">
                            <a href="https://www.instagram.com/smccunesa/" target="_blank"><img src="{{ asset('assest/images/instagram.png') }}" height="30" width="30" alt="Instagram"></a>
                            <a href="" target="_blank"><img src="{{ asset('assest/images/facebook.png') }}" height="30" width="30" alt="Facebook"></a>
                            <a href="https://www.tiktok.com/@smccunesa" target="_blank"><img src="{{ asset('assest/images/tiktok.png') }}" height="30" width="30" alt="TikTok"></a>
                            <a href="https://www.youtube.com/@SMCC_UNESA" target="_blank"><img src="{{ asset('assest/images/youtube.png') }}" height="30" width="30" alt="YouTube"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Kontak kami</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="" class="nav-link">smccu@unesa.ac.id</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link">0857-7772-6035</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Alamat Kampus</h5>
                        <p>Lidah Wetan</p>
                    </div>
                </div>
            </footer>
        </div>
    </section>

    <section class="bg-light border-top py-4">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>Copyright © 2024 SMCC UNESA</div>
            <div class="d-flex">
                <p class="me-4">Syarat & Ketentuan</p>
                <p><a href="/kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a></p>
            </div>
        </div>
    </div>
</section>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        const navbar = document.querySelector(".navbar");
        const navLinks = document.querySelectorAll(".nav-link");

        window.addEventListener("scroll", () => {
          // Cek apakah berada di halaman home (misalnya berdasarkan URL)
          const isHomePage = window.location.pathname === "/"; // Asumsikan halaman home berada di URL "/"

          if (window.scrollY > 50) {
            // Navbar dengan latar belakang putih dan shadow
            navbar.classList.add("bg-white", "shadow");

            // Teks navbar hitam jika di halaman home, tetap hitam di halaman lain
            navLinks.forEach(link => {
              if (isHomePage) {
                link.classList.remove("text-light");
                link.classList.add("text-dark");
              } else {
                link.classList.remove("text-light");
                link.classList.add("text-dark");
              }
            });
          } else {
            // Navbar transparan jika di atas scroll
            navbar.classList.remove("bg-white", "shadow");

            // Teks navbar putih jika di halaman home, tetap hitam di halaman lain
            navLinks.forEach(link => {
              if (isHomePage) {
                link.classList.remove("text-dark");
                link.classList.add("text-light");
              } else {
                // Pastikan teks navbar tetap hitam di halaman non-home
                link.classList.remove("text-light");
                link.classList.add("text-dark");
              }
            });
          }
        });

        // Set default text color for non-home page
        if (window.location.pathname !== "/") {
          navLinks.forEach(link => {
            link.classList.remove("text-light");
            link.classList.add("text-dark");
          });
        }

        // AOS Animation
        AOS.init();
    </script>
</body>
</html>
