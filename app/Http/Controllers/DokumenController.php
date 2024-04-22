<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        ->get();
        dd($dokumen);
        return view('dokumen.dokumen', compact('dokumen', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
