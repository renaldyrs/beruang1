<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class suplier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suplier')->insert([
            'nama_suplier' => 'tio',
            'id_provinsi'=>11,
            'id_kota'=>444,
            'alamat'=>'surabaya',
            'no'=>'085843220898',
        ]);
    }
}
