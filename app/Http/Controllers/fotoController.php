<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo; // Impor model Photo

class fotoController extends Controller
{
    public function foto()
    {
        return view('foto.foto', [
            'photos' => Photo::orderBy('id', 'desc')->get() // Gunakan model Photo
        ]);
    }
}
