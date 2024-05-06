<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = [];
        return view('pengguna.pengguna', compact('data'));
    }

    public function create()
    {
        return view('pengguna.tambahPengguna');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // User::create($request->all());

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna created successfully.');
    }


}
