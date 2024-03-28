<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Expert_level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expert_level')->insert([
            'level'=>'Muda'
            
        ]);
        DB::table('expert_level')->insert([
            'level'=>'Madya'
            
        ]);
        DB::table('expert_level')->insert([
            'level'=>'Utama'
        
        ]); 
    }
}
