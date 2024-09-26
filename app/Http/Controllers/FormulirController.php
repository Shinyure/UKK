<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function create()
    {
        return view('formulir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'alasan' => 'required',
            'bukti' => 'required|mimes:jpeg,jpg,png',
        ]);

        $bukti_file = $request->file('bukti');
        $bukti_nama = now()->format('ymdhis') . '.' . $bukti_file->extension();
        $bukti_file->move(public_path('bukti'), $bukti_nama);

        $data = [
            'nama' => $request->input('nama'),
            'status' => $request->input('status'),
            'alasan' => $request->input('alasan'),
            'bukti' => $bukti_nama,
        ];

        Formulir::create($data);

        return redirect()->back()->with('success');
    }
}
