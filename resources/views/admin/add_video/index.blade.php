@extends('layouts.layouts')

@section('content')

<section id="manage-video" class="py-5" style="margin-top: 100px">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Pengelolaan Video</h2>
      <p>Tambahkan, edit, atau hapus video dari galeri Anda.</p>
    </div>
    
    <!-- Tombol Tambah Video Baru -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-6 text-center">
        <a href="{{ route('add_video.create') }}" class="btn btn-primary">Tambah Video Baru</a>
      </div>
    </div>

    <!-- Daftar Video -->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="mb-4">Daftar Video</h3>
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Judul Video</th>
              <th>URL</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($videos as $video)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $video->title }}</td>
                <td>
                  <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                </td>
                <td>{{ $video->description }}</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <!-- Tombol Edit -->
                    <a href="{{ route('add_video.edit', $video->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('add_video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">Belum ada video yang ditambahkan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
