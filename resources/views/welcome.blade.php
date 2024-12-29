@extends('layouts.layouts')

@section('content')
<section id="hero" class="px-0">
  <div class="hero-background"></div> <!-- Element for the background -->
  <div class="container text-center text-white">
    <div class="hero-title" data-aos="fade-up">
      <div class="hero-text">Selamat Datang <br> di SMCC</div>
      <h5>berjuang dengan cinta</h5>
    </div>
  </div>
</section>




<section id="program" style="margin-top: -30px">
  <div class="container col-xxl-9">
    <div class="row">
      <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
          <div>
            <h4>K3 Kebencanaan </h4>
          </div>
          <img src="{{ asset('assest/icons/disaster.png') }}" height="55" width="55" alt="">
        </div>     
      </div>
      <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
          <div>
            <h4>Kesehatan Mental</h4>
          </div>
          <img src="{{ asset('assest/icons/therapy.png') }}" height="55" width="55" alt="">
        </div>     
      </div>
      <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
          <div>
            <h4>Anti Narkoba </h4>
          </div>
          <img src="{{ asset('assest/icons/drugs.png') }}" height="55" width="55" alt="">
        </div>     
      </div>
      <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
          <div>
            <h4>Rehabilitasi </h4>
          </div>
          <img src="{{ asset('assest/icons/recovered.png') }}" height="55" width="55" alt="">
        </div>     
      </div>
    </div>
  </div>
</section>


{{-- join --}}
<section id="join" class="py-5" data-aos="fade-up">
  <div class="container py-5">
    <div class="row d-flex align-items-center">
      <div class="col-lg-6">
        <div class="d-flex align-items-center mb-3">
          <div class="stripe me-2"></div>
        </div>
        <h1 class="fw-bold mb-2">{{ $profile->title ?? 'Tentang SMCC' }}</h1>
        <p class="mb-3">
          {{ $profile->description ?? 'Deskripsi tentang SMCC belum tersedia.' }}
        </p>
        <a href="{{ url('/profil') }}" class="btn btn-outline-danger mb-2">lebih lanjut</a>
      </div>
      <div class="col-lg-6 text-center">
        <div class="profil-image">
          <img 
            src="{{ asset('storage/profile/' . $profile->image) }}" 
            class="img-fluid rounded" 
            style="max-width: 100%; max-height: 400px; object-fit: contain;" 
            alt="SMCC">
        </div>
      </div>
    </div>
  </div>
</section>





{{-- berita --}}

<section id="berita" class="py-5">
  <div class="container">

    <div class="header-berita text-center">
      <h2 class="fw-bold">Berita Kegiatan SMCC</h2>
    </div>

    <div class="row py-5" data-aos="flip-up">
      @foreach ($artikel as $item )
      
      <div class="col-lg-4">
        <div class="card border-0">
          <img src="{{ asset('storage/artikel/'.$item->image ) }}" class="img-fluid mb-3" alt="" style="border-radius:10px;">
           <div class="konten-berita">
            <p class="mb-3 text-secondary"> {{$item->create_at}} </p>
            <h4 class="fw-bold mb-3"> {{$item->judul}}</h4>
            <p class="text-secondary">#berjuangadengancinta</p>
            <a href="/detail/{{$item -> slug}}" class="text-decoration-none text-danger">Selengkapnya</a>
          </div> 
        </div>
      </div> 
      @endforeach
    </div>
    

    <div class="footer-berita text-center">
      <a href="/berita" class="btn btn-outline-danger">Berita Lainnya</a>
    </div>
  </div>
</section>
{{-- berita --}}




{{-- Video --}}
<section id="video" class="py-5" data-aos="zoom-in">
  <div class="container py-5">
  <h2 class="fw-bold">Profil SMCC</h2>
    <div class="text-center">
      <iframe width="560" height="315" src={{ preg_replace('/(https:\/\/www\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/', 'https://www.youtube.com/embed/$2', $video->url) }} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </div>
</section>

{{-- Video --}}
<section id="video-kegiatan" class="py-5" data-aos="zoom-in">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Video Kegiatan SMCC</h2>
    </div>
    <div class="row">
      @forelse ($videos as $video)
        <div class="col-md-4 mb-4">
          <div class="card h-100 border-0 shadow-sm">
            <!-- Thumbnail Video -->
            <iframe 
              class="card-img-top" 
              src="{{ preg_replace('/(https:\/\/www\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/', 'https://www.youtube.com/embed/$2', $video->url) }}" 
              frameborder="0" 
              allowfullscreen 
              style="min-height: 300px; max-height: 400px; width: 100%;"></iframe>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p class="text-muted">Belum ada video yang tersedia.</p>
        </div>
        
      @endforelse
      <div class="footer-berita text-center">
      <a href="/video" class="btn btn-outline-danger">Video Lainnya</a>
    </div>
    </div>
  </div>
</section>


    

 {{-- Foto --}}   
<section id="foto" class="section-foto parallax" data-aos="zoom-in-up">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="d-flex align-items-center">
        <div class="stripe-putih me-2"></div>
        <h5 class="fw-bold text-white">Foto Kegiatan</h5>
      </div>
      <div>
       <a href="/foto" class="btn btn-outline-white">Foto lainnya</a>
      </div>
    </div>
    <div class="row">
    @foreach ($photos as $item)       
     <div class="col-lg-3 col-md-4 col-6 mb-4">
            <a class="image-link" href="{{ asset('storage/photo/' . $item->image) }}" target="_blank">
                <div class="photo-container">
                    <img 
                        src="{{ asset('storage/photo/' . $item->image) }}" 
                        class="img-fluid" 
                        alt="Foto">
                </div>
            </a>
        </div>
    @endforeach
      
    </div>
  </div>
</section>



@endsection



        
        

