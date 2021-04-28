<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // User::create([
        //     'name' => 'Superuser',
        //     'username' => 'superuser',
        //     'role' => 'superuser',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Admin Advokasi',
        //     'username' => 'advokasi',
        //     'role' => 'admin',
        //     'fitur' => 'advokasi',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Direktur Jenderal Anggaran',
        //     'username' => 'es1_dja',
        //     'role' => 'es1',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Direktorat Sistem Penganggaran DJA',
        //     'username' => 'es2_dsp',
        //     'role' => 'es2',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'es2' => 'Direktorat Sistem Penganggaran',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Sekretariat Direktorat Jenderal Anggaran',
        //     'username' => 'es2_sekre',
        //     'role' => 'es2',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'es2' => 'Sekretariat',
        //     'es3' => 'KIMRA',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'KIMRA',
        //     'username' => 'es3_kimra',
        //     'role' => 'es3',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'es2' => 'Sekretariat',
        //     'es3' => 'KIMRA',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Es IV Advokasi',
        //     'username' => 'es4_advokasi',
        //     'role' => 'es4',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'es2' => 'Sekretariat',
        //     'es3' => 'KIMRA',
        //     'es4' => 'Pemantauan Advokasi',
        //     'password' => bcrypt('123'),
        // ]);
        // User::create([
        //     'name' => 'Es IV Pengaduan',
        //     'username' => 'es4_pengaduan',
        //     'role' => 'es4',
        //     'kl' => 'Kementerian Keuangan',
        //     'es1' => 'Direktorat Jenderal Anggaran',
        //     'es2' => 'Sekretariat',
        //     'es3' => 'KIMRA',
        //     'es4' => 'Pemantauan Pengaduan',
        //     'password' => bcrypt('123'),
        // ]);
        User::create([
            'name' => 'Admin Pengaduan',
            'username' => 'pengaduan',
            'role' => 'admin',
            'fitur' => 'pengaduan',
            'password' => bcrypt('123'),
        ]);
    }
}
