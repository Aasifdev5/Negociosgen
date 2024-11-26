<?php

namespace App\Http\Controllers;

use App\Models\Audiobook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AudiobookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión primero.');
        }

        $user_session = User::find(Session::get('LoggedIn'));
        $audiobooks = Audiobook::all();
        return view('admin.audiolibros.index', compact('audiobooks', 'user_session'));
    }
    public function audiobook()
    {
        $audiobooks = Audiobook::orderByDesc('id')->paginate(12);
        return view('audiobooks', compact('audiobooks'));
    }
    public function showAudiobookDetails($id)
    {
        // Fetch the specific audiobook based on the ID
        $audiobook = Audiobook::find($id);

        // Pass the data to the view
        return view('audiobookDetails', compact('audiobook'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión primero.');
        }

        $user_session = User::find(Session::get('LoggedIn'));
        return view('admin.audiolibros.create', compact('user_session'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión primero.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // 'audio_file' => 'required|file|mimes:mp3,wav',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle audio file upload
        if ($request->hasFile('audio_file')) {
            $audioFile = $request->file('audio_file');
            $audioDestination = 'audiobooks';
            $audioFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->move(public_path('uploads/' . $audioDestination), $audioFileName);
            $audioFilePath = 'uploads/' . $audioDestination . '/' . $audioFileName;
        }

        // Handle thumbnail upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailDestination = 'audiobook_thumbnails';
            $thumbnailFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/' . $thumbnailDestination), $thumbnailFileName);
            $thumbnailPath = 'uploads/' . $thumbnailDestination . '/' . $thumbnailFileName;
        }

        Audiobook::create([
            'title' => $request->title,
            'author' => $request->author,
            'audio_file_path' => $audioFilePath,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('audiolibros.index')->with('success', 'Audiolibro creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión primero.');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        $audiobook = Audiobook::findOrFail($id);
        return view('admin.audiolibros.edit', compact('audiobook', 'user_session'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'audio_id' => 'required|exists:audiobooks,id',  // Ensure the audio_id exists in the 'audiobooks' table
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240', // Max size of 10MB
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB for images
    ]);

    // Fetch the Audiobook by ID
    $audiobook = Audiobook::find($request->audio_id);

    // Handle audio file update if a new one is provided
    if ($request->hasFile('audio_file')) {
        // Delete old audio file if it exists
        if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
            unlink(public_path($audiobook->audio_file_path));
        }

        $audioFile = $request->file('audio_file');
        $audioDestination = 'audiobooks'; // Folder to save audio files
        $audioFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $audioFile->getClientOriginalExtension();
        $audioFile->move(public_path('uploads/' . $audioDestination), $audioFileName);
        $audiobook->audio_file_path = 'uploads/' . $audioDestination . '/' . $audioFileName;
    }

    // Handle thumbnail update if a new one is provided
    if ($request->hasFile('thumbnail')) {
        // Delete old thumbnail if it exists
        if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
            unlink(public_path($audiobook->thumbnail));
        }

        $thumbnail = $request->file('thumbnail');
        $thumbnailDestination = 'audiobook_thumbnails'; // Folder to save thumbnail images
        $thumbnailFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('uploads/' . $thumbnailDestination), $thumbnailFileName);
        $audiobook->thumbnail = 'uploads/' . $thumbnailDestination . '/' . $thumbnailFileName;
    }

    // Update the database record with new data
    $audiobook->update([
        'title' => $request->title,
        'author' => $request->author,
    ]);

    // Redirect back with success message
    return redirect()->route('audiolibros.index')->with('success', 'Audiolibro actualizado exitosamente.');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audiobook $audiobook)
{
    // Handle audio file deletion
    if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
        unlink(public_path($audiobook->audio_file_path)); // Delete old audio file
    }

    // Handle thumbnail deletion if exists
    if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
        unlink(public_path($audiobook->thumbnail)); // Delete old thumbnail
    }

    // Delete the audiobook record
    $audiobook->delete();

    // Return a JSON response for AJAX requests (instead of redirecting)
    return response()->json(['message' => 'Audiolibro eliminado exitosamente.']);
}

public function bulkDelete(Request $request)
{
    // Validate the request data (ensure it's an array of valid IDs)
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:audiobooks,id',  // Ensure each ID exists in the 'audiobooks' table
    ]);

    $ids = $request->ids;
    $audiobooks = Audiobook::whereIn('id', $ids)->get();

    foreach ($audiobooks as $audiobook) {
        // Handle audio file deletion
        if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
            unlink(public_path($audiobook->audio_file_path)); // Delete old audio file
        }

        // Handle thumbnail deletion if exists
        if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
            unlink(public_path($audiobook->thumbnail)); // Delete old thumbnail
        }

        // Delete the audiobook record
        $audiobook->delete();
    }

    // Return a JSON response after bulk deletion
    return response()->json(['message' => 'Audiolibros eliminados exitosamente.']);
}

}
