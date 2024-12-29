<?php

namespace App\Http\Controllers;

use App\Models\VideoItem;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = VideoItem::all(); // Ambil semua data video
        return view('admin.add_video.index', compact('videos'));
    }
    
    public function create()
    {
        return view('admin.add_video.create'); // Form tambah video
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);
    
        VideoItem::create($request->all());
    
        return redirect()->route('add_video')->with('success', 'Video berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $video = VideoItem::findOrFail($id);
        return view('admin.add_video.edit', compact('video')); // Form edit video
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);
    
        $video = VideoItem::findOrFail($id);
        $video->update($request->all());
    
        return redirect()->route('add_video')->with('success', 'Video berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $video = VideoItem::findOrFail($id);
        $video->delete();
    
        return redirect()->route('add_video')->with('success', 'Video berhasil dihapus.');
    }
}
