<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Photo; // Ensure this model exists and is imported
use App\Models\Video;
use App\Models\Profile;
use App\Models\VideoItem;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'artikel' => Blog::orderBy('id', 'desc')->limit(3)->get(),
            'photos' => Photo::orderBy('id', 'desc')->limit(4)->get(),
            
            'video' => Video::first(), // Fixed the syntax error here
            'profile' => Profile::first(), // Include profile data
            
            'videos' => VideoItem::orderBy('id', 'desc')->limit(3)->get(),

        ]);
    }
}
