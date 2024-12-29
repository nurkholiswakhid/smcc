@extends('layouts.layouts')

@section('content')

<section id="edit-video" class="py-5" style="margin-top: 100px">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Edit Video</h2>
      <p>Ubah detail video yang telah ditambahkan.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form action="{{ route('add_video.update', $video->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $video->title }}" required>
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">URL Video YouTube</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ $video->url }}" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Video</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $video->description }}</textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-warning">Perbarui Video</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
