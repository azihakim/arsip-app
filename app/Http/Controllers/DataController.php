<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view('kr4_2024.kr', compact('data'));
    }
    
    public function create()
    {
        return view('kr4_2024.addKr');
    }

    // Fungsi untuk menyimpan data dari formulir
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'jenis' => 'required',
            'nopol' => 'required',
            'rangka' => 'required',
            'mesin' => 'required',
            'tahun_pembuatan' => 'required',
            'pemakai' => 'required',
            'skpd' => 'required',
            'tgl_ba' => 'required',
            'no_bpkb' => 'required',
            'no_ba' => 'required',
            'habis_masa_pinjam' => 'required',
        ]);

        // Simpan data ke dalam database
        Data::create([
            'jenis' => $request->jenis,
            'nopol' => $request->nopol,
            'rangka' => $request->rangka,
            'mesin' => $request->mesin,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'pemakai' => $request->pemakai,
            'skpd' => $request->skpd,
            'tgl_ba' => $request->tgl_ba,
            'no_bpkb' => $request->no_bpkb,
            'no_ba' => $request->no_ba,
            'habis_masa_pinjam' => $request->habis_masa_pinjam,
        ]);

        // Redirect ke halaman yang sesuai (misalnya, halaman sukses)
        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan!');
    }

    // Fungsi untuk menampilkan form edit
    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return view('kr4_2024.editKr', compact('data'));
    }

    // Fungsi untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'jenis' => 'required',
            'nopol' => 'required',
            'rangka' => 'required',
            'mesin' => 'required',
            'tahun_pembuatan' => 'required',
            'pemakai' => 'required',
            'skpd' => 'required',
            'tgl_ba' => 'required',
            'no_bpkb' => 'required',
            'no_ba' => 'required',
            'habis_masa_pinjam' => 'required',
        ]);

        // Update data ke dalam database
        $data = Data::findOrFail($id);
        $data->update($request->all());

        // Redirect ke halaman yang sesuai (misalnya, halaman sukses)
        return redirect()->route('data.index')->with('success', 'Data berhasil diupdate!');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        // Redirect ke halaman yang sesuai (misalnya, halaman sukses)
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus!');
    }
}
