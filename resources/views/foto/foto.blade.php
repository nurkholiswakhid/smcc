@extends('layouts.layouts')

@section('content')
   {{-- Foto --}}   
<section id="foto" style="margin-top: 100px" class="section-foto parallax" data-aos="zoom-in-up">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="d-flex align-items-center">
        <div class="stripe-putih me-2"></div>
        <h5 class="fw-bold text-white">Foto Kegiatan</h5>
      </div>
      <div>
       
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