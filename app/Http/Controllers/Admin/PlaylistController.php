<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.playlists.index', ['playlists' => Playlist::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $validatedData['user_id'] = Auth::id();
        $validatedData['link'] = "PL-" . strtolower(Str::random(10));

        Playlist::create($validatedData);

        return redirect()->route('admin.playlists.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.playlists.edit', ['playlist' => Playlist::findOrFail($id), 'songs' => Song::paginate(10)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $playlist = Playlist::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $playlist->update($validatedData);

        return redirect()->route('admin.playlists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Playlist::destroy($id);

        return back();
    }

    public function addSong($playlistId, $songId)
    {
        $song = Song::find($songId);
        $playlist = Playlist::find($playlistId);

        $playlist->songs()->attach($song->id);

        return back();
    }

    public function removeSong($playlistId, $songId)
    {
        $song = Song::find($songId);
        $playlist = Playlist::find($playlistId);

        $playlist->songs()->detach($song->id);

        return back();
    }
}
