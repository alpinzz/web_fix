<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = \App\Models\Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Store file in 'public/galleries' directory
                $path = $file->store('galleries', 'public');

                \App\Models\Gallery::create([
                    'image_path' => $path,
                    'title' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Images uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);

        // Delete file from storage
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($gallery->image_path)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Image deleted successfully.');
    }
}
