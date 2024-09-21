<?php

namespace App\Http\Controllers;

use App\Models\Pembukuan;
use App\Models\Karyawan;
use App\Models\Absensi;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{
    public function save(Request $request)
    {   
        $tanggal = $request->input('tanggal');
        
        // Ambil data absensi dengan null coalescing, sehingga jika tidak ada data, array kosong yang digunakan
        $senin = $request->input('senin') ?? [];
        $selasa = $request->input('selasa') ?? [];
        $rabu = $request->input('rabu') ?? [];
        $kamis = $request->input('kamis') ?? [];
        $jumat = $request->input('jumat') ?? [];

        // Pastikan setidaknya satu input hari tidak kosong sebelum melanjutkan
        if (!empty($senin) || !empty($selasa) || !empty($rabu) || !empty($kamis) || !empty($jumat)) {
            // Iterasi karyawan yang diinput
            foreach ($senin as $nip => $value) {
                // Simpan setiap data absensi dengan tanggal
                Absensi::create([
                    'nip' => $nip,
                    'senin' => $value,
                    'selasa' => $selasa[$nip] ?? 0, // Gunakan nilai default 0 jika tidak ada data
                    'rabu' => $rabu[$nip] ?? 0,
                    'kamis' => $kamis[$nip] ?? 0,
                    'jumat' => $jumat[$nip] ?? 0,
                    'tanggal' => $tanggal,
                ]);
            }

            return redirect()->back()->with('success', 'Absensi berhasil disimpan dengan tanggal!');
        } else {
            // Jika tidak ada data yang diinput, kembalikan pesan error
            return redirect()->back()->with('error', 'Tidak ada data absensi yang diinput.');
        }
    }


    public function januari() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 1)->get(); 
        return view('pembukuan.januari', compact('dataAbsensi'));
    }
    
    public function februari() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 2)->get();  
        return view('pembukuan.februari', compact('dataAbsensi'));
    }
    
    public function maret() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 3)->get();  
        return view('pembukuan.maret', compact('dataAbsensi'));
    }
    
    public function april() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 4)->get();  
        return view('pembukuan.april', compact('dataAbsensi'));
    }
    
    public function mei() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 5)->get();  
        return view('pembukuan.mei', compact('dataAbsensi'));
    }
    
    public function juni() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 6)->get();  
        return view('pembukuan.juni', compact('dataAbsensi'));
    }
    
    public function juli() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 7)->get();  
        return view('pembukuan.juli', compact('dataAbsensi'));
    }
    
    public function agustus() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 8)->get();  
        return view('pembukuan.agustus', compact('dataAbsensi'));
    }
    
    public function september() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 9)->get();  
        return view('pembukuan.september', compact('dataAbsensi'));
    }
    
    public function oktober() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 10)->get();  
        return view('pembukuan.oktober', compact('dataAbsensi'));
    }
    
    public function november() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 11)->get();  
        return view('pembukuan.november', compact('dataAbsensi'));
    }
    
    public function desember() {
        $dataAbsensi = Absensi::whereMonth('tanggal', 12)->get();  
        return view('pembukuan.desember', compact('dataAbsensi'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPembukuan = Pembukuan::all();
        return view('pembukuan.index', ['dataPembukuan' => $dataPembukuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // Mencari data pembukuan berdasarkan ID
        $pembukuan = Pembukuan::find($id);

         // Jika data ditemukan, tampilkan detailnya
        if ($pembukuan) {
            return view('pembukuan.show', ['pembukuan' => $pembukuan]);
        } else {
             // Jika data tidak ditemukan, kembalikan ke halaman pembukuan dengan pesan error
            return redirect()->route('pembukuan.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    
}
