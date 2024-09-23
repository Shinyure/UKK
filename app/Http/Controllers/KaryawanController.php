<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Absensi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', ['karyawan' => $karyawan]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'devisi' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png',
        ],[
            'nip.required' => 'Harap Masukan NIP',
            'nama.required' => 'Masukan Nama Anda',
            'devisi.required' => 'Devisi Anda',
            'foto.required'=> 'Harap Masukan Foto Anda',
            'foto.mimes' => 'Format foto berupa JPEG, JPG, dan PNG',
        ]);

        $foto_file = $request->file('foto');
        $foto_nama = now()->format('ymdhis') . '.' . $foto_file->extension();
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'devisi' => $request->input('devisi'),
            'foto' => $foto_nama,
        ];

        // Simpan data karyawan
        Karyawan::create($data);

        // Simpan data absensi
        $absen = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'bulan' => $request->input('bulan') ?? now()->format('m'),  // Pastikan nilai bulan tidak kosong
            'senin' => false,
            'selasa' => false,
            'rabu' => false,
            'kamis' => false,
            'jumat' => false,
        ];

        // Debugging untuk melihat data absensi
        // dd($absen); 

        Absensi::create($absen);
        return redirect('karyawan')->with('success', 'Data telah ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        // Implementasikan logika untuk menampilkan detail karyawan jika perlu
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Karyawan::where('nip', $id)->firstOrFail(); // Gunakan firstOrFail untuk penanganan kesalahan
        return view('karyawan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::where('nip', $id)->firstOrFail();

        // Validasi NIP
        if ($request->input('nip') !== $karyawan->nip) {
            return redirect()->back()->withErrors(['nip' => 'NIP tidak bisa diubah']);
        }

        // Validasi dan update data lainnya
        $request->validate([
            'nama' => 'required',
            'devisi' => 'required',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'devisi' => $request->input('devisi'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png'
            ]);

            $foto_file = $request->file('foto');
            $foto_nama = now()->format('ymdhis') . '.' . $foto_file->extension();
            $foto_file->move(public_path('foto'), $foto_nama);

            // Hapus foto lama
            File::delete(public_path('foto') . '/' . $karyawan->foto);

            $data['foto'] = $foto_nama;
        }

        $karyawan->update($data);

        return redirect('karyawan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::where('nip', $id)->delete();
        $data = Karyawan::where('nip', $id)->firstOrFail();
        File::delete(public_path('foto') . '/' . $data->foto);
        Karyawan::where('nip', $id)->delete();
        return redirect('karyawan')->with('success', 'Data sudah dihapus');
    }
}
