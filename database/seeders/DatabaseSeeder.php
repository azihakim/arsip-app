<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Data;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Admin',
            'nip' => 'Admin',
            'role' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('123'),
        ]);

        
        Data::create([
            'jenis' => 'Jenis data',
            'nopol' => 'Nomor Polisi',
            'rangka' => 'Nomor Rangka',
            'mesin' => 'Nomor Mesin',
            'tahun_pembuatan' => 'Tahun Pembuatan',
            'pemakai' => 'Pemakai',
            'skpd' => 'SKPD',
            'tgl_ba' => Carbon::now()->subYears(6), // Mengurangkan 6 tahun dari tanggal saat ini
            'no_bpkb' => 'Nomor BPKB',
            'no_ba' => 'Nomor BA',
            'habis_masa_pinjam' => Carbon::now()->subDays(30), // Contoh: tambahkan 30 hari dari tanggal saat ini
        ]);
    }
}
