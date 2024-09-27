<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;  
use App\Models\Pembukuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua absensi dengan relasi ke karyawan
        $absensi = Absensi::with('karyawan')->get();

        return view('absensi.index', compact('absensi'));
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
        $validatedData = $request->validate([
            'nip' => 'required|array',
            'nama' => 'required|array',
            'senin' => 'nullable|array',
            'selasa' => 'nullable|array',
            'rabu' => 'nullable|array',
            'kamis' => 'nullable|array',
            'jumat' => 'nullable|array',
            'bulan' => 'nullable'
        ]);

        $pembukuan = Pembukuan::firstOrCreate(['bulan' => $request->bulan]);

        foreach ($validatedData['nip'] as $key => $nip) {
            Absensi::updateOrCreate(
                [
                    'nip' => $nip,
                    'bulan' => $pembukuan->bulan
                ],
                [
                    'nama' => $validatedData['nama'][$key],
                    'senin' => isset($validatedData['senin'][$key]) ? 1 : 0,
                    'selasa' => isset($validatedData['selasa'][$key]) ? 1 : 0,
                    'rabu' => isset($validatedData['rabu'][$key]) ? 1 : 0,
                    'kamis' => isset($validatedData['kamis'][$key]) ? 1 : 0,
                    'jumat' => isset($validatedData['jumat'][$key]) ? 1 : 0,
                ]
            );
        }

        return redirect()->back()->with('success', 'Data absensi berhasil disimpan ke pembukuan bulan ' . $pembukuan->bulan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    
    public function show()
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
