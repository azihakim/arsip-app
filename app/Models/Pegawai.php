<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = ['nama', 'nip', 'jabatan', 'golongan', 'status', 'foto'];

    public function dataDokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
