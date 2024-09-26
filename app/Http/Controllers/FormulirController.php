<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'bukti' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $bukti = $filename;
        } else {
            $bukti = null;
        }

        Formulir::create([
            'nama' => $request->nama,
            'status' => $request->status,
            'alasan' => $request->alasan,
            'bukti' => $bukti,
        ]);

        return redirect()->route('absensi.index')
                ->with('success', 'Absensi berhasil disimpan')
                ->with('notification', 'Formulir baru berhasil diajukan oleh '.$request->nama)
                ->with('notification_count', session('notification_count', 0) + 1);
    }

}
