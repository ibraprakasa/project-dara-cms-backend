@extends('template')
@extends('sidebar')
@section('content')

<head>
    <title>
        DARA || Riwayat Donor
    </title>
    <link href="../assets/css/stylepartials.css" rel="stylesheet">
</head>

<div class="row text-center">
    <div class="col" style="margin-top:100px; margin-bottom:-70px; margin-left:40px">
        <div class="row" style="font-weight: bold">
            <a href="#" id="tombol1" style="text-decoration: none; margin-right: 10px" class="col">
                Riwayat Donor Darah
            </a>
            <a href="#" id="tombol2" style="text-decoration: none" class="col">
                Riwayat Ambil Darah
            </a>
        </div>
    </div>
    <div class="col"></div>
</div>

<div class="content">
    <table class="table table-bordered" id="tabel1" style="display:none;text-align:center; width:1px">
        <thead class="thead" style="background-color:#3B4B65; color:white;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">No. Pendonor</th>
                <th scope="col">Jumlah Donor</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Gol. Darah</th>
            </tr>
        </thead>
        <tbody class="waduh">
            @foreach($riwayat_donor as $key => $rd)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $rd->nama }}</td>
                <td>{{ $rd->jumlah_donor }}</td>
                <td>{{ $rd->tanggal_donor }}</td>
                <td>{{ $rd->gol_darah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-bordered" id="tabel2" style="text-align:center; width:1px">
        <thead class="thead" style="background-color:#3B4B65; color:white;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">No. Pendonor</th>
                <th scope="col">Jumlah Ambil</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Gol. Darah</th>
                <th scope="col">Penerima</th>
                <th scope="col">Kontak Penerima</th>
            </tr>
        </thead>
        <tbody class="waduh">
            @foreach($riwayat_donor as $key => $rd)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $rd->nama }}</td>
                    <td>{{ $rd->jumlah_ambil }}</td>
                    <td>{{ $rd->tanggal_donor }}</td>
                    <td>{{ $rd->gol_darah }}</td>
                    <td>Penerima</td>
                    <td>Kontak_Penerima</td>
                </tr>
            @endforeach
       </tbody>

        <!-- <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        </tbody> -->
    </table>


</div>
<script>
    function tampilkanTabel(idTabel) {
        const tabel1 = document.getElementById("tabel1");
        const tabel2 = document.getElementById("tabel2");

        if (idTabel === "tabel1") {
            tabel1.style.display = "table";
            tabel2.style.display = "none";
            document.getElementById("tombol1").classList.remove("tabel-mati");
            document.getElementById("tombol1").classList.add("tabel-aktif");
            document.getElementById("tombol2").classList.remove("tabel-aktif");
            document.getElementById("tombol2").classList.add("tabel-mati");
        } else if (idTabel === "tabel2") {
            tabel1.style.display = "none";
            tabel2.style.display = "table";
            document.getElementById("tombol2").classList.remove("tabel-mati");
            document.getElementById("tombol1").classList.remove("tabel-aktif");
            document.getElementById("tombol2").classList.add("tabel-aktif");
            document.getElementById("tombol1").classList.add("tabel-mati");

        }
	// Simpan status ke localStorage
        localStorage.setItem('tabelStatus', idTabel);
    }
    document.getElementById("tombol1").addEventListener("click", function(e) {
	e.preventDefault(); // Mencegah tindakan default tautan
        tampilkanTabel("tabel1");
    });

    document.getElementById("tombol2").addEventListener("click", function(e) {
	e.preventDefault(); // Mencegah tindakan default tautan
        tampilkanTabel("tabel2");
    });

    window.onload = function() {
        // Ambil status dari localStorage jika ada
        const status = localStorage.getItem('tabelStatus');
        if (status === 'tabel2') {
            tampilkanTabel("tabel2");
        } else {
            tampilkanTabel("tabel1");
        }
    };
</script>

@endsection