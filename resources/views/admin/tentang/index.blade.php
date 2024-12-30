@extends('layouts.admin') <!-- Menggunakan layout admin -->

@section('content')
<div class="container py-5" >
    <h2 class="fw-bold text-center mb-4">Kelola Profil SMCC</h2>

    {{-- Kelola Profil --}}
    <section id="kelola-profil">
        <h4 class="fw-bold mb-3">Profil SMCC</h4>
        <form action="{{ route('admin.tentang.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="profile_title" class="form-label">Judul Profil</label>
                <input type="text" id="profile_title" name="profile_title" class="form-control" value="{{ $profile->title ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="profile_description" class="form-label">Deskripsi Profil</label>
                <textarea id="profile_description" name="profile_description" class="form-control" rows="4" required>{{ $profile->description ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="profile_image" class="form-label">Gambar Profil</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control">
                @if($profile->image ?? false)
                <img src="{{ $profile->image ? asset('storage/profile/' . $profile->image) : asset('default-image.jpg') }}" class="img-fluid rounded mt-3" width="200" alt="Profil SMCC">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </section>

{{-- Kelola Visi dan Misi --}}
<section id="kelola-visi-misi" class="mt-5">
    <h4 class="fw-bold mb-3">Visi dan Misi</h4>
    <form action="{{ route('admin.tentang.updateVisionMission') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Input untuk Visi --}}
        <div class="mb-3">
            <label for="vision" class="form-label">Visi</label>
            <textarea id="vision" name="vision" class="form-control summernote" rows="4" required>
                {{ $visionMission->vision ?? '' }}
            </textarea>
        </div>

        {{-- Input untuk Misi --}}
        <div class="mb-3">
            <label for="mission" class="form-label">Misi</label>
            <textarea id="mission" name="mission" class="form-control summernote" rows="6" required>
                {{ $visionMission->mission ?? '' }}
            </textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Simpan Perubahan
            </button>
        </div>
    </form>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</section>


    {{-- Kelola Video Profil --}}
    <section id="kelola-video-profil" class="mt-5">
        <h4 class="fw-bold mb-3">Video Profil</h4>
        <form action="{{ route('admin.tentang.updateVideo') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="video_url" class="form-label">URL Video YouTube</label>
                <input type="url" id="video_url" name="video_url" class="form-control" value="{{ $video->url ?? '' }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </section>
</div>
@endsection
