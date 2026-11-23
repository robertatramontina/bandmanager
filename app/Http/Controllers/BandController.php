<?php

namespace App\Http\Controllers;
use App\Models\Band;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function home(){
        return view('home');
}

    public function index(Request $request){

        $search = $request->input('search');
        $bands = Band::withCount('albums')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->get();

        return view('bands.index', compact('bands', 'search'));
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
        'name' => 'required|max:100',
        'photo' => 'nullable|image|max:2048'
        ]);

        $path = null;

        if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('bands', 'public');
        }

        Band::create([
            'name' => $request->name,
            'photo' => $path
        ]);

        return redirect()->route('bands.index');
    }

    public function edit(int $id){

        $band = Band::findOrFail($id);

        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, int $id){

        $request->validate([
        'name' => 'required|max:100',
        'photo' => 'nullable|image|max:2048'
        ]);

        $band = Band::findOrFail($id);

        if ($request->hasFile('photo')) {
        $band->photo = $request->file('photo')->store('bands', 'public');
        }

        $band->name = $request->name;
        $band->save();

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
