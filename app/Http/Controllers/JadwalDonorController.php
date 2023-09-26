<?php

namespace App\Http\Controllers;

use App\Models\JadwalDonor;
use Illuminate\Http\Request;

class JadwalDonorController extends Controller
{
    public function index()
    {
        $data = JadwalDonor::all();
        return view('partials.jadwaldonor', compact('data'));
    }

    public function insertjadwaldonor(Request $request)
    {
        JadwalDonor::create($request->only('lokasi', 'alamat_donor', 'tanggal_donor', 'jam_mulai', 'jam_selesai', 'kontak'));
        return redirect()->route('jadwaldonor');
    }

    public function updatejadwaldonor(Request $request, $id)
    {
        // Mengambil data berdasarkan $id
        $jadwalDonor = JadwalDonor::find($id);

        // Memperbarui data dengan nilai dari $request->all()
        $jadwalDonor->update($request->all());

        return redirect()->route('jadwaldonor');
    }

    public function deletejadwaldonor($id){
        $jadwalDonor = JadwalDonor::find($id);

        $jadwalDonor ->delete();

        return redirect()->route('jadwaldonor');
    }

}
