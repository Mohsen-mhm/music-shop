<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.artists.index', ['artists' => Artist::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'bio' => ['required', 'string', 'max:1000'],
            'image' => ['required', 'file', 'max:512'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . mt_rand(11111, 99999) . '.' . $image->getClientOriginalExtension();

            $path = 'artist-images/' . $imageName;
            Storage::disk('public')->put($path, file_get_contents($image));

            $validatedData['image'] = $imageName;
        }

        Artist::create($validatedData);

        return redirect()->route('admin.artists.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.artists.edit', ['artist' => Artist::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artist = Artist::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'bio' => ['required', 'string', 'max:1000'],
            'image' => ['file', 'max:512'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . mt_rand(11111, 99999) . '.' . $image->getClientOriginalExtension();

            $path = 'artist-images/' . $imageName;
            Storage::disk('public')->put($path, file_get_contents($image));

            $validatedData['image'] = $imageName;
        }

        $artist->update($validatedData);
        return redirect()->route('admin.artists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Artist::destroy($id);
        return back();
    }
}
