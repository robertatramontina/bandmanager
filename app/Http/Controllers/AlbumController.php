<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()?->role !== 'admin') {
        abort(403, 'Apenas o administrador pode adicionar álbuns.');
        }

        $bands = Band::all(); //preciso disso para fazer o select com o nome das bandas

        return view('albums.create', compact('bands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Apenas o administrador pode adicionar álbuns.');
        }

        $request->validate([
        'name' => 'required|max:100',
        'release_date' => 'required|date',
        'band_id' => 'required|exists:bands,id'
        ]);

        Album::create([
            'name' => $request->name,
            'release_date' => $request->release_date,
            'band_id' => $request->band_id
        ]);

        return redirect()->route('bands.albums', $request->band_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {

        $album = Album::findOrFail($id);
        $bands = Band::all();

        return view('albums.edit', compact('album', 'bands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|max:100',
        'release_date' => 'required|date',
        'band_id' => 'required|exists:bands,id'
        ]);

        $album = Album::findOrFail($id);

        $album->update([
            'name' => $request->name,
            'release_date' => $request->release_date,
            'band_id' => $request->band_id
        ]);

        return redirect()->route('bands.albums', $request->band_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Apenas o administrador pode apagar álbuns.');
        }
        $album = Album::findOrFail($id);

        $bandId = $album->band_id;

        $album->delete();

        return redirect()->route('bands.albums', $bandId);
    }

}
