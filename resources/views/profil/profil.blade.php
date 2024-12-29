@extends('layouts.layouts')

@section('content')

{{-- Profil --}}
<section id="profil" class="py-5" style="margin-top: 100px">
  <div class="container">
    <div class="header-profil text-center">
      <h2 class="fw-bold">Profil SMCC</h2>
    </div>

    <div class="row py-5 align-items-center" data-aos="fade-up">
      <div class="col-lg-6 text-center">
        <div class="profil-image">
          <img 
            src="{{ asset('storage/profile/' . $profile->image) }}" 
            class="img-fluid rounded" 
            style="max-width: 100%; max-height: 400px; object-fit: contain;" 
            alt="SMCC">
        </div>
      </div>
      <div class="col-lg-6">
        <h4 class="fw-bold mb-3">{{ $profile->title ?? 'Tentang SMCC' }}</h4>
        <p>{{ $profile->description ?? 'Deskripsi tentang SMCC belum tersedia.' }}</p>
      </div>
    </div>
  </div>
</section>


{{-- Visi dan Misi --}}
<section id="visi-misi" class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Visi dan Misi</h2>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <h4 class="fw-bold">Visi</h4>
        <p>{!! $visionMission->vision ?? 'Visi belum tersedia.' !!}</p>
      </div>
      <div class="col-lg-6">
        <h4 class="fw-bold">Misi</h4>
        @if(isset($visionMission->mission))
          <ul class="list-unstyled">
            @foreach(explode(';', $visionMission->mission) as $mission)
              <li class="d-flex align-items-start mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span>{!! $mission !!}</span>
              </li>
            @endforeach
          </ul>
        @else
          <p>Misi belum tersedia.</p>
        @endif
      </div>
    </div>
  </div>
</section>



{{-- Video Profil --}}
<section id="video-profil" class="py-5" data-aos="zoom-in">
  <div class="container">
    <h2 class="fw-bold text-center">Video Profil SMCC</h2>
    <div class="text-center">
      @if(isset($video->url))
        <div class="iframe-container" style="max-width: 800px; margin: 0 auto;">
          <iframe 
            width="800" 
            height="450" 
            src="{{ preg_replace('/(https:\/\/www\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/', 'https://www.youtube.com/embed/$2', $video->url) }}" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
          </iframe>
        </div>
      @else
        <p>Video belum tersedia.</p>
      @endif
    </div>
  </div>
</section>



@endsection
