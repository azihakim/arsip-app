<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $count = Data::count();
        $tanggalSekarang = Carbon::now();
        $countHmp = Data::where('tgl_ba', '<', $tanggalSekarang)->count();

        return view('home', compact('count', 'countHmp'));
    }
}
