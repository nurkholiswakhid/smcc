@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 100px">
        <div class="container col-xxl-8 py-5">
            <h3 class="fw-bold mb-3">Halaman Admin</h3>
            <p>Selamat datang di halaman Admin</p>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">                    
                        <img src="{{ asset('assest\images\blog.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-titel">Blog Artikel</h5>
                            <p class="card-text">kelola Artikel Kegiatan SMCC</p>
                            <a href="{{ route ('blog')}}" class="btn btn-primary">detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">                    
                        <img src="{{ asset('assest/images/foto.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-titel">Foto Kegiatan</h5>
                            <p class="card-text">Kelola Foto Kegiatan SMCC</p>
                            <a href="{{ route ('photo')}}" class="btn btn-primary">detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">                    
                        <img src="{{ asset('assest/images/profil.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-titel">Profil</h5>
                            <p class="card-text">Kelola Profil SMCC</p>
                            <a href="{{ route ('tentang')}}" class="btn btn-primary">detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">                    
                        <img src="{{ asset('assest/images/video.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-titel">Video Kegiatan</h5>
                            <p class="card-text">Kelola Video SMCC</p>
                            <a href="{{ route('add_video') }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
