<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\VisionMission;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function tentang()
    {
        $profile = Profile::first();
        $visionMission = VisionMission::first();
        $video = Video::first();

        return view('admin.tentang.index', compact('profile', 'visionMission', 'video'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_title' => 'required|string|max:255',
            'profile_description' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Retrieve the first profile or create one if it doesn't exist
        $profile = Profile::first() ?? new Profile();
        $profile->title = $request->profile_title;
        $profile->description = $request->profile_description;

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            // Log the upload
            \Log::info('Uploading new profile image: ' . $request->profile_image->getClientOriginalName());

            // Delete old image if it exists
            if ($profile->image && Storage::exists('public/profile/' . $profile->image)) {
                if (!Storage::delete('public/profile/' . $profile->image)) {
                    \Log::error('Failed to delete old profile image: ' . $profile->image);
                }
            }

            // Store the new image
            $imageName = $request->file('profile_image')->store('public/profile');
            $profile->image = basename($imageName);
        }

        // Save the profile data
        if ($profile->save()) {
            return redirect()->back()->with('success', 'Profil SMCC berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
    }

    public function updateVisionMission(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        // Retrieve or create the vision and mission
        $visionMission = VisionMission::first() ?? new VisionMission();
        $visionMission->vision = $request->vision;
        $visionMission->mission = $request->mission;

        if ($visionMission->save()) {
            return redirect()->back()->with('success', 'Visi dan Misi berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui Visi dan Misi.');
        }
    }

    public function updateVideo(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'video_url' => 'required|url',
        ]);

        // Retrieve or create the video
        $video = Video::first() ?? new Video();
        $video->url = $request->video_url;

        if ($video->save()) {
            return redirect()->back()->with('success', 'Video Profil berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui Video Profil.');
        }
    }
}
