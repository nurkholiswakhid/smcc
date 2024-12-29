<?php

namespace App\Http\Controllers;

use App\Models\VideoItem; // Import model VideoItem
use Illuminate\Http\Request;

class VideoViewController extends Controller
{
    public function index()
    {
        $videos = VideoItem::all(); // Pastikan data dikembalikan
        if ($videos->isEmpty()) {
            // Tambahkan logika jika data kosong
            return view('video.index', ['videos' => []]);
        }
        return view('video.index', compact('videos'));
    }
    
}
