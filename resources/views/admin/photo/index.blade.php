@extends('layouts.admin')

@section('content')
<section class="py-5">
    <div class="container ">
        <h4>Halaman Photo</h4>

        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload Foto</a>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Informasi:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive py-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
@foreach ($photos as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>
            <img src="{{ asset('storage/photo/' . $item->image) }}" alt="Photo" style="width: 100px; height: auto;">
        </td>
        <td>{{ $item->judul }}</td>
        <td>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit Foto</a>

            <form action="{{ route('photo.destroy', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
            </form>
        </td>
    </tr>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('photo.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <!-- Gambar Lama -->
                        <div class="form-group mb-3">
                            <label for="old_image">Gambar Lama</label><br>
                            <img src="{{ asset('storage/photo/' . $item->image) }}" alt="Old Image" style="width: 100px; height: auto;">
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo">Pilih Photo Baru</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="judul">Nama Kegiatan</label>
                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="photo">Pilih Photo</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Nama Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
