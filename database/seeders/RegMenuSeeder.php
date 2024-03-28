<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reg_menu')->insert([
            'name'=>'Pedoman Pelayanan'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Pedoman Pelayanan'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Pedoman Pengoranisasian'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Program Kerja'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Panduan'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Pedoman'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Keputusan Direktur'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Surat Edaran'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'Instruksi Direktur'
        ]);
        DB::table('reg_menu')->insert([
            'name'=>'SPO'
        ]);
    }
}
