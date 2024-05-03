<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis',
        'nopol',
        'rangka',
        'mesin',
        'tahun_pembuatan',
        'pemakai',
        'skpd',
        'tgl_ba',
        'no_bpkb',
        'no_ba',
        'habis_masa_pinjam',
    ];
}
