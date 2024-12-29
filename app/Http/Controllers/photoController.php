<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class photoController extends Controller
{
    public function index()
    {
        return view('admin.photo.index', [
            'photos' => Photo::orderBy('id', 'desc')->get()
        ]);
    }

    # Fungsi store
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
        ];
        
        $messages = [
            'judul.required' => 'wajib diisi!',
            'image.required' => 'wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Store the new image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/photo', $fileName);

        // Save data to database
        Photo::create([
            'judul' => $request->judul,
            'image' => $fileName,
        ]);

        return redirect(route('photo'))->with('success', 'Photo berhasil disimpan');
    }

    # Halaman edit
    public function edit($id)
    {
        $photo = Photo::find($id);
        if (!$photo) {
            return redirect(route('photo'))->with('error', 'Photo tidak ditemukan');
        }

        return view('admin.photo.edit', compact('photo'));
    }

    # Fungsi update
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return redirect(route('photo'))->with('error', 'Photo tidak ditemukan');
        }

        // Define validation rules
        $rules = [
            'judul' => 'required',
            'image' => 'nullable|max:1000|mimes:jpg,jpeg,png,webp', // image is optional
        ];

        $messages = [
            'judul.required' => 'wajib diisi!',
            'image.required' => 'wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if (\File::exists(storage_path('app/public/photo/' . $photo->image))) {
                \File::delete(storage_path('app/public/photo/' . $photo->image));
            }

            // Store the new image
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/photo', $fileName);

            $photo->image = $fileName; // Update the image field with new file name
        }

        // Update other fields
        $photo->judul = $request->judul;
        $photo->save();

        return redirect(route('photo'))->with('success', 'Photo berhasil diupdate');
    }

    # Fungsi delete
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return redirect(route('photo'))->with('error', 'Data tidak ditemukan');
        }

        // Delete the image file
        if (\File::exists(storage_path('app/public/photo/' . $photo->image))) {
            \File::delete(storage_path('app/public/photo/' . $photo->image));
        }

        // Delete the record from the database
        $photo->delete();

        return redirect(route('photo'))->with('success', 'Photo berhasil dihapus');
    }
}
