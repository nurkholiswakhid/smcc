<?php

namespace App\Http\Controllers;

use App\Models\Blog; // Impor model Blog
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Halaman daftar berita
    public function berita()
    {
        return view('berita.berita', [
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    // Halaman detail berita
    public function detail($slug)
    {
        $artikel = Blog::where('slug', $slug)->first();

        // Validasi jika artikel tidak ditemukan
        if (!$artikel) {
            abort(404, 'Artikel tidak ditemukan');
        }

        return view('berita.detail', [ // Gunakan view berbeda untuk halaman detail
            'artikel' => $artikel
        ]);
    }
}
    