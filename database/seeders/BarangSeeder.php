<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('barangs')->insert([
            'id_category' => '1',
            'nama' => 'Tas Selempang',
            'harga' =>'25000',
            'file' => '1613623718_tas selempang.jpg',
            'stock' =>'10',
            'id_suplier'=>1,
            'keterangan' =>'Stock barang ready',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('barangs')->insert([
            'id_category' => '2',
            'nama' => 'Sepatu Casual',
            'id_suplier'=>1,
            'harga' =>'560000',
            'file' => '1613624110_sepatu.png',
            'stock' =>'5',
            'keterangan' =>'Ready stock size : 38,39,40,41',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('barangs')->insert([
            'id_category' => '3',
            'nama' => 'Kaos Polos',
            'id_suplier'=>1,
            'harga' =>'15000',
            'file' => '1613624198_kaos.jpg',
            'stock' =>'15',
            'keterangan' =>'Ready ukuran S,M,L,dan XL',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
