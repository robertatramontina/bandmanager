<?php

namespace App\Http\Controllers;
use App\Models\Band;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function home(){
        return view('home');
}

    public function index(){
        $bands = Band::withCount('albums')
        ->get();

        return view('bands.index', compact('bands'));
    }

    public function create(){

        if (auth()->user()?->role !== 'admin') {
        abort(403, 'Apenas o administrador tem autorização para adicionar bandas.');
        }
        return view('bands.create');
   }

   public function store(Request $request){

    if (auth()->user()?->role !== 'admin') {
    abort(403, 'Apenas o administrador pode adicionar bandas.');
    }
    $request->validate([
        'name' => 'required|max:100'
        ]);

        Band::create([
            'name' => $request->name
        ]);

        return redirect()->route('bands.index');
    }

    public function edit(int $id){

        $band = Band::findOrFail($id);

        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, int $id){

        $request->validate([
        'name' => 'required|max:100'
        ]);

        $band = Band::findOrFail($id);

        $band->update([
            'name' => $request->name
        ]);

        return redirect()->route('bands.index');
    }

    public function destroy(int $id){
        if (auth()->user()?->role !== 'admin') {
        abort(403, 'Apenas o administrador pode apagar bandas.');
        }

        $band = Band::findOrFail($id);

        $band->delete();

        return redirect()->route('bands.index');
    }

    public function showAlbums(int $id){

    $band = Band::with('albums')->findOrFail($id);

    return view('bands.albums', compact('band'));
}

}
