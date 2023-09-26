<?php

namespace App\Http\Controllers;

use App\Models\GolonganDarah;
use App\Models\Pendonor;
use App\Models\RiwayatAmbil;
use Illuminate\Http\Request;

class RiwayatAmbilController extends Controller
{
    public function index()
    {
        $riwayat_ambil = RiwayatAmbil::all();
        // Iterasi melalui koleksi $riwayat_ambil untuk mengakses properti pendonor_id
        $riwayat_ambil->map(function ($item) {
            $id_goldar = Pendonor::where('id_pendonor',$item->pendonor_id)->first()->id_golongan_darah;
            $item->nama = Pendonor::where('id_pendonor',$item->pendonor_id)->first()->nama;
            $item->gol_darah = GolonganDarah::where('id_goldar',$id_goldar)->first()->nama;
            return $item;
        });
        return view('partials.riwayatambil', compact('riwayat_ambil'));
    }
}
