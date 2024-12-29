<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\VisionMission;
use App\Models\Video;

class ProfilController extends Controller
{
    public function profil()
    {
        // Mengambil data profil, visi-misi, dan video
        $profile = Profile::first();
        $visionMission = VisionMission::first();
        $video = Video::first();

        // Jika data tidak ditemukan, berikan fallback message
        if (!$profile) {
            $profile = (object) [
                'title' => 'Profil Tidak Tersedia',
                'description' => 'Deskripsi profil tidak ditemukan.',
                'image' => 'default-profile.png', // Gambar default
            ];
        } else {
            // Tambahkan gambar default jika tidak ada gambar yang disimpan
            if (!$profile->image) {
                $profile->image = 'default-profile.png'; // Gambar default
            }
        }

        if (!$visionMission) {
            $visionMission = (object) [
                'vision' => 'Visi tidak tersedia.',
                'mission' => 'Misi tidak tersedia.',
            ];
        }

        if (!$video) {
            $video = (object) ['url' => ''];
        }

        // Mengirim data ke view
        return view('profil.profil', compact('profile', 'visionMission', 'video'));
    }
}
