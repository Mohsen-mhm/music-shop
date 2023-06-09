<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index($slug)
    {
        $artist = Artist::whereSlug($slug)->first();
        return view('artist.index', compact('artist'));
    }

    public function all()
    {
        $artists = Artist::paginate(20);

        return view('artist.all', compact('artists'));
    }
}
