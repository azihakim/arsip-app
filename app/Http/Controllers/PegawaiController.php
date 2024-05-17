<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
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
        // Ambil data pegawai dengan dokumennya
       $pegawai = Pegawai::find($id);

        if ($pegawai) {
            $dokumen = Dokumen::select(
                'dokumens.id',
                'dokumens.jenis',
                'dokumens.file',
                'pegawai.nama',
                'pegawai.nip',
                'pegawai.jabatan',
                'pegawai.golongan',
                'pegawai.status',
                'pegawai.foto'
            )
            ->join('pegawais as pegawai', 'pegawai.id', '=', 'dokumens.pegawai_id')
            ->where('pegawai.id', $id)
            ->get();

            foreach ($dokumen as $doc) {
                $doc->delete();
            }
            foreach ($dokumen as $doc) {
                // Hapus file dokumen
                Storage::delete('public/dokumen/'.$doc->file);
            }

            // Hapus pegawai
            $pegawai->delete();

            return redirect()->route('pegawai.index')
                ->with('success', 'Pegawai berhasil dihapus.');
        } else {
            return redirect()->route('pegawai.index')
                ->with('error', 'Pegawai tidak ditemukan.');
        }

        

        Storage::delete('public/foto/'.$pegawai->foto);
        

        // Hapus data pegawai beserta dokumennya
        if ($pegawai) {
            $pegawai->delete();
            return redirect()->route('pegawai.index')
                ->with('success', 'Pegawai berhasil dihapus.');
        } else {
            return redirect()->route('pegawai.index')
                ->with('error', 'Pegawai tidak ditemukan.');
        }
    }


}
