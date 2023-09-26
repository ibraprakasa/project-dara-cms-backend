<?php

namespace App\Http\Controllers;

use App\Models\GolonganDarah;
use App\Models\Pendonor;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;

class RiwayatDonorController extends Controller
{
    public function index()
    {
        $riwayat_donor = RiwayatDonor::all();
        // Iterasi melalui koleksi $riwayat_donor untuk mengakses properti pendonor_id
        $riwayat_donor->map(function ($item) {
            $id_goldar = Pendonor::where('id_pendonor',$item->pendonor_id)->first()->id_golongan_darah;
            $item->nama = Pendonor::where('id_pendonor',$item->pendonor_id)->first()->nama;
            $item->gol_darah = GolonganDarah::where('id_goldar',$id_goldar)->first()->nama;
            return $item;
        });
        return view('partials.riwayatdonor', compact('riwayat_donor'));
    }
}
