@extends('layouts.admin')

@section('content')
    <section class="container py-5" >
        <div class="container ">
           
            <h4>Halaman Blog</h4>
           
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Buat Artikel</a>

         
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Informasi</strong> {{session( 'success')}}
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
                        @foreach ($artikels as $artikel)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/artikel/'.$artikel->image) }}" height="100" alt="{{ $artikel->judul }}">
                            </td>
                            <td>
                                {{ $artikel->judul }}
                            </td>
                            <td>
                                <a href="{{ route('blog.edit', $artikel->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('blog.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </section>
@endsection
