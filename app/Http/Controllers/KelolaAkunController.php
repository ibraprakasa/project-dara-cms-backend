<?php

namespace App\Http\Controllers;

use App\Models\Pendonor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaAkunController extends Controller
{
    public function index(Request $request)
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $data = Pendonor::where('nama', 'LIKE', '%' . $search . '%')->get();
        } else {
            $data = Pendonor::all();
        }
        $data1 = User::all();

        return view('partials.kelolaakun', compact('data', 'data1'));
    }

    public function insertpendonorsuper(Request $request)
    {
        $request['kode_pendonor'] = 'dara' . rand(10000, 99999);
        $request->validate([
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);


        Pendonor::create($request->all());
        return redirect()->route('kelolaakun');
    }

    public function insertuser(Request $request)
    {
        User::create($request->all());
        return redirect()->route('kelolaakun');
    }

    public function updatependonorsuper(Request $request, $id)
    {
        // Mengambil data berdasarkan $id
        $pendonor = Pendonor::find($id);

        // Memperbarui data dengan nilai dari $request->all()
        $pendonor->update($request->all());

        return redirect()->route('kelolaakun');
    }

    public function updateuser(Request $request, $id)
    {
        // Mengambil data berdasarkan $id
        $user = User::find($id);

        // Memperbarui data dengan nilai dari $request->all()
        $user->update($request->all());

        return redirect()->route('kelolaakun');
    }

    public function deletependonorsuper($id){
        $pendonor = Pendonor::find($id);

        $pendonor ->delete();

        return redirect()->route('kelolaakun');
    }

    public function deleteuser($id){
        $user = User::find($id);

        $user ->delete();

        return redirect()->route('kelolaakun');
    }
}
