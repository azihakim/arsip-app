<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.addPegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nip = $request->nip;
        $ext = $request->foto->getClientOriginalExtension();
        $file = "foto-".$nip.".".$ext;
        $request->foto->storeAs('public/foto', $file);
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->golongan = $request->golongan;
        $pegawai->status = $request->status;
        $pegawai->foto = $file;
        $pegawai->save();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai Berhasil diSimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.editPegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $pegawai = Pegawai::findOrFail($id);
        // Jika foto baru diunggah, proses penyimpanannya
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto) {
                Storage::delete('public/foto/'.$pegawai->foto);
            }

            // Simpan foto baru
            $ext = $request->foto->getClientOriginalExtension();
            $file = "foto-" . $request->nip . "." . $ext;
            $request->foto->storeAs('public/foto', $file);
            $pegawai->foto = $file;
        }

        // Update informasi pegawai
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->golongan = $request->golongan;
        $pegawai->status = $request->status;
        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Hapus foto jika ada
        if ($pegawai->foto) {
            Storage::delete('public/foto/'.$pegawai->foto);
        }

        // Hapus data pegawai
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus.');
    }

}
