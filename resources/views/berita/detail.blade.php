@extends('layouts.layouts')

@section('content')

<div class="container col-xxl-8 py-5" style="margin-top: 100px">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
                </ol>
            </nav>
        </div>
        <img src="{{ asset('storage/artikel/'.$artikel->image ) }}" class="img-flud mb-3" alt="">
            <div class="konten-berita">
              <p class="mb-3 text-secondary"> {{$artikel->create_at}} </p>
              <h4 class="fw-bold mb-3"> {{$artikel->judul}}</h4>
              <p class="text-secondary">{!!$artikel->desc!!}</p>
            </div> 
    </div>
</section>
@endsection