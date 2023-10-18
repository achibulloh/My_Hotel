<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [ [
            'username' => 'Admin',
            'nama_lengkap' => 'AdminBebas',
            'jenis_kelamin' => 'L',
            'alamat' => 'burangrang No.31 nomor 20',
            'nomor_tlp' => '085721077423',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'status_akun' => 'active',
            'role' => 'admin'
        ],
        [
            'username' => 'karyawan',
            'nama_lengkap' => 'KarywanAdaAja',
            'jenis_kelamin' => 'L',
            'alamat' => 'simlim no 1',
            'nomor_tlp' => '0812345678',
            'email' => 'karyawan@gmail.com',
            'password' => Hash::make('karyawan@gmail.com'),
            'status_akun' => 'active',
            'role' => 'karyawan'
        ],
        [
            'username' => 'manager',
            'nama_lengkap' => 'ManagerAdaAja',
            'jenis_kelamin' => 'L',
            'alamat' => 'simlim no 1',
            'nomor_tlp' => '0812345678',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager@gmail.com'),
            'status_akun' => 'active',
            'role' => 'manager'
        ],
        [
            'username' => 'user',
            'nama_lengkap' => 'UserAdaAja',
            'jenis_kelamin' => 'L',
            'alamat' => 'simlim no 1',
            'nomor_tlp' => '0812345698',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@gmail.com'),
            'status_akun' => 'active',
            'role' => 'user'
        ],
        [
            'username' => 'Irfanph_',
            'nama_lengkap' => 'Irfan Putra Hendari',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Muararajeun Kaler',
            'nomor_tlp' => '081221515809',
            'email' => 'irfanputrahendari62@gmail.com', 
            'password' => Hash::make('Irfancau165*'),
            'status_akun' => 'active',
            'role' => 'user'
        ]
    ];
            foreach($user as $key => $value){
            User::create($value);
            }
            DB::table('kategori')->insert([
                ['nama_kategori'=>'Standar'],['nama_kategori'=>'Superior'],
                ['nama_kategori'=>'Ekonomi'],['nama_kategori'=>'Deluxe'],
                ['nama_kategori'=>'Twin'],['nama_kategori'=>'Sigle'],
                ['nama_kategori'=>'Double'],['nama_kategori'=>'Family'],
                ['nama_kategori'=>'Junior-Suite'],['nama_kategori'=>'Suite'],
                ['nama_kategori'=>'Presidential-Suite'],['nama_kategori'=>'Connecting-Room'],
                ['nama_kategori'=>'Disabled'],['nama_kategori'=>'Smoking'],
            ]);

            DB::table('Rooms')->insert([[
                'nama_kamar' => 'Kamar 01',
                'harga' => 'Rp. 150.000,',
                'id_kategori' => '1'
            ],
            [
                'nama_kamar' => 'Kamar 02',
                'harga' => 'Rp. 150.000,',
                'id_kategori' => '1'
            ],
            [
                'nama_kamar' => 'Kamar 03',
                'harga' => 'Rp. 250.000,',
                'id_kategori' => '10'
            ],
            [
                'nama_kamar' => 'Kamar 04',
                'harga' => 'Rp. 150.000,',
                'id_kategori' => '1'
            ],
            [
                'nama_kamar' => 'Kamar 05',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ], 
            [
                'nama_kamar' => 'Kamar 06',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ],
            [
                'nama_kamar' => 'Kamar 07',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ],
            [
                'nama_kamar' => 'Kamar 08',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ],
            [
                'nama_kamar' => 'Kamar 09',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ],
            [
                'nama_kamar' => 'Kamar 10',
                'harga' => 'Rp. 175.000,',
                'id_kategori' => '2'
            ],
            [
                'nama_kamar' => 'Kamar 11',
                'harga' => 'Rp. 150.000,',
                'id_kategori' => '1'
            ],
            [
                'nama_kamar' => 'Kamar 12',
                'harga' => 'Rp. 100.000,',
                'id_kategori' => '3'
            ],
            [
                'nama_kamar' => 'Kamar 100',
                'harga' => 'Rp. 100.000,',
                'id_kategori' => '3'
            ],
        ]);
    }
}
