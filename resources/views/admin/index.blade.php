@extends('layouts.admin')

@section('content')
    <section style="padding: 50px 0; background-color: #f8f9fa;">
        <div class="container col-xxl-8">
            <h3 class="fw-bold mb-4 text-center">Halaman Admin</h3>
            <p class="text-center mb-5">Selamat datang di halaman Admin SMCC. Kelola semua konten kegiatan dengan mudah.</p>

            <div class="row">
                <!-- Blog Artikel Card -->
                <div class="col-lg-3 mb-4">
                    <div class="card shadow-lg rounded-3 border-0 h-100 hover-effect">
                        <img src="{{ asset('assest/images/blog.jpg') }}" class="card-img-top" alt="Blog Artikel">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"><i class="bi bi-pencil-square"></i> Blog Artikel</h5>
                            <p class="card-text mb-4">Kelola Artikel Kegiatan SMCC dengan mudah dan efisien.</p>
                            <a href="{{ route('blog') }}" class="btn btn-primary px-4 py-2">Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Foto Kegiatan Card -->
                <div class="col-lg-3 mb-4">
                    <div class="card shadow-lg rounded-3 border-0 h-100 hover-effect">
                        <img src="{{ asset('assest/images/foto.jpg') }}" class="card-img-top" alt="Foto Kegiatan">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"><i class="bi bi-camera"></i> Foto Kegiatan</h5>
                            <p class="card-text mb-4">Kelola Foto Kegiatan SMCC dengan mudah.</p>
                            <a href="{{ route('photo') }}" class="btn btn-primary px-4 py-2">Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Profil Card -->
                <div class="col-lg-3 mb-4">
                    <div class="card shadow-lg rounded-3 border-0 h-100 hover-effect">
                        <img src="{{ asset('assest/images/profil.jpg') }}" class="card-img-top" alt="Profil SMCC">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"><i class="bi bi-person-circle"></i> Profil</h5>
                            <p class="card-text mb-4">Kelola Profil SMCC dan pastikan informasi yang ditampilkan terbaru.</p>
                            <a href="{{ route('tentang') }}" class="btn btn-primary px-4 py-2">Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Video Kegiatan Card -->
                <div class="col-lg-3 mb-4">
                    <div class="card shadow-lg rounded-3 border-0 h-100 hover-effect">
                        <img src="{{ asset('assest/images/video.jpg') }}" class="card-img-top" alt="Video Kegiatan">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"><i class="bi bi-film"></i> Video Kegiatan</h5>
                            <p class="card-text mb-4">Kelola Video kegiatan SMCC dan tampilkan kepada pengunjung.</p>
                            <a href="{{ route('add_video') }}" class="btn btn-primary px-4 py-2">Detail</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        /* Hover effect for cards */
        .hover-effect:hover {
            transform: translateY(-10px);
            transition: transform 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Card images */
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        /* Centering title and text */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endsection
