@extends('layouts.layouts')

@section('content')

<section id="add-video" class="py-5" style="margin-top: 100px">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Tambah Video Baru</h2>
      <p>Masukkan detail video YouTube untuk ditambahkan ke galeri.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form action="{{ route('add_video.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul video" required>
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">URL Video YouTube</label>
            <input type="text" name="url" id="url" class="form-control" placeholder="Masukkan URL video YouTube" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Video</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan deskripsi video"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-danger">Tambah Video</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
