@extends('layouts.admin')

@section('content')
    <section class="py-5">
        <div class="container col-xxl-8">
        {{-- Navigasi --}}
        <div class="d-flex mb-3">
                <a href="{{ route('blog') }}">Blog</a>
                <div class="mx-1">/</div>
                <a href="#">edit Artikel</a>
            </div>        
        
        <h4>Halaman edit blog</h4>
           
        <form action="{{ route('blog.update',$artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="judul">Masukkan Judul</label>
                    <input 
                        type="text" 
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror" 
                        name="judul" 
                        value="{{ old('judul',$artikel->judul) }}"
                    >

                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="image">Pilih Foto</label>
                    
                    <!-- Display current image if exists -->
                    <div>
                        <img src="{{ asset('storage/artikel/' . $artikel->image) }}" class="col-lg-4" alt="">
                    </div>

                    <input type="hidden" name="old_image" value="{{ $artikel->image }}">
                    <input type="file"
                        class="form-control @error('image') is-invalid @enderror" 
                        name="image"
                    >

                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="desc">Tulis Artikel</label>
                    <textarea 
                        name="desc" 
                        id="summernote" 
                        class="form-control @error('desc') is-invalid @enderror">
                        {!! old('desc', $artikel->desc) !!}
                    </textarea>

                    @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">update</button>
            </form>
            
        </div>
    </section>
@endsection
