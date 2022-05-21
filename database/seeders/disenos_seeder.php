<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class disenos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disenos')->delete();
        for($i=0;$i<5;$i++){
          DB::table('disenos')->insert([
            'imagen'=> Str::random(10),
            'precio'=> \rand(1,100)
          ]);
      }
    }
}
