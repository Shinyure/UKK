<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;  
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function showPembukuan($bulan)
    {
        $absensi = Absensi::where('bulan', $bulan)->get(); // Menampilkan absensi berdasarkan bulan
        return view('pembukuan.index', compact('absensi', 'bulan'));
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data karyawan dari database
        $karyawan = Karyawan::select('nip', 'nama')->get();
        return view('absensi.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // Mengambil bulan saat ini, bisa menggunakan Carbon atau fungsi PHP date()
        $bulan = Carbon::now()->format('F'); // Mendapatkan nama bulan (contoh: September)

        // Simpan data absensi untuk masing-masing karyawan
        foreach ($request->nip as $nip => $value) {
            Absensi::create([
                'nip' => $nip,
                'senin' => $request->senin[$nip] ?? 0,
                'selasa' => $request->selasa[$nip] ?? 0,
                'rabu' => $request->rabu[$nip] ?? 0,
                'kamis' => $request->kamis[$nip] ?? 0,
                'jumat' => $request->jumat[$nip] ?? 0,
                'bulan' => $bulan,  // Simpan sesuai bulan yang ditentukan
            ]);
        }

        // Redirect ke halaman pembukuan berdasarkan bulan
        return redirect()->route('pembukuan.show', ['bulan' => $bulan])->with('success', 'Absensi berhasil disimpan');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Absensi::where('kodeabsensi', $id)->first();
        return view('absensi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'devisi' => 'required',
        ]);

        $data = ([
            'devisi' => $request->devisi,
        ]);

        Absensi::where('kodeabsensi', $id)->update($data);
        return redirect('absensi')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::where('kodeabsensi', $id)->delete();
        return redirect('absensi')->with('Data sudah dihapus');
    }

}
