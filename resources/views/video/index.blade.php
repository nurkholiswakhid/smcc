@extends('layouts.layouts')

@section('content')

<section id="video-gallery" class="py-5" style="margin-top: 100px">
  <div class="container">
    <!-- Header Section -->
    <div class="text-center mb-5">
      <h2 class="fw-bold">Video Kegiatan SMCC</h2>
       
    </div>
    
    <!-- Daftar Video -->
    <div class="row">
      @forelse ($videos as $video)
        <div class="col-md-6 col-lg-4 mb-5">
          <div class="card h-100 shadow-lg">
            <!-- Thumbnail Video -->
            <iframe 
              class="card-img-top" 
              src="{{ preg_replace('/(https:\/\/www\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/', 'https://www.youtube.com/embed/$2', $video->url) }}" 
              frameborder="0" 
              allowfullscreen 
              style="min-height: 300px; max-height: 400px; width: 100%;"></iframe>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-truncate">{{ $video->title }}</h5>
              <p class="card-text" style="min-height: 60px; overflow: hidden;">{{ $video->description }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p class="text-muted">Belum ada video yang tersedia.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
