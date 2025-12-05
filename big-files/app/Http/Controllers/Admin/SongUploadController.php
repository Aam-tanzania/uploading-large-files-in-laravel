<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

class SongUploadController extends Controller
{
    public function index()
    {
        $songs = Song::latest()->get();
        return view('index', compact('songs'));
    }


    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|integer',
            'file' => 'required|mimes:mp3,wav,m4a|max:512000' // 500MB max
        ]);

        // Handle upload
        if ($request->hasFile('file')) {

            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();

            // Save under storage/app/public/songs
            $path = $request->file('file')->storeAs('songs', $fileName, 'public');

            // Save record
            $song = Song::create([
                'title'      => $request->title,
                'artist_id'  => $request->artist_id,
                'audio_file' => 'storage/' . $path   // accessible via url
            ]);

            return back()->with('success', 'Song uploaded successfully!');
        }

        return back()->with('error', 'No file uploaded.');
    }
}
