<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumens';
    protected $fillable = ['pegawai_id', 'jenis', 'file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
