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
        return view('bands.create');
   }

   public function store(Request $request){
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

        $band = Band::findOrFail($id);

        $band->delete();

        return redirect()->route('bands.index');
    }

}
