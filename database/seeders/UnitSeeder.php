<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit')->insert([
            'name'=>'SIMRS'
        ]);
        DB::table('unit')->insert([
            'name'=>'Administrasi Umum'
        ]);
        DB::table('unit')->insert([
            'name'=>'Poli Umum'
        ]);
    }
}
