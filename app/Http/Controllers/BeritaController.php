<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::all();
        return view('partials.berita', compact('data'));
    }

    public function insertberita(Request $request){
        $berita = Berita::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $berita->gambar = $request->file('gambar')->getClientOriginalName();
            $berita->save();
        }
        
        return redirect()->route('berita');
    }

    public function updateberita(Request $request, $id){
        $berita = Berita::find($id);

        $berita->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $berita->gambar = $request->file('gambar')->getClientOriginalName();
            $berita->save();
        }

        return redirect()->route('berita');
        
    }

    public function deleteberita($id){
        $berita = Berita::find($id);

        $berita ->delete();

        return redirect()->route('berita');
    }
}
