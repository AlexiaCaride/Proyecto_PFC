<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class capas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('capas')->delete();
        for($i=0;$i<5;$i++){
          DB::table('capas')->insert([
            'diseno_id'=> \rand(1,100),
            'tipo'=>Str::random(10),
            'nombre'=>Str::random(10)
          ]);
      }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
