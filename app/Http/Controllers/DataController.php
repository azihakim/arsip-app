<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'jenis' => 'required|string',
            'nopol' => 'required|string',
            'rangka' => 'required|string',
            'mesin' => 'required|string',
            'tahun_pembuatan' => 'required|string',
            'pemakai' => 'required|string',
            'skpd' => 'required|string',
            'tgl_ba' => 'required|date',
            'no_bpkb' => 'required|string',
            'no_ba' => 'required|string',
            'habis_masa_pinjam' => 'required|date',
            'dok_ba' => 'required|file', // Validasi file dokumen BA
        ]);

        // Proses upload dokumen BA
        if ($request->hasFile('dok_ba')) {
            $dok_ba = $request->file('dok_ba');
            $dok_ba_name = time() . '_' . 'Dokumen BA.pdf' ;
            $dok_ba->storeAs('public/dokumen', $dok_ba_name);
        }
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
            'dok_ba' => $dok_ba_name, // Simpan nama file dokumen BA jika diunggah
        ]);

        // Redirect ke halaman yang sesuai (misalnya, halaman sukses)
        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan.');
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
            'jenis' => 'required|string',
            'nopol' => 'required|string',
            'rangka' => 'required|string',
            'mesin' => 'required|string',
            'tahun_pembuatan' => 'required|string',
            'pemakai' => 'required|string',
            'skpd' => 'required|string',
            'tgl_ba' => 'required|date',
            'no_bpkb' => 'required|string',
            'no_ba' => 'required|string',
            'habis_masa_pinjam' => 'required|date',
        ]);

        // Cari data yang akan diupdate
        $data = Data::findOrFail($id);

        // Proses upload dokumen BA jika ada perubahan
        if ($request->hasFile('dok_ba')) {
            $dok_ba = $request->file('dok_ba');
            $dok_ba_name = time() . '_' . 'Dokumen BA.pdf';
            $dok_ba->storeAs('public/dokumen', $dok_ba_name);
            $data->dok_ba = $dok_ba_name;
        }

        // Update data
        $data->update([
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

        // Redirect ke halaman yang sesuai (misalnya, halaman detail)
        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        // Cari data yang akan dihapus
        $data = Data::findOrFail($id);

        // Hapus file dokumen BA dari penyimpanan jika ada
        if ($data->dok_ba) {
            Storage::delete('public/dokumen/' . $data->dok_ba);
        }

        // Hapus data dari database
        $data->delete();

        // Redirect ke halaman yang sesuai (misalnya, halaman sukses)
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus!');
    }
}
