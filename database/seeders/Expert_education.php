<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Expert_education extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expert_education')->insert([
            'education'=>'SMP'
            
        ]);
        DB::table('expert_education')->insert([
            'education'=>'SMA/SMK'
            
        ]);
        DB::table('expert_education')->insert([
            'education'=>'S1'
        
        ]);
        DB::table('expert_education')->insert([
            'education'=>'S2'
        
        ]);
        DB::table('expert_education')->insert([
            'education'=>'S3'
        
        ]); 
    }
}
