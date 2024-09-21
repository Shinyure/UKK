<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
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
        return view('karyawan.index',['karyawan'=>$karyawan]); 
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
            'foto' => 'required |mimes:jpeg,jpg,png',
        ],[
            'nip.required' => 'Harap Masukan NIP',
            'nama.required' => 'Masukan Nama Anda',
            'devisi.required' => 'Devisi Anda',
            'foto.required'=> 'Harap Masukan Foto Anda',
            'foto.mimes' => 'Format foto berupa JPEG, JPG, dan PNG',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama); 

        $data=[
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'devisi' => $request->input('devisi'),
            'foto' => $foto_nama,
        ];

        Karyawan::create($data);
        return redirect('karyawan')->with('Data telah di tambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Karyawan::where('nip', $id)->first();
        return view('karyawan.edit', compact('data'))->with('$data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'devisi' => 'required',
        ],[
            'nip.required' => 'Wajib di isi',
            'nama.required' => 'Gunakan Nama asli',
            'devisi.required' => 'Devisi anda',
        ]);

        $data=[
            'nip' => $request->nip,
            'nama' => $request->nama,
            'devisi' => $request->devisi,
        ];

        if($request->hasfile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png'
            ],[
                'foto.mimes' => 'Format foto JPEG,JPG,PNG'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis'). "." .$foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama); 

            $data_foto = Karyawan::Where('nip', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;
        }
        Karyawan::where('nip', $id)->update($data);
        return redirect('karyawan')->with('success', 'Data sudah di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::where('nip', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        Karyawan::where('nip', $id)->delete();
        return redirect('karyawan')->with('success', 'Data sudah di Hapus');
    }
}
