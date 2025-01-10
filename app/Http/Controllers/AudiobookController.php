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
        $audiobook = Audiobook::find($id);
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
            'audiobook_url' => 'nullable|url',
            'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $audioFilePath = null;
        if ($request->hasFile('audio_file')) {
            $audioFile = $request->file('audio_file');
            $audioDestination = 'audiobooks';
            $audioFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->move(public_path('uploads/' . $audioDestination), $audioFileName);
            $audioFilePath = 'uploads/' . $audioDestination . '/' . $audioFileName;
        }

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
            'audiobook_url' => $request->audiobook_url,
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
        $request->validate([
            'audio_id' => 'required|exists:audiobooks,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'audiobook_url' => 'nullable|url',
            'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $audiobook = Audiobook::find($request->audio_id);

        if ($request->hasFile('audio_file')) {
            if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
                unlink(public_path($audiobook->audio_file_path));
            }

            $audioFile = $request->file('audio_file');
            $audioDestination = 'audiobooks';
            $audioFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->move(public_path('uploads/' . $audioDestination), $audioFileName);
            $audiobook->audio_file_path = 'uploads/' . $audioDestination . '/' . $audioFileName;
        }

        if ($request->hasFile('thumbnail')) {
            if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
                unlink(public_path($audiobook->thumbnail));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailDestination = 'audiobook_thumbnails';
            $thumbnailFileName = time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/' . $thumbnailDestination), $thumbnailFileName);
            $audiobook->thumbnail = 'uploads/' . $thumbnailDestination . '/' . $thumbnailFileName;
        }

        $audiobook->update([
            'title' => $request->title,
            'author' => $request->author,
            'audiobook_url' => $request->audiobook_url,
        ]);

        return redirect()->route('audiolibros.index')->with('success', 'Audiolibro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audiobook $audiobook)
    {
        if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
            unlink(public_path($audiobook->audio_file_path));
        }

        if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
            unlink(public_path($audiobook->thumbnail));
        }

        $audiobook->delete();
        return response()->json(['message' => 'Audiolibro eliminado exitosamente.']);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:audiobooks,id',
        ]);

        $ids = $request->ids;
        $audiobooks = Audiobook::whereIn('id', $ids)->get();

        foreach ($audiobooks as $audiobook) {
            if ($audiobook->audio_file_path && file_exists(public_path($audiobook->audio_file_path))) {
                unlink(public_path($audiobook->audio_file_path));
            }

            if ($audiobook->thumbnail && file_exists(public_path($audiobook->thumbnail))) {
                unlink(public_path($audiobook->thumbnail));
            }

            $audiobook->delete();
        }

        return response()->json(['message' => 'Audiolibros eliminados exitosamente.']);
    }
}
